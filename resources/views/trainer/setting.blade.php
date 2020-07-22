@extends('backend.layouts.app')
@section('content')
<div class="main_container">
	@include('backend.templates.sidebar')
	<!-- top navigation -->
	@include('backend.templates.header')
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
						<h2>@lang('backend/list.forms.Setting')</h2>
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
					<form id="settingForm" action="{{ url('/setting/update')}}"  method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							 {{ method_field('PUT') }}
							<div class="form-group">
							<div class="form-group">
								<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="email" value="{{ $Setting['Email'] }}" id="email" class="form-control col-md-7 col-xs-12" placeholder="Enter email address">
									<small class="text-danger">{{ $errors->first('email') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label for="contact_no" class="control-label col-md-3 col-sm-3 col-xs-12">PhoneNumber</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="contact_no" value="{{ $Setting['PhoneNumber'] }}" id="contact_no" maxlength="10" class="form-control col-md-7 col-xs-12" placeholder="Enter PhoneNumber">
									<small class="text-danger">{{ $errors->first('contact_no') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="SiteName">SiteName <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="SiteName" value="{{ $Setting['SiteName'] }}" id="SiteName" class="form-control col-md-7 col-xs-12" placeholder="Enter Name">
									<small class="text-danger">{{ $errors->first('SiteName') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Sitelogo">Sitelogo <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="Sitelogo" id="Sitelogo" class="form-control col-md-7 col-xs-12">
									<small class="text-danger">{{ $errors->first('Sitelogo') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Sitelogo">
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="{{ asset($Setting['SiteLogo']) }}" height="100px" width="100px" />
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Favicon">Favicon <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="Favicon" id="Favicon" class="form-control col-md-7 col-xs-12">
									<small class="text-danger">{{ $errors->first('Favicon') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Favicon">
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="{{ asset($Setting['Favicon']) }}" height="100px" width="100px" />
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="StripApiKey">StripApiKey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="StripApiKey" name="StripApiKey" value="{{ $Setting['StripApiKey'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter StripApiKey">
									<small class="text-danger">{{ $errors->first('StripApiKey') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="StripSercetKey">StripSercetKey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="StripSercetKey" name="StripSercetKey" value="{{ $Setting['StripSercetKey'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter StripSercetKey">
									<small class="text-danger">{{ $errors->first('StripSercetKey') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="PaypalApiKey">PaypalApiKey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="PaypalApiKey" name="PaypalApiKey" value="{{ $Setting['PaypalApiKey'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter PaypalApiKey">
									<small class="text-danger">{{ $errors->first('PaypalApiKey') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="PaypalSercetKey">PaypalSercetKey <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="PaypalSercetKey" name="PaypalSercetKey" value="{{ $Setting['PaypalSercetKey'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter PaypalSercetKey">
									<small class="text-danger">{{ $errors->first('PaypalSercetKey') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Copyright">Copyright <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="Copyright" name="Copyright" value="{{ $Setting['Copyright'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Copyright">
									<small class="text-danger">{{ $errors->first('Copyright') }}</small>
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
@include('backend.templates.footer')
<!-- /footer content -->
</div>
@endsection
