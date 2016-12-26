<?php

namespace App\Http\Middleware;

use Closure;

class MerchantLoginMiddleware
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
        //session(['userID' => 1]);
        // session() -> flush();
        
        if(!session('merchant.uid')){
            return redirect('/merchant/login');
        }
        return $next($request);
    }
}
