@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
	@include('trainer.templates.sidebar')
	<!-- top navigation -->
	@include('trainer.templates.header')
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
	<link href="{{ asset('trainer/css/chat.css') }}" type="text/css" rel="stylesheet">
	<div class="right_col" role="main">
		<div class="clearfix"></div>
		<div class="property-chat-sectn">
			@if($usersList)
			<div class="messaging">
				<div class="inbox_msg">
					<div class="inbox_people">
						<div class="inbox_chat">
							@foreach($usersList as $users)
							<a href="javascript:void(0);">
								<div class="chat_list @if($users['id'] == $headerData['user_id']) active_chat @endif" onClick="userChatHistory({{ $users['id'] }})" id="{{ $users['id'] }}">
									<div class="chat_people">
										<div class="chat_img"><img src="{{ $users['image'] }}" alt=""> </div>
										<div class="chat_ib">
											<h5>{{ $users['name'] }}
												@if($users['messageCount'])
													<span class="messageCount">{{ $users['messageCount'] }}</span>
												@endif
											</h5>
										</div>
									</div>
								</div>
							</a>
							@endforeach
						</div>
					</div>
					<div class="mesgs">
						<div class="person-chat-info">
							<div class="person-icon">
								<img src="{{ $headerData['image'] }}" alt="">
							</div>
							<div class="person-name">
								<h3>{{ $headerData['name'] }}</h3>
							</div>
						</div>
						<div class="msg_history" id="msg_history">
							@if($chatData)
								@foreach($chatData as $chat)
									@if(Session::get('user')['user_id'] === $chat['userId'])
									<div class="outgoing_msg">
										<div class="sent_msg">
											<p>{{ $chat['message'] }}</p>
											<span class="time_date"> {{ $chat['created_at'] }}    |    {{ $chat['dateMonth'] }}</span> 
										</div>
									</div>
									@else
									<div class="incoming_msg">
										<div class="incoming_msg_img"> <img src="{{ $headerData['image'] }}" alt=""> </div>
										<div class="received_msg">
											<div class="received_withd_msg">
												<p>{{ $chat['message'] }}</p>
												<span class="time_date"> {{ $chat['created_at'] }}    |    {{ $chat['dateMonth'] }}</span> 
											</div>
										</div>
									</div>
									@endif
								@endforeach
							@endif
						</div>
						<input type="hidden" name="hiddenmsg" value="" id="hiddenmsg">
						<div class="type_msg">
							<div class="input_msg_write">
								<input type="text" class="write_msg" id="write_msg" onkeyup="EnabledSendButton()" placeholder="Type a message" />
								<button class="msg_send_btn" id="msg_send_btn"  toUserId="{{ $headerData['user_id'] }}" type="button" disabled><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
							</div>
						</div>
					</div>
				</div>
			</div>
			@else
			<p class="no-message"> No Message available</p>
			<button class="btn btn-danger" onclick="window.history.go(-1); return false;">Back</button>
			@endif
		</div>
  </div>
<!-- /page content -->
<!-- footer content -->
@include('trainer.templates.footer')
<!-- /footer content -->
</div>
@endsection