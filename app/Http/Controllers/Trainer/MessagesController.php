<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Helpers\Helper;
use App\Http\Models\UserChatTrainer;
use Carbon\Carbon;
use Session;

class MessagesController extends Controller
{
	public function __construct(){
		$this->UserChatTrainer = new UserChatTrainer;
		$this->User = new User;
	}

	public function index(){
		$user_id = Session::get('user')['user_id'];
		if(!empty($user_id)){
			$data = new UserChatTrainer;
			$usersList = [];
			$headerData = [];
			$chatData = [];
			$users = $data->select('from_user','to_user')->where('from_user',$user_id)->get()->toArray();
			if(!empty($users)){
				$id = array();
				foreach($users as $key => $val){
					$id[] = $val['to_user'];
				}
				foreach(array_unique($id) as $key => $value){
					$fromUserData = Helper::getUserData($value);
					$usersList[$key]['id'] = $fromUserData[0]['id'];
					$usersList[$key]['name'] = ucfirst($fromUserData[0]['name']).' '.ucfirst($fromUserData[0]['sur_name']);
					if(!empty($fromUserData[0]['social_profile_image'])){
						$usersList[$key]['image'] = $fromUserData[0]['social_profile_image'];
					}elseif(!empty($fromUserData[0]['profile_image'])){
						$usersList[$key]['image'] = asset($fromUserData[0]['profile_image']);
					}else{
						$usersList[$key]['image'] = asset('/profile/user-profile.jpg');
					}
					$chatUserId = $fromUserData[0]['id'];
					$headerData['user_id'] = $fromUserData[0]['id'];
					$headerData['name'] = ucfirst($fromUserData[0]['name']).' '.ucfirst($fromUserData[0]['sur_name']);
					if(!empty($fromUserData[0]['social_profile_image'])){
						$headerData['image'] = $$fromUserData[0]['social_profile_image'];
					}elseif(!empty($fromUserData[0]['profile_image'])){
						$headerData['image'] =asset($fromUserData[0]['profile_image']);//env('APP_URL').'public/profile/'.$fromUserData->profile_image;
					}else{
						$headerData['image'] = asset('/profile/user-profile.jpg');//env('APP_URL').'public/profile/user-profile.png';
					}
					$usersList[$key]['messageCount'] = $this->UserChatTrainer->messageCount($user_id,$chatUserId);
				}
				$chats = $this->UserChatTrainer->getMessageDeatil($user_id,$chatUserId);
				if($chats){
					foreach($chats as $chatKey => $chat){
						$toUserData = Helper::getUserData($chat['to_user']);
						$chatData[$chatKey]['id'] = $chat['id'];
						$chatData[$chatKey]['userId'] = $chat['userId'];
						$chatData[$chatKey]['message'] = $chat['message'];
						$chatData[$chatKey]['from_name'] = ucfirst($toUserData[0]['name']).' '.ucfirst($toUserData[0]['sur_name']);
						$chatData[$chatKey]['to_name'] = ucfirst($toUserData[0]['name']).' '.ucfirst($toUserData[0]['name']);
						$chatData[$chatKey]['created_at'] = date('h:i a',strtotime($chat['created_at'])).' '.$this->checkDay($chat['created_at']);
						$chatData[$chatKey]['dateMonth'] = date('d M',strtotime($chat['created_at']));
					}
				}
			}
			return view('trainer.message_list',compact('usersList','headerData','chatData'));
		}else{
			return redirect('login');
		}
	}

	/**
	 * USE : Send Message api call
	 *  satore message in to databse
	 */
	public function sendMessage(Request $request){
		$this->UserChatTrainer->from_user = Session::get('user')['user_id'];
		$this->UserChatTrainer->to_user = $request->toUserId;
		$this->UserChatTrainer->message = $request->message;
		$this->UserChatTrainer->created_at = date('Y-m-d h:i:s');
		$this->UserChatTrainer->updated_at = date('Y-m-d h:i:s');
		$save = $this->UserChatTrainer->save();
		if($save){
			return response()->json(array('status' => 1,'message' => 'Message sent successfully'));
		}else{
			return response()->json(array('status' => 1,'message' => 'Please try again'));
		}
	}

