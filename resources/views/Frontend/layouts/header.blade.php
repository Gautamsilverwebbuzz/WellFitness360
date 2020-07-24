<div class="container-fluid main-header">
	<nav class=" navbar navbar-expand-lg navbar-dark">
		<a class="navbar-brand font-bold" href="{{ url('/') }}"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent-4">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign Up </a>
					<div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
						<a class="dropdown-item" href="{{ url('user/register') }}">User</a>
						<a class="dropdown-item" href="{{ url('trainer/register') }}">Trainers</a>
					</div>
				</li> 
				<li class="nav-item">
					<a class="nav-link" href="{{ url('login') }}"><i class="fa fa-gear"></i> Log In</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0);"><i class="fa fa-gear"></i> For Trainers</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="javascript:void(0);"><i class="fa fa-gear"></i> Unleash Your Power</a>
				</li>
			</ul>
		</div>
	</nav>
</div>