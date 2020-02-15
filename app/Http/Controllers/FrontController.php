<?php

namespace App\Http\Controllers;

use App\Airport;
use App\ATC;
use App\Bronze;
use App\Calendar;
use App\ControllerLog;
use App\ControllerLogUpdate;
use App\Event;
use App\EventPosition;
use App\EventRegistration;
use App\Feedback;
use App\File;
use App\Http\Controllers\toArray;
use App\Metar;
use App\Overflight;
use App\OverflightUpdate;
use App\Permission;
use App\Role;
use App\Scenery;
use App\User;
use App\Visitor;
use Carbon\Carbon;
use App\PositionPreset;
use Config;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Mail;
use Response;
use SimpleXMLElement;
use Validation;

class FrontController extends Controller
{
    public function home() {
        $atc = ATC::get();
        if($atc) {
            $atl_ctr = 0;
            $atl_app = 0;
            $atl_twr = 0;
            $clt_twr = 0;
            foreach($atc as $a) {
                $field = substr($a->position, 0, 3);
                $position = substr($a->position, -3);
                if($field == 'ATL') {
                    if($position == 'TWR' || $position == 'GND') {
                        $atl_twr = 1;
                    } elseif($position == 'APP' || $position == 'DEP') {
                        $atl_app = 1;
                    } elseif($position == 'CTR') {
                        $atl_ctr = 1;
                    }
                } elseif($field == 'CLT') {
                    if($position == 'TWR' || $position == 'GND' || $position == 'APP' || $position == 'DEP') {
                        $clt_twr = 1;
                    }
                }
            }
        }

        $airports = Airport::where('front_pg', 1)->orderBy('ltr_4', 'ASC')->get();
        $metar_update = Metar::first();
        if($metar_update != null) {
            $metar_last_updated = substr($metar_update, -10, 5);
        } else {
            $metar_last_updated = null;
        }

        $controllers = ATC::get();
        $last_update = ControllerLogUpdate::first();
        $controllers_update = substr($last_update->created_at, -8, 5);

        $now = Carbon::now();

        $calendar = Calendar::where('type', '1')->get()->filter(function($news) use ($now) {
            return strtotime($news->date.' '.$news->time) > strtotime($now);
        })->sortBy(function($news) {
            return strtotime($news->date.' '.$news->time);
        });

        $news = Calendar::where('type', '2')->where('visible', '1')->get()->filter(function($news) use ($now) {
            return strtotime($news->date.' '.$news->time) < strtotime($now);
        })->sortByDesc(function($news) {
            return strtotime($news->date.' '.$news->time);
        });

        $events = Event::where('status', 1)->get()->filter(function($e) use ($now) {
            return strtotime($e->date.' '.$e->start_time) > strtotime($now);
        })->sortBy(function($e) {
            return strtotime($e->date);
        });

        $flights = Overflight::where('dep', '!=', '')->where('arr', '!=', '')->take(10)->get();
        $flights_update = substr(OverflightUpdate::first()->updated_at, -8, 5);
        $lastTop5 = ControllerLog::top5Controllers(date('Y-n', strtotime("first day of previous month")));
        $currentTop5 = ControllerLog::top5Controllers(date('Y-n'));
        $currentTop3 = ControllerLog::top3Controllers(date('Y-n'));
        return view('site.home')->with('clt_twr', $clt_twr)->with('atl_twr', $atl_twr)->with('atl_app', $atl_app)->with('atl_ctr', $atl_ctr)
                                ->with('airports', $airports)->with('metar_last_updated', $metar_last_updated)
                                ->with('controllers', $controllers)->with('controllers_update', $controllers_update)
                                ->with('calendar', $calendar)->with('news', $news)->with('events', $events)
                                ->with('flights', $flights)->with('flights_update', $flights_update)->with('lastTop5', $lastTop5)->with('currentTop5', $currentTop5)->with('currentTop3', $currentTop3);
    }

