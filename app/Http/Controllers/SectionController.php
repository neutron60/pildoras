<?php

namespace App\Http\Controllers;
use App\Http\Requests\SectionRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Department;
use App\Section;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {

        /*$departments=Department::all();*/
        $departments=Department::all();
        $sections=Section::all();
        return view("admin.section.index", compact("departments", "sections"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Department::all();
        return view("admin.section.create", compact("departments"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionRequest $request)
    {
        $entrada=$request->only('name','title','description','image','category','department_id','status');



        /* cargando el archivo al disco duro*/
        /*$archivo=$request->file('image');
        $imageName=$archivo->getClientOriginalName();
        $archivo->move('images',$imageName);
        $entrada['image']=$imageName;*/

        $archivo=Section::create($entrada);
        if($request->file('image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image'));  //almacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image'=>asset($path)])->save();   //guardar en base de datos la ruta
        }
        return redirect()->route('section.index')->with('info', 'la seccion fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $section=Section::find($id);


        $section->created_at->toFormattedDateString();
        $section->updated_at->toFormattedDateString();

        return view("admin.section.show", compact("section"));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $section=Section::find($id);
        return view("admin.section.edit", compact("section"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $entrada=Section::findOrfail($id);
        $entrada->update($request->only('name','title','description','image','status', 'category', 'department_id'));
        if($request->file('image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image'=>asset($path)])->update();   //guardar en base de datos la ruta
        }
        return redirect()->route('section.show', $entrada->id)->with('info', 'la seccion fue actualizada');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=Section::findOrfail($id);
        $section->delete();
        return redirect()->route('section.index')->with('info', 'la seccion junto con sus productos asociados fueron eliminados');
    }
}
