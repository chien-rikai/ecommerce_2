<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkAdminLogin
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
        if(Auth::check()){
            if(Auth::user()->role === UserRole::admin && Auth::user()->block == 0){
                return $next($request);
            }else{
                Auth::logout();
                return redirect()->route('admin.login.index');
            }
        }else{
            return redirect()->route('admin.login.index');
        }
        
    }
}
