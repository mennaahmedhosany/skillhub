<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsStudent
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
        
        //$studentRole = Role::where('name','student')->first();//middelware if name == student to set permition
        if(Auth::user()->role->name=='student'){//check authantication if equal user permition 
            return redirect('/');//if not equal permition move to index page 
        }
        return $next($request);
    }
}
