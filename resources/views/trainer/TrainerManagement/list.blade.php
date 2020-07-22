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
			<div class="page-title">
				<div class="title_left">
					<h3>@lang('backend/list.trainers_management')</h3>
				</div>
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<a href="{{ route('trainerManagement.create') }}">
						<button type="button" class="btn btn-success add-new-btn">@lang('backend/list.add_new')</button>
						</a>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="x_panel">
						@if(session()->has('success_msg'))
						<div class="alert alert-success">
							{{ session()->get('success_msg') }}
						</div>
						@endif
						@if(session()->has('error_msg'))
						<div class="alert alert-danger">
							{{ session()->get('error_msg') }}
						</div>
						@endif
						<div class="x_title">
							<h2>@lang('backend/list.list')</h2>
							<div class="clearfix"></div>
						</div>
						<div class="x_content">
							<table id="datatable-buttons" class="table table-striped table-bordered trainermanagement-cls">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Contact No</th>
										<th>Gender</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($trainers)
										@foreach($trainers as $trainer)
										<tr>
											<td>{{ ucfirst($trainer['name']) }} {{ ucfirst($trainer['sur_name']) }}</td>
											<td>{{ $trainer['email'] }}</td>
											<td>{{ $trainer['contact_no'] }}</td>
											<td>{{ $trainer['gender'] }}</td>
											<td>
												@if($trainer['status'] == 1)
												<span class="label label-success">Active</span>
												@elseif($trainer['status'] == 2)
												<span class="label label-danger">Inactive</span>
												@else
												<span class="label label-warning">Pending</span>
												@endif
											</td>
											<td>
												<a href="{{ route('trainerManagement.show',$trainer['id']) }}"><i class="fa fa-eye"></i> View</a>
												<a href="{{ route('trainerManagement.edit',$trainer['id']) }}"><i class="fa fa-edit"></i> Edit</a>
												<a href="javascript:void(0);" data-id="{{ $trainer['id'] }}" class="deleteTrainer">
												<i class="fa fa-trash"></i> Delete
												</a>
												@if($trainer['tranier_approved'] == 0)
													<a href="{{ url('trainerManagement/apporved',$trainer['id']) }}"><i class="fa fa-check" aria-hidden="true"></i> Approved</a>
												@endif
											</td>
										</tr>
										@endforeach
									@endif
								</tbody>
							</table>
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
