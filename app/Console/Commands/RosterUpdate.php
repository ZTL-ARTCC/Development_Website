<?php

namespace App\Console\Commands;

use App\Models\EventRegistration;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class RosterUpdate extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'RosterUpdate:UpdateRoster';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the roster against the VATUSA roster.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $client = new Client();
        $res = $client->get('https://api.vatusa.net/v2/facility/' . Config::get('vatusa.facility') .
                            '/roster?apikey=' . Config::get('vatusa.api_key'));
        $users = User::whereVisitor(0)->get()->p('id');
        if ($res->getStatusCode() == "200") {
            $roster = json_decode($res->getBody());
        } else {

            exit(1);
        }
        $i = 0;
        foreach ($roster as $sett) {
            $i++;
        }
        $j = 0;

        foreach ($roster as $r) {
            $j++;
            if ($j != $i) {
                // Last result will be false or true
                if (!($r === true || $r === false)) {
                    if (User::find($r->cid) !== null) {
                        $user = User::find($r->cid);
                        $user->fname = $r->fname;
                        $user->lname = $r->lname;
                        $user->email = $r->email;
                        $user->rating_id = $r->rating;
                        $user->visitor = '0';
                        if ($user->status == 2) {
                            $user->status = 1;
                        }
                        $user->added_to_facility =
                            substr($r->facility_join, 0, 10) . ' ' . substr($r->facility_join, 11, 8);
                        $user->save();
                    } else {
                        $user = new User;
                        $user->id = $r->cid;
                        $user->fname = $r->fname;
                        $user->lname = $r->lname;
                        $user->email = $r->email;
                        $user->rating_id = $r->rating;
                        if ($r->rating == 2) {
                            $user->del = 1;
                            $user->gnd = 1;
                        } else {
                            if ($r->rating == 3) {
                                $user->del = 1;
                                $user->gnd = 1;
                                $user->twr = 1;
                            } else {
                                if ($r->rating == 4 || $r->rating == 5 || $r->rating == 7 || $r->rating == 8 ||
                                    $r->rating == 10) {
                                    $user->del = 1;
                                    $user->gnd = 1;
                                    $user->twr = 1;
                                    $user->app = 1;
                                }
                            }
                        }
                        $user->visitor = '0';
                        $user->status = '1';
                        $user->added_to_facility =
                            substr($r->facility_join, 0, 10) . ' ' . substr($r->facility_join, 11, 8);
                        $user->save();

                        $user = User::find($r->cid);

                        //Assigns controller initials
                        $user = User::find($r->cid);
                        $users_inc_v = User::where('status', '!=', 2)->where('visitor_from', '!=', 'ZHU')
                                           ->where('visitor_from', '!=', 'ZJX')->orWhereNull('visitor_from')->get();
                        $fn_initial = strtoupper(substr($user->fname, 0, 1));
                        $ln_initial = strtoupper(substr($user->lname, 0, 1));
                        $f_initial = $fn_initial;
                        $l_initial = $ln_initial;

                        $trys = 0;
                        a:
                        $trys++;
                        $initials = $fn_initial . $ln_initial;

                        $yes = 1;
                        foreach ($users_inc_v as $u) {
                            if ($u->initials == $initials) {
                                $yes = 0;
                            }
                        }

                        if ($yes == 1) {
                            $user->initials = $initials;
                            $user->save();
                        } else {
                            // Check first initial with all letters
                            if ($trys <= 26) {
                                $fn_initial = $f_initial;
                                $ln_initial = $this->letterFromNum($trys);

                                goto a;
                            } else {
                                $ln_initial = $this->genRandLetter();
                            }

                            if ($trys >= 27 && $trys <= 52) {
                                $ln_initial = $l_initial;
                                $fn_initial = $this->letterFromNum($trys - 26);

                                goto a;
                            } else {
                                $fn_initial = $this->genRandLetter();
                            }

                            goto a;
                        }
                    }
                }
            }
        }

        foreach ($users as $u) {
            $delete = 0;
            foreach ($roster as $r) {
                // Last result will be false
                if (!($r === true || $r === false)) {
                    $id = $r->cid;
                    if ($u == $id) {
                        $delete = 1;
                    }
                }
            }

            if ($delete == '0') {
                $use = User::find($u);
                if ($use->visitor == 0 && $use->api_exempt == 0) {
                    $event_requests = EventRegistration::whereControllerId($use->id)->get();

                    foreach ($event_requests as $e) {
                        $e->delete();
                    }

                    $use->status = 2;

                    $use->save();
                }
            }
        }


    }

    /**
     * Match a letter to a number
     *
     * @return string
     */
    public function letterFromNum($fi_int) {
        return chr($fi_int + 64);
    }

    /**
     * Randomly generate a letter
     *
     * @return string
     */
    public function genRandLetter() {
        return chr(rand(65, 90));
    }
}
