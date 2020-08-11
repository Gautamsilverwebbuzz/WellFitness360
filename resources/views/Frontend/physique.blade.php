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
							<option value="" selected>Select Height</option>
							<option value="4ft1inch">4'1</option>
							<option value="4ft2inch">4'2</option>
							<option value="4ft3inch">4'3</option>
							<option value="4ft4inch">4'4</option>
							<option value="4ft5inch">4'5</option>
							<option value="4ft6inch">4'6</option>
							<option value="4ft7inch">4'7</option>
							<option value="4ft8inch">4'8</option>
							<option value="4ft9inch">4'9</option>
							<option value="4ft10inch">4'10</option>
							<option value="4ft11inch">4'11</option>
							<option value="4ft12inch">4'12</option>
							<option value="5ft1inch">5'1</option>
							<option value="5ft2inch">5'2</option>
							<option value="5ft3inch">5'3</option>
							<option value="5ft4inch">5'4</option>
							<option value="5ft5inch">5'5</option>
							<option value="5ft6inch">5'6</option>
							<option value="5ft7inch">5'7</option>
							<option value="5ft8inch">5'8</option>
							<option value="5ft9inch">5'9</option>
							<option value="5ft10inch">5'10</option>
							<option value="5ft11inch">5'11</option>
							<option value="5ft12inch">5'12</option>
							<option value="6ft1inch">6'1</option>
							<option value="6ft2inch">6'2</option>
							<option value="6ft3inch">6'3</option>
							<option value="6ft4inch">6'4</option>
							<option value="6ft5inch">6'5</option>
							<option value="6ft6inch">6'6</option>
							<option value="6ft7inch">6'7</option>
							<option value="6ft8inch">6'8</option>
							<option value="6ft9inch">6'9</option>
							<option value="6ft10inch">6'10</option>
							<option value="6ft11inch">6'11</option>
							<option value="6ft12inch">6'12</option>
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