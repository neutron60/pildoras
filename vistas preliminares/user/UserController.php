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
        $roles=Role::all();

        dd($roles);

        return view("admin.user.index", compact("users", "roles"));
    }

    public function search(Request $request)
    {
        $roles=Role::all();
            $query1=trim($request->get('search_role'));
            $query2=trim($request->get('search_user'));
            if (!$query2) {$query2='%';}

                $users=User::join('roles','roles.id','=','users.role_id')

                ->select('users.id','users.name', 'users.lastname', 'users.id_number','users.id_type', 'users.email',
                'roles.role_name')
                ->orderBy('name')
                ->where('role.name', $query1)
                ->where('name', 'LIKE', '%'. $query2. '%')
                ->get();

                return view("admin.user.index", compact("users","roles"));
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

    public function showUser($id) {
        $user=User::find($id);

        return view("admin.user.show", compact("user"));
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

    public function editUser($id) {
        $user=User::find($id);

        return view("admin.user.edit", compact("user"));
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

    public function updateUpser(UserRequest $request, $id) {
        $entrada=user::findOrfail($id);
        $id_number=$request->get('id_number');
        if($id_number){
        $entrada->update($request->only('mobile_phone_code','mobile_phone','area_code','phone_number','address1','address2','city','state','zip_code'));
        } else{
        $entrada->update($request->only('id_type','id_number','mobile_phone_code','mobile_phone','area_code','phone_number','address1','address2','city','state','zip_code'));
        }
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
