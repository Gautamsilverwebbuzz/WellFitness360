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
										@if($trainer_view['profile_image'])
											<img class="img-responsive avatar-view" src="{{ asset($trainer_view['profile_image']) }}" alt="Avatar" title="Change the avatar">
										@elseif($trainer_view['social_profile_image'])
											<img class="img-responsive avatar-view" src="{{ asset( $trainer_view['social_profile_image']) }}" alt="Avatar" title="Change the avatar">
										@else
											<img class="img-responsive avatar-view" src="{{ asset('profile/no_images.jpg') }}" alt="Avatar" title="Change the avatar">
										@endif
									</div>
								</div>
								<h3>{{ ucfirst($trainer_view['name']) }} {{ ucfirst($trainer_view['sur_name']) }}</h3>
								<h4>Skills</h4>
								<ul class="list-unstyled user_data">
									@if(!empty($trainer_categories))
										@foreach($trainer_categories as $val)
											<li>{{ $val[0]['trainer_cat_name'] }}</li>
										@endforeach
									@endif
								</ul>
							</div>
							<div class="col-md-9 col-sm-9 col-xs-12">
								<div class="profile_title">
									<div class="col-md-6">
										<h2>Trainer Availability</h2>
									</div>
								</div>
								<div class="container trainer_avali-clss">
									<div class="row">
										<div class="form-group">
											<div class="col-md-3 col-sm-6 col-xs-12">
												<input type="text" id="serach_date" name="serach_date" value="{{ old('serach_date') }}" class="form-control col-md-7 col-xs-12 serach-availbilty-cls" placeholder="Serach Availability" autocomplete="off" data-id="{{ $trainer_view['id'] }}">
											</div>
										</div>
									</div>
									<div class="row trainer-avila-cls">
										<div class="serach-availability-cls"></div> <!-- don't remove this class -->
										<div class="col-md-9 trainer-avali-cls">
											@if($trainerAvailabilitys)
												@foreach($trainerAvailabilitys as $trainerAvailability)
													<a href="javascript:void(0);" class="timeavailability-cls">{{ $trainerAvailability['start_time'] }} - {{ $trainerAvailability['end_time'] }}</a>
												@endforeach
											@endif
										</div>
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
											{!! $trainer_view['biography'] !!}
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
											{!! $trainer_view['goals'] !!}
										</div>
										<div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
											{!! $trainer_view['experience'] !!}
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