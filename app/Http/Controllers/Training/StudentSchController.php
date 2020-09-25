<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\MentorAvailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class StudentSchController extends Controller {

    public function showMentAvail() {
        $id = Auth::id();
        $postion = ['Minor Delivery/Ground'];
        $availability = MentorAvailable::with('mentor')
                                       ->whereNull('trainee_id')
                                       ->where('slot', '>', Carbon::now('America/New_York'))
                                       ->get();
        return View('site.mentoravi')->with('availability', $availability)->with('postion', $postion);
    }

}
