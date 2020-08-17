<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\Helpers\Helper;
use Illuminate\Support\Str;
//use App\Helpers\Helper;

class LoginController extends Controller
{
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
							return response()->json(array('status' => 1,'message'=>'Login Successfully','data'=> $findUser));
						}else{
							return response()->json(array('status' => 0,'message'=>'You have not apporved.'),401);
						}
					}else{
						return response()->json(array('status' => 1,'message'=>'Login Successfully','data'=> $findUser));
					}
				}else{
					return response()->json(array('status' => 0,'message'=>'Please verify your email.'),401);
				}
			}else{
				return response()->json(array('status' => 0,'message'=>'Invalid login credential...'),401);
			}
		}else{
			return response()->json(array('status' => 0,'message'=>'Invalid login credential...'),401);
		}
	}

	public function userRegister(Request $request){
		$user = new User;
		$token = Str::random(20);
		$user->name = trim($request->firstname);
		$user->sur_name = trim($request->lastname);
		$user->email = $request->email;
		$user->password = Hash::make($request->password);
		$user->user_token = $token;
		$user->role_id = "2";
		$user->auth_provider = "SITE_LOGIN";
		$user->status = "1";
		$result = $user->save();
		if($result){
			$remember_token = Str::random(120);
			$emaildata = array(
				'name' => ucfirst(trim($request->firstname)).' '.ucfirst(trim($request->lastname)),
				'email' => trim($request->$email),
				'subject' => "WellFit360 Account Verify",
				'verifyUrl' => env('APP_URL').'/verifyAccount/',
				'verifyToken' => $remember_token,
			);
			// Send email
			$sendMail = Helper::sendMail($emaildata,'email.sendCredential');
			return response()->json(array('status' => 1,'message'=>'Registration Successfully','data'=>$user));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function trainerRegister(Request $request){

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
		$token = Str::random(20);
		$trainer->name = $request->firstname;
		$trainer->sur_name = $request->lastname;
		$trainer->email = $request->email;
		$trainer->password = Hash::make($request->password);
		$trainer->user_token = $token;
		$trainer->certifiaction_photo = isset($request->certifiaction_photo) ? $certifiaction_photo : '';
		$trainer->id_passport_photo = isset($request->id_passport_photo) ? $id_passport_photo : '';
		$trainer->role_id = "3";
		$trainer->auth_provider = "SITE_LOGIN";
		$trainer->status = "1";
		$result = $trainer->save();
		if($result){
			$remember_token = Str::random(120);
			$emaildata = array(
				'name' => ucfirst(trim($request->firstname)).' '.ucfirst(trim($request->lastname)),
				'email' => trim($request->$email),
				'subject' => "WellFit360 Account Verify",
				'verifyUrl' => env('APP_URL').'/verifyAccount/',
				'verifyToken' => $remember_token,
			);
			// Send email
			$sendMail = Helper::sendMail($emaildata,'email.sendCredential');
			return response()->json(array('status' => 1,'message'=>'Registration Successfully','data'=>$triner));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	public function Physique(Request $request){
		$id = $request->id;
		$physique = User::find($id);
		$physique->age = $request->age;
		$physique->height = $request->height;
		$physique->weight = $request->weight;
		$physique->level = $request->level;
		$physique->gender = $request->gender;
		$result = $physique->save();
		if($result){
			return response()->json(array('status' => 1,'message'=>'Physique updated Successfully','data'=>$physique));
		}else{
			return response()->json(array('status' => 0,'message'=>'Something went wrong.'),401);
		}
	}

	/**
	* USE : Verify user account
	*/
	public function verifyAccount(Request $request){
		if(isset($_GET['t']) && !empty($_GET['t'])){
			$token = $_GET['t'];
			$user_id = User::selectRaw('id')->where('user_token',$token)->first()->toArray();
			if($user_id){
				$findUser = User::find($user_id['id']);
				$findUser->email_verified = 1;
				$save = $findUser->save();
				if($save){
					return redirect(env('FRONT_LOGIN_URL'));
				}
			}else{
				return redirect(env('FRONT_LOGIN_URL'));
			}
		}else{
			return redirect(env('FRONT_LOGIN_URL'));
		}
	}

	public function appRedirectForgetPassword(){
		if(isset($_GET['t'])){
			$url = env('RESET_PASSWORD_APP_URL') . '?t='.$_GET['t'];
			return redirect()->away($url);
		}
	}

	public function forgotpassword(Request $request){
		$email = $request->email;
		$userData = User::where('email',$email)->first();
		if(!empty($userData)){
			$data = array(
				'name' => $userData->name .''. $userData->sur_name,
				'userToken' => $userData->user_token,
				'email' => $userData->email,
				'subject' => 'Wellfit 360 account password reset',
				'forgoteurl' => env('APP_URL').'api/appRedirectForgetPassword?t='.$userData->user_token
			);
			$sendMail = Helper::sendMail($data,'email.forgotPassword');
			return response()->json(array('status'=>1,'message'=> 'Thanks!. Please check your email to get password.'));
		}else{
			return response()->json(array('status' => 0,'message'=>'Email Not exists.'),401);
		}
	}

	public function changePassword(Request $request){
		$token = $request->token;
		$newpassword = $request->newpassword;
		$confirmpassword = $request->confirmpassword;
		$user = User::selectRaw('id')->where('user_token',$token)->first();
		if(!empty($user)){
			if($newpassword == $confirmpassword){
				$userdata = User::find($user->id);
				$userdata->password = Hash::make($confirmpassword);
				$result = $userdata->save();
				if($result){
					return response()->json(array('status'=>1,'message'=> 'Password updated Successfully.'));
				}else{
					return response()->json(array('status' => 0,'message'=>'Something went wrong'),401);
				}
			}else{
				return response()->json(array('status'=>0,'message'=>'New password and confirm password does not match.'));
			}
		}else{
			return response()->json(array('status'=>1,'message'=>'Invalid User token'),401);
		}
	}
}