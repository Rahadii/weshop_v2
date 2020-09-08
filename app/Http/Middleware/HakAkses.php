<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission)
    {
        $permission = explode('|', $permission);
        $role = Auth::user()->role();
        if(check($permission, $role)){
            return $next($request);
        }
        return "ops!";
    }
}
