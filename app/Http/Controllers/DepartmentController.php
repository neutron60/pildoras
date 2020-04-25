<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\Storage;
use App\Department;


class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main() {
        $departments=Department::all();


       /* $roles=Role::all();*/
        /*dd($usuario1=User::find($usuarios->id)->role);*/
       /* dd($usuario2=Role::find(2));*/

        /*$roles=Role::find($usuarios->role_id);*/
        return view("admin.main", compact("departments"));
    }


    public function index()
    {
        //


        /*$departments=Department::all();*/
        $departments=Department::orderBy('id', 'DESC')->paginate();
        return view("admin.department.index", compact("departments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view("admin.department.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {

        /*$entrada=$request->only('name','title','description','image','status');*/

        /* cargando el archivo al disco duro*/
        /*$archivo=$request->file('image');
        $imageName=$archivo->getClientOriginalName();
        $archivo->move('images',$imageName);*/

        /* guardando el nombre del archivo en la base de datos */
        /*$entrada['image']=$imageName;
        Department::create($entrada);

        return redirect("/admin/department/main");*/

        $entrada=$request->only('name','title','description','image','status');



        /* cargando el archivo al disco duro*/
        /*$archivo=$request->file('image');
        $imageName=$archivo->getClientOriginalName();
        $archivo->move('images',$imageName);
        $entrada['image']=$imageName;*/

        $archivo=Department::create($entrada);
        if($request->file('image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image'=>asset($path)])->save();   //guardar en base de datos la ruta
        }
        return redirect()->route('department.index')->with('info', 'el departamento fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $departments=Department::findOrfail($id);
        $departments->created_at->toFormattedDateString();
        $departments->updated_at->toFormattedDateString();

        return view("admin.department.show", compact("departments"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departments=Department::findOrfail($id);
        return view("admin.department.edit", compact("departments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, $id)
    {

        $entrada=Department::findOrfail($id);
        $entrada->update($request->only('name','title','description','image','status'));
        if($request->file('image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image'=>asset($path)])->update();   //guardar en base de datos la ruta
        }
        return redirect()->route('department.show', $entrada->id)->with('info', 'el departamento fue actualizado');

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $department=Department::findOrfail($id);
        $department->delete();
        return redirect()->route('department.index')->with('info', 'el departamento junto con sus secciones y productos asociados fueron eliminados');
    }
}
