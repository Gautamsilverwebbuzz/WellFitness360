<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\frontend\TrainerAvailability;
use Illuminate\Support\Facades\Validator;
use Session;

class AvailabilityController extends Controller
{
	public function index(){
		$user_id = Session::get('user')['user_id'];
		$trainerAvailabilitys = TrainerAvailability::where('trainer_id',$user_id)->orderBy('date','ASC')->get()->toArray();
		return view('trainer.availability.availability_list',compact('trainerAvailabilitys'));
	}

	public function create(Request $request){
		return view('trainer.availability.availability_add');
	}

	public function store(Request $request){
		$user_id = Session::get('user')['user_id'];
		$trainerAvailability = new TrainerAvailability;
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $request->start_time;
		$trainerAvailability->end_time = $request->end_time;
		$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
		$result = $trainerAvailability->save();
		if($result){
			return redirect('trainer/availability')->with('success_msg', 'Availability added successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}

	public function edit($id){
		$editAvailability = TrainerAvailability::where('id',$id)->first()->toArray();
		return view('trainer.availability.availability_edit',compact('editAvailability'));
	}

	public function update($id){
		echo "<pre>";
		print_r($id);
		echo "</pre>";
		exit;
		$user_id = Session::get('user')['user_id'];
		$trainerAvailability = TrainerAvailability::find($id);
		$trainerAvailability->trainer_id = $user_id;
		$trainerAvailability->start_time = $request->start_time;
		$trainerAvailability->end_time = $request->end_time;
		$trainerAvailability->date = date("Y-m-d",strtotime($request->date));
		$result = $trainerAvailability->save();
		if($result){
			return redirect('trainer/availability')->with('success_msg', 'Availability updated successfully.');
		}else{
			return back()->with('error_msg', 'Problem was error accured.. Please try again..');
		}
	}
}
