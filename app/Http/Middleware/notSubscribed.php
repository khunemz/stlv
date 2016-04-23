<?php

namespace App\Http\Middleware;

use Closure;

class notSubscribed
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
        if (\Auth::check() && ! \Auth::user()->subscribed()){
            return redirect()->to('sub');
        }
        return $next($request);
    }
}
