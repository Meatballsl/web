<?php

namespace App\Http\Middleware;

use Closure;


class UserLogin
{

    public function handle($request, Closure $next)
    {

        if(!session('user')){
            return redirect('login');
        }

        return $next($request);
    }
}
