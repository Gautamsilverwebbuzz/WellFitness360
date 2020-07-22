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
						<h2>@lang('backend/list.forms.edit_sub_categories')</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form id="editsubcategoreiesForm" action="{{ route('subcategoriesManagement.update',$subcategories['ID']) }}"  method="post" class="form-horizontal form-label-left" enctype='multipart/form-data'>
							<input type="hidden" name="_token" value="{{ csrf_token() }} ">
							{{ method_field('PUT') }}
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Categories</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="categories_name" name="categories_name" class="form-control">
										<option value="">Select Categories</option>
										@foreach($Categories as $val)
											<option value="{{ $val['ID'] }}" @if ($subcategories['cat_id'] == $val['ID']) selected @endif>{{ $val['cat_Name'] }}</option>
										@endforeach
									</select>
									<small class="text-danger">{{ $errors->first('categories_name') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_categories_name">Sub Categories Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="sub_categories_name" value="{{ $subcategories['Sub_cat_name'] }}" id="sub_categories_name" class="form-control col-md-7 col-xs-12" placeholder="Enter Categories Name">
									<small class="text-danger">{{ $errors->first('sub_categories_name') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_categories_desc">Sub Categories Description <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" id="sub_categories_desc" name="sub_categories_desc" value="{{ $subcategories['Sub_cat_description'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter Categories Description">
									<small class="text-danger">{{ $errors->first('sub_categories_desc') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_categories_image">Sub Categories Image <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="file" name="sub_categories_image" id="sub_categories_image" class="form-control col-md-7 col-xs-12">
									<small class="text-danger">{{ $errors->first('sub_categories_image') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="sub_categories_image">
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<img src="{{ asset($subcategories['Sub_cat_image']) }}" alt="" width="100px;" height="100px;">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="workout_time">Workout Time <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="workout_time" value="{{ $subcategories['workout_time'] }}" id="workout_time" class="form-control col-md-7 col-xs-12" placeholder="Enter Work Out Time">
									<small class="text-danger">{{ $errors->first('workout_time') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="what_wiil_do">What we Will do?<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<textarea name="what_wiil_do" id="what_wiil_do" class="form-control col-md-7 col-xs-12" placeholder="Enter What we will do">{{ $subcategories['what_will_do'] }}</textarea>
									<small class="text-danger whatwilldoerror">{{ $errors->first('what_wiil_do') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="equipment">Equipment<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="equipment" value="{{ $subcategories['equipment'] }}" id="equipment" class="form-control col-md-7 col-xs-12" placeholder="Enter Equipment">
									<small class="text-danger">{{ $errors->first('equipment') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="workout_from">WorkOut From<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<input type="text" name="workout_from" value="{{ $subcategories['workout_from'] }}" id="workout_from" class="form-control col-md-7 col-xs-12" placeholder="Enter Equipment">
									<small class="text-danger">{{ $errors->first('workout_from') }}</small>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Package</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="package" name="package" class="form-control packagecls">
										<option value="">Select Package</option>
										<option value="free" @if($subcategories['package'] == 'free') selected @endif>Free</option>
										<option value="paid" @if($subcategories['package'] == 'paid') selected @endif>Paid</option>
									</select>
									<small class="text-danger">{{ $errors->first('package') }}</small>
								</div>
							</div>
							<div class="freevideo">
								<div class="form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Video <span class="required">*</span>
									</label>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="file" name="video" id="video" class="form-control col-md-7 col-xs-12">
										<small class="text-danger">{{ $errors->first('video') }}</small>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="status" name="status" class="form-control">
										<option value="">Select Status</option>
										<option value="1" @if($subcategories['status'] == 1) selected @endif>Active</option>
										<option value="0" @if($subcategories['status'] == 0) selected @endif>Inactive</option>
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