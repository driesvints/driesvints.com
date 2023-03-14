<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableFloc
{
    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $response->header('Permissions-Policy', 'interest-cohort=()');

        return $response;
    }
}
