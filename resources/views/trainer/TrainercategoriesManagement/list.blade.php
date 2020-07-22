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
                <h3>@lang('backend/sidebar.trainer_categories_management')</h3>
            </div>
            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                {{--  <a href="{{ route('module.create') }}"<button type="button" class="btn btn-success add-new-btn">Add New</button></a>  --}}
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
                  <h2>List</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="{{ route('trainercategoriesManagement.create') }}"<button type="button" class="btn btn-success">Add New Categories</button></a>
                    <div id="tree_1" class="tree-demo">
                        {{!!$showcat!!}}
                    </div>


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