    public function teamspeak() {
        return view('site.teamspeak');
    }
    public function newProfilePic($id) {
        $user = User::find($id);
        return view('site.upload')->with('user', $user);
    }
    public function eprof($id) {
        $user = User::find($id);
        return view('site.edit')->with('user', $user);
    }
    public function edit(Request $request) {
        $name = $request->cid.'.'.'jpg';
       
        $public_url = '/storage/app/public/files/'.$name;
        unlink($public_url);


    }
    public function sFile(Request $request, $id) {
        $validator = $request->validate([
            'file' => 'required',
            
        ]);
        $time = Carbon::now()->timestamp;
        $ext = $request->file('file')->getClientOriginalExtension();
        $name = $request->$time.'.'.'jpg';
            

	
        $path = $request->file('file')->storeAs(
            '/public/files/', $name
        );
        $public_url = '/storage/files/'.$name;
        $user = User::find($id);
        $user->path = $public_url;
        $user->save();


        return view('site.profile');
    }
    public function eFile(Request $request, $id) {
        $file = File::find($id);
      
        $file->save();
        return view('site.home');
    }


    public function showCalendarEvent($id) {
        $calendar = Calendar::find($id);
        return view('site.news')->with('calendar', $calendar);

    }

    public function viewEvent($id) {
            $event = Event::find($id);
            $positions = EventPosition::where('event_id', $event->id)->orderBy('created_at', 'ASC')->get();
			if(Auth::guest()) {
            }
            elseif(Auth::user()->can('events')) {
                $registrations = EventRegistration::where('event_id', $event->id)->where('status', 0)->orderBy('created_at', 'ASC')->get();
                $presets = PositionPreset::get()->pluck('name', 'id');
                $controllers = User::orderBy('lname', 'ASC')->get()->pluck('backwards_name_rating', 'id');
               
            } 

            $your_registration1 = EventRegistration::where('event_id', $event->id)->where('controller_id', Auth::id())->where('choice_number', 1)->first();
            $your_registration2 = EventRegistration::where('event_id', $event->id)->where('controller_id', Auth::id())->where('choice_number', 2)->first();
            $your_registration3 = EventRegistration::where('event_id', $event->id)->where('controller_id', Auth::id())->where('choice_number', 3)->first();

            return view('site.events')->with('event', $event)->with('positions', $positions)->with('registrations', $registrations)->with('presets', $presets)->with('controllers', $controllers)
                                                            ->with('your_registration1', $your_registration1)->with('your_registration2', $your_registration2)->with('your_registration3', $your_registration3);
        }
    public function airportIndex() {
        $airports = Airport::orderBy('ltr_3', 'ASC')->get();
        return view('site.airports.index')->with('airports', $airports);
    }

    public function searchAirport(Request $request) {
        $apt = $request->apt;
        return redirect('/pilots/airports/search?apt='.$apt);
    }

