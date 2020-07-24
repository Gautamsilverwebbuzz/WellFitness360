<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Models\frontend\TrainerSettings;
use App\Http\Models\Settings;

class SettingController extends Controller {

	public function trainerSetting(){
		$user_id = (Session::get('user')['name']) ? Session::get('user')['user_id'] : '';
		$trainer_Setting = TrainerSettings::where('trainer_id',$user_id)->first();
		return view('trainer.setting',compact('trainer_Setting'));
	}

	public function update(Request $request){
		$user_id = (Session::get('user')['name']) ? Session::get('user')['user_id'] : '';
		$trainer_Setting = TrainerSettings::where('trainer_id',$user_id)->first();
		
		if(!empty($trainer_Setting)){
			$trainer_Setting->Contactno = !empty($request->contact_no) ? $request->contact_no : '';
			$trainer_Setting->Facebook_url = !empty($request->facebook_url) ? $request->facebook_url : '';
			$trainer_Setting->Instgram_url = !empty($request->instagram_url) ? $request->instagram_url : '';
			$result = $trainer_Setting->save();  // save data
			if($result){
				return redirect('trainer/setting')->with('success_msg', 'Setting Update successfully.');
			}else{
				return back()->with('error_msg', 'Problem was error accured.. Please try again..');
			}
		}else{
			$Setting = new TrainerSettings;
			$Setting->trainer_id = $user_id;
			$Setting->Contactno = !empty($request->contact_no) ? $request->contact_no : '';
			$Setting->Facebook_url = !empty($request->facebook_url) ? $request->facebook_url : '';
			$Setting->Instgram_url = !empty($request->instagram_url) ? $request->instagram_url : '';
			$result = $Setting->save();  // save data

			if($result){
				return redirect('trainer/setting')->with('success_msg', 'Setting Updated successfully.');
			}else{
				return back()->with('error_msg', 'Problem was error accured.. Please try again..');
			}
		}
	}
}
?>
