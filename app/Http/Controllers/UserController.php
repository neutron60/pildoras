<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $users=User::all();

        return view("admin.user.index", compact("users"));
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
        $user=User::find($id);
        $roles=Role::all();
        $user->created_at->toFormattedDateString();
        $user->updated_at->toFormattedDateString();

        return view("admin.user.show", compact("user", "roles"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user=User::find($id);
        $roles=Role::all();
        return view("admin.user.edit", compact("user", "roles"));
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
        $entrada=user::findOrfail($id);
        $entrada->update($request->only('name','lastname','role_id','id_type','id_number','mobile_phone_code','mobile_phone','area_code','phone_number','address1','address2','city','state','zip_code'));

        return redirect()->route('user.show', $entrada->id)->with('info', 'la informacion del usuario fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        $user=User::findOrfail($id);
        $user->delete();
        return redirect()->route('user.index')->with('info', 'El usuario fue eliminado');
    }
}
