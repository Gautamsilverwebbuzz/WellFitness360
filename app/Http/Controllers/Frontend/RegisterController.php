<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	public function userregister(){
		return view('frontend.userregister');
	}

	public function registerUser(Request $request){
		$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email',
			'password' => 'required',
		);
		$messages = array(
			'firstname.required' => 'Please enter firstname.',
			'lastname.required' => 'Please Enter lastname.',
			'email.required' => 'Please enter email.',
			'email.email' => "Please enter valid email.",
			'password' => "Please enter password.",
		);
		 if($this->validate($request, $rules, $messages) === FALSE){
			return redirect()->back()->withInput();
		}

		$user = new User;
		$user->name = trim($request->firstname);
		$user->sur_name = trim($request->lasttname);
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->role_id = "2";
		$user->status = "1";
		$result = $user->save();
		if($result){

		}else{

		}
	}

	public function trainerRegister(Request $request){
		if($request->isMethod('get')) {
			return view('frontend.trainerregister');
		}
		if($request->isMethod('post')) {
			$rules = array(
			'firstname' => 'required',
			'lastname' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			);
			$messages = array(
				'firstname.required' => 'Please enter firstname.',
				'lastname.required' => 'Please Enter lastname.',
				'email.required' => 'Please enter email.',
				'email.email' => "Please enter valid email.",
				'password' => "Please enter password.",
			);
			 if($this->validate($request, $rules, $messages) === FALSE){
				return redirect()->back()->withInput();
			}

			$public_path = 'trainer/Images';
			$certifiaction_photo = null;
			if($request->hasfile('certifiaction_photo')){
				$image = $request->file('certifiaction_photo');
				$name =  time().$image->getClientOriginalName();
				$image->move(public_path($public_path),$name);
				$certifiaction_photo = $public_path.'/'.$name;
			}

			$id_passport_photo = null;
			if($request->hasfile('id_passport_photo')){
				$image = $request->file('id_passport_photo');
				$name =  time().$image->getClientOriginalName();
				$image->move(public_path($public_path),$name);
				$id_passport_photo = $public_path.'/'.$name;
			}

			$trainer = new User;
			$trainer->name = trim($request->firstname);
			$trainer->sur_name = trim($request->lasttname);
			$trainer->email = $request->email;
			$trainer->password = Hash::make($request->password);
			$trainer->certifiaction_photo = isset($request->certifiaction_photo) ? $certifiaction_photo : '';
			$trainer->id_passport_photo = isset($request->id_passport_photo) ? $id_passport_photo : '';
			$trainer->role_id = "3";
			$trainer->status = "1";
			$result = $trainer->save();
			if($result){

			}else{

			}
		}
	}

	public function Physique(Request $request){
		if($request->isMethod('get')) {
			return view('frontend.physique');
		}
		if($request->isMethod('post')) {

		}
	}
}