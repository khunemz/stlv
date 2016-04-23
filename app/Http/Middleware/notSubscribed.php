<?php

namespace App\Http\Middleware;

use Closure;

class notSubscribed
{
    public function handle($request, Closure $next)
    {
        if (\Auth::check() && ! \Auth::user()->subscribed())
        {
            return redirect('/');
        }
        return $next($request);
    }
}
