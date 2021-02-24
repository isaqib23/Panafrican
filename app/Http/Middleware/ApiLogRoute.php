<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiLogRoute
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
        $response = $next($request);

        $log = [
            'URI' => $request->getUri(),
            'METHOD' => $request->getMethod(),
            'REQUEST_BODY' => $request->all(),
            'RESPONSE' => $response->getContent()
        ];

        \Log::channel('apis')->info($request->path().' '.json_encode($log));

        return $response;
    }
}
