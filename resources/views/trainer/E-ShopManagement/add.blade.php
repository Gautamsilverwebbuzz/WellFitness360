@extends('backend.layouts.app')

@section('content')

<div class="main_container">
    @include('backend.templates.sidebar')

    <!-- top navigation -->
    @include('backend.templates.header')
    <!-- /top navigation -->
    @php
        $Status = ['1' => 'Active', '0' => 'InActive'];
    @endphp
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>@lang('backend/list.forms.add_shop_detail')</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="addEshopForm" action="{{ route('E_shopManagement.store') }}" method="post" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.name')<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="Name" id="Name" value="{{ old('Name') }}" class="form-control col-md-7 col-xs-12" placeholder="Enter shop name">
                        <small class="text-danger">{{ $errors->first('Name') }}</small>
                      </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.description')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="Description" class="form-control" rows="3" placeholder="Enter shop description">{{ old('Description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.image')<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" name="Image" value="" id="shop-image" class="form-control col-md-7 col-xs-12" placeholder="Select image">
                            <small class="text-danger">{{ $errors->first('Image') }}</small>
                        </div>
                    </div>
                    <div class="form-group image_preview">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <img id="ImagePreview" src="@if(isset($shopData['Image'])){{asset($shopData['Image'])}}@endif" alt="No image uploaded" height="100px"/ >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">@lang('backend/list.forms.website_url')
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="Shop_URL" value="{{ old('Shop_URL') }}" id="Shop_URL" class="form-control col-md-7 col-xs-12" placeholder="www.mywebsiteurl.com">
                            <small class="text-danger">{{ $errors->first('Shop_URL') }}</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.status')</label>
                        <div class="col-md-6 col-sm-6 col-xs-9">
                            <select class="form-control" name="Status">
                                @if($Status)
                                @foreach ($Status as $key => $Status)
                                    <option value="{{$key}}" @if(old('Status') == $key) selected @endif>{{$Status}}</option>
                                @endforeach
                                @endif

                            </select>
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
