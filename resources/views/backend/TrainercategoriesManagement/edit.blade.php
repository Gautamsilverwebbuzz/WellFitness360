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
						<h2>Edit Trainer Categories</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="categoryForm" action="{{ url('admin/trainercategoriesManagement/update/'.$RowData['trainer_cat_id']) }}" method="POST" class="form-horizontal form-label-left">
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Parent Categories</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="categoryList" class="form-control valid edit-category" aria-invalid="false">
										<option value="">Select category name</option>
										<option value="0">None</option>
										{{!!$categoryList!!}}
									</select>
									<small class="text-danger"></small>
									<small class="text-danger">{{ $errors->first('categoryList') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Categories Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="trainer_cat_name" value="{{ $RowData['trainer_cat_name'] }}" id="cat_name" class="form-control col-md-7 col-xs-12" placeholder="Please enter trainer categories name">
									<small class="text-danger">{{ $errors->first('trainer_cat_name') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Parent Categories</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="status" class="form-control valid" aria-invalid="false">
										<option value="">Select status</option>
										<option value="1" @if($RowData['status'] == 1) selected @endif>Active</option>
										<option value="0" @if($RowData['status'] == 0) selected @endif>InActive</option>
									</select>
									<small class="text-danger"></small>
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
<script type="text/javascript">
	var categoryid = '<?php echo $RowData["par_cat_id"];?>';
</script>
<!-- footer content -->
@include('backend.templates.footer')
<!-- /footer content -->
</div>
@endsection