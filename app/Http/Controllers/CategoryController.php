<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Department;
use App\Section;
use App\Category;
use App\AsideAdvertising;
use App\Advertising;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        $departments=Department::all();
        $categories=Category::join('sections','sections.id','=','categories.section_id')
        ->join('departments','departments.id','=','sections.department_id')
        ->select('categories.id','categories.name', 'categories.is_active',
         'departments.name as name_department',
          'sections.name as name_section')
        ->orderBy('name_department')->orderby('name_section')
        ->paginate(20);

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();
        $query='%';

        return view("admin.category.index", compact("categories", "departments", "aside_advertisings", "advertising", "query", "user"));
    }

    public function search(Request $request)
    {
            $departments=Department::all();
            $query=trim($request->get('search_department'));
            if (!$query) {$query='%';}

            $categories=Category::join('sections','sections.id','=','categories.section_id')
            ->join('departments','departments.id','=','sections.department_id')
            ->select('categories.id','categories.name', 'departments.name as name_department', 'sections.name as name_section',
              'categories.is_active')
            ->orderBy('name_department')->orderby('name_section')
            ->where('departments.name', 'LIKE', '%'.$query.'%')
            ->paginate(20);

            $advertisings=Advertising::all();
            $advertising=$advertisings->first();
            $aside_advertisings=AsideAdvertising::all();
            $user = Auth::user();

            return view("admin.category.index", compact("categories", "departments", "aside_advertisings", "advertising", "query", "user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $department=Department::findOrFail($id);

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        $sections=$department->sections;

        return view("admin.category.create", compact("department", "sections", "aside_advertisings", "advertising", "user"));

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

        return redirect()->route('category.index')->with('info', 'la categoria ' . $archivo->name . ' fue creada');
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
        $category=Category::findOrFail($id);
        $section=$category->section;
        $department=$section->department;
        $category->created_at->toFormattedDateString();
        $category->updated_at->toFormattedDateString();

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.category.show", compact("section", "department", "category", "aside_advertisings", "advertising", "user"));

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

        $category=Category::findOrFail($id);

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.category.edit", compact("category", "aside_advertisings", "advertising", "user"));
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
        $entrada=Category::findOrFail($id);
        $entrada->update($request->only('name','is_active'));

        return redirect()->route('category.show', $entrada->id)->with('info', 'la categoria ' . $entrada->name . ' fue actualizada');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $section=Category::findOrFail($id);
        $section->delete();
        return redirect()->route('category.index')->with('info', 'la categoria junto con sus productos asociados fueron eliminados');
    }

    public function selectDepartment ()
    {
        $departments=Department::all();

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.category.selectDepartment", compact("departments", "aside_advertisings", "advertising", "user"));
    }
}
