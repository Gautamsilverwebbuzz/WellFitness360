<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Session;

class TrainerLogin
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		$trainerlogin = Session::get('user')['role_id'];
		if(!$trainerlogin == "3"){
			//return redirect('login');
		}
		return $next($request);
	}
}
