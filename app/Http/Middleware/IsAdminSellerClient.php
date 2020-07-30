<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Role;

class IsAdminSellerClient
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

                if ($role->role_name == "administrador" || $role->role_name == "vendedor" || $role->role_name == "comprador"){
                    return $next($request);}
                else {return redirect('/neutron/index');}
            }
            else {return redirect('/neutron/index');}
    }
}
