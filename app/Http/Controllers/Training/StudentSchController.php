<?php

namespace App\Http\Controllers\Training;
use App\Http\Controllers\Controller;
use App\MentorAvail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class StudentSchController extends Controller
{
    
        public function showMentAvail()
        {
            $id = Auth::id();
            $postion = ['Minor Delivery/Ground'];
            $availability = MentorAvail::with('mentor')
                ->whereNull('trainee_id')
                ->where('slot', '>', Carbon::now('America/New_York'))
                ->get();
            return View('site.mentoravi')->with('availability', $availability)->with('postion', $postion);
        }
    
}