    public function searchAirportResult(Request $request) {
        $apt = $request->apt;
        if(strlen($apt) == 3) {
            $apt_s = 'k'.strtolower($apt);
        } elseif(strlen($apt) == 4) {
            $apt_s = strtolower($apt);
        } else {
            return redirect()->back()->with('error', 'You either did not search for an airport or the airport ID is too long.');
        }

        $apt_r = strtoupper($apt_s);

        $client = new Client;
        $response_metar = $client->request('GET', 'https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=2&mostRecentForEachStation=true&stationString='.$apt_s);
        $response_taf = $client->request('GET', 'https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=tafs&requestType=retrieve&format=xml&hoursBeforeNow=2&mostRecentForEachStation=true&stationString='.$apt_s);

        $root_metar = new SimpleXMLElement($response_metar->getBody());
        $root_taf = new SimpleXMLElement($response_taf->getBody());

        $metar = $root_metar->data->children()->METAR->raw_text;
        $taf = $root_taf->data->children()->TAF->raw_text;

        if($metar == null) {
            return redirect()->back()->with('error', 'The airport code you entered is invalid.');
        }
        $metar = $metar->__toString();
        if($taf != null) {
            $taf = $taf->__toString();
        }
        $visual_conditions = $root_metar->data->children()->METAR->flight_category->__toString();

        $res_a = $client->get('http://api.vateud.net/online/arrivals/'.$apt_s.'.json');
        $pilots_a = json_decode($res_a->getBody()->getContents(), true);

        if($pilots_a) {
            $pilots_a = collect($pilots_a);
        } else {
            $pilots_a = null;
        }

        $res_d = $client->get('http://api.vateud.net/online/departures/'.$apt_s.'.json');
        $pilots_d = json_decode($res_d->getBody()->getContents(), true);

        if($pilots_d) {
            $pilots_d = collect($pilots_d);
        } else {
            $pilots_d = null;
        }

        $client = new Client(['http_errors' => false]);
        $res = $client->request('GET', 'https://api.aviationapi.com/v1/charts?apt='.$apt_r);
        $status = $res->getStatusCode();
        if($status == 404) {
            $charts = null;
        } elseif(json_decode($res->getBody()) != '[]') {
            $charts = collect(json_decode($res->getBody())->$apt_r);
            $min = $charts->where('chart_code', 'MIN');
            $hot = $charts->where('chart_code', 'HOT');
            $lah = $charts->where('chart_code', 'LAH');
            $apd = $charts->where('chart_code', 'APD');
            $iap = $charts->where('chart_code', 'IAP');
            $dp = $charts->where('chart_code', 'DP');
            $star = $charts->where('chart_code', 'STAR');
            $cvfp = $charts->where('chart_code', 'CVFP');
        } else {
            $charts = null;
        }

        return view('site.airports.search')->with('apt_r', $apt_r)->with('metar', $metar)->with('taf', $taf)->with('visual_conditions', $visual_conditions)->with('pilots_a', $pilots_a)->with('pilots_d', $pilots_d)
                                           ->with('charts', $charts)->with('min', $min)->with('hot', $hot)->with('lah', $lah)->with('apd', $apd)->with('iap', $iap)->with('dp', $dp)->with('star', $star)->with('cvfp', $cvfp);
    }

    public function showAirport($id) {
        $airport = Airport::find($id);

        $client = new Client(['http_errors' => false]);
        $res = $client->request('GET', 'https://api.aviationapi.com/v1/charts?apt='.$airport->ltr_4);
        $status = $res->getStatusCode();
        if($status == 404) {
            $charts = null;
        } elseif(json_decode($res->getBody()) != '[]') {
            $apt_r = $airport->ltr_4;
            $charts = collect(json_decode($res->getBody())->$apt_r);
            $min = $charts->where('chart_code', 'MIN');
            $hot = $charts->where('chart_code', 'HOT');
            $lah = $charts->where('chart_code', 'LAH');
            $apd = $charts->where('chart_code', 'APD');
            $iap = $charts->where('chart_code', 'IAP');
            $dp = $charts->where('chart_code', 'DP');
            $star = $charts->where('chart_code', 'STAR');
            $cvfp = $charts->where('chart_code', 'CVFP');
        } else {
            $charts = null;
        }

        return view('site.airports.view')->with('airport', $airport)
                                         ->with('charts', $charts)->with('min', $min)->with('hot', $hot)->with('lah', $lah)->with('apd', $apd)->with('iap', $iap)->with('dp', $dp)->with('star', $star)->with('cvfp', $cvfp);
    }

    public function sceneryIndex(Request $request) {
        if($request->search == null) {
            $scenery = Scenery::orderBy('airport', 'ASC')->get();
        } else {
            $scenery = Scenery::where('airport', $request->search)->orWhere('developer', $request->search)->orderBy('airport', 'ASC')->get();
        }

        $fsx = $scenery->where('sim', 0);
        $xp = $scenery->where('sim', 1);
        $afcad = $scenery->where('sim', 2);

        return view('site.scenery.index')->with('fsx', $fsx)->with('xp', $xp)->with('afcad', $afcad);
    }

    public function searchScenery(Request $request) {
        return redirect('/pilots/scenery?search='.$request->search);
    }

    public function showScenery($id) {
        $scenery = Scenery::find($id);

        return view('site.scenery.show')->with('scenery', $scenery);
    }

