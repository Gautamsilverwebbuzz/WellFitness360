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
			<a href="javascript:void(0);" class="site_title"><i class="fa fa-paw"></i> <span>WellFit360</span></a>
		</div>
		<div class="clearfix"></div>
		<!-- menu profile quick info -->
		<div class="profile clearfix">
			<div class="profile_pic">
				<img src="{{ asset('backend/images/img.jpg') }}" alt="..." class="img-circle profile_img">
			</div>
			<div class="profile_info">
				<span>Welcome,</span>
				<h2>{{ (Auth::user()) ? (Auth::user()->name).' '.(Auth::user()->sur_name) : '' }}</h2>
			</div>
		</div>
		<!-- /menu profile quick info -->
		<br />
		<!-- sidebar menu -->
		{{--  Admin-sidebar  --}}
		@if(Auth::user()->role_id === 1)
		<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
			<div class="menu_section">
				<h3>General</h3>
				<ul class="nav side-menu">
					<li class="{{ (request()->is('dashboard'))? 'active': ''  }}">
						<a><i class="fa fa-home"></i>@lang('backend/sidebar.home') <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li class="{{ (request()->is('dashboard'))? 'current-page': ''  }}"><a href="{{ route('dashboard') }}">@lang('backend/sidebar.administrator')</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav side-menu">
					<!-- <li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')))) ||
						(request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) )) ? 'active': ''  }}">
						<a><i class="fa fa-home"></i>
						@lang('backend/sidebar.administrator')
						<span class="fa fa-chevron-down"></span>
						</a>
						<ul class="nav child_menu" style="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit'))))
						|| (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit'))))? 'display:block': ''  }}">
						<li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')) ))? 'current-page': ''  }}">
						<a href="{{ route('module.index') }}">@lang('backend/sidebar.modules')</a>
						</li>
						<li class="{{ (request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) ))? 'current-page': ''  }}">
						<a href="{{ route('rolepermission.index') }}">@lang('backend/sidebar.roles_permission')</a>
						</li>
						</ul>
						</li> -->
					{{--  User Management  --}}
					<li class="">
						<a href="{{ route('UserManagement.index') }}">
						<i class="fa fa-user"></i>@lang('backend/sidebar.user_management')
						</a>
					</li>
					{{--  Trainner Management  --}}
					<li class="">
						<a href="{{ route('trainerManagement.index') }}">
						<i class="fa fa-user"></i>@lang('backend/sidebar.trainner_management')
						</a>
					</li>
					{{-- Category Management  --}}
					<li class="{{ (request()->is('dashboard'))? 'active': ''  }}">
						<a><i class="fa fa-list-alt"></i>@lang('backend/sidebar.categories') <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li class="">
								<a href="{{ route('categoriesManagement.index') }}">
								<i class="fa fa-list-alt"></i>@lang('backend/sidebar.categories_management')
								</a>
							</li>
							<li class="">
								<a href="{{ route('subcategoriesManagement.index') }}">
								<i class="fa fa-list-alt"></i>@lang('backend/sidebar.sub_categories_management')
								</a>
							</li>
						</ul>
					</li>

					{{--  Trainer Category Management  --}}
					<li class="">
						<a href="{{ route('trainercategoriesManagement.index') }}">
						<i class="fa fa-list-alt"></i>@lang('backend/sidebar.trainer_categories_management')
						</a>
					</li>
					{{--  Event Management  --}}
					<li class="">
						<a href="{{ route('eventManagement.index') }}">
						<i class="fa fa-calendar-check-o"></i>@lang('backend/sidebar.event_management')
						</a>
					</li>
					<li class="">
						<a href="{{ route('user-trainer-activity') }}">
						<i class="fa fa-tasks" aria-hidden="true"></i>@lang('backend/sidebar.user_trainer_activty')
						</a>
					</li>
					{{--  Fees Management  --}}
					<li class="">
						<a href="{{ route('FeesManagement.index') }}">
						<i class="fa fa-money" aria-hidden="true"></i>@lang('backend/sidebar.fees_management')
						</a>
					</li>
					{{-- Site Seeting --}}
					<li class="">
						<a href="{{ route('E_shopManagement.index') }}">
						<i class="fa fa-bank"></i>@lang('backend/sidebar.e_shop_management')
						</a>
					</li>
					{{--  CMS Pages Management  --}}
					<li class="{{ (request()->is('module') || (request()->is('module/create') ||(request()->is('module/*/edit')))) ||
						(request()->is('rolepermission') || (request()->is('rolepermission/create') ||(request()->is('rolepermission/*/edit')) )) ? 'active': ''  }}">
						<a><i class="fa fa-file"></i>
						@lang('backend/sidebar.cms_pages')
						<span class="fa fa-chevron-down"></span>
						</a>
						<ul class="nav child_menu" style="{{ (request()->is('cms_aboutus')) || (request()->is('cms_contactus')) ? 'display:block': ''  }}">
							<li class="{{ (request()->is('module')) ? 'current-page': ''  }}">
								<a href="{{ route('cms_aboutus') }}">@lang('backend/sidebar.about_us')</a>
							</li>
							<li class="{{ (request()->is('cms_contactus')) ? 'current-page': ''  }}">
								<a href="{{ route('cms_contactus') }}">@lang('backend/sidebar.contact_us')</a>
							</li>
						</ul>
					</li>
					{{-- Site Seeting --}}
					<li class="">
						<a href="{{ route('setting') }}">
						<i class="fa fa-list-ul"></i>@lang('backend/sidebar.setting')
						</a>
					</li>
				</ul>
			</div>
		</div>
		@endif
		{{--  End User-sidebar  --}}
		{{--  User-sidebar  --}}
		@if(Auth::user()->role_id === 2)
		@endif
		{{--  End User-sidebar  --}}
		{{-- Trainer-sidebar  --}}
		@if(Auth::user()->role_id === 3)
		@endif
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