<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Language
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale(Cookie::get('language'));
        return $next($request);
    }
}
