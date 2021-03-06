{{--  @php
$permissions = [];
if(Auth::user() && Auth::user()->id){
$RolePermission =  Helper::getPermissions(Auth::user()->id);
if($RolePermission && !empty($RolePermission['permission'])){
$permissions = $RolePermission['permission'];
}
}else{
$RolePermission = [];
}
@endphp  --}}
<div class="col-md-3 left_col">
	<div class="left_col scroll-view">
		<div class="navbar nav_title" style="border: 0;">
			<a href="{{ route('/trainer/dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>WellFit360</span></a>
		</div>
		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{ asset('backend/images/img.jpg') }}" alt="logo" class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>{{ (Session::get('user')['name']) ? (Session::get('user')['name']).' '.(Session::get('user')['surname']) : '' }}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
		<br />
		<!-- sidebar menu -->
		{{--  trainer-sidebar  --}}
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>General</h3>
				<ul class="nav side-menu">
					<li class="{{ (request()->is('/trainer/dashboard'))? 'current-page': ''  }}">
						<a href="{{ route('/trainer/dashboard') }}"><i class="fa fa-home"></i>Dashborad</a>
					</li>

					<li class="{{ (request()->is('trainer/availability')) ? 'current-page': ''  }}">
						<a href="{{ url('trainer/availability') }}">
						<i class="fa fa-calendar" aria-hidden="true"></i>Availability
						</a>
					</li>

					<li class="{{ (request()->is('trainer/price')) ? 'current-page': ''  }}">
						<a href="{{ url('trainer/price') }}">
						<i class="fa fa-money" aria-hidden="true"></i>Price Management
						</a>
					</li>

					<li class="{{ (request()->is('trainer/chat')) ? 'current-page': ''  }}">
						<a href="{{ url('trainer/chat') }}">
						<i class="fa fa-comments-o" aria-hidden="true"></i>Chat
						</a>
					</li>

					<li class="{{ (request()->is('trainer/setting')) ? 'current-page': ''  }}">
						<a href="{{ route('trainer/setting') }}">
						<i class="fa fa-cog"></i>@lang('backend/sidebar.setting')
						</a>
					</li>
				</ul>
			</div>
		</div>
		{{--  End User-sidebar  --}}
		{{--  User-sidebar  --}}
		
		{{--  End Trainer-sidebar  --}}
		<!-- /sidebar menu -->
		<!-- /menu footer buttons -->
		<div class="sidebar-footer hidden-small">
			<a data-toggle="tooltip" data-placement="top" title="Settings">
			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="FullScreen">
			<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Lock">
			<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
			</a>
			<a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
			<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
			</a>
		</div>
		<!-- /menu footer buttons -->
	</div>
</div>