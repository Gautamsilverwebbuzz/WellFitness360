<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Session;

class Login
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
		$login = Session::get('user')['role_id'];
		if($login == "1" || !$login){
			return redirect('login');
		}
		return $next($request);
	}
}