    public function showStats($year = null, $month = null) {
        if ($year == null)
            $year = date('y');

        if ($month == null)
            $month = date('n');

        $stats = ControllerLog::aggregateAllControllersByPosAndMonth($year, $month);
        $all_stats = ControllerLog::getAllControllerStats();

        $homec = User::where('visitor', 0)->where('status', 1)->get();
        $visitc = User::where('visitor', 1)->where('status', 1)->get();
        $agreevisitc = User::where('visitor', 1)->where('visitor_from', 'ZHU')->orWhere('visitor_from', 'ZJX')->where('status', 1)->get();
       
        
        $home = $homec->sortByDesc(function($user) use($stats) {
            return $stats[$user->id]->total_hrs;
        });

        $visit = $visitc->sortByDesc(function($user) use($stats) {
            return $stats[$user->id]->total_hrs;
        });

        $agreevisit = $agreevisitc->sortByDesc(function($user) use($stats) {
            return $stats[$user->id]->total_hrs;
        });

        return view('site.stats')->with('all_stats', $all_stats)->with('year', $year)
                                 ->with('month', $month)->with('stats', $stats)
                                 ->with('home', $home)->with('visit', $visit)->with('agreevisit', $agreevisit);
    }

    public function visit() {
        return view('site.visit');
    }

