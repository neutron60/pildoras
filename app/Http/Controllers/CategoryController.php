<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Department;
use App\Section;
use App\Category;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $departments=department::all();
        $sections=Section::all();
        $categories=Category::all();

        foreach($categories as $category){
            if($category->is_active){
                $is_active[$category->id]='activo';}
                else{$is_active[$category->id]='inactivo';}}

        return view("admin.category.index", compact("departments", "sections", "categories", "is_active"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $department=Department::find($id);


        $sections=$department->sections;

        return view("admin.category.create", compact("department", "sections"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $entrada=$request->only('name', 'section_id','is_active');
        $archivo=Category::create($entrada);

        return redirect()->route('category.index')->with('info', 'la categoria fue creada');
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
        $section=Section::all();
        $category=Category::find($id);
        $section=$category->section;
        $department=$section->department;
        $category->created_at->toFormattedDateString();
        $category->updated_at->toFormattedDateString();
        if($category->is_active){$is_active='activo';}
        else{$is_active='inactivo';}

        return view("admin.category.show", compact("section", "department", "category", "is_active"));

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

        $category=Category::find($id);
        if($category->is_active){$is_active='activo';}
        else{$is_active='inactivo';}
        return view("admin.category.edit", compact("category", "is_active"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryRequest $request, $id)
    {
        $entrada=Category::findOrfail($id);
        $entrada->update($request->only('name','is_active'));

        return redirect()->route('category.show', $entrada->id)->with('info', 'la categoria fue actualizada');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=Category::findOrfail($id);
        $section->delete();
        return redirect()->route('category.index')->with('info', 'la categoria junto con sus productos asociados fueron eliminados');
    }

    public function selectDepartment ()
    {
        $departments=Department::all();
        return view("admin.category.selectDepartment", compact("departments"));
    }
}
