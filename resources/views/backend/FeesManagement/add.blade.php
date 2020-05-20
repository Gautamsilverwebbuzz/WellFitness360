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
						<h2>@lang('backend/list.forms.add_fees')</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="javascript:void(0);">Settings 1</a>
									</li>
									<li><a href="javascript:void(0);">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="feesForm" action="{{ route('FeesManagement.store') }}"  method="post" class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Trainer</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="trainername" name="trainername" class="form-control">
										<option value="">Select Trainer</option>
										@foreach($trainers as $trainer)
											<option value="{{ $trainer['id'] }}">{{ ucfirst($trainer['name']) }} {{ ucfirst($trainer['sur_name']) }}</option>
										@endforeach
									</select>
									<small class="text-danger">{{ $errors->first('trainername') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="trainerfee">TrainerFee <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="trainerfee" name="trainerfee" value="{{ old('trainerfee') }}" class="form-control col-md-7 col-xs-12" placeholder="Enter TrainerFee">
									<small class="text-danger">{{ $errors->first('trainerfee') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label for="admidfee" class="control-label col-md-3 col-sm-3 col-xs-12">AdminFee</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="admidfee" value="{{ old('admidfee') }}" id="admidfee" class="form-control col-md-7 col-xs-12" placeholder="Enter AdmidFee">
									<small class="text-danger">{{ $errors->first('admidfee') }}</small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="form-group">
								<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
									<button class="btn btn-primary" type="button">Cancel</button>
									<button class="btn btn-primary" type="reset">Reset</button>
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