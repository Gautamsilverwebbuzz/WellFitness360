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
                        <h2>@lang('backend/list.forms.edit_subscription_plan')</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <form id="userForm" action="{{ route('SubscriptionPlanManagement.update',$plan['id']) }}"  method="post" class="form-horizontal form-label-left">
                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                             {{ method_field('PUT') }}
                             <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.duration')</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="Duration" name="Duration" class="form-control">
                                        <option value="">Select Status</option>
                                        @if($PlanDurations)
                                            @foreach ($PlanDurations as $Duration )
                                                <option value="{{$Duration->id}}" @if($plan['Duration_id'] == $Duration->id) selected @endif>{{ucwords($Duration->duration)}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <small class="text-danger">{{ $errors->first('Duration') }}</small>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Title">@lang('backend/list.forms.title') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="Title" value="{{ucwords($plan['Title'])}}" id="Title" class="form-control col-md-7 col-xs-12" placeholder="Enter Title">
                                    <small class="text-danger">{{ $errors->first('Title') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Amount">@lang('backend/list.forms.amount') <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="Amount" value="{{$plan['Amount']}}" id="Amount" class="form-control col-md-7 col-xs-12" placeholder="Enter Plan Amount">
                                    <small class="text-danger">{{ $errors->first('Amount') }}</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">@lang('backend/list.forms.status')</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="status" name="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="1" @if($plan['Status'] == 1) selected @endif>Active</option>
                                        <option value="2" @if($plan['Status'] == 0) selected @endif>InActive</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('Status') }}</small>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success">@lang('backend/list.forms.submit')</button>
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
