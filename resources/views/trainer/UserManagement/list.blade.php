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
					<h3>@lang('backend/list.user_management')</h3>
				</div>
				<div class="title_right">
					<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
						<a href="{{ route('UserManagement.create') }}">
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
										<th>Name</th>
										<th>Email</th>
										<th>Contact No</th>
										<th>Gender</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									@if($users)
									@foreach($users as $user)
									<tr>
										<td>{{ ucfirst($user['name']) }} {{ ucfirst($user['sur_name']) }}</td>
										<td>{{ $user['email'] }}</td>
										<td>{{ $user['contact_no'] }}</td>
										<td>{{ $user['gender'] }}</td>
										<td>
											@if($user['status'] == 1)
											<span class="label label-success">Active</span>
											@elseif($user['status'] == 2)
											<span class="label label-danger">Inactive</span>
											@else
											<span class="label label-warning">Pending</span>
											@endif
										</td>
										<td>
											<a href="{{ route('UserManagement.edit',$user['id']) }}"><i class="fa fa-edit"></i> Edit</a>
											<a href="javascript:void(0);" data-id="{{ $user['id'] }}" class="deletUser">
											<i class="fa fa-trash"></i> Delete
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
