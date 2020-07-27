<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Http\Models\UserChatTrainer;

class UserChatTrainer extends Model
{
	protected $table = 'user_chat_trainer';
	protected $primaryKey = 'id';


	public function getUsers($userId){
		$model = new static;
		$data = $model->select('from_user')
			->where('from_user',$userId)
			->groupBy('from_user')
			->get();
		// if($propertyContentId){
		// }else{
		// 	$data = $model->select('from_user')->where('to_user',$userId)->groupBy('from_user')->get();
		// }
		if($data){
			return $data->toArray();
		}else{
			return false;
		}
	}

	/**
	 * USE : Chat detail perticular user and property wise
	 */
	public function getMessageDeatil($toUserId,$fromUserId){
		$model = new static;
		$data = $model->select('user_chat_trainer.*','users.name', 'users.sur_name','users.id as userId')
				->leftjoin('users','user_chat_trainer.from_user','=','users.id')
				->where(function($query) use ($fromUserId , $toUserId) {
					$query->where('from_user', $fromUserId)->where('to_user', $toUserId);
				})->orWhere(function ($query) use ($fromUserId , $toUserId) {
					$query->where('from_user', $toUserId)->where('to_user', $fromUserId);
				})
				->orderBy('id', 'ASC')
				->get();
		if($data){
			return $data->toArray();
		}else{
			return false;
		}
	}

	/**
	 * USE : Get Notification
	 */
	public function getNotification($userId){
		$model = new static;
		$data = $model->select('user_chat_trainer.*','users.name','users.sur_name','users.social_profile_image','users.profile_image')
					->join('users','user_chat_trainer.from_user','=','users.id')
					->where('user_chat_trainer.to_user',$userId)
					->where('user_chat_trainer.status',0)
					->orderBy('user_chat_trainer.id', 'DESC')
					->get();
		if($data){
			return $data->toArray();
		}else{
			return false;
		}
	}

	 /**
	 * USE : Count message
	 */
	public function messageCount($fromUserId,$to_userId){
		$model = new static;
		$count = $model->where('from_user',$fromUserId)->where('to_user',$to_userId)->where('status',0)->count();
		return $count;
	}
}
