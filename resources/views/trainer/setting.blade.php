@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
	@include('trainer.templates.sidebar')
	<!-- top navigation -->
	@include('trainer.templates.header')
	<!-- /top navigation -->
	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Trainer Setting</h2>
						<div class="clearfix"></div>
					</div>
					@if(session()->has('success_msg'))
						<div class="alert alert-success alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{ session()->get('success_msg') }}
						</div>
					@endif

					@if(session()->has('error_msg'))
						<div class="alert alert-danger alert-dismissible">
							<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							{{ session()->get('error_msg') }}
						</div>
					@endif
					<div class="x_content">
					<br />
						<form id="trainersettingForm" action="{{ url('trainer/setting/update')}}"  method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
								<label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12">Contact no</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="contact_no" value="{{ $trainer_Setting['Contactno'] }}" id="contact_no" class="form-control col-md-7 col-xs-12" placeholder="Enter Contact no">
									<small class="text-danger">{{ $errors->first('contact_no') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="facebook_url">Facebook URL
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="facebook_url" value="{{ $trainer_Setting['Facebook_url'] }}" id="facebook url" class="form-control col-md-7 col-xs-12" placeholder="Enter Facebook URL">
									<small class="text-danger">{{ $errors->first('facebook_url') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="instagram_url">Instagram URL
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="instagram_url" name="instagram_url" value="{{ $trainer_Setting['Instgram_url'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Instagram URL">
									<small class="text-danger">{{ $errors->first('instagram_url') }}</small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /page content -->
<!-- footer content -->
@include('trainer.templates.footer')
<!-- /footer content -->
</div>
@endsection