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
		$trainerAvailabilitys = TrainerAvailability::where('trainer_id',$user_id)->where('date',date('Y-m-d'))->get()->toArray();
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
			//'end_time' => 'required',
		];

		$message = [
			'start_time.required' => 'Please select start time.',
			//'end_time.required' => 'Please select end time.',
		];

		if($this->validate($request, $rules, $message) === FALSE){
			return redirect()->back()->withInput();
		}
		$user_id = Session::get('user')['user_id'];
		$trainerAvailability = new TrainerAvailability;
		$start_time = $request->start_time;
		$duration = $request->duration;
		if($duration == "15"){
			$durationtime = date("H:i", strtotime($start_time." + 15 minutes"));
		}else if($duration == "30"){
			$durationtime = date("H:i", strtotime($start_time." + 30 minutes"));
		}else if($duration == "45"){
			$durationtime = date("H:i", strtotime($start_time." + 45 minutes"));
		}else{
			$durationtime = date("H:i", strtotime($start_time." + 1 hour"));
		}
		$end_time = $request->durationtime;
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $start_time;
		$trainerAvailability->end_time = $durationtime;
		$trainerAvailability->cat_id = $request->category;
		$trainerAvailability->duration = $request->duration;
		$trainerAvailability->price = $request->price;
		$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
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
		$editAvailability = TrainerAvailability::where('id',$id)->first();
		$availabilityarr = array(
			'id'=>$editAvailability['id'],
			'start_time'=>$editAvailability['start_time'],
			'end_time'=>$editAvailability['end_time'],
			'duration'=>$editAvailability['duration'],
			'price'=>$editAvailability['price'],
			'cat_id'=>$editAvailability['cat_id'],
			'date'=>date('m/d/Y',strtotime($editAvailability['date'])),
		);
		return response()->json(array($availabilityarr));
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
		$id = $request->avail_id;
		$user_id = Session::get('user')['user_id'];
		$start_time = $request->edit_start_time;
		$duration = $request->edit_duration;
		if($duration == "15"){
			$durationtime = date("H:i", strtotime($start_time." + 15 minutes"));
		}else if($duration == "30"){
			$durationtime = date("H:i", strtotime($start_time." + 30 minutes"));
		}else if($duration == "45"){
			$durationtime = date("H:i", strtotime($start_time." + 45 minutes"));
		}else{
			$durationtime = date("H:i", strtotime($start_time." + 1 hour"));
		}
		$end_time = $request->durationtime;
		$trainerAvailability = TrainerAvailability::find($id);
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $start_time;
		$trainerAvailability->end_time = $durationtime;
		$trainerAvailability->cat_id = $request->edit_category;
		$trainerAvailability->duration = $duration;
		$trainerAvailability->price = $request->edit_price;
		$trainerAvailability->date = date("Y-m-d",strtotime($request->edit_date));
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

	public function serachAvailability(Request $request){
		$serachdate = date('Y-m-d',strtotime($request->serachdate));
		$user_id = $request->user_id;
		$serachAvailabilitys = TrainerAvailability::where('trainer_id',$user_id)->where('date',$serachdate)->get()->toArray();
		$html = '';
		$html .='<div class="col-md-9">';
			if($serachAvailabilitys){
				foreach($serachAvailabilitys as $serachAvailability){
					$html .='<a href="javascript:void(0);" class="timeavailability-cls" data-start="'.$serachAvailability['start_time'].'" data-end="'.$serachAvailability['end_time'].'" data-id="'.$serachAvailability['id'].'">'.$serachAvailability['start_time'].' - '.$serachAvailability['end_time'].'</a>';
				}
			}
		$html .='</div>';
		return $html;
	}
}
