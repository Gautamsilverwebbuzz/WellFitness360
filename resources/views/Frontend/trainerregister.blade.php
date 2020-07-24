@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')

<div class="wf-register2-sec wf-start-now-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center start-form">
				<h2>Register Now!</h2>
				<p class="p1">Unleash your Power</p>
				<form action="{{ url('trainer/register') }}" id="trainerregister" name="trainerregister" class="needs-validation" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input type="text" class="form-control" id="firstname" placeholder="First Name" name="firstname">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" placeholder="Email" name="email">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" readonly>
							<div class="input-group-btn">
								<span class="fileUpload btn btn-success">
								<span class="upl" id="upload"><img src="{{ asset('frontend/images/ar-camera.png') }}" alt="img">Certification Photo</span>
								<input type="file" class="upload up" id="certifiaction_photo" name="certifiaction_photo" />
								</span>
							</div>
						</div>
						<div class="certifiaction_error"></div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" readonly>
							<div class="input-group-btn">
								<span class="fileUpload btn btn-success">
								<span class="upl" id="upload"><img src="{{ asset('frontend/images/ar-camera.png') }}" alt="img">ID/ Passport Photo</span>
								<input type="file" class="upload up" id="id_passport_photo" name="id_passport_photo" />
								</span>
							</div>
						</div>
						<div class="id_passport_error"></div>
					</div>
					<button class="blue-btnwithout-redius btn">Sign Up</button>
					<p class="p1 mt-4">Already a member ?<a href="{{ url('login') }}"> Sign In</a></p>
					<div class="text-detail">
						<p class="p text-center">By creating an account, I agree to Wellfit360 <a href="javascript:void(0);">Terms of use</a> and <a href="javascript:void(0);">Privacy Policy.</a></p>
						<p class="p mt-1"> Wellfit360 uses your email address to  send you occasional product updates and marketing emails, you can opt out at any time in your settings.</p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->

@endsection