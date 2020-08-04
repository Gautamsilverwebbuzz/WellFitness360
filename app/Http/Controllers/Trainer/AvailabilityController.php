<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\frontend\TrainerAvailability;
use Illuminate\Support\Facades\Validator;
use Session;
use App\User;
use App\Http\Models\TrainerCategories;

class AvailabilityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$user_id = Session::get('user')['user_id'];
		$trainerAvailabilitys = TrainerAvailability::where('trainer_id',$user_id)->orderBy('created_at','ASC')->get()->toArray();
		$user = User::selectRaw('trainer_skils')->where("id",$user_id)->first()->toArray();
		$trainer_skils = $user['trainer_skils'];
		$skils = json_decode($trainer_skils);
		$trainer_categories = array();
		if(!empty($skils)){
			foreach($skils as $val){
				$trainer_categories[] = TrainerCategories::where('trainer_cat_id',$val)->get()->toArray();
			}
		}
		return view('trainer.availability.availability_list',compact('trainerAvailabilitys','trainer_categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('trainer.availability.availability_add');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = [
			'start_time' => 'required',
			'end_time' => 'required',
		];

		$message = [
			'start_time.required' => 'Please select start time.',
			'end_time.required' => 'Please select end time.',
		];

		if($this->validate($request, $rules, $message) === FALSE){
			return redirect()->back()->withInput();
		}

		$user_id = Session::get('user')['user_id'];
		$trainerAvailability = new TrainerAvailability;
		$start_time = $request->start_time;
		$end_time = $request->end_time;
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $start_time;
		$trainerAvailability->end_time = $end_time;
		//$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
		$result = $trainerAvailability->save();
		if($result){
			$redirect = '/trainer/availability';
			return response()->json(array('status' => 1,'message'=>'Availability added successfully.','redirecturl' => $redirect));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'));
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
		$editAvailability = TrainerAvailability::where('id',$id)->first()->toArray();
		$id = $editAvailability['id'];
		$start_time = $editAvailability['start_time'];
		$end_time = $editAvailability['end_time'];
		return response()->json(array('id' => $id,'start_time'=>$start_time,'end_time' => $end_time));
		//return view('trainer.availability.availability_edit',compact('editAvailability'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$id = $request->id;
		$trainerAvailability = TrainerAvailability::find($id);
		$user_id = Session::get('user')['user_id'];
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $request->start_time;
		$trainerAvailability->end_time = $request->end_time;
		//$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
		$result = $trainerAvailability->save();
		if($result){
			$redirect = '/trainer/availability';
			return response()->json(array('status' => 1,'message'=>'Availability updated successfully.','redirecturl' => $redirect));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'));
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
		$TrainerAvailability = TrainerAvailability::find($id)->delete();
		if($TrainerAvailability){
			$message = 'Availability deleted successfully..';
			$status = true;
		}else{
			$message = 'Please try again';
			$status = false;
		}
		return response()->json(['status' => $status,'message' => $message]);
	}
}
