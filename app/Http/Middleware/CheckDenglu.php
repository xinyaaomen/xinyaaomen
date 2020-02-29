<?php

namespace App\Http\Middleware;

use Closure;

class CheckDenglu
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
        //执行操作
        $user = session('admin');
        if(!$user){
            return redirect('/denglu');
        }
        return $next($request);
    }
}
