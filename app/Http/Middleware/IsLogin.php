<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
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
        $data=session('login');
        //dd($data);
        if(empty($data)){
            return redirect('/admin/reg')->with('msg','请先登录');
        }
        return $next($request);
    }
}
