<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Log;

class RedirectIfNotClient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'client')
    {
        if (!Auth::guard($guard)->check()) {
            session()->put('afterLoginPath', $request->path());
            // Log::info('afterLoginPath: '.session()->get('afterLoginPath')." ".__FILE__." ".__FUNCTION__." ".__LINE__);
            return redirect('/login');
        }

        return $next($request);
    }
}
