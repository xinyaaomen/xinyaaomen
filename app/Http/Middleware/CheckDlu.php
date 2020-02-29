<?php

namespace App\Http\Middleware;

use Closure;

class CheckDlu
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
        $user = session('admin');
        if(!$user){
            return redirect('/dlu');
        }
        return $next($request);
    }
}
