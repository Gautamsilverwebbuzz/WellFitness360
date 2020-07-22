<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Helpers\Helper;

class LoginController extends Controller
{
	public function index(){
		return view("login");
	}

	public function loginCheck(Request $request){
		$email = $request->email;
		$password = $request->password;
		$findUser = User::where('email',$email)->first();
		if($findUser){
			if (Hash::check($password, $findUser->password)) {
				$role = $findUser->role_id;
				if($findUser->email_verified == "1"){
					if($role == "3"){
						if($findUser->tranier_approved == '1'){
							Session::put('user', ['role_id' => $findUser->role_id, 'user_id' => $findUser->id, 'email' => $findUser->email,'name' => $findUser->name,'surname' => $findUser->sur_name]);
							$redirect = '/trainer/dashboard';
							return response()->json(array('status' => 1,'message'=>'Login Successfully','redirecturl' => $redirect));
						}else{
							return response()->json(array('status' => 0,'message'=>'You have not apporved.'));
						}
					}else{
						Session::put('user', ['role_id' => $findUser->role_id, 'user_id' => $findUser->id, 'email' => $findUser->email,'name' => $findUser->name,'surname' => $findUser->sur_name]);
						$redirect = '/user';
					return response()->json(array('status' => 1,'message'=>'Login Successfully','redirecturl' => $redirect));
					}
				}else{
					return response()->json(array('status' => 0,'message'=>'Please verify your email.'));	
				}
			}else{
				return response()->json(array('status' => 0,'message'=>'Invalid login credential...'));
			}
		}else{
			return response()->json(array('status' => 0,'message'=>'Invalid login credential...'));
		}
	}

	public function checkEmail(Request $r){
		$email = $r->email;
		$user = User::where('email',$email)->count();
		if($user){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	

	public function logout(){
		Session::flush();
		return Redirect('/login');
	}
}
