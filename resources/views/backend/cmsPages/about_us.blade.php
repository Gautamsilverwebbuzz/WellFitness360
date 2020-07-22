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
                  <h2>@lang('backend/list.forms.about_us_content')</h2>
                  <div class="clearfix"></div>
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
                </div>
                <div class="x_content">
                  <br />
                  <form id="aboutUsForm" action="{{ url('admin/cms_aboutus') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.title')<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Title" value="@if(isset($about_us->Title) && !empty($about_us->Title)){{$about_us->Title}}@endif" id="title" class="form-control col-md-7 col-xs-12" placeholder="Enter title">
                        <small class="text-danger">{{ $errors->first('Title') }}</small>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.short_description')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="ShortDescription" class="form-control" rows="3" placeholder="Enter short description">@if(isset($about_us->ShortDescription) && !empty($about_us->ShortDescription)){{$about_us->ShortDescription}}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.long_description')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="LongDescription" class="form-control" rows="3" placeholder="Enter long description">@if(isset($about_us->LongDescription) && !empty($about_us->LongDescription)){{$about_us->LongDescription}}@endif</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.image')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" name="Image" value="" id="about-us-image" class="form-control col-md-7 col-xs-12" placeholder="Select image">
                          <small class="text-danger">{{ $errors->first('image') }}</small>
                        </div>
                      </div>
                      <div class="form-group image_preview">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img id="ImagePreview" src="@if(isset($about_us->Image)){{asset($about_us->Image)}}@endif" alt="No image uploaded" height="100px"/ >
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
