@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')

<div class="wf-physiquesec wf-register-sec wf-start-now-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center start-form">
				<h2>Physique Stats</h2>
				<p class="p1">Enter your personal stats</p>
				<form action="{{ url('physique') }}" class="needs-validation" method="post" id="physique" name="physique">
					<input type="hidden" name="_token"  id="csrf-token" value="{{ csrf_token() }}">
					<div class="form-group">
						<select class="mdb-select md-form md-outline colorful-select dropdown-primary" id="age" name="age">
							<option value=""> Select Age</option>
							@php
							$n=100;
							@endphp
							@for($i=15;$i <= $n;$i++)
								<option value="{{ $i }}">{{ $i }}</option>
							@endfor
						</select>
					</div>
					<div class="form-group">
						<select class="mdb-select md-form md-outline colorful-select dropdown-primary" id="height" name="height">
							<option value="" selected>Height</option>
							<option value="1">Option 1</option>
							<option value="2">Option 2</option>
							<option value="3">Option 3</option>
						</select>
					</div>
					<div class="form-group">
						<select class="mdb-select md-form md-outline colorful-select dropdown-primary" id="weight" name="weight">
							<option value=""> Select Weight</option>
							@php
							$n=100;
							@endphp
							@for($i=10;$i <= $n;$i++)
								<option value="{{ $i }}">{{ $i }} Kg</option>
							@endfor
						</select>
					</div>
					<div class="form-group">
						<select class="mdb-select md-form md-outline colorful-select dropdown-primary" id="level" name="level">
							<option value=""> Select Level</option>
							<option value="Beginner">Beginner</option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advance">Advance</option>
						</select>
					</div>
					<div class="form-group">
						<select class="mdb-select md-form md-outline colorful-select dropdown-primary" id="gender" name="gender">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
						</select>
					</div>
					<button class="blue-btnwithout-redius btn">Let's Get Started</button>
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