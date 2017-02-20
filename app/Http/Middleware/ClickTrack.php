<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\ClickCounterController;

class ClickTrack
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
        $response = $next($request);
        ClickCounterController::trackRecord($request);
        return $response;
        // return $next($request);
    }
}
