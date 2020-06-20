<?php

namespace App\Http\Controllers;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Department;
use App\AsideAdvertising;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $departments=Department::all();
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.department.index", compact("departments", "aside_advertisings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aside_advertisings=AsideAdvertising::all();
        return view("admin.department.create", compact("aside_advertisings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        $entrada=$request->only('name','title','description','image','is_active');
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
        $department=Department::findOrfail($id);
        $department->created_at->toFormattedDateString();
        $department->updated_at->toFormattedDateString();
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.department.show", compact("department", "aside_advertisings"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department=Department::findOrfail($id);
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.department.edit", compact("department", "aside_advertisings"));
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
        $entrada->update($request->only('title','description','image','is_active'));
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
