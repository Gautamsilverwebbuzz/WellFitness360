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
											<option value="" selected>Select Height</option>
											<option value="4ft1inch" @if($trainerprofile['height'] == '4ft1inch') selected @endif>4'1</option>
											<option value="4ft2inch" @if($trainerprofile['height'] == '4ft2inch') selected @endif>4'2</option>
											<option value="4ft3inch" @if($trainerprofile['height'] == '4ft3inch') selected @endif>4'3</option>
											<option value="4ft3inch" @if($trainerprofile['height'] == '4ft4inch') selected @endif>4'4</option>
											<option value="4ft4inch" @if($trainerprofile['height'] == '4ft5inch') selected @endif>4'5</option>
											<option value="4ft5inch" @if($trainerprofile['height'] == '4ft6inch') selected @endif>4'6</option>
											<option value="4ft6inch" @if($trainerprofile['height'] == '4ft7inch') selected @endif>4'7</option>
											<option value="4ft7inch" @if($trainerprofile['height'] == '4ft8inch') selected @endif>4'8</option>
											<option value="4ft8inch" @if($trainerprofile['height'] == '4ft9inch') selected @endif>4'9</option>
											<option value="4ft9inch" @if($trainerprofile['height'] == '4ft10inch') selected @endif>4'10</option>
											<option value="4ft10inch" @if($trainerprofile['height'] == '4ft11inch') selected @endif>4'11</option>
											<option value="4ft11inch" @if($trainerprofile['height'] == '4ft12inch') selected @endif>4'12</option>
											<option value="5ft1inch" @if($trainerprofile['height'] == '5ft1inch') selected @endif>5'1</option>
											<option value="5ft22inch" @if($trainerprofile['height'] == '5ft2inch') selected @endif>5'2</option>
											<option value="5ft3inch" @if($trainerprofile['height'] == '5ft3inch') selected @endif>5'3</option>
											<option value="5ft3inch" @if($trainerprofile['height'] == '5ft4inch') selected @endif>5'4</option>
											<option value="5ft4inch" @if($trainerprofile['height'] == '5ft5inch') selected @endif>5'5</option>
											<option value="5ft5inch" @if($trainerprofile['height'] == '5ft6inch') selected @endif>5'6</option>
											<option value="5ft6inch" @if($trainerprofile['height'] == '5ft7inch') selected @endif>5'7</option>
											<option value="5ft7inch" @if($trainerprofile['height'] == '5ft8inch') selected @endif>5'8</option>
											<option value="5ft8inch" @if($trainerprofile['height'] == '5ft9inch') selected @endif>5'9</option>
											<option value="5ft9inch" @if($trainerprofile['height'] == '5ft10inch') selected @endif>5'10</option>
											<option value="5ft10inch" @if($trainerprofile['height'] == '5ft11inch') selected @endif>5'11</option>
											<option value="5ft11inch" @if($trainerprofile['height'] == '5ft12inch') selected @endif>5'12</option>
											<option value="6ft1inch" @if($trainerprofile['height'] == '6ft1inch') selected @endif>6'1</option>
											<option value="6ft2inch" @if($trainerprofile['height'] == '6ft2inch') selected @endif>6'2</option>
											<option value="6ft3inch" @if($trainerprofile['height'] == '6ft3inch') selected @endif>6'3</option>
											<option value="6ft3inch" @if($trainerprofile['height'] == '6ft4inch') selected @endif>6'4</option>
											<option value="6ft4inch" @if($trainerprofile['height'] == '6ft5inch') selected @endif>6'5</option>
											<option value="6ft5inch" @if($trainerprofile['height'] == '6ft6inch') selected @endif>6'6</option>
											<option value="6ft6inch" @if($trainerprofile['height'] == '6ft7inch') selected @endif>6'7</option>
											<option value="6ft7inch" @if($trainerprofile['height'] == '6ft8inch') selected @endif>6'8</option>
											<option value="6ft8inch" @if($trainerprofile['height'] == '6ft9inch') selected @endif>6'9</option>
											<option value="6ft9inch" @if($trainerprofile['height'] == '6ft10inch') selected @endif>6'10</option>
											<option value="6ft10inch" @if($trainerprofile['height'] == '6ft11inch') selected @endif>6'11</option>
											<option value="6ft11inch" @if($trainerprofile['height'] == '6ft12inch') selected @endif>6'12</option>
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