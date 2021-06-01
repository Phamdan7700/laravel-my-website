<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Filter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->filter_status == 'active') {
            return redirect();
        }
        if ($request->filter_status == 'inactive') {
            return redirect();
        }
        return $next($request);
    }
}
