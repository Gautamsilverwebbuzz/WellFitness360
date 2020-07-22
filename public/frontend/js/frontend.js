$(document).ready(function() {
	$( "#login-Form" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
				remote: {
					url: BASE_URL+"/check-email",
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
				url  : BASE_URL+'/login-check',
				type : 'POST',
				data : $('#login-Form').serialize(),
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

	$( "#forgotePassword" ).validate({
		rules: {
			email: {
				required: true,
				email: true,
			}
		},
		messages: {
			email: {
				required: 'Please enter email',
				email: 'Please enter valid email',
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").show();
			$.ajax({
				url  : BASE_URL+'/forgetPassword',
				type : 'POST',
				data : $('#forgotePassword').serialize(),
				success : function(response) {
					$("#cover-spin").hide();
					var data = JSON.parse(JSON.stringify(response));
					if(data.status){
						toastr.success(data.message);

					}else{
						toastr.error(data.message);
					}
				}
			});
		}
	});

	/**
	 * USE : Validate update password
	 */
	$( "#resetPassword" ).validate({
		rules: {
			password:{
				required:true,
				minlength:6,
			},
			confirm_password:{
				required:true,
				minlength:6,
				equalTo: "#password",
			}
		},
		messages: {
			password:{
				required: 'Please enter password',
				minlength: 'Please enter atleast 6 digits',
			},
			confirm_password:{
				required: 'Please enter confirm password',
				minlength: 'Please enter atleast 6 digits',
				equalTo: "Password and confirm password does not match",
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").show();
			$.ajax({
				url  : BASE_URL+'/resetPassword',
				type : 'POST',
				data : $('#resetPassword').serialize(),
				success : function(response) {
					$("#cover-spin").hide();
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
});