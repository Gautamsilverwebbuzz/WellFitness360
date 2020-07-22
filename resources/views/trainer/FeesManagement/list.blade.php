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
					<h3>@lang('backend/list.fees_management')</h3>
				</div>
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<a href="{{ route('FeesManagement.create') }}">
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
							<table id="datatable-buttons" class="table table-striped table-bordered">
								<thead>
									<tr>
										<th>Trainer Name</th>
										<th>Trainer Fee</th>
										<th>Admin Fee</th>
										<th>Total Amount</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@foreach($fees as $fee)
										<tr>
											<td>{{ $fee->trainer['name'] }} {{ $fee->trainer['sur_name'] }}</td>
											<td>{{ $fee['TrainerFee'] }}</td>
											<td>{{ $fee['AdminFee'] }}</td>
											<td>{{ $fee['TotalAmount'] }}</td>
											<td>
											<a href="{{ route('FeesManagement.edit',$fee['ID']) }}"><i class="fa fa-edit"></i> Edit</a>
											<a href="javascript:void(0);" data-id="{{ $fee['ID'] }}" class="deleteFees">
											<i class="fa fa-trash"></i> Delete
											</a>
										</td>
										</tr>
									@endforeach
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
