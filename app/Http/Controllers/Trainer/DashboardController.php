<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Http\Models\UserTrainerActivity;
use App\Helpers\Helper;

class DashboardController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(){
		return view('trainer.dashboard');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
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
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}

	public function trainerProfile(Request $request){
		$method = $request->method();
		$user_id = Session::get('user')['user_id'];
		if($request->isMethod('get')) {
			$trainerprofile = User::where('id',$user_id)->first()->toArray();
			return view('trainer.profile',compact('trainerprofile'));
		}
		if($request->isMethod('post')) {
			$profileUpdate = User::find($user_id);
			$profileUpdate->name = $request->name;
			$profileUpdate->sur_name = $request->surname;
			$profileUpdate->gender = $request->gender;
			$profileUpdate->contact_no = $request->contact_no;
			$profileUpdate->age = $request->age;
			$profileUpdate->height = $request->height;
			$profileUpdate->weight = $request->weight;
			$profileUpdate->level = $request->level;
			$profileUpdate->biography = $request->biography;
			$profileUpdate->goals = $request->goals;
			$profileUpdate->experience = $request->experience;
			$result = $profileUpdate->save();
			if($result){
				return response()->json(array('status' => 1,'message'=>'Profile Updated Successfully.'));
			}else{
				return response()->json(array('status' => 0,'message'=>'Something went wrong.'));
			}
		}
	}

	public function changePassword(Request $request){
		if(Session::get('user')['user_id'] != ''){
			$user_id = Session::get('user')['user_id'];
			$method = $request->method();
			if($request->isMethod('get')) {
				return view('trainer.changePassword');
			}
			if($request->isMethod('post')) {
				$userData = Helper::getUserData($user_id);
				if(Hash::check($request->old_password,$userData->password)){
					if($request->new_password == $request->confirm_password){
						$user = User::find($user_id);
						$user->password  =  bcrypt($request->new_password);
						$user->save();
						if($user){
							Session::flush();
							$redirect = '/login';
							return response()->json(array('status' => 1,'message'=>'Password has been changed successfully....!','redirecturl' => $redirect));
						}else{
							return response()->json(array('status' => 0,'message'=>'Please try again...'));
						}
					}else{
						return response()->json(array('status' => 0,'message'=>'New password & Confirm Password does not match!'));
					}
				}else{
					return response()->json(array('status' => 0,'message'=>'Old password incorrect!'));
				}
			}
		}else{
			return redirect('/login');
		}
	}
}