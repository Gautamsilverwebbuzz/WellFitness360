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
						<h2>@lang('backend/list.forms.add_categories')</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="categoreiesForm" action="{{ url('categoriesManagement') }}"  method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="categories_name">Categories Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="categories_name" value="{{ old('categories_name') }}" id="categories_name" class="form-control col-md-7 col-xs-12" placeholder="Enter Categories Name">
									<small class="text-danger">{{ $errors->first('categories_name') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="categories_desc">Categories Description <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="categories_desc" name="categories_desc" value="{{ old('categories_desc') }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Categories Description">
									<small class="text-danger">{{ $errors->first('categories_desc') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="categories_image">Categories Image <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="categories_image" id="categories_image" class="form-control col-md-7 col-xs-12">
									<small class="text-danger">{{ $errors->first('categories_image') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" @if(old('status') == 1) selected @endif>Active</option>
										<option value="0" @if(old('status') == 0) selected @endif>Inactive</option>
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