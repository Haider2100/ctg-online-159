<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMidleware
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
    $balance=1000;
    if ($balance>500) {

        return $next($request);
    } else{
        //dd('This page is protected');
      // return redirect('/name');
        return redirect()->route('main');
    }
    }
}