	/**
	 * use : User chat all
	 */
	public function userChat(Request $request){
		$userId = Session::get('user')['user_id'];
		if($userId){
			$toUserId = $request->toUserId;
			$propertyContentId = $request->propertyContentId;
			$chats = $this->UserChatTrainer->getMessageDeatil($userId,$toUserId);
			$chatData = [];
			$headerData = [];
			$headerHtml = '';
			if($chats){
				foreach($chats as $chatKey => $chat){
					$toUserData = Helper::getUserData($chat['to_user']);
					
					$chatData[$chatKey]['id'] = $chat['id'];
					$chatData[$chatKey]['userId'] = $chat['userId'];
					$chatData[$chatKey]['message'] = $chat['message'];
					$chatData[$chatKey]['from_name'] = ucfirst($toUserData[0]['name']).' '.ucfirst($toUserData[0]['sur_name']);
					$chatData[$chatKey]['to_name'] = ucfirst($toUserData[0]['name']).' '.ucfirst($toUserData[0]['sur_name']);
					$chatData[$chatKey]['created_at'] = date('h:i a',strtotime($chat['created_at'])).' '.$this->checkDay($chat['created_at']);
					$chatData[$chatKey]['dateMonth'] = date('d M',strtotime($chat['created_at']));
				}
			}
			$fromUserData = Helper::getUserData($toUserId);
			$headerData['user_id'] = $fromUserData[0]['id'];
			$headerData['name'] = ucfirst($fromUserData[0]['name']).' '.ucfirst($fromUserData[0]['sur_name']);
			if(!empty($fromUserData[0]['social_profile_image'])){
				$headerData['image'] = $$fromUserData[0]['social_profile_image'];
			}elseif(!empty($fromUserData[0]['profile_image'])){
				$headerData['image'] =asset($fromUserData[0]['profile_image']);//env('APP_URL').'public/profile/'.$fromUserData->profile_image;
			}else{
				$headerData['image'] = asset('/profile/user-profile.jpg');//env('APP_URL').'public/profile/user-profile.png';
			}

			$messageIds = UserChatTrainer::select('id')->where('to_user',$userId)->where('from_user',$toUserId)->get()->toArray();
			$update = $this->UserChatTrainer->whereIn('id', $messageIds)->update(array('status' => 1));
			$html = '';
			if($chatData){
				foreach($chatData as $chat){
					if($userId === $chat['userId']){
						$html .= '<div class="outgoing_msg">
							<div class="sent_msg">
							<p>'.$chat['message'].'</p>
							<span class="time_date">'.$chat['created_at'].'    |    '.$chat["dateMonth"].'</span> </div>
						</div>';
					}else{
						$html .= '<div class="incoming_msg">
							<div class="incoming_msg_img"> <img src="'.$headerData['image'].'" alt=""> </div>
							<div class="received_msg">
							<div class="received_withd_msg">
								<p>'.$chat['message'].'</p>
								<span class="time_date">'.$chat['created_at'].'    |    '.$chat['dateMonth'].'</span>
							</div>
							</div>
						</div>';
					}
				}
			}

			if($headerData){
				$headerHtml .='<div class="person-icon">
					<img src="'.$headerData['image'].'" alt="">
					</div>
					<div class="person-name">
						<h3>'.$headerData['name'].'</h3>
					</div>';
			}

			return response()->json(array('status' => 1, 'headerData' => $headerData, 'chatHtml' => $html, 'headerHtml' => $headerHtml));
		}else{
			return response()->json(array('status' => 0,'message' => 'Invalid User Token.'));
		}
	}

	/**
	 * Update status and count remaning message
	 */
	public function updateCountMessage(Request $request){
		$user_id = Session::get('user')['user_id'];
		if($user_id){
			$fromUserId = $request->fromUserId;
			$messageIds = UserChatTrainer::selectRaw('id')->where('from_user',$fromUserId)->where('to_user',$user_id)->get()->toArray();
			$update = $this->UserChatTrainer->whereIn('id', $messageIds)->update(array('status' => 1));
			$count = $this->UserChatTrainer->messageCount($fromUserId,$user_id);
			return response()->json(array('status' => 1, 'countMessage' => $count));
		}
	}

	public function getNotification(){
		$userId = Session::get('user')['user_id'];
		if($userId){
			$html = '';
			$notification = [];
			$data = $this->UserChatTrainer->getNotification($userId);
			if($data){
				foreach($data as $key => $message){
					$notification[$key]['id'] = $message['id'];
					$notification[$key]['from_user'] = $message['from_user'];
					$notification[$key]['name'] = ucfirst($message['name']).' '.ucfirst($message['sur_name']);
					if(!empty($message['social_profile_image'])){
						$notification[$key]['image'] = $message['social_profile_image'];
					}elseif(!empty($message['profile_image'])){
						$notification[$key]['image'] = asset($message['profile_image']);
					}else{
						$notification[$key]['image'] = asset('profile/user-profile.jpg');
					}
					$notification[$key]['message'] = $message['message'];
					$date = Carbon::parse($message['created_at']);
					$notification[$key]['time'] = $date->diffForHumans();
				}

				if($notification){
					foreach($notification as $notificationValue){
						$html .= '<a href="javascript:void(0);" class="dropdown-item">
							<div class="media">
							<img src="'.$notificationValue['image'].'" alt="User Avatar" class="img-size-50 mr-3 img-circle">
							<div class="media-body">
								<h3 class="dropdown-item-title">
								'.$notificationValue['name'].'
								</h3>
								<p class="text-sm">'.$notificationValue['message'].'</p>
								<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> '.$notificationValue['time'].'</p>
							</div>
							</div>
						</a>
						<div class="dropdown-divider"></div>';
					}
				}
			}
			$messageCount = UserChatTrainer::where('to_user',$userId)->where('status',0)->count();
			return response()->json(array('status' => 1,'html' => $html,'messageCount' => $messageCount));
		}else{
			return response()->json(array('status' => 0,'message' => 'Login first.'));
		}
	}

	/**
	 * USE : check day today, yesterday ......etc
	 */
	function checkDay($Dbdate){
		$current = strtotime(date("Y-m-d"));
		$date    = strtotime(date('Y-m-d',strtotime($Dbdate)));
		$datediff = $date - $current;
		$difference = floor($datediff/(60*60*24));
		if($difference==0){
			return 'Today';
		}else if($difference > 1){
			return 'Future Date';
		}else if($difference > 0){
			return 'Tomorrow';
		}else if($difference < -1){
			return 'Long Back';
		}else{
			return 'Yesterday';
		}
	}

}