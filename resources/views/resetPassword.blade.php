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
				<p class="p1">Reset Password</p>
				<form class="needs-validation" name="resetPassword" id="resetPassword" method="post">
					<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
					 <input type="hidden" name="rememberToken"  id="rememberToken" value="{{ $token }}">
					<div class="form-group">
						<input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" placeholder="Enter New Password" required="" />
					</div>
					<div class="form-group">
						<input type="password" name="confirm_password" id="confirm_password" value="{{ old('confirm_password') }}" class="form-control @error('') is-invalid @enderror" placeholder="Enter Confirm Password" required="" />
					</div>
					<input type="submit" class="blue-btnwithout-redius btn" id="submit" name="submit" value="Start The Workout">
				</form>
				<a href="url('login')"> Sign In</a>
			</div>
		</div>
	</div>
</div>
<!-- End of the start now section -->
<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->
@endsection