@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
@include('trainer.templates.sidebar')
<!-- top navigation -->
@include('trainer.templates.header')
<!-- /top navigation -->
<!-- page content -->

<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Edit Availability</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form id="availabilityForm" name="availabilityForm" action="{{ route('availability.update',$editAvailability['id']) }}"  method="post" class="form-horizontal form-label-left">
						{{ method_field('PUT') }}
						<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }} ">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Date
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="date" name="date" value="{{ date('m/d/Y',strtotime($editAvailability['date'])) }}" class="form-control col-md-7 col-xs-12" placeholder="Enter date" autocomplete="off">
								<small class="text-danger">{{ $errors->first('date') }}</small>
							</div>
						</div>
						<div class="form-group">
							<label for="start_time" class="control-label col-md-3 col-sm-3 col-xs-12">Start Time</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="start_time" value="{{ $editAvailability['start_time'] }}" id="start_time" class="form-control col-md-7 col-xs-12" placeholder="Enter start time" autocomplete="off">
								<small class="text-danger">{{ $errors->first('start_time') }}</small>
							</div>
						</div>
						<div class="form-group">
							<label for="end_time" class="control-label col-md-3 col-sm-3 col-xs-12">End Time</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="end_time" value="{{ $editAvailability['end_time'] }}" id="end_time" class="form-control col-md-7 col-xs-12" placeholder="Enter end time" autocomplete="off">
								<small class="text-danger">{{ $errors->first('end_time') }}</small>
							</div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
							<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
								<button type="submit" class="btn btn-success">Submit</button>
								<button class="btn btn-primary" type="button" onclick="window.history.go(-1); return false;">@lang('backend/list.forms.back')</button>
							</div>
						</div>
					</form>
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