@extends('backend.layouts.app')

@section('content')
<div class="main_container">
	@include('backend.templates.sidebar')
	<!-- top navigation -->
	@include('backend.templates.header')

	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Trainer Profile</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						<div class="x_content">
							<div class="col-md-3 col-sm-3 col-xs-12 profile_left">
								<div class="profile_img">
									<div id="crop-avatar">
										<img class="img-responsive avatar-view" src="{{ asset('backend/images/picture.jpg') }}" alt="Avatar" title="Change the avatar">
									</div>
								</div>
								<h3>{{ ucfirst($trainer_view['name']) }} {{ ucfirst($trainer_view['sur_name']) }}</h3>
								<h4>Skills</h4>
								<ul class="list-unstyled user_data">
									<li>
										<p>Yoga</p>
									</li>
									<li>
										<p>Training & nutraion</p>
									</li>
								</ul>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="profile_title">
									<div class="col-md-6">
										<h2>Trainer Availability</h2>
									</div>
								</div>
								<div class="container">
									<h4>15-07-2020</h4>
									<div class="col">
										<h5>02:00 - 03:00</h5>
									</div>
									<div class="col">
										<h5>05:00 - 05:00</h5>
									</div>
									<div class="col">
										<h5>07:00 - 08:00</h5>
									</div>
								</div>
								<div class="" role="tabpanel" data-example-id="togglable-tabs">
									<ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
										<li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Biography</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Goals</a>
										</li>
										<li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Experience</a>
										</li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
											<p>Proin quis posuere ex. Vestibulum tempus imperdiet sapien, id mollis lorem posuere nien.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamusut tortor arcu.
											</p>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
											<p>Proin quis posuere ex. Vestibulum tempus imperdiet sapien, id mollis lorem posuere nien.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamusut tortor arcu.
											</p>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
											<p>Proin quis posuere ex. Vestibulum tempus imperdiet sapien, id mollis lorem posuere nien.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamusut tortor arcu.
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- footer content -->
	@include('backend.templates.footer')
	<!-- /footer content -->
</div>
@endsection