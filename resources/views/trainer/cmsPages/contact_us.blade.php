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
                  <h2>@lang('backend/list.forms.contact_us_content')</h2>
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
                  <form id="contactUsForm" action="{{ route('cms_contactus') }}" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.email')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="email" name="Email" value="@if(isset($contact_us->Email) && !empty($contact_us->Email)){{$contact_us->Email}}@endif" class="form-control has-feedback-left" placeholder="Email">
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('Email') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.contact_no')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" name="ContactNumber" value="@if(isset($contact_us->ContactNumber) && !empty($contact_us->ContactNumber)){{$contact_us->ContactNumber}}@endif" maxlength="10" class="form-control" placeholder="Enter contact number">
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('ContactNumber') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">@lang('backend/list.forms.telephone_no')</label>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <input type="text" name="Telephone" value="@if(isset($contact_us->Telephone) && !empty($contact_us->Telephone)){{$contact_us->Telephone}}@endif"  class="form-control" data-inputmask="'mask' : '(999) 999-9999'">
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                            <small class="text-danger">{{ $errors->first('Telephone') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.website')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="Website" value="@if(isset($contact_us->Website) && !empty($contact_us->Website)){{$contact_us->Website}}@endif" id="title" class="form-control col-md-7 col-xs-12" placeholder="Enter title">
                            <small class="text-danger">{{ $errors->first('Website') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.address')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="Address" class="form-control" rows="3" placeholder="Enter address">@if(isset($contact_us->Address) && !empty($contact_us->Address)){{$contact_us->Address}}@endif</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.description')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="Description" class="resizable_textarea form-control" placeholder="Enter description">@if(isset($contact_us->Description) && !empty($contact_us->Description)){{$contact_us->Description}}@endif</textarea>
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
