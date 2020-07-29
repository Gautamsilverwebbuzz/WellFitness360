$(document).ready(function() {

	/*Profile Page*/
	if($("#biography").length){
		CKEDITOR.replace( 'biography' );
	}
	if($("#goals").length){
		CKEDITOR.replace( 'goals' );
	}
	if($("#experience").length){
		CKEDITOR.replace( 'experience' );
	}
	if($("#skils").length){
		$("#skils").select2({
			placeholder: "Select a Skils",
			allowClear: true
		});
	}
	/*Profile Page*/

	$( "#trainerlogin" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
				remote: {
					url: BASE_URL+"/trainer/check-email",
					type: "post",
					data:{
						"_token": $('#csrf-token').val(),
					},
				},
			},
			password: {
				required: true,
				minlength:6,
			}
		},
		messages: {
			email: {
				required: 'Please enter email.',
				email: 'Please enter valid email',
				remote: "Email not register"
			},
			password: {
				required: 'Please enter password.',
				minlength: 'Please enter valid 6 digit password',
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").show();
			$.ajax({
				url  : BASE_URL+'/trainer/login-check',
				type : 'POST',
				data : $('#trainerlogin').serialize(),
				success : function(response) {
					$("#cover-spin").hide();
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
						toastr.success(data.message);
						window.location = BASE_URL+data.redirecturl;
					}else{
						toastr.error(data.message);
					}
				}
			});
		}
	});

	

	$('#trainerchangePassword').validate({
		rules: {
			old_password:{
				required:true,
				minlength:6,
			},
			new_password:{
				required:true,
				minlength:6,
			},
			confirm_password:{
				required:true,
				minlength:6,
				equalTo: "#new_password",
			},
		},
		messages: {
			old_password:{
				required:'Please enter old password',
				minlength: 'Required minimum 6 character | digits | special character',
			},
			new_password:{
				required:'Please enter new password',
				minlength: 'Required minimum 6 character | digits | special character',
			},
			confirm_password:{
				required:'Please enter confirm password',
				minlength: 'Required minimum 6 character | digits | special character',
				equalTo: "New password & confirm password does not match",
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			$("#overlay").fadeIn(300);
			$.ajax({
				url  : BASE_URL+'/trainer/changePassword',
				type : 'POST',
				data : $('#trainerchangePassword').serialize(),
				success : function(response) {
					$("#cover-spin").css("display", "none");
					$("#overlay").fadeOut(300);
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
						toastr.success(data.message);
						window.location = BASE_URL + data.redirecturl;
					}else{
						toastr.error(data.message);
					}
				}
			});
		}
	});

	$('#trainerprofile').validate({
		ignore: "input:hidden:not(input:hidden.required)",
		rules: {
			name:{
				required:true,
			},
			surname:{
				required:true,
			},
			contact_no:{
				required:true,
				number:true
			},
			gender:{
				required:true,
			},
			'skils[]':{
				required:true,
			},
			age:{
				required:true,
			},
			height:{
				required:true,
			},
			weight:{
				required:true,
			},
			level:{
				required:true,
			},
			biography:{
				required:true,
			},
			goals:{
				required:true,
			},
			experience:{
				required:true,
			},
		},
		messages: {
			name:{
				required: 'Please enter name.',
			},
			surname:{
				required: 'Please enter Sur name.'
			},
			contact_no:{
				required: 'Please enter contact number.',
				number:'Please enter valid contact number'
			},
			gender:{
				required: 'Please select gender.'
			},
			'skils[]':{
				required:"Please select skils.",
			},
			age:{
				required: 'Please select age.'
			},
			age:{
				required: 'Please select age.'
			},
			height:{
				required: 'Please select height.'
			},
			weight:{
				required: 'Please select weight.'
			},
			level:{
				required: 'Please select level.'
			},
			biography:{
				required:"Please enter biography.",
			},
			goals:{
				required:"Please enter goals.",
			},
			experience:{
				required:"Please enter experience.",
			},
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.Gendererror');
			}else if (element.attr("name") == "biography" ){
				error.insertAfter(".biographyerror");
			}else if (element.attr("name") == "goals" ){
				error.insertAfter(".goalserror");
			}else if (element.attr("name") == "skils[]" ){
				error.insertAfter(".skils-error");
			}else if (element.attr("name") == "experience" ){
				error.insertAfter(".experienceerror");
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			form.submit();
		}
	});

	$('#trainersettingForm').validate({
		rules: {
			contact_no:{
				number:true,
			},
		},
		messages: {
			contact_no:{
				number:'Please enter valid contact no.',
			},
		},
	});

	$('#priceform').validate({
		rules: {
			title:{
				required:true,
			},
			categoryList:{
				required:true,
			},
			price:{
				required:true,
				number:true,
			},
			duration:{
				required:true,
			},
		},
		messages: {
			title:{
				required:'Please enter title.',
			},
			categoryList:{
				required:"Please selecr skils.",
			},
			price:{
				required:"Please enter price.",
				number:"Please enter valid price.",
			},
			duration:{
				required:"Please enter duration.",
			},
		},
	});

	/** USE : Delete Trainer Price */
	$(document).on("click",".deletTrainerPrice",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/trainer/price/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					if(object.status){
						toastr.success(object.message);
						location.reload(true);
					}else{
						toastr.error(object.message);
					}
				}
			});
		}
		else{
			return false;
		}
	});

	/*Chat Js START*/
	/**
	* USE : Get message
	*/
	
	/*Send message*/
	$('.msg_send_btn').on('click', function() {
		var toUserId = $(this).attr('toUserId');
		$.ajax({
			type:'POST',
			url: BASE_URL+'/trainer/sendMessage',
			data:{
				'_token': $('meta[name="csrf-token"]').attr('content'),
				toUserId : toUserId,
				message : $('.write_msg').val(),
			},
			success:function(data){
				if(data.status){
					$('#write_msg').val('');
					userChatHistory(toUserId);
					EnabledSendButton();
				}
			}
		});
	});

	const messages = document.getElementById('msg_history');
	$('.msg_history').animate({scrollTop: $('.msg_history').get(0).scrollHeight}, 3000);
	if($("#msg_history").length){
		var toUserId = $('.msg_send_btn').attr('toUserId');
		//setInterval(notification, 5000);
		setInterval(sendRequest, 5000);
		//setInterval(function(){userChatHistory(toUserId)}, 2000);
	}

	$('.chat_list').on('click', function() {
		$('.chat_list').removeClass('active_chat');
		$(this).addClass('active_chat');
		var fromUserId = $(this).attr('id');

		$.ajax({
			type:'POST',
			url: BASE_URL+'/trainer/updateCountMessage',
			data:{
				'_token': $('meta[name="csrf-token"]').attr('content'),
				fromUserId : fromUserId,
			},
			success:function(data){
				if(data.status){
					if(data.countMessage){
						$('.messageCount').html(data.countMessage);
					}else{
						$('.messageCount').html('');
					}
					messages.scrollTop = messages.scrollHeight;
				}
			}
		});
		//userChatHistory(fromUserId,propertyContentId);
	});
	/*Chat Js END*/
});

