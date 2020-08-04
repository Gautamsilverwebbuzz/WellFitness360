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