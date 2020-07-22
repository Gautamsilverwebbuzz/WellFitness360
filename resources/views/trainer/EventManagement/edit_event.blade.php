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
						<h2>@lang('backend/list.forms.edit_event')</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="eventForm" action="{{ route('eventManagement.update',$event['ID']) }}"  method="post" class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							{{ method_field('PUT') }}
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Event Name">Event Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="eventname" value="{{ $event['Event_name'] }}" id="eventname" class="form-control col-md-7 col-xs-12" placeholder="Enter Event Name">
									<small class="text-danger">{{ $errors->first('eventname') }}</small>
								</div>
							</div>
							@php
								$eventcode = Str::random(8);
							@endphp
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="Event Name">Live Code
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="livecode" value="{{ $event['Event_code'] }}" id="livecode" class="form-control col-md-7 col-xs-12" readonly="readonly">
									<small class="text-danger">{{ $errors->first('livecode') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="start_date">Start Date <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="start_date" name="start_date" value="{{ $event['start_date'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter start date">
									<small class="text-danger">{{ $errors->first('start_date') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">End Date</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="end_date" value="{{ $event['end_date'] }}" id="end_date" class="form-control col-md-7 col-xs-12" placeholder="Enter end date">
									<small class="text-danger">{{ $errors->first('end_date') }}</small>
								</div>
							</div>
							@php 
								$trainer_id = json_decode($event['Trainer_id'])
							@endphp
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Trainer</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="trainer" name="trainer[]" class="form-control" multiple="multiple">
									@foreach($users as $val)
										<option value="{{ $val['id'] }}" @if(in_array($val['id'],$trainer_id)) selected @endif>{{ $val['name'] }} {{ $val['sur_name'] }}</option>
									@endforeach
									</select>
									<small class="text-danger event-error">{{ $errors->first('trainer') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="event_desc">Event Description<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="event_desc" id="event_desc" class="form-control col-md-7 col-xs-12" placeholder="Enter Event Description">{{ $event['Event_desc']}}</textarea>
									<small class="text-danger event_desc_error">{{ $errors->first('event_desc') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" @if($event['status'] == 1) selected @endif>Active</option>
										<option value="2" @if($event['status'] == 2) selected @endif>Inactive</option>
									</select>
									<small class="text-danger">{{ $errors->first('status') }}</small>
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
</div>
<!-- /page content -->
<!-- footer content -->
@include('backend.templates.footer')
<!-- /footer content -->
</div>
@endsection