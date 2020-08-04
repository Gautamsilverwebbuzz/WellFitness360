@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
@include('trainer.templates.sidebar')
<!-- top navigation -->
@include('trainer.templates.header')


<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Availability Management</h3>
			</div>
			<div class="title_right">
				<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
					<button type="button" class="btn btn-success add-new-btn" data-toggle="modal" data-target="#add_availability">@lang('backend/list.add_new')</button>
					<!-- <button type="button" class="btn btn-success add-new-btn">@lang('backend/list.add_new')</button> -->
					<!-- <a href="{{ url('trainer/availability/create') }}">
					</a> -->
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
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
					<div class="x_title">
						<h2>@lang('backend/list.list')</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-md-3">
								<p>Gautam Patel</p>
							</div>
							<div class="col-md-9">
								@if($trainerAvailabilitys)
									@foreach($trainerAvailabilitys as $trainerAvailability)
										<a href="javascript:void(0);" class="timeavailability-cls" data-start="{{ $trainerAvailability['start_time'] }}" data-end="{{ $trainerAvailability['end_time'] }}" data-id="{{ $trainerAvailability['id'] }}">{{ $trainerAvailability['start_time'] }} - {{ $trainerAvailability['end_time'] }}</a>
									@endforeach
								@endif
							</div>
						</div>
						<!-- <table id="availability-table" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Date</th>
									<th>Start Time</th>
									<th>End Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@if($trainerAvailabilitys)
									@foreach($trainerAvailabilitys as $trainerAvailability)
										<tr>
											<td>{{ $loop->iteration }}</td>	
											<td>{{ date('d/m/Y',strtotime($trainerAvailability['date'])) }}</td>
											<td>{{ $trainerAvailability['start_time'] }}</td>
											<td>{{ $trainerAvailability['end_time'] }}</td>
											<td>
												<a href="{{ route('availability.edit',$trainerAvailability['id']) }}"><i class="fa fa-edit"></i> Edit</a>
												<a href="javascript:void(0);" data-id="{{ $trainerAvailability['id'] }}" class="deletTraineravailability">
												<i class="fa fa-trash"></i> Delete
												</a>
											</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade assign-modal user-assign-model" id="add_availability" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Add Availability</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="availabilityForm" name="availabilityForm" method="post" class="form-horizontal form-label-left">
					<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }} ">
					<div class="form-group">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="category" name="category" class="form-control">
								<option value="">Select Categories</option>
								@foreach($trainer_categories as $val)
									<option value="{{ $val[0]['trainer_cat_id'] }}">{{ $val[0]['trainer_cat_name'] }}</option>
								@endforeach
							</select>
							<!-- <input type="text" name="category" value="{{ old('category') }}" id="category" class="form-control col-md-7 col-xs-12 category" placeholder="Enter Category" autocomplete="off"> -->
							<small class="text-danger">{{ $errors->first('category') }}</small>
						</div>Z
					</div>
					<div class="form-group">
						<label for="start_time" class="control-label col-md-3 col-sm-3 col-xs-12">Start Time</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="start_time" value="{{ old('start_time') }}" id="start_time" class="form-control col-md-7 col-xs-12 start_time" placeholder="Enter start time" autocomplete="off">
							<small class="text-danger">{{ $errors->first('start_time') }}</small>
						</div>
					</div>
					<div class="form-group">
						<label for="end_time" class="control-label col-md-3 col-sm-3 col-xs-12">End Time</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="end_time" value="{{ old('end_time') }}" id="end_time" class="form-control col-md-7 col-xs-12" placeholder="Enter end time" autocomplete="off">
							<small class="text-danger">{{ $errors->first('end_time') }}</small>
						</div>
					</div>
					<div class="form-group">
						<label for="duration" class="control-label col-md-3 col-sm-3 col-xs-12">Duaration</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="duration" value="{{ old('duration') }}" id="duration" class="form-control col-md-7 col-xs-12 duration" placeholder="Enter Duaration" autocomplete="off">
							<small class="text-danger">{{ $errors->first('duration') }}</small>
						</div>
					</div>
					<div class="form-group">
						<label for="Price" class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="Price" value="{{ old('Price') }}" id="Price" class="form-control col-md-7 col-xs-12 Price" placeholder="Enter Price" autocomplete="off">
							<small class="text-danger">{{ $errors->first('Price') }}</small>
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

<div class="modal fade assign-modal user-assign-model" id="edit_availability" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h2 class="modal-title" id="exampleModalLabel">Edit Availability</h2>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="editavailabilityForm" name="editavailabilityForm" method="post" class="form-horizontal form-label-left">
					<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }} ">
					<div class="form-group">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="category" name="category" class="form-control">
								<option value="">Select Categories</option>
								@foreach($trainer_categories as $val)
									<option value="{{ $val[0]['trainer_cat_id'] }}">{{ $val[0]['trainer_cat_name'] }}</option>
								@endforeach
							</select>
							<!-- <input type="text" name="category" value="{{ old('category') }}" id="category" class="form-control col-md-7 col-xs-12 category" placeholder="Enter Category" autocomplete="off"> -->
							<small class="text-danger">{{ $errors->first('category') }}</small>
						</div>
					</div>
					<div class="form-group">
						<label for="start_time" class="control-label col-md-3 col-sm-3 col-xs-12">Start Time</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="start_time" value="" id="edit_start_time" class="form-control col-md-7 col-xs-12 start_time" placeholder="Enter start time" autocomplete="off">
							<small class="text-danger">{{ $errors->first('start_time') }}</small>
						</div>
					</div>
					<div class="form-group">
						<label for="end_time" class="control-label col-md-3 col-sm-3 col-xs-12">End Time</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" name="end_time" value="" id="edit_end_time" class="form-control col-md-7 col-xs-12" placeholder="Enter end time" autocomplete="off">
							<small class="text-danger">{{ $errors->first('end_time') }}</small>
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

<!-- /page content -->
<!-- footer content -->
@include('trainer.templates.footer')
<!-- /footer content -->
</div>
@endsection