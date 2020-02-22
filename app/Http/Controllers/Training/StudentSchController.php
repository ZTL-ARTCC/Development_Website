<?php

namespace App\Http\Controllers\Training;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class SchController extends Controller
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
