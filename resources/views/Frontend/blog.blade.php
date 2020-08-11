@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')
<!-- /top navigation -->
<!-- start now section -->


<!-- banner section -->
<div class="wf-banner-sec wf-slider-sec">
	<div class="container-fluid">
		<div class="row">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="{{ asset('frontend/images/slider2.jpg') }}" alt="First slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="{{ asset('frontend/images/slider1.jpg') }}" alt="Second slide">
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="{{ asset('frontend/images/slider.jpg') }}" alt="Third slide">
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
				</a>
			</div>
			<div class="carousel-caption">
				<h3 class="mb-0">Take programs tailored to</h3>
				<h3>your fitness level</h3>
				<p class="mb-0">Take a workout of 10, 30 or 60 minutes anywhere</p>
				<p> you are when you want.</p>
			</div>
		</div>
	</div>
</div>
<!-- End of banner section -->
<!-- blog sectio -->
<div class="wf-blog-sec">
	<div class="container">
		<div class="row">
		@if($blogs)
		@foreach($blogs as $value)
			<div class="col-md-6">
				<div class="blog-section">
					<div class="blog-img-sec">
						<a href="{{ url('blog-details',$value['url_alias']) }}"><img src="{{ $value['blogimage'] }}" alt="img"></a>
					</div>
					<div class="blog-detail-sec">
						<a href="javascript:void(0);">{{ $value['tag'] }}</a>
						<h4>{{ $value['title'] }}</h4>

						{!! \Illuminate\Support\Str::limit($value['description'], 150, $end='...') !!}
					</div>
				</div>
			</div>
		@endforeach
		@endif
		</div>
	</div>
</div>
<!-- End of the blog section -->
<!-- get access section-->
<div class="wf-get-access give-new-way-sec space">
	<div class="container-fluid">
		<div class="row">
			<div class="text-center get-section">
				<h2>We give a new way to wellness so be well be wellfit together</h2>
				<p class="p1">Get the benefits of being fit check out our app here. </p>
				<div class="social-icon">
					<img src="{{ asset('frontend/images/apple-store.png') }}" class="apple">
					<img src="{{ asset('frontend/images/googleapp.png') }}" class="googleapp">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of get access -->

<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->

@endsection