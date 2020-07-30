<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class IsInactive
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
        if (Auth::check()) {
            $user = Auth::user();
            $role=$user->role;

                if ($role->role_name == "inactivo"){
                    return redirect('/neutron/inactive');}
                else { return $next($request);}
            }
            else {return redirect('/neutron/index');}

    }
}
