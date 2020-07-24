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

	$('#userregisterForm').validate({
		rules: {
			firstname:{
				required:true,
			},
			lastname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
			},
		},
		messages: {
			firstname:{
				required:'Please enter firstname.',
			},
			lastname:{
				required:'Please enter lastname.',
			},
			email:{
				required:'Please enter email.',
				email:"Please enter valid email."
			},
			password:{
				required:'Please enter password.',
			},
		},
	});

	$('#trainerregister').validate({
		rules: {
			firstname:{
				required:true,
			},
			lastname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
			},
			password:{
				required:true,
			},
			certifiaction_photo:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
			id_passport_photo:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
		},
		messages: {
			firstname:{
				required:'Please enter firstname.',
			},
			lastname:{
				required:'Please enter lastname.',
			},
			email:{
				required:'Please enter email.',
				email:"Please enter valid email."
			},
			password:{
				required:'Please enter password.',
			},
			certifiaction_photo:{
				required:"Please select certifiaction photo.",
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
			id_passport_photo:{
				required:"Please selcet ID/Passport photo.",
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "certifiaction_photo") {
				error.appendTo('.certifiaction_error');
			}else if(element.attr("name") == "id_passport_photo") {
				error.appendTo('.id_passport_error');
			}
			else {
				error.insertAfter(element);
			}
		},
	});

	$(document).on('change','.up', function(){
		var names = [];
		var length = $(this).get(0).files.length;
		for (var i = 0; i < $(this).get(0).files.length; ++i) {
			names.push($(this).get(0).files[i].name);
		}
		if(length>2){
			var fileName = names.join(', ');
			$(this).closest('.form-group').find('.form-control').attr("value",length+" files selected");
		}
		else{
			$(this).closest('.form-group').find('.form-control').attr("value",names);
		}
	});
});