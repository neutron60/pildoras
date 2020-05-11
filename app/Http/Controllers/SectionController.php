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
        $departments=Department::all();
        $sections=Section::all();

        foreach($sections as $section){
        if($section->is_active){
            $is_active[$section->id]='activo';}
            else{$is_active[$section->id]='inactivo';}}

        return view("admin.section.index", compact("departments", "sections", "is_active"));
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
        $entrada=$request->only('name','department_id','is_active');
        $archivo=Section::create($entrada);

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
        $departments=Department::all();
        $section=Section::find($id);
        $department=$section->department;
        $section->created_at->toFormattedDateString();
        $section->updated_at->toFormattedDateString();
        if($section->is_active){$is_active='activo';}
        else{$is_active='inactivo';}


        return view("admin.section.show", compact("section", "department", "is_active"));

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
        if($section->is_active){$is_active='activo';}
        else{$is_active='inactivo';}
        return view("admin.section.edit", compact("section", "is_active"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(SectionRequest $request, $id)
    {

        $entrada=Section::findOrfail($id);
        $entrada->update($request->only('name','is_active'));

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
