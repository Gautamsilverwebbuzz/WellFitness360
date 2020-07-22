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
						<h2>@lang('backend/list.forms.edit_blog')</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="editblogForm" action="{{ route('blogManagement.update',$blog['id']) }}"  method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							{{ method_field("PUT")}}
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="title" value="{{ $blog['title'] }}" id="title" class="form-control col-md-7 col-xs-12" placeholder="Enter Title">
									<small class="text-danger">{{ $errors->first('title') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="blogtag">Tag <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="blogtag" name="blogtag" value="{{ $blog['tag'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Tag">
									<small class="text-danger">{{ $errors->first('blogtag') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="image" id="image" class="form-control col-md-7 col-xs-12" value="{{ $blog['blogimage'] }}">
									<small class="text-danger">{{ $errors->first('image') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_categories_image">
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="{{ asset($blog['blogimage']) }}" alt="" width="100px;" height="100px;">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="url_alias">URL alias <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="url_alias" id="url_alias" class="form-control col-md-7 col-xs-12" value="{{ $blog['url_alias'] }}">
									<small class="text-danger">{{ $errors->first('url_alias') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="blog_desc">Description<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="blog_desc" id="blog_desc" class="form-control col-md-7 col-xs-12" placeholder="Enter Description">{{ $blog['description'] }}</textarea>
									<small class="text-danger descerror">{{ $errors->first('blog_desc') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" @if($blog['status'] == 1) selected @endif>Active</option>
										<option value="0" @if($blog['status'] == 0) selected @endif>Inactive</option>
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