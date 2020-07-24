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
});