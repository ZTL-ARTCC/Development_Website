<?php

namespace App\Http\Controllers;

use App\Models\GdprCompliance;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use SimpleXMLElement;

class RosterController extends Controller {
    public function index() {
        $hcontrollers = User::where('visitor', '0')->where('status', '1')->orderBy('lname', 'ASC')->get();
        $vcontrollers = User::where('visitor', '1')->where('status', '1')->where('visitor_from', '!=', 'ZJX')
                            ->orderBy('lname', 'ASC')->get();
        $visagreecontrollers =
            User::where('visitor', '1')->where('visitor_from', 'ZJX')->orderBy('visitor_from', 'ASC')
                ->orderBy('lname', 'ASC')->get();

        return view('site.roster')->with('hcontrollers', $hcontrollers)->with('vcontrollers', $vcontrollers)
                                  ->with('visagreecontrollers', $visagreecontrollers);
    }

    public function ajax_get_user_info($cid) {
        if (empty($cid) || !is_numeric($cid)) {
            return Response::json(['error' => 'Invalid or empty cid given']);
        }
        $client = new Client;
        $url = sprintf(Config::get('services.vatsim.url'), $cid);
        $result = $client->get($url);
        $xml = new SimpleXMLElement($result->getBody());
        $res = [
            'cid' => $xml->user['cid']->__toString(),
        ];
        foreach ($xml->user->children() as $child) {
            $res[$child->getName()] = $child->__toString();
        }
        foreach (User::$ratingsLong as $id => $long) {
            if (strtolower($res['rating']) == strtolower($long)) {
                $res['rating'] = $id;
            }
        }
        return Response::json($res);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function login() {
        if (Auth::check()) {
            return redirect('/')->with('error', 'You are already logged in.');
        }
        if (Config::get('app.debug') == false) {
            if (!Auth::check() && !isset($_GET['token'])) {
                $_SESSION['redirect'] = Config::get('app.url');
                header("Location: https://login.vatusa.net/uls/v2/login?fac=" . Config::get('vatusa.facility'));
                exit;
            }
        } else {
            if (Config::get('app.url') == 'https://development.ztlartcc.org') {
                if (!Auth::check() && !isset($_GET['token'])) {
                    $_SESSION['redirect'] = Config::get('app.url');
                    header("Location: https://login.vatusa.net/uls/v2/login?fac=" . Config::get('vatusa.facility') .
                           "&dev=1&url=2");
                    exit;
                }
            } else {
                if (!Auth::check() && !isset($_GET['token'])) {
                    $_SESSION['redirect'] = Config::get('app.url');
                    header("Location: https://login.vatusa.net/uls/v2/login?fac=" . Config::get('vatusa.facility') .
                           "&dev=1&url=3");
                    exit;
                }
            }
        }

        $token = $_GET['token'];
        $parts = explode('.', $token);

        $token = $this->base64url_decode($parts[1]);

        $jwk = json_decode(Config::get('vatusa.jwk'), true);

        $algorithms = ['HS256' => 'sha256', 'HS384' => 'sha384', 'HS512' => 'sha512'];

        if (!isset($algorithms[$jwk['alg']])) {
            return redirect('/')->with('error', "Invalid Operation");
        }

        $sig = $this->base64url_encode(hash_hmac($algorithms[$jwk['alg']], "$parts[0].$parts[1]",
                                                 $this->base64url_decode($jwk['k']), true));

        $signature = $this->base64url_decode($parts[1]);
        $json_token = json_decode($signature, true)['sig'];

        if ($sig == $parts[2]) {

            $token = json_decode($token, true);

            $x = 0;
            Log::info("loginv2 at $x");
            $x++;
            if ($token['iss'] != 'VATUSA') {
                return redirect('/')->with('error', "Token not issued from VATUSA.");
            }
            if ($token['aud'] != 'ZTL') {
                return redirect('/')->with('error', "Token not issued for ZTL.");
            }

            $client = new Client();
            $url = "https://login.vatusa.net/uls/v2/info?token={$parts[1]}";
            $result = $client->get($url);
            $res = json_decode($result->getBody()->__toString(), true);

            $userstatuscheck = User::find($res['cid']);
            if ($userstatuscheck) {
                if ($userstatuscheck->status != 2) {
                    // Save the user's rating for use down the line
                    $rating_old = $userstatuscheck->rating_id;

                    $userstatuscheck->fname = $res['firstname'];
                    $userstatuscheck->lname = $res['lastname'];
                    $userstatuscheck->email = $res['email'];
                    $userstatuscheck->rating_id = $res['intRating'];
                    $userstatuscheck->json_token = encrypt($json_token);
                    $client = new Client();
                    $response = $client->request('GET',
                                                 'https://api.vatusa.net/v2/user/' . $res['cid'] . '?apikey=' .
                                                 Config::get('vatusa.api_key'));
                    $resu = json_decode($response->getBody());
                    if ($resu->flag_broadcastOptedIn == 1) {
                        if ($userstatuscheck->opt != 1) {
                            $opt = new GdprCompliance();
                            $opt->controller_id = $res['cid'];
                            $opt->ip_address = '0.0.0.0';
                            $opt->means = 'VATUSA API';
                            $opt->option = 1;
                            $opt->save();
                            $userstatuscheck->opt = 1;
                        }
                    } else {
                        $user_opt =
                            GdprCompliance::where('controller_id', $userstatuscheck->id)->where('means', '!=', 'VATUSA API')
                               ->where('option', 1)->first();
                        if ($userstatuscheck->opt != 0 && !isset($user_opt)) {
                            $opt = new GdprCompliance();
                            $opt->controller_id = $res['cid'];
                            $opt->ip_address = '0.0.0.0';
                            $opt->means = 'VATUSA API';
                            $opt->option = 0;
                            $opt->save();
                            $userstatuscheck->opt = 0;
                        }
                    }
                    if ($userstatuscheck->visitor == '1') {
                        if ($resu->facility != 'ZZN') {
                            $userstatuscheck->visitor_from = $resu->facility;
                        }
                    } else {
                        $userstatuscheck->visitor_from = null;
                    }
                    $userstatuscheck->save();

                    Auth::loginUsingId($res['cid'], true);
                } else {
                    return redirect('/')->with('error',
                                               'You have not been found on the roster. If you have recently joined, please allow up to an hour for the roster to update.');
                }
            } else {
                return redirect('/')->with('error',
                                           'You have not been found on the roster. If you have recently joined, please allow up to an hour for the roster to update.');
            }

            if ($userstatuscheck->status == 0) {
                return redirect('/')->with('success',
                                           'You have been logged in successfully. Please note that you are on an LOA and should not control until off the LOA. If this is an error, please let the DATM know.');
            } else {
                return redirect('/')->with('success', 'You have been logged in successfully.');
            }
        } else {
            return redirect('/')->with('error', 'Bad Signature.');
        }
    }

    public function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/'));
    }

