@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')

<div class="wf-register-sec wf-start-now-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center start-form">
				<h2>Register Now!</h2>
				<p class="p1">Unleash your Power</p>
				<form action="{{ url('user/registerUser') }}" id="userregisterForm" name="userregisterForm" class="needs-validation" method="post">
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