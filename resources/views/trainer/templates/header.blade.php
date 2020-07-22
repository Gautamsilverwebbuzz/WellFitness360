<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>
			<div class="btn-group">
				@if(config('app.locale') =='en')
				{{-- <img src="{{ asset('theme/dist/img/us.svg')}}" title="English" width="20" alt="English"> --}}
				@php $langname = 'ENGLISH'; $img = 'us.svg'; @endphp
				@elseif(config('app.locale') =='ar')
				{{-- <img src="{{ asset('theme/dist/img/arabic.svg')}}" title="English" width="20" alt="English"> --}}
				@php $langname = 'ARABIC'; $img = 'arabic.svg'; @endphp
				@elseif(config('app.locale') =='de')
				{{-- <img src="{{ asset('theme/dist/img/german.svg')}}" title="English" width="20" alt="English"> --}}
				@php $langname = 'GERMAN'; $img = 'german.svg'; @endphp
				@elseif(config('app.locale') =='no')
				{{-- <img src="{{ asset('theme/dist/img/norway.svg')}}" title="English" width="20" alt="English"> --}}
				@php $langname = 'NORWAY'; $img = 'norway.svg'; @endphp
				@endif
				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button" aria-expanded="false">
				<img src="{{ asset('backend/images/'.$img)}}" title="English" width="20" alt="English">
				{{ $langname }} <span class="caret"></span>
				</button>
				<ul role="menu" class="dropdown-menu">
					<li><a href="{{ route('lang.switch', 'en') }}" class="dropdown-item">ENGLISH</a></li>
					<li><a href="{{ route('lang.switch', 'ar') }}" class="dropdown-item">ARABIC</a></li>
					<li><a href="{{ route('lang.switch', 'no') }}" class="dropdown-item">NORWEGIAN</a></li>
					<li><a href="{{ route('lang.switch', 'de') }}" class="dropdown-item">GERMAN</a></li>
				</ul>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:void(0);" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<img src="{{ asset('backend/images/img.jpg') }}" alt="">{{ (Session::get('user')['name']) ? (Session::get('user')['name']).' '.(Session::get('user')['surname']) : '' }}
					<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a href="{{ url('trainer/profile') }}"><i class="fa fa-user pull-right"></i>Profile</a></li>
						<li><a href="{{ route('/trainer/changePassword') }}"><i class="fa fa-lock pull-right"></i>Change Password</a></li>
						<li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>