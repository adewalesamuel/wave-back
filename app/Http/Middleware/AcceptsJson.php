<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AcceptsJson
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
        if (!$request->expectsJson())
            return response()->json(['status' => 'Bad Request'], 400);

        return $next($request);
    }
}
