<?php

namespace App\Http\Middleware;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // session() -> flush();
		// print_r(session() -> all());
        if(!session('admin.id')){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
