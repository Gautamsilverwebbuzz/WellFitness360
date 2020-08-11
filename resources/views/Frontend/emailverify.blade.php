@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')

<div class="wf-verifiction-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="veri-img">
				<img src="{{ asset('frontend/images/verified.png') }}" alt="img" class="img mb-5">
				<p class="text mb-0">Verification Email Send on</p>
				<p class="text"> Registered Email Address </p>
			</div>
		</div>
	</div>
</div>


<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->
@endsection