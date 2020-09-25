<?php

namespace App\Http\Controllers\Training;

use App\Http\Controllers\Controller;
use App\Models\MentorAvailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MentorSchController extends Controller {
    public function showAvail() {
        $availability = MentorAvailable::where('mentor_id', '=', Auth::id())->get();
        return View('admin.training.mentoravi')->with('availability', $availability);
    }

    public function postAvail() {
        $mentor_id = Auth::id();
        $slots = Input::get('slots');
        $today = new Carbon("midnight today", 'America/New_York');

        $availability = MentorAvailable::where('mentor_id', '=', $mentor_id)->where('slot', '>=', $today)->get();

        if (!$slots) {
            $slots = [];
        }

        // Slots to be added

        $new_slots = array_diff($slots, $availability->Pluck('slot')->toArray());
        // Slots to be deleted
        $old_slots = array_diff($availability->Pluck('slot')->toArray(), $slots);

        foreach ($new_slots as $slot) {
            MentorAvailable::create([
                                    'mentor_id' => $mentor_id,
                                    'slot' => $slot,
                                ]);
        }

        MentorAvailable::where('mentor_id', '=', $mentor_id)->whereIn('slot', $old_slots)->delete();
        return Redirect::action('MentorController@showAvail')->with('success', 'Availability has been updated');

    }
}
