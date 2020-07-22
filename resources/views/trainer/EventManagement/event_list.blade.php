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
					<h3>@lang('backend/list.event_management')</h3>
				</div>
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<a href="{{ route('eventManagement.create') }}">
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
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>EventName</th>
										<th>EventCode</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($events)
										@foreach($events as $event)
										<tr>
											<td>{{ $loop->iteration }}</td>
											<td>{{ $event['Event_name'] }}</td>
											<td>{{ $event['Event_code'] }}</td>
											<td>{{ date("d/m/Y",strtotime($event['start_date'])) }}</td>
											<td>{{ date("d/m/Y",strtotime($event['end_date'])) }}</td>
											<td>
												<a href="{{ route('eventManagement.edit',$event['ID']) }}"><i class="fa fa-edit"></i></a>
												<a href="javascript:void(0);" data-id="{{ $event['ID'] }}" class="deleteEvent">
													<i class="fa fa-trash"></i>
												</a>
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
