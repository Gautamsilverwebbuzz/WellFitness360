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
						<h2>@lang('backend/list.change_password')</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
                    <br />
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
					<form id="trainerchangePassword" method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
							<div class="form-group">
								<label for="old_password" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.old_password')</label>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" name="old_password" id="old_password" class="form-control col-md-7 col-xs-12" placeholder="Enter your old password">
									<small class="text-danger">{{ $errors->first('old_password') }}</small>
								</div>
                            </div>
                            <div class="form-group">
								<label for="new_password" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.new_password')</label>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" name="new_password" id="new_password" class="form-control col-md-7 col-xs-12" placeholder="Enter your new password">
									<small class="text-danger">{{ $errors->first('new_password') }}</small>
								</div>
                            </div>
                            <div class="form-group">
								<label for="confirm_password" class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.confirm_password')</label>
								<div class="col-md-3 col-sm-3 col-xs-6">
									<input type="text" name="confirm_password" id="confirm_password" class="form-control col-md-7 col-xs-12" placeholder="Enter your confirm password">
									<small class="text-danger">{{ $errors->first('confirm_password') }}</small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button class="btn btn-primary" type="button" onclick="window.history.go(-1); return false;">Back</button>
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