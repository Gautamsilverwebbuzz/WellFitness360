@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')
<!-- /top navigation -->
<!-- start now section -->
<div class="wf-login-sec wf-start-now-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center start-form">
				<h2>Start Now!</h2>
				<p class="p1">Unleash your Power</p>
				<form class="needs-validation" name="login-Form" id="login-Form" method="post">
					<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
					<div class="form-group">
						<input type="text" class="form-control" id="email" placeholder="Email" name="email">
						<!-- <div class="invalid-feedback">Please fill out this field.</div -->
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						<!-- <div class="invalid-feedback">Please fill out this field.</div> -->
					</div>
					<input type="submit" class="blue-btnwithout-redius btn" id="submit" name="submit" value="Start The Workout">
					<!-- <a href="javascript:void(0);" class="blue-btnwithout-redius btn">Start The Workout</a> -->
				</form>
				<a href="{{ url('forgetPassword') }}"> Forgot Password</a>
				<p class="p1">Don't have an account?<a href="{{ url('user/register') }}"> Sign Up</a></p>
			</div>
		</div>
	</div>
</div>
<!-- End of the start now section -->

<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->

@endsection