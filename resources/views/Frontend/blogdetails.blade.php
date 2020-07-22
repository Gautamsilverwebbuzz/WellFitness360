@extends('Frontend.layouts.app')
@section('content')

<!-- top navigation -->
@include('Frontend.layouts.header')
<!-- /top navigation -->
<!-- start now section -->


<!-- banner section -->
<div class="wf-banner-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="banner-image">
				<img src="{{ url($blogsdetails['blogimage']) }}" alt="image" class="banner-img">
			</div>
		</div>
	</div>
</div>
<!-- End of banner section -->
<!-- breadcrums -->
<div class="container main-breadcrum">
	<div class="row">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="{{ url('blog') }}">Blog</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{ $blogsdetails['title'] }}</li>
			</ol>
		</nav>
	</div>
</div>
<!-- End of the breadcrums -->
<!-- blog detail -->
<div class="wf-blog-dtail-sec">
	<div class="container">
		<div class="row">
			<div class="blog-main-heading">
				<h3>{{ $blogsdetails['title'] }}</h3>
				<!-- <p class="p1">Take a workout of 10, 30 or 60 minutes anywhere you are when you want.</p> -->
			</div>
			<div class="text-detail mt-4 mb-4">
				{!! $blogsdetails['description'] !!}
			</div>
		</div>
	</div>
</div>
<!-- End of the blog detail -->
<!-- blog box section -->
<div class="wf-blog-detail-box">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="blog-section">
					<div class="blog-img-sec">
						<a href="blog-detail.html"><img src="{{ asset('frontend/images/blog1.jpg') }}" alt="img"></a>
					</div>
					<div class="blog-detail-sec">
						<a href="#">BLOG TAG</a>
						<h4>Take programs tailored to</h4>
						<p>Take a workout of 10, 30 or 60 minutes anywhere.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="blog-section">
					<div class="blog-img-sec">
						<a href="blog-detail.html"><img src="{{ asset('frontend/images/blog2.jpg') }}" alt="img"></a>
					</div>
					<div class="blog-detail-sec">
						<a href="#">BLOG TAG</a>
						<h4>Take programs tailored to</h4>
						<p>Take a workout of 10, 30 or 60 minutes anywhere.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="blog-section">
					<div class="blog-img-sec">
						<a href="blog-detail.html"><img src="{{ asset('frontend/images/blog1.jpg') }}" alt="img"></a>
					</div>
					<div class="blog-detail-sec">
						<a href="#">BLOG TAG</a>
						<h4>Take programs tailored to</h4>
						<p>Take a workout of 10, 30 or 60 minutes anywhere.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End of the blog box section -->
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

<!-- End of get access -->

<!-- Footer -->
@include('Frontend.layouts.footer')
<!-- /Footer -->

@endsection