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
            $sections=Section::join('departments','departments.id','=','sections.department_id')
            ->select('departments.name as name_department','sections.id', 'sections.name', 'sections.is_active')
            ->orderBy('name_department')->orderby('name')
            ->get();

        return view("admin.section.index", compact("sections", "departments"));
    }

    public function search(Request $request)
    {
            $departments=Department::all();
            $query=trim($request->get('search_department'));
            if (!$query) {$query='%';}

            $sections=Section::join('departments','departments.id','=','sections.department_id')
            ->select('departments.name as name_department','sections.id', 'sections.name', 'sections.is_active')
            ->orderBy('name_department')->orderby('name')
            ->where('departments.name', 'LIKE', '%'.$query.'%')
            ->get();

            return view("admin.section.index", compact("sections", "departments"));
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

        return view("admin.section.show", compact("section", "department"));

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
