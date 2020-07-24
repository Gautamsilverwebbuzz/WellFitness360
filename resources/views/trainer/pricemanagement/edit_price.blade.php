@extends('trainer.layouts.app')
@section('content')
<div class="main_container">
@include('trainer.templates.sidebar')
<!-- top navigation -->
@include('trainer.templates.header')
<!-- /top navigation -->
<!-- page content -->

<div class="right_col" role="main">
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Edit Price</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<form id="priceform" name="priceform" action="{{ route('price.update',$edit_price['id']) }}"  method="post" class="form-horizontal form-label-left">
						{{ method_field('PUT') }}
						<input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token() }} ">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="title" name="title" value="{{ $edit_price['title'] }}" class="form-control col-md-7 col-xs-12" placeholder="Enter title">
								<small class="text-danger">{{ $errors->first('title') }}</small>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Select Skiils</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="categoryList" name="categoryList" class="form-control valid" aria-invalid="false">
									<option value="">Select skils</option>
									{!! $categoryList !!}
								</select>
								<small class="text-danger">{{ $errors->first('categoryList') }}</small>
							</div>
						</div>
						<div class="form-group">
							<label for="price" class="control-label col-md-3 col-sm-3 col-xs-12">Price</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="price" value="{{ $edit_price['price'] }}" id="price" class="form-control col-md-7 col-xs-12" placeholder="Enter price">
								<small class="text-danger">{{ $errors->first('price') }}</small>
							</div>
						</div>
						<div class="form-group">
							<label for="duration" class="control-label col-md-3 col-sm-3 col-xs-12">Duration</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select id="duration" name="duration" class="form-control valid" aria-invalid="false">
									<option value="">Select duration</option>
									<option value="Hourly" @if($edit_price['duration'] == 'Hourly') selected @endif>Hourly</option>
									<option value="Day" @if($edit_price['duration'] == 'Day') selected @endif>Day</option>
									<option value="Weekly" @if($edit_price['duration'] == 'Weekly') selected @endif>Weekly</option>
									<option value="Monthly" @if($edit_price['duration'] == 'Monthly') selected @endif>Monthly</option>
								</select>
								<small class="text-danger">{{ $errors->first('duration') }}</small>
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

<!-- /page content -->
<!-- footer content -->
@include('trainer.templates.footer')
<!-- /footer content -->
</div>
@endsection