<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;

class NeutronController extends Controller
{
    public function index()
    {
        $departments=Department::all();


        return view("neutron.index", compact("departments"));
    }
}
