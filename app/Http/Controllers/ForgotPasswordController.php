<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helper;
use App\User;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset emails and
	| includes a trait which assists in sending these notifications from
	| your application to your users. Feel free to explore this trait.
	|
	*/

	//use SendsPasswordResetEmails;

	/**
	 * USE : Forgot password
	 */
	public function forgetPassword(Request $request){
		$method = $request->method();
		if($request->isMethod('get')){
			return view('forgotePassword');
		}

		if($request->isMethod('post')){
			$userData  = User::where('email',trim($request->email))->whereNotIn('role_id',[1,2])->first(); // Role id 1 = 'admin, 2 = User'
			if($userData){
				$url = env('APP_URL').'/resetPassword';
				$rememberToken = Str::random(120);
				$userData->remember_token = $rememberToken;
				$save = $userData->save();
				$data = array(
					'name' => ucfirst(trim($userData->name)).' '.ucfirst(trim($userData->surname)),
					'remember_token' => $rememberToken,
					'email' => trim($userData->email),
					'subject' => 'Reset Password WellFitness360',
					'forgoteurl' => $url.'?token='.$rememberToken
				);
				$sendMail = Helper::sendMail($data,'email.forgotPassword');
				return response()->json(array('status' => 1,'message'=> 'Thanks!. Please check your email to get password.'));
			}else{
				return response()->json(array('status' => 0,'message'=>'There is no account with the email id that you have inputted.Please enter registerd email'));
			}
		}
	}

	/**
	 * USE : Update password
	 */
	public function resetPassword(Request $request){
		$method = $request->method();
		if($request->isMethod('get')){
			if(isset($_GET['token']) && !empty($_GET['token'])){
				$token = $_GET['token'];
				$findUser = User::where('remember_token',trim($_GET['token']))->first();
				if(!empty($findUser)){
					$updatedDate = strtotime($findUser['updated_at']);
					$currentDateTime = strtotime(date('Y-m-d H:i:s'));
					$interval  = abs($currentDateTime - $updatedDate);
					$minutes   = round($interval / 60);
					if($minutes <= 10){
						return view('resetPassword',compact('token'));
					}else{
						return redirect('forgetPassword')->with('error_msg', 'Reset Password link has been expired. Please try again...');
					}
				}else{
					return redirect('forgetPassword')->with('error_msg', 'Invalid token url reset password. Please try to using valid token url');
				}
			}else{
				return redirect('forgetPassword')->with('error_msg', 'Token not found in reset password..Please try again!!!!!!!');
			}
		}

		if($request->isMethod('post')){
			$user  = User::where('remember_token',$request->rememberToken)->first();
			if($user){
				if($request->password && $request->confirm_password){
					$user = User::find($user->id);
					$user->password  =  bcrypt($request->password);
					$user->remember_token = null;
					$update = $user->save();
					if($update){
						$data = array(
							'name' => ucfirst(trim($user->name)).' '.ucfirst(trim($user->surname)),
							'email' => trim($user->email),
							'password' => trim($request->password),
							'subject' => "WellFit360",
							'verifyUrl' => env('APP_URL').'/login'
						);
						$sendMail = Helper::sendMail($data,'email.sendCredential');
						return response()->json(array('status' => 1,'message'=>'Your Password has been changed successfully.','redirecturl' => '/login'));
					}else{
						return response()->json(array('status' => 1,'message'=>'Problem was accured error .Please try again.'));
					}
				}else{
					return response()->json(array('status' => 0,'message'=>'Password and confirm password required'));
				}
			}else{
				return response()->json(array('status' => 0,'message'=>'Link has been expired....'));
			}
		}
	}
}