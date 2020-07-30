<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Advertising;



class LoginNeutronController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest')->except('logout');
    }

    public function role_id(){
        return 'role_id';
    }


    public function neutron_login(){

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();

        return view("auth.login", compact("advertising"));
    }
}