function notification(){
	$.ajax({
		type:'GET',
		url: BASE_URL+'/trainer/notification',
		success:function(data){
			$('.messageList').html(data.html);
			if(data.messageCount){
				$('.countNotification').html(data.messageCount);
			}else{
				$('.countNotification').html('');
			}

			setTimeout(function(){notification();}, 5000);
		}
	});
}

function userChatHistory(toUserId){
	const messages = document.getElementById('msg_history');
	var chat_list = $(".chat_list").attr('id');
	$(".chat_list").removeClass('active_chat');
	if(chat_list == toUserId){
		$(".chat_list").addClass('active_chat');
	}else{
		$(".chat_list").removeClass('active_chat');
	}
	$.ajax({
		type:'POST',
		url: BASE_URL+'/trainer/userChat',
		data:{
			'_token': $('meta[name="csrf-token"]').attr('content'),
			toUserId : toUserId,
		},
		success:function(data){
			if(data.status){
				messages.scrollTop = messages.scrollHeight;
				$('.msg_history').html(data.chatHtml);
				$('.person-chat-info').html(data.headerHtml);
				$('.msg_send_btn').attr('toUserId',data.headerData.user_id);
				//setTimeout(function(){userChatHistory();}, 5000);
			}
		}
	});
}

function sendRequest(){
	const messages = document.getElementById('msg_history');
	//var fromUserId = $('.msg_send_btn').attr('toUserId');
	var toUserId = $(".active_chat ").attr('id');
	$.ajax({
		type:'POST',
		url: BASE_URL+'/trainer/userList',
		data:{
			'_token': $('meta[name="csrf-token"]').attr('content'),
			toUserId : toUserId,
		},
		success:function(data){
			if(data.status){
				$('.msg_history').html(data.chatHtml);
				$('.person-chat-info').html(data.headerHtml);
				$('.msg_send_btn').attr('toUserId',data.headerData.user_id);
				messages.scrollTop = messages.scrollHeight;
			}
			//setTimeout(function(){sendRequest();}, 5000);
		}
	});
};

function EnabledSendButton() {
	if(document.getElementById("write_msg").value==="") {
		document.getElementById('msg_send_btn').disabled = true;
	} else {
		document.getElementById('msg_send_btn').disabled = false;
	}
}