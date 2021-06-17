<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ChangePassword
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
        if(auth()->check()){
            if(!is_null(auth()->user()->email_verified_at) || $request->path() == 'profile' || $request->path() == 'profile/password' || $request->route() == 'profile.password' || $request->method() == 'PUT' || $request->method() == 'put')
            {
                return $next($request);
            }else{
                return redirect('profile')->with('success','Porfavor cambie su contraseña de acceso.');
            }
        }else{
            return redirect("/login");
        }
    }
}