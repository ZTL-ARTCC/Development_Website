<?php

namespace App\Http\Controllers;

use App\MentorAvail;
use App\User;
use Auth;
use App\TrainingInfo;
use App\TrainingTicket;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class MentorController extends Controller
{
    public function showAvail()
    {
        $availability = MentorAvail::where('mentor_id', '=', Auth::id())->get();
        return View('dashboard.training.mentors.mentoravail')->with('availability', $availability);
    }

    public function cancelSession($id)
    {
        $request = MentorAvail::find($id);
        $request->cancel_message = Input::get('cancel');
        $request->save();
        $request->sendCancellationEmail();
        $request->delete();
        return Redirect::to('dashboard.training.mentors.sessions')->with('message', 'Session canceled. Student has been notified!');
    }

    public function addNote()
    {
        $controller = User::where('status', '1')->where('canTrain', '1')->orderBy('lname', 'ASC')->get()->pluck('backwards_name', 'id');
        return View('admin.mentors.addnote')->with('controller', $controller);
    }

    public function saveNote()
    {
        $description = Input::get('comments');
        return Redirect::to('/admin/mentor/addnote')->with('message', 'Training Note Created!');
    }

    public function postAvail()
    {
        $mentor_id = Auth::id();
        $slots = Input::get('slots');
        $today = new Carbon("midnight today", 'America/New_York');

        $availability = MentorAvail::where('mentor_id', '=', $mentor_id)->where('slot', '>=', $today)->get();

        if (!$slots) $slots = [];

        // Slots to be added

        $new_slots = array_diff($slots, $availability->Pluck('slot')->toArray());
        // Slots to be deleted
        $old_slots = array_diff($availability->Pluck('slot')->toArray(), $slots);

        foreach ($new_slots as $slot) {
            MentorAvail::create([
                'mentor_id' => $mentor_id,
                'slot' => $slot,
            ]);
        }

        MentorAvail::where('mentor_id', '=', $mentor_id)->whereIn('slot', $old_slots)->delete();
        return Redirect::action('MentorController@showAvail')->with('success', 'Availability has been updated');

    }

    public function showRequests()
    {
        $sessions = MentorAvail::where('trainee_id', '!=', 0)->where('slot', '>', new Carbon('midnight today', 'America/New_York'))->orderBy('slot', 'ASC')->get();
        return View('dashboard.training.mentors.sessions')->with('sessions', $sessions);
    }

    public function findStudents()
    {
        $user = User::where('status', '1')->orderBy('lname', 'ASC')->get()->Pluck('backwards_name', 'id');
        return View('admin.mentors.studentsearch')->with('user', $user);
    }

    public function findStudent()
    {
        $id = Input::get('controller');
        return Redirect::to('/admin/mentor/student/' . $id);
    }

    public function student($id)
    {
        $user = User::find($id);
        $tickets_sort = TrainingTicket::where('controller_id', $user->id)->get()->sortByDesc(function ($t) {
            return strtotime($t->date . ' ' . $t->start_time);
        })->pluck('id');
        $tickets_sort = TrainingTicket::where('controller_id', $user->id)->get()->sortByDesc(function ($t) {
            return strtotime($t->date . ' ' . $t->start_time);
        })->pluck('id');
        if ($tickets_sort->count() != 0) {
            $tickets_order = implode(',', array_fill(0, count($tickets_sort), '?'));
            $tickets = TrainingTicket::whereIn('id', $tickets_sort)->orderByRaw("field(id,{$tickets_order})", $tickets_sort)->paginate(10);
            $last_training = TrainingTicket::whereIn('id', $tickets_sort)->orderByRaw("field(id,{$tickets_order})", $tickets_sort)->first();
        } else {
            $tickets = null;
            $last_training = null;
        }

        if (Auth::user($id)->can('train')) {
            $tickets_sort_t = TrainingTicket::where('trainer_id', $user->id)->get()->sortByDesc(function ($t) {
                return strtotime($t->date . ' ' . $t->start_time);
            })->pluck('id');
            if ($tickets_sort_t->count() != 0) {
                $tickets_order_t = implode(',', array_fill(0, count($tickets_sort_t), '?'));
                $last_training_given = TrainingTicket::whereIn('id', $tickets_sort_t)->orderByRaw("field(id,{$tickets_order_t})", $tickets_sort_t)->first();
            } else {
                $last_training_given = null;
            }
        } else {
            $last_training_given = null;
        }
        $postion = ['Minor Delivery/Ground'];
        $availability = MentorAvail::with('mentor')
            ->whereNull('trainee_id')
            ->where('slot', '>', Carbon::now('America/New_York'))
            ->get();
        $exam = json_decode(file_get_contents("https://api.vatusa.net/v2/user/" . $id . "/exam/history?apikey=ef9SEgwK6Z0bCDPp"), true);
        return view('admin.mentors.student')->with('user', $user)->with('exam', $exam)->with('tickets', $tickets)->with('last_training', $last_training)->with('last_training_given', $last_training_given)->with('availability', $availability)->with('postion', $postion);
    }
}