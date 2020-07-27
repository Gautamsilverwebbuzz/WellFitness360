<?php

namespace App\Helpers;

use App\Http\Models\RolePermission;
use DB;
use Illuminate\Support\Facades\Mail;
use App\User;

class Helper{

	
	/**
	 * USE : Get User Permissions
	 */
	public static function getPermissions($userId){
		$permission = array();
		$data = RolePermission::select('*')->where('id',$userId)->first()->toArray();
		if($data){
			$permission['role_id'] = $data['id'];
			$permission['role_name'] = $data['role_name'];
			$permission['permission'] = json_decode($data['permission']);
			return $permission;
		}else{
			return false;
		}
	}

	/**
	 * USE : Send email notification
	 */
	public static function sendMail($data,$html){
		$data = ['data' => $data];
		$sendMail = Mail::send(['html' => $html],$data, function ($message) use ($data){
			$message->to($data['data']['email'],$data['data']['name'] ?? '');
			$message->subject($data['data']['subject']);
		});
		// $sendMail = Mail::send('email.sendCredential',$data, function ($message) use ($data) {
		// $message->to($data['email'],$data['name']);
		// $message->subject($data['subject']);
		//$message->from('manoj@silverwebbuzz.com',"WellFitness360");
		// $pdf = PDF::loadView('admin/invoice/preview1',$data);
		// $msg->from('krupavyas221@gmail.com', 'Y-Fobs');
		// $msg->to($data['client_data']->email)->subject('Invoice');
		// $msg->attachData($pdf->output(),'Invoice_'.rand().'.pdf');
	}

	public static function getUserData($id){
		$result = User::where('id',$id)->get()->toArray();
		if($result){
			return $result;
		}else{
			return false;
		}
	}
}