    public function storeVisit(Request $request) {
        $validator = $request->validate([
            'cid' => 'required',
            'name' => 'required',
            'email' => 'required',
            'rating' => 'required',
            'home' => 'required',
            'reason' => 'required'
        ]);

        //Google reCAPTCHA Verification
       
        $client = new Client;
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => Config::get('google.recaptcha'),
                'response' => $request->input('g-recaptcha-response'),
            ]
        ]);
        $r = json_decode($response->getBody())->success;
        if($r != true) {
            return redirect()->back()->with('error', 'You must complete the ReCaptcha to continue.');
        }
       
        //Continue Request
        $visit = new Visitor;
        if($visit->rating != 1) {
        $visit->cid = $request->cid;
        $visit->name = $request->name;
        $visit->email = $request->email;
        $visit->rating = $request->rating;
        $visit->home = $request->home;
        $visit->reason = $request->reason;
        $visit->status = 0;
        $visit->save();

        Mail::send('emails.visit.new', ['visit' => $visit], function($message) use ($visit){
            $message->from('visitors@notams.ztlartcc.org', 'ZTL Visiting Department')->subject('New Visitor Request Submitted');
            $message->to($visit->email)->cc('datm@ztlartcc.org');
        });
        
        return redirect('/')->with('success', 'Thank you for your interest in the ZTL ARTCC! Your visit request has been submitted.');
        }
        else {
        return redirect('/')->with('error', 'You need to be a S1 rated controller or greater');
        }
    }

    public function newFeedback() {
        $controllers = User::where('status', 1)->orderBy('lname', 'ASC')->get()->pluck('backwards_name', 'id');
        return view('site.feedback')->with('controllers', $controllers);
    }

    public function saveNewFeedback(Request $request) {
        $validatedData = $request->validate([
            'controller' => 'required',
            'position' => 'required',
            'callsign' => 'required',
            'pilot_name' => 'required',
            'pilot_email' => 'required',
            'pilot_cid' => 'required',
            'comments' => 'required'
        ]);

        //Google reCAPTCHA Verification
        $client = new Client;
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => Config::get('google.recaptcha'),
                'response' => $request->input('g-recaptcha-response'),
            ]
        ]);
        $r = json_decode($response->getBody())->success;
        if($r != true) {
            return redirect()->back()->with('error', 'You must complete the ReCaptcha to continue.');
        }

        //Continue Request
        $feedback = new Feedback;
        $feedback->controller_id = Input::get('controller');
        $feedback->position = Input::get('position');
        $feedback->service_level = Input::get('service');
        $feedback->callsign = Input::get('callsign');
        $feedback->pilot_name = Input::get('pilot_name');
        $feedback->pilot_email = Input::get('pilot_email');
        $feedback->pilot_cid = Input::get('pilot_cid');
        $feedback->comments = Input::get('comments');
        $feedback->status = 0;
        $feedback->save();

        return redirect('/')->with('success', 'Thank you for the feedback! It has been recieved successfully.');
    }

    public function showFiles() {
        $vrc = File::where('type', 0)->orderBy('name', 'ASC')->get();
        $vstars = File::where('type', 1)->orderBy('name', 'ASC')->get();
        $veram = File::where('type', 2)->orderBy('name', 'ASC')->get();
        $vatis = File::where('type', 3)->orderBy('name', 'ASC')->get();
        $sop = File::where('type', 4)->orderBy('name', 'ASC')->get();
        $loa = File::where('type', 5)->orderBy('name', 'ASC')->get();

        return view('site.downloads')->with('vrc', $vrc)->with('vstars', $vstars)->with('veram', $veram)->with('vatis', $vatis)->with('sop', $sop)->with('loa', $loa);
    }

    public function showStaffRequest() {
        return view('site.request_staffing');
    }
    
    public function showProfile($id = null)
    {
        if ($id == null || !Entrust::can('profile'))
        {
            $id = Auth::id();
        }

        $user = User::find($id);
       
        $client = new Client();
        
        $url = ("https://development.ztlartcc.org/storage/files/<?php echo $user->id ?>.jpg");
        $headers = get_headers($url); 
        if($headers && strpos( $headers[0], '200')) { 
            $url_exist = "1"; 
        } 
        else { 
            $url_exist = "0"; 
        } 

        $feedback = Feedback::where('controller_id', '=', $id)->where('status', 1)->orderBy('created_at', 'DESC')->get();
        $log = ControllerLog::where('cid', '=', $id)->orderBy('id', 'DESC')->get();
        $stats = ControllerLog::getControllerStats($id);

        return view('site.profile')->with('user', $user)->with('feedback', $feedback)
                                         ->with('log', $log)->with('stats', $stats)->with('url_exist', $url_exist);
    }

    public function showRunways()
    {
        $kmco = Metar::find('KMCO');
        $kcae = Metar::find('KMCO');
        $kchs =  Metar::find('KMCO');
        $kdab = Metar::find('KMCO');
        $kjax = Metar::find('KMCO');
        $kmyr = Metar::find('KMCO');
        $kpns = Metar::find('KMCO');
        $ksav = Metar::find('KMCO');
        $ksfb = Metar::find('KMCO');
        $ktlh = Metar::find('KMCO');

        return view('site.runway')->with('kmco', $kmco)->with('kcae', $kcae)->with('kchs', $kchs)->with('kdab', $kdab)->with('kjax', $kjax)->with('kmyr', $kmyr)->with('kpns', $kpns)->with('ksav', $ksav)->with('ksfb', $ksfb)->with('ktlh', $ktlh);
    }
    public function staffRequest(Request $request) {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'date' => 'required',
            'time' => 'required',
            'additional_information' => 'required'
        ]);

        //Google reCAPTCHA Verification
        $client = new Client;
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => Config::get('google.recaptcha'),
                'response' => $request->input('g-recaptcha-response'),
            ]
        ]);
        $r = json_decode($response->getBody())->success;
        if($r != true) {
            return redirect()->back()->with('error', 'You must complete the ReCaptcha to continue.');
        }

        //Continue Request
        $name = $request->name;
        $email = $request->email;
        $org = $request->org;
        $date = $request->date;
        $time = $request->time;
        $exp = $request->additional_information;

        Mail::send('emails.request_staff', ['name' => $name, 'email' => $email, 'org' => $org, 'date' => $date, 'time' => $time, 'exp' => $exp], function($message) use ($email, $name, $date) {
            $message->from('info@notams.ztlartcc.org', 'vZTL ARTCC Staffing Requests')->subject('New Staffing Request for '.$date);
            $message->to('ec@ztlartcc.org')->replyTo($email, $name);
        });

        return redirect('/')->with('success', 'The staffing request has been delivered to the appropiate parties successfully. You should expect to hear back soon.');
    }
}
