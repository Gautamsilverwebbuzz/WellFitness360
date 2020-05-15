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
                  <h2>Add Roles & Permission</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="rolesPermissionForm" action="{{ route('rolepermission.store') }}" method="post" class="form-horizontal form-label-left">
                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="name" name="name" class="form-control col-md-7 col-xs-12">
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Display Name</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="description" class="form-control" name="description"></textarea>
                        <small class="text-danger">{{ $errors->first('description') }}</small>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Permissions</label>
                        <div class="x_content">
                            <span class="permissionError"></span>
                            <table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>Permission Name</th>
                                  <th>All</th>
                                  <th>Create</th>
                                  <th>Update</th>
                                  <th>View</th>
                                  <th>Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @if($moduleList)
                                    @foreach($moduleList as $module)
                                    <tr>
                                        <td>{{ ucfirst($module['display_name'])  }}</td>
                                        <td><input type="checkbox" class="flat" name="permission[]" id="permission" value="all_{{ $module['name'] }}"></td>
                                        <td><input type="checkbox" class="flat" name="permission[]" id="permission" value="create_{{ $module['name'] }}"></td>
                                        <td><input type="checkbox" class="flat" name="permission[]" id="permission" value="update_{{ $module['name'] }}"></td>
                                        <td><input type="checkbox" class="flat" name="permission[]" id="permission" value="view_{{ $module['name'] }}"></td>
                                        <td><input type="checkbox" class="flat" name="permission[]" id="permission" value="delete_{{ $module['name'] }}"></td>
                                    </tr>
                                    @endforeach
                                  @endif
                              </tbody>
                            </table>
                          </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button">Cancel</button>
                        <button class="btn btn-primary" type="reset">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
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
