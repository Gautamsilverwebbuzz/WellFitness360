<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Models\Event;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class EventController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{

		$events = Event::all();
		return view('backend.EventManagement.event_list',compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$users = User::where("role_id","3")->where("tranier_approved","1")->get()->toArray();
		return view('backend.EventManagement.add_event',compact('users'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$event = new Event;
		$event->Event_name = $request->eventname;
		$event->Event_code = $request->livecode;
		$event->Trainer_id = json_encode($request->trainer);
		$event->start_date = date("Y-m-d",strtotime($request->start_date));
		$event->end_date = date("Y-m-d",strtotime($request->end_date));
		$event->status = ($request->status) ? $request->status : '2';
		$event->Event_desc = ($request->event_desc) ? $request->event_desc : '';
		$result = $event->save();
		$trainer_id = json_decode(json_encode($request->trainer));
		foreach($trainer_id as $val){
			$user = User::where("id",$val)->first();
			$dataarr = array(
				'name' => $user->name .''.$user->sur_name,
				'email' => $user->email,
				'event_name' => $request->eventname,
				'start_date' => $request->start_date,
				'end_date' => $request->end_date,
				'livecode' => $request->livecode,
			);
			$usersemail = $user->email;
			$sendMail = Mail::send('email.sendevent',$dataarr, function ($message) use ($dataarr,$usersemail) {
				$message->subject('Event Invitation');
				$message->to($usersemail);
			});
		}
		if($result){
			return redirect('eventManagement')->with('success_msg', 'Event added successfully and send mail selected trainer.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$event = Event::find($id);
		$users = User::where("role_id","3")->where("tranier_approved","1")->get()->toArray();
		return view('backend.EventManagement.edit_event',compact('users','event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$event = Event::find($id);
		$event->Event_name = $request->eventname;
		$event->Event_code = $request->livecode;
		$event->Trainer_id = json_encode($request->trainer);
		$event->start_date = date("Y-m-d",strtotime($request->start_date));
		$event->end_date = date("Y-m-d",strtotime($request->end_date));
		$event->status = ($request->status) ? $request->status : '2';
		$event->Event_desc = ($request->event_desc) ? $request->event_desc : '';
		$result = $event->save();
		$trainer_id = json_decode(json_encode($request->trainer));
		foreach($trainer_id as $val){
			$user = User::where("id",$val)->first();
			$dataarr = array(
				'name' => $user->name .''.$user->sur_name,
				'email' => $user->email,
				'event_name' => $request->eventname,
				'start_date' => $request->start_date,
				'end_date' => $request->end_date,
				'livecode' => $request->livecode,
			);
			$usersemail = $user->email;
			$sendMail = Mail::send('email.sendevent',$dataarr, function ($message) use ($dataarr,$usersemail) {
				$message->subject('Event Invitation');
				$message->to($usersemail);
			});
		}
		if($result){
			return redirect('eventManagement')->with('success_msg', 'Event updated successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$Event = Event::find($id)->delete();
		if($Event){
			$message = 'Event deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
