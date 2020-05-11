<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Department;
use App\Section;
use App\Category;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments=Department::all();
        $articles=Article::all();
        $sections=Section::all();
        $categories=Category::all();

        foreach($articles as $article){
        if($article->is_active){
            $is_active[$article->id]='activo';echo 'activo';}
            else{$is_active[$article->id]='inactivo'; echo 'inactivo';}}


        return view("admin.article.index", compact("articles", "sections", "departments", "categories", "is_active"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $section=Section::find($id);
        $department=$section->department;
        $categories=$section->categories;


        return view("admin.article.create", compact("department","section", "categories"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $request->is_active=1;
        $entrada=$request->only('category_id','name','brand','model','size','use','price','stock','description','image1', 'image2', 'image3', 'is_active', 'is_bargain', 'is_new_collection', 'code');
        $archivo=Article::create($entrada);

        if($request->file('image1')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image1'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image1'=>asset($path)])->save();   //guardar en base de datos la ruta
        }

        if($request->file('image2')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image2'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image2'=>asset($path)])->save();   //guardar en base de datos la ruta
        }

        if($request->file('image3')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image3'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image3'=>asset($path)])->save();   //guardar en base de datos la ruta
        }
        return redirect()->route('article.index')->with('info', 'el articulo fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        $category=$article->category;
        $section=$category->section;
        $department=$section->department;
        $article->created_at->toFormattedDateString();
        $article->updated_at->toFormattedDateString();
        if($article->is_active){$is_active='activo';}
        else{$is_active='inactivo';}


        return view("admin.article.show", compact("article", "department", "section", "category", "is_active"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::find($id);
        $category=$article->category;
        $section=$category->section;
        $department=$section->department;
        if($article->is_active){$is_active='activo';}
        else{$is_active='inactivo';}
        return view("admin.article.edit", compact("article", "category", "section", "department", "is_active"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(ArticleRequest $request, $id)
    {
        $entrada=Article::findOrfail($id);
        $entrada->update($request->only('name','brand','model','size','use','price','stock',
        'description','image1','image2','image3','is_active','is_bargain','is_new_collection'));
        if($request->file('image1')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image1'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image'=>asset($path)])->update();   //guardar en base de datos la ruta
        }

        if($request->file('image2')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image2'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image2'=>asset($path)])->update();   //guardar en base de datos la ruta
        }

        if($request->file('image3')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image3'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image3'=>asset($path)])->update();   //guardar en base de datos la ruta
        }

        return redirect()->route('article.show', $entrada->id)->with('info', 'el articulo fue actualizado');


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article=Article::findOrfail($id);
        $article->delete();
        return redirect()->route('article.index')->with('info', 'el articulo fue eliminado');
    }


    public function selectDepartment ()
    {
        $departments=Department::all();
        return view("admin.article.selectDepartment", compact("departments"));
    }

    public function selectSection ($id)
    {

        $department=Department::find($id);
        $sections=$department->sections;
        return view("admin.article.selectSection", compact("department", "sections"));
    }




}
