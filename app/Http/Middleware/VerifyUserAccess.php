<?php

namespace EBN\Http\Middleware;

use Closure;
use EBN\Admin;
use Auth;

class VerifyUserAccess
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
        if(Auth::guard('admin')->user()->role !== 1){
            return redirect()->route('admin_unauthorized')->with('error', 'You do not have access to view this page');
        }
        return $next($request);
    }
}
