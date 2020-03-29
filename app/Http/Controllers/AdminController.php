<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Audit;
use App\Announcement;
use App\Bronze;
use App\Calendar;
use App\ControllerLog;
use App\Event;
use App\EventPosition;
use App\EventRegistration;
use App\Feedback;
use App\File;
use App\Incident;
use App\Metar;
use App\PositionPreset;
use App\PresetPosition;
use App\Pyrite;
use App\Scenery;
use App\SoloCert;
use App\User;
use App\Visitor;
use App\VisitRej;
use Artisan;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Config;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mail;
use Storage;

class AdminDash extends Controller {
    public function index()
        {
            if(Auth::user()->can('ATM') ||
            Auth::user()->can('DATM') ||
            Auth::user()->can('TA') ||
            Auth::user()->can('ATA') ||
            Auth::user()->can('WM') ||
            Auth::user()->can('AWM') ||
            Auth::user()->can('FE') ||
            Auth::user()->can('AFE') ||
            Auth::user()->can('EC') ||
            Auth::user()->can('AEC') 
            ){
                return View::make('site.home');
            }
            return View::make('admin.home');
        }
    
    }
    