$(window).load(function() {
	$(".loader").fadeOut("slow");
});

$(document).ready(function () {
	$("#cover-spin").css("display", "none");
	if($("#what_wiil_do").length){
		CKEDITOR.replace( 'what_wiil_do' );
	}
	if($("#event_desc").length){
		CKEDITOR.replace( 'event_desc' );
	}
	if($("#blog_desc").length){
		CKEDITOR.replace( 'blog_desc' );
	}
	if($("#start_date").length){
		$('#start_date').datepicker({
			onSelect: function(dateText, inst){
				minDate: 0;
				$('#end_date').datepicker('option', 'minDate', new Date(dateText));
			},
			format: 'DD/MM/YYYY',
			allowInputToggle: true
		});
	}
	if($("#end_date").length){
		$('#end_date').datepicker({
			onSelect: function(dateText, inst){
				$('#start_date').datepicker('option', 'maxDate', new Date(dateText));
			},
			format: 'DD/MM/YYYY',
			allowInputToggle: true
		});
	}

	if($("#trainer").length){
		$('#trainer').multiselect({
			placeholder: 'Select Trainer',
		});
	}
	if($('#serach_date').length){
		$("#serach_date").datepicker({
			onSelect: function(date, instance) {
				$("#cover-spin").show();
				$.ajax({
					url  : BASE_URL+'/trainer/availability/serach-availability',
					type : 'POST',
					data : {
						"serachdate" : date,
						"user_id" : $("#serach_date").data('id'),
						'_token': $('meta[name="csrf-token"]').attr('content'),
					},
					success : function(response) {
						$('.serach-availability-cls').html(response);
						$(".trainer-avali-cls").hide();
					}
				});
			}
		});
	}
	/** USE : Delete Modules */
	$(document).on("click",".deletModule",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/module/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}else{
			return false
		}
	});

	/** USE : Delete Roles & Permission */
	$(document).on("click",".deletRolesPermission",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/rolepermission/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}else{
			return false
		}
	});
	/* USE : Add roles Form Validation */
	$('#rolesPermissionForm').validate({
		rules: {
			name:{
				required:true,
			},
			// 'permission[]':{
			//     required:true,
			// }
		},
		messages: {
			name:{
				required: 'Please enter name',
			},
			// 'permission[]':{
			//     required: 'Please select atleast one permission'
			// }
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "permission[]") {
				error.appendTo('.permissionError');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/* USE : Add roles Form Validation */
	$('#moduleForm').validate({
		rules: {
			name:{
				required:true,
			},
			display_name:{
				required:true,
			}
		},
		messages: {
			name:{
				required: 'Please enter name',
			},
			display_name:{
				required: 'Please enter display name'
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	$('#userForm').validate({
		rules: {
			name:{
				required:true,
			},
			surname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
				remote: {
					url: BASE_URL+"/admin/check-email-register",
					type: "post",
					data:{
						"_token": $('#csrf-token').val(),
					},
				},
			},
			contact_no:{
				required:true,
				number:true
			},
			gender:{
				required:true,
			},
			status:{
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
			email:{
				required: 'Please enter email.',
				email : 'Please enter valid email.',
				remote: "Email already exists.",
			},
			contact_no:{
				required: 'Please enter contact number.',
				number:'Please enter valid contact number'
			},
			gender:{
				required: 'Please select gender.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.Gendererror');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete User */
	$(document).on("click",".deletUser",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/UserManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});
	$('#trainerForm').validate({
		rules: {
			name:{
				required:true,
			},
			surname:{
				required:true,
			},
			email:{
				required:true,
				email:true,
				remote: {
					url: BASE_URL+"/check-email-register",
					type: "post",
					data:{
						"_token": $('#csrf-token').val(),
					},
				},
			},
			contact_no:{
				required:true,
				number:true
			},
			gender:{
				required:true,
			},
			status:{
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
			email:{
				required: 'Please enter email.',
				email : 'Please enter valid email.',
				remote: "Email already exists.",
			},
			contact_no:{
				required: 'Please enter contact number.',
				number:'Please enter valid contact number'
			},
			gender:{
				required: 'Please select gender.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			if(element.attr("name") == "gender") {
				error.appendTo('.Gendererror');
			}else {
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete Trainer */
	$(document).on("click",".deleteTrainer",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/trainerManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});

	/** USE : category form validation */
	$('#categoryForm').validate({
		rules: {
			categoryList:{
				required:true,
			},
			cat_name:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			categoryList:{
				required: 'Please select parent categories.',
			},
			cat_name:{
				required: 'Please enter categories name.'
			},
			status:{
				required: 'Please select status.'
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/**
	* USE : Listing set tree view category module
	**/
   if($('#tree_1').length > 0){
		$('#tree_1').jstree({
				"core" : {
					"themes" : {
						"responsive": true
					}
				},
				"types" : {
					"default" : {
						"icon" : "fa fa-folder icon-state-warning icon-lg"
					},
					"file" : {
						"icon" : "fa fa-file icon-state-warning icon-lg"
					}
				},
				"plugins": ["types"]
			});
		$(document).on('click','#tree_1 a',function(){
			var id = $(this).closest('li').attr('dataid');
			$.confirm({
				title: 'Action',
				content: 'Click to get your action',
				theme: 'modern',
				closeIcon: true,
				closeIconClass: 'fa fa-close',
				buttons: {
					edit: {
						btnClass: 'btn-green',
						action:function(){
							location.href = BASE_URL + '/admin/trainercategoriesManagement/edit/' + id;
						}
					},
					delete:{
						btnClass: 'btn-red',
						action: function(){
							$.confirm({
								title: 'Delete',
								content: 'Are You Sure Delete this Category?',
								theme: 'modern',
								closeIcon: true,
								closeIconClass: 'fa fa-close',

								buttons: {
									confirm: function (){
										location.href = BASE_URL + '/admin/trainercategoriesManagement/delete/' + id;
									},
									cancel: function () {
									},
								}
							})
						}
					}
				}
			});
		});
	}

	/**
	* USE : Confirm-box set in category module
	**/
	if ($('a.lightcase').length > 0) {
		$('a.lightcase').lightcase();
	}

	/**
	* USE : Edit category selected dropdown
	**/
	if($('.edit-category').length > 0){
		$('.edit-category > option').each(function() {
			if($(this).val() == categoryid){
				$(this).attr('selected','selected');
			}
		});
	}

	/** USE : Selected image Perview **/
	function readURL1(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#ImagePreview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	/** USE : Preview Image about-us */
	$("#about-us-image").change(function() {
		readURL1(this);
		$('.image_preview').show();
	});

	/** USE : Preview image E-shop Management */
	$("#shop-image").change(function() {
		readURL1(this);
		$('.image_preview').show();
	});

	/** USE : E-Shop Management form validation */
	$('#addEshopForm').validate({
		rules: {
			Name:{
				required:true,
			},
			Image:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
			Shop_URL:{
				required:true,
				url: true,
			}
		},
		messages: {
			Name:{
				required: 'Please enter shop name',
			},
			Image:{
				required: 'Please select shop image',
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
			Shop_URL:{
				required: 'Please enter website url',
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/** USE : E-Shop Management form validation */
	$('#editEshopForm').validate({
		rules: {
			Name:{
				required:true,
			},
			Image:{
				extension: "JPG|JPEG|PNG",
			},
			Shop_URL:{
				required:true,
				url: true,
			}
		},
		messages: {
			Name:{
				required: 'Please enter shop name',
			},
			Image:{
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
			Shop_URL:{
				required: 'Please enter website url',
			}
		},
		errorPlacement: function (error, element) {
			error.insertAfter(element);
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/** USE : Delete Trainer */
	$(document).on("click",".deleteShop",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/E_shopManagement/delete/'+id,
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

	$('#feesForm').validate({
		rules: {
			trainername:{
				required:true,
			},
			trainerfee:{
				required:true,
				number:true,
			},
			admidfee:{
				required:true,
				number:true,
			},
		},
		messages: {
			trainername:{
				required: 'Please select trainer name.',
			},
			trainerfee:{
				required: 'Please enter trainer fee.',
				number: 'Please enter valid trainer fee.'
			},
			admidfee:{
				required: 'Please enter admin fee.',
				number : 'Please enter valid admin fee.'
			},
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/* USE : Delete Fees */
	$(document).on("click",".deleteFees",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/FeesManagement/delete/'+id,
				data: {},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}
		else{
			return false;
		}
	});

	/**
	 * USE : Validate form change password
	 */
	$('#changePassword').validate({
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
			form.submit();
		}
	});

	$('input[type=checkbox]').change(function(e){
	   if ($('input[type=checkbox]:checked').length > 5) {
			$(this).prop('checked', false);
			toastr.error("Allowed only five User or Trainer Select.");
	   }
	})
	
	$(".usertrainer-cls").click(function() {
		var val = [];
		$(':checkbox:checked').each(function(i){
			val[i] = $(this).val();
		});
		if(val != ''){
			$("#cover-spin").css("display", "block");
			$.ajax({
				type: 'POST',
				url: BASE_URL+'/admin/save-user-trainer-activity',
				data:{
					"_token": $('#csrf-tokens').val(),
					id:val,
				},
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					if(object.status){
						toastr.success(object.message);
						//location.reload(true);
					}else{
						toastr.error(object.message);
					}
				}
			});
		}else{
			toastr.error("Please Select at list one user or trainer.");
		}
	});

	$('#categoreiesForm').validate({
		rules: {
			categories_name:{
				required:true,
			},
			categories_desc:{
				required:true,
			},
			categories_image:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
		},
		messages: {
			categories_name:{
				required: 'Please enter categories name.',
			},
			categories_desc:{
				required: 'Please enter categories description.',
			},
			categories_image:{
				required: 'Please select image.',
				extension: "Allowed only JPG|JPEG|PNG files extension.",
			},
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	$('#editcategoreiesForm').validate({
		rules: {
			categories_name:{
				required:true,
			},
			categories_desc:{
				required:true,
			},
			categories_image:{
				extension: "JPG|JPEG|PNG",
			},
		},
		messages: {
			categories_name:{
				required: 'Please enter categories name.',
			},
			categories_desc:{
				required: 'Please enter categories description.',
			},
			categories_image:{
				extension: "Allowed only JPG|JPEG|PNG files extension",
			},
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	
	/* USE : Delete Categories */
	$(document).on("click",".deletCategories",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/categoriesManagement/delete/'+id,
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

	$.validator.addMethod('filesize', function(value, element, param) {
		var param = 2000000;
		return this.optional(element) || (element.files[0].size <= param)    
	});

	$('#subcategoreiesForm').validate({
		ignore: "input:hidden:not(input:hidden.required)",
		rules: {
			categories_name:{
				required:true,
			},
			sub_categories_name:{
				required:true,
			},
			sub_categories_desc:{
				required:true,
			},
			sub_categories_image:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
			workout_time:{
				required:true,
			},
			what_wiil_do:{
				required:true,
			},
			equipment:{
				required:true,
			},
			workout_from:{
				required:true,
			},
			package:{
				required:true,
			},
			video:{
				required:true,
				extension: "mp4",
				filesize:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			categories_name:{
				required: 'Please select categories name.',
			},
			sub_categories_name:{
				required: 'Please enter sub categories name.',
			},
			sub_categories_desc:{
				required: 'Please enter sub categories description.',
			},
			sub_categories_image:{
				required: 'Please select image.',
				extension: "Allowed only JPG|JPEG|PNG files extension.",
			},
			workout_time:{
				required: 'Please enter workout time.',
			},
			what_wiil_do:{
				required: 'Please enter what we will do.',
			},
			equipment:{
				required: 'Please enter equipment.',
			},
			workout_from:{
				required: 'Please enter workout from.',
			},
			package:{
				required:"Please select package.",
			},
			video:{
				required:"Please select video.",
				extension:"Allowed only mp4 files extension.",
				filesize:"Please upload maximum 2mb file size.",
			},
			status:{
				required: 'Please select status.',
			},
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") == "what_wiil_do" ){
				error.insertAfter(".whatwilldoerror");
			}
			else{
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});

	/* USE : Delete sub Categories */
	$(document).on("click",".deletSubCategories",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/subcategoriesManagement/delete/'+id,
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

	/* Sub Categoeries package*/
	$(".freevideo").hide();
	$("select.packagecls").change(function(){
		var package = $(this).children("option:selected").val();
		if(package == "free"){
			$(".freevideo").show();
		}else{
			$(".freevideo").hide();
		}
	});

	/* Event Form validation */
	$('#eventForm').validate({
		rules: {
			eventname:{
				required:true,
			},
			start_date:{
				required:true,
			},
			end_date:{
				required:true,
			},
			'trainer[]':{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			eventname:{
				required: 'Please enter event name.',
			},
			start_date:{
				required: 'Please enter select start date.',
			},
			end_date:{
				required: 'Please enter select end date.',
			},
			'trainer[]':{
				required: 'Please enter select trainer.',
			},
			status:{
				required: 'Please enter select status.',
			},
		},
		errorPlacement: function(error, element) {
			if (element.attr("id") == "trainer" ){
				error.insertAfter(".event-error");
			}
			else{
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});


	/* USE : Delete Event */
	$(document).on("click",".deleteEvent",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/eventManagement/delete/'+id,
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
	/* USE : Subscription plan Management */
	$('#subscriptionPlan').validate({
		rules: {
			Duration:{
				required:true,
			},
			Title:{
				required:true,
			},
			Amount:{
				required:true,
			},
			Status:{
				required:true,
			},
		},
		messages: {
			Duration:{
				required: 'Please select Duration',
			},
			Title:{
				required: 'Please enter title',
			},
			Amount:{
				required: 'Please enter amount',
			},
			Status:{
				required: 'Please select status',
			},
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete SubscriptionPlan Delete */
	$(document).on("click",".deletPlan",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/SubscriptionPlanManagement/delete/'+id,
				success: function (response) {
					$("#cover-spin").css("display", "none");
					var object = JSON.parse(JSON.stringify(response));
					location.reload();
				}
			});
		}else{
			return false
		}
	});

	/* USE : Blog Management */
	$('#blogForm').validate({
		ignore: "input:hidden:not(input:hidden.required)",
		rules: {
			title:{
				required:true,
			},
			blogtag:{
				required:true,
			},
			image:{
				required:true,
				extension: "JPG|JPEG|PNG",
			},
			url_alias:{
				required:true,
			},
			blog_desc:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			title:{
				required: 'Please enter title.',
			},
			blogtag:{
				required: 'Please enter tag.',
			},
			image:{
				required: 'Please select image.',
				extension: "Allowed only JPG|JPEG|PNG files extension.",
			},
			url_alias:{
				required:"Please enter url alias.",
			},
			blog_desc:{
				required: 'Please enter description.',
			},
			status:{
				required: 'Please select status',
			},
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") == "blog_desc" ){
				error.insertAfter(".descerror");
			}
			else{
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	$('#editblogForm').validate({
		ignore: "input:hidden:not(input:hidden.required)",
		rules: {
			title:{
				required:true,
			},
			blogtag:{
				required:true,
			},
			image:{
				extension: "JPG|JPEG|PNG",
			},
			url_alias:{
				required:true,
			},
			blog_desc:{
				required:true,
			},
			status:{
				required:true,
			},
		},
		messages: {
			title:{
				required: 'Please enter title.',
			},
			blogtag:{
				required: 'Please enter tag.',
			},
			image:{
				extension: "Allowed only JPG|JPEG|PNG files extension.",
			},
			url_alias:{
				required:"Please enter url alias.",
			},
			blog_desc:{
				required: 'Please enter description.',
			},
			status:{
				required: 'Please select status',
			},
		},
		errorPlacement: function(error, element) {
			if (element.attr("name") == "blog_desc" ){
				error.insertAfter(".descerror");
			}
			else{
				error.insertAfter(element);
			}
		},
		submitHandler: function (form) {
			$("#cover-spin").css("display", "block");
			form.submit();
		}
	});
	/** USE : Delete Blog */
	$(document).on("click",".deletBlog",function() {
		$("#cover-spin").css("display", "block");
		var id = $(this).attr("data-id");
		if(confirm("Are you sure you want to delete this?")){
			$.ajax({
				type: 'GET',
				url: BASE_URL+'/admin/blogManagement/delete/'+id,
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
		}else{
			return false
		}
	});
});