<?php

namespace App\Http\Middleware;

use App\Traits\permissionTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPermission
{
    use permissionTrait;

    /**
     * Handle an incoming request.
     *

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->hasPermission();

        return $next($request);
    }
}
