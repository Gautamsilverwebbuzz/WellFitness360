@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
	@include('trainer.templates.sidebar')
	<!-- top navigation -->
	@include('trainer.templates.header')
	<!-- /top navigation -->
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>@lang('backend/list.forms.profile')</h2>
						<div class="clearfix"></div>
					</div>
					@if(session()->has('success_msg'))
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{ session()->get('success_msg') }}
						</div>
					@endif
					@if(session()->has('error_msg'))
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{ session()->get('error_msg') }}
						</div>
					@endif
					<div class="x_content">
						<br />
						<form id="trainerprofile" action="{{ url('trainer/profile') }}"  method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="name" id="name" class="form-control col-md-7 col-xs-12" placeholder="Enter Name" value="{{ $trainerprofile['name'] }}">
									<small class="text-danger">{{ $errors->first('name') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="surname">Sur Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="surname" name="surname" class="form-control col-md-7 col-xs-12" placeholder="Enter surname" value="{{ $trainerprofile['sur_name'] }}">
									<small class="text-danger">{{ $errors->first('surname') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="email" id="email" class="form-control col-md-7 col-xs-12" placeholder="Enter email address" value="{{ $trainerprofile['email'] }}" readonly="">
									<small class="text-danger">{{ $errors->first('email') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="contact_no" value="{{ $trainerprofile['contact_no'] }}" id="contact_no" maxlength="10" class="form-control col-md-7 col-xs-12" placeholder="Enter contact number">
									<small class="text-danger">{{ $errors->first('contact_no') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<div id="gender" class="btn-group" data-toggle="buttons">
										<label class="btn btn-default @if($trainerprofile['gender'] == 'Male') active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
										<input type="radio" name="gender" value="Male" @if($trainerprofile['gender'] == 'Male') checked @endif> &nbsp; Male &nbsp;
										</label>
										<label class="btn btn-primary @if($trainerprofile['gender'] == 'Female') active @endif" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
										<input type="radio" name="gender" value="Female" @if($trainerprofile['gender'] == 'Female') checked @endif> Female
										</label>
									</div>
									<small class="text-danger">{{ $errors->first('gender') }}</small>
								</div>
								<div class="Gendererror"></div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Profile Image<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="profile_image" value="" id="profile_image" class="form-control col-md-7 col-xs-12" placeholder="Select image">
									<small class="text-danger">{{ $errors->first('profile_image') }}</small>
								</div>
							</div>
							<div class="form-group image_preview">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img id="ImagePreview" src="@if(isset($trainerprofile['profile_image'])){{ asset($trainerprofile['profile_image']) }} @else {{ asset('trainer/Images/no_images.jpg') }} @endif" height="100px"/ >
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Skils</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="skils" name="skils[]" class="form-control valid" aria-invalid="false" multiple="multiple">
										{!! $showcat !!}
									</select>
									<small class="text-danger"></small>
									<small class="text-danger skils-error">{{ $errors->first('skils') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Age</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="age" name="age" class="form-control">
										<option value="">Select Age</option>
										@php
										$n=100;
										@endphp
										@for($i=15;$i <= $n;$i++)
											<option value="{{ $i }}" @if($trainerprofile['age'] == $i) selected @endif>{{ $i }}</option>
										@endfor
									</select>
									<small class="text-danger">{{ $errors->first('age') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Height</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="height" name="height" class="form-control">
										<option value="">Select Height</option>
											<option value="1">1</option>
									</select>
									<small class="text-danger">{{ $errors->first('height') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Weight</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="weight" name="weight" class="form-control">
										<option value="">Select weight</option>
										@php
										$n=100;
										@endphp
										@for($i=10;$i <= $n;$i++)
											<option value="{{ $i }}" @if($trainerprofile['weight'] == $i) selected @endif>{{ $i }} Kg</option>
										@endfor
									</select>
									<small class="text-danger">{{ $errors->first('weight') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Level</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="level" name="level" class="form-control">
										<option value="">Select Level</option>
											<option value="Beginner" @if($trainerprofile['level'] == 'Beginner') selected @endif>Beginner</option>
											<option value="Intermediate" @if($trainerprofile['level'] == 'Intermediate') selected @endif>Intermediate</option>
											<option value="Advance" @if($trainerprofile['level'] == 'Advance') selected @endif>Advance</option>
									</select>
									<small class="text-danger">{{ $errors->first('level') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biography">Biography<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="biography" id="biography" class="form-control col-md-7 col-xs-12" placeholder="Enter What we will do">{!! $trainerprofile['biography'] !!}</textarea>
									<small class="text-danger biographyerror">{{ $errors->first('biography') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="goals">Goals<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="goals" id="goals" class="form-control col-md-7 col-xs-12" placeholder="Enter What we will do">{!! $trainerprofile['goals'] !!}</textarea>
									<small class="text-danger goalserror">{{ $errors->first('goals') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="experience">Experience<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="experience" id="experience" class="form-control col-md-7 col-xs-12" placeholder="Enter What we will do">{!! $trainerprofile['experience'] !!}</textarea>
									<small class="text-danger experienceerror">{{ $errors->first('experience') }}</small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success">Submit</button>
									<button class="btn btn-primary" type="button" onclick="window.history.go(-1); return false;">@lang('backend/list.forms.back')</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
<!-- footer content -->
@include('trainer.templates.footer')
<!-- /footer content -->
</div>
@endsection