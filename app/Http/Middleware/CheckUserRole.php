<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserRole
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
        $reponse = $next($request);
        $prefixe = "";
        if(auth()->check()){
           $role = auth()->user()->user_role;
           if (!empty($request->server()['PATH_INFO'])) {
            $path_info = $request->server()['PATH_INFO'];
            $path_info =trim($path_info,'/');
            $prefixe = explode('/',$path_info)[0];
           
        }
           // $prefixe = trim(\Route::current()->action['prefix'],'/');
        // dd($prefixe);
           if ($role != $prefixe) {
               return redirect()->route($role.'.index');
           }
        }
        return $reponse;
    }
}













































/*****************
* PENIEL DIALU
* BIL WIFI
* JUIN 2019
*
*****************/