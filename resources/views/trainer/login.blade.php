@include('auth.template.header')
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

	  <div class="login_wrapper">
		<div class="animate form login_form">
		  <section class="login_content">
			@if(session()->has('success_msg'))
			<div class="alert alert-success">
				{{ session()->get('success_msg') }}
			</div>
			@endif
			@if(session()->has('error_msg'))
			<div class="alert alert-danger">
				{{ session()->get('error_msg') }}
			</div>
			@endif
			<form id="trainerlogin" method="POST" name="trainerlogin">
				<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
				<h1>Login</h1>
				<div class="auth-input">
					<input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" required="" />
				</div>
				<div class="auth-input">
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required="" />
				</div>
				<div class="auth-input">
					{{-- <a class="btn btn-default submit" href="">Log in</a> --}}
					<button type="submit" class="btn btn btn-success login-btn">Login</button>
					<a class="reset_pass" href="{{ route('/trainer/forgetPassword') }}">Forgot password?</a>
					{{--  <a href="{{ url('auth/facebook') }}" class="btn btn-lg btn-primary btn-block">
						<strong>Login With Facebook</strong>
					</a>
					{{-- <a href="{{ ROUTE('instagram.login') }}" class="btn btn-lg btn-primary btn-block">
						<strong>Login With Instagram</strong>
					</a> --}}
					{{-- <a href="{{ url('auth/google') }}" class="btn btn-lg btn-primary btn-block">
						<strong>Login With Google</strong>
					</a>  --}}
				</div>

				<div class="clearfix"></div>

				<div class="separator">
					<!-- <p class="change_link">New to site?
					<a href="#signup" class="to_register"> Create Account </a>
					</p> -->

					<div class="clearfix"></div>
					<br />

					<div>
					<h1><i class="fa fa-paw"></i> WellFit360</h1>
					<p>©2020 All Rights Reserved.</p>
					</div>
				</div>
			</form>
		  </section>
		</div>
	  </div>
	</div>
@include('auth.template.footer')