    public function base64url_encode($data, $use_padding = false) {
        $encoded = strtr(base64_encode($data), '+/', '-_');
        return true === $use_padding ? $encoded : rtrim($encoded, '=');
    }

    public function logout() {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'You are not logged in.');
        } else {
            Auth::logout();
            return redirect('/')->with('success', 'You have been logged out successfully.');
        }
    }

    public function staffIndex() {
        $users = User::with('roles')->get();

        $atm = $users->filter(function($user) {
            return $user->hasRole('atm');
        });

        $datm = $users->filter(function($user) {
            return $user->hasRole('datm');
        });

        $ta = $users->filter(function($user) {
            return $user->hasRole('ta');
        });

        $ata = $users->filter(function($user) {
            return $user->hasRole('ata');
        });

        $wm = $users->filter(function($user) {
            return $user->hasRole('wm');
        });

        $awm = $users->filter(function($user) {
            return $user->hasRole('awm');
        });

        $ec = $users->filter(function($user) {
            return $user->hasRole('ec');
        });

        $aec = $users->filter(function($user) {
            return $user->hasRole('aec');
        });

        $fe = $users->filter(function($user) {
            return $user->hasRole('fe');
        });

        $afe = $users->filter(function($user) {
            return $user->hasRole('afe');
        });

        $ins = $users->filter(function($user) {
            return $user->hasRole('ins');
        });

        $mtr = $users->filter(function($user) {
            return $user->hasRole('mtr');
        });

        return view('site.staff')->with('atm', $atm)->with('datm', $datm)
                                 ->with('ta', $ta)->with('ata', $ata)
                                 ->with('wm', $wm)->with('awm', $awm)
                                 ->with('ec', $ec)->with('aec', $aec)
                                 ->with('fe', $fe)->with('afe', $afe)
                                 ->with('ins', $ins)->with('mtr', $mtr);
    }
}
