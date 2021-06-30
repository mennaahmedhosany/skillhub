<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CanEnterBashbord
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
        $roleuser=Auth::user()->role->name;//get role name (relation )
        if($roleuser=='admin' or $roleuser=='superadmin'){
        return $next($request);
    } 
    return redirect(url('/'));
    }
   
}
