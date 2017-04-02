<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToMiddleware
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
        if ($request->has('redirectTo')) {
            session()->put('redirectTo', $request->input('redirectTo'));
        }

        return $next($request);
    }
}
