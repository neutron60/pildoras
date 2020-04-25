<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $usuarios=User::all();
        $roles=Role::all();
        /*dd($usuario1=User::find($usuarios->id)->role);*/
       /* dd($usuario2=Role::find(2));*/

        /*$roles=Role::find($usuarios->role_id);*/
        return view("admin.cruduser.index", compact("usuarios", "roles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $usuarios=User::find($id);
       /* $roles=Role::find($usuarios->role_id);*/
        $roles=User::find($id)->role;
        return view("admin.cruduser.show", compact("usuarios","roles"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $usuarios=User::find($id);
        /*$roles=Role::find($usuarios->role_id);*/
        $roles=User::find($id)->role;
        return view("admin.cruduser.edit", compact("usuarios","roles"));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id) {*/
    public function update(UserRequest $request, $id) {
        $usuarios=User::find($id);
        $usuarios->update($request->only(['name','email','role_id']));

       /* $usuarios->update($request->all());*/
       return redirect("/admin/cruduser");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $usuarios=User::find($id);
        $usuarios->delete();
        return redirect("/admin/cruduser");
    }
}
