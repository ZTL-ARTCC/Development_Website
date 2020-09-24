<?php

namespace App\Http\Controllers\Training;

use App\Audit;
use App\Http\Controllers\Controller;
use App\Ots;
use App\TrainingTicket;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MentorTicketController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        //
    }
  
    public function addTicket(Request $request)
	{
        
        $c = $request->id;
        $user = User::where('status', '1')->where('canTrain', '1')->orderBy('lname', 'ASC')->get()->filter(function($user) {
            if(TrainingTicket::where('controller_id', $user->id)->first() != null || $user->visitor == 0) {
                return $user;
            }
        })->pluck('backwards_name', 'id');
		return view('admin.training.addTicket')->with('user', $user)->with('c', $c);
    }
    public function saveTicket(Request $request)
	{
        $request->validate([
            'controller' => 'required',
            'position' => 'required',
            'type' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'duration' => 'required'
        ]);

        $ticket = new TrainingTicket;
        $ticket->controller_id = $request->controller;
        $ticket->trainer_id = Auth::id();
        $ticket->position = $request->position;
        $ticket->type = $request->type;
        $ticket->date = $request->date;
        $ticket->start_time = $request->start;
        $ticket->end_time = $request->end;
        $ticket->duration = $request->duration;
        $ticket->comments = $request->comments;
        $ticket->ins_comments = $request->trainer_comments;
        $ticket->save();
        $extra = null;

        $controller = User::find($ticket->controller_id);
        $trainer = User::find($ticket->trainer_id);

        if($request->ots == 1) {
            $ots = new Ots;
            $ots->controller_id = $ticket->controller_id;
            $ots->recommender_id = $ticket->trainer_id;
            $ots->position = $ticket->position;
            $ots->status = 0;
            $ots->save();
            $extra = ' and the OTS recommendation has been added';
        }

        Mail::send(['html' => 'emails.training_ticket'], ['ticket' => $ticket, 'controller' => $controller, 'trainer' => $trainer], function ($m) use ($controller, $ticket) {
            $m->from('training@notams.ztlartcc.org', 'vZTL ARTCC Training Department');
            $m->subject('New Training Ticket Submitted');
            $m->to($controller->email)->cc('ta@ztlartcc.org');
        });

        $audit = new Audit;
        $audit->cid = Auth::id();
        $audit->ip = $_SERVER['REMOTE_ADDR'];
        $audit->what = Auth::user()->full_name.' added a training ticket for '.User::find($ticket->controller_id)->full_name.'.';
        $audit->save();


  
        return redirect('/dashboard/training/tickets?id='.$ticket->controller_id)->with('success', 'The training ticket has been submitted successfully'.$extra.'.');
    
    }
   
}
