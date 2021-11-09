<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FirstMiddleware
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

        $input = "ミドルウェアを書き換えています";

        //連想配列requestのcontentsの値を上書きする
        $request->merge(['content'=>$input]);
        return $next($request);
    }
}
