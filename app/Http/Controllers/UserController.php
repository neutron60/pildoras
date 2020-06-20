<?php

namespace App\Http\Controllers;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\AsideAdvertising;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {

        $roles=Role::all();
        $users=User::join('roles','roles.id','=','users.role_id')
        ->select('users.id','users.name', 'users.lastname', 'users.id_number','users.id_type', 'users.email', 'roles.role_name')
        ->orderBy('name')
        ->paginate(20);
        $aside_advertisings=AsideAdvertising::all();
        $query1='%';
        $query2='%';
        $query3='%';

        return view("admin.user.index", compact("users", "roles", "aside_advertisings", "query1", "query2", "query3"));
    }

    public function search(Request $request)
    {
        $roles=Role::all();
        $query1=trim($request->get('search_role'));
        $query2=trim($request->get('search_user_name'));
        $query3=trim($request->get('search_user_lastname'));
        if (!$query2) {$query2='%';}
        if (!$query3) {$query3='%';}

        $users=User::join('roles','roles.id','=','users.role_id')
        ->select('users.id','users.name', 'users.lastname', 'users.id_number','users.id_type', 'users.email', 'roles.role_name')
        ->orderBy('name')
        ->where('roles.role_name', 'LIKE', '%'.$query1. '%')
        ->where('users.name', 'LIKE', '%'. $query2. '%')
        ->where('users.lastname', 'LIKE', '%'. $query3. '%')
        ->paginate(20);
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.user.index", compact("users","roles", "aside_advertisings", "query1", "query2", "query3"));
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
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.user.show", compact("user", "roles", "aside_advertisings"));
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
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.user.edit", compact("user", "roles", "aside_advertisings"));
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
        $entrada->update($request->only('name','lastname','role_id','id_type','id_number','mobil_phone_code','mobil_phone','area_code','phone_number','address','city','state','zip_code'));

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
