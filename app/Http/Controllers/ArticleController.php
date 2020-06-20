<?php

namespace App\Http\Controllers;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Department;
use App\Section;
use App\Category;
use App\Article;
use App\AsideAdvertising;

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

        $articles=Article::join('categories','categories.id','=','articles.category_id')
        ->join('sections','sections.id','=','categories.section_id')
        ->join('departments','departments.id','=','sections.department_id')
        ->select('articles.id','articles.code', 'articles.name', 'articles.is_active','articles.is_bargain', 'articles.is_new_collection',
        'categories.name as name_category',
        'sections.name as name_section',
        'departments.name as name_department')
        ->orderBy('name_department')->orderby('name_section')->orderBy('code')
        ->paginate(20);

        $query1='%';
        $query2='%';
        $query3='%';
        $query4='%';


        $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.index", compact("articles", "departments", "aside_advertisings","query1", "query2", "query3", "query4"));
    }

    public function search(Request $request)
    {
        $departments=Department::all();

            $query1=trim($request->get('search_department'));
            $query2=trim($request->get('search_article'));
            $query3=trim($request->get('search_is_bargain'));
            $query4=trim($request->get('search_is_new_collection'));

            if (!$query2) {$query2='%';}

                $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select('articles.id','articles.code', 'articles.name', 'articles.is_active','articles.is_bargain', 'articles.is_new_collection',
                 'categories.name as name_category',
                  'sections.name as name_section',
                  'departments.name as name_department' )
                ->orderBy('name_department')->orderby('name_section')->orderBy('code')
                ->where('departments.name', 'LIKE', '%'.$query1.'%')
                ->where('articles.name', 'LIKE', '%'. $query2. '%')
                ->where('articles.is_bargain', 'LIKE', '%'. $query3. '%')
                ->where('articles.is_new_collection', 'LIKE', '%'. $query4. '%')
                ->paginate(20);

                $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.index", compact("articles", "departments", "aside_advertisings", "query1", "query2", "query3", "query4"));
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
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.create", compact("department","section", "categories", "aside_advertisings"));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {

        $entrada=$request->only('category_id','name','brand','model','size','use','price','stock',
        'description','image1', 'image2', 'image3', 'is_active', 'is_bargain', 'is_new_collection', 'code');
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
        $price=number_format($article->price,2,",",".");
        $aside_advertisings=AsideAdvertising::all();


        return view("admin.article.show", compact("article", "department", "section", "category","price", "aside_advertisings"));
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
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.edit", compact("article", "category", "section", "department", "aside_advertisings"));
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
            $entrada->fill(['image1'=>asset($path)])->update();   //guardar en base de datos la ruta
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $article=Article::findOrfail($id);
        $article->delete();
        return redirect()->route('article.index')->with('info', 'el articulo fue eliminado');
    }


    public function selectDepartment ()
    {
        $departments=Department::all();
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.selectDepartment", compact("departments", "aside_advertisings"));
    }

    public function selectSection ($id)
    {

        $department=Department::find($id);
        $sections=$department->sections;
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.article.selectSection", compact("department", "sections", "aside_advertisings"));
    }




}
