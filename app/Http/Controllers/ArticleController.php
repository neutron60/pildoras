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
use App\Advertising;
use Illuminate\Support\Facades\Auth;

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

        $articles=$this->index_base()->paginate(20);

        $query1='%';
        $query2='%';
        $query3='%';
        $query4='%';

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.index", compact("articles", "departments", "aside_advertisings", "advertising", "query1", "query2", "query3", "query4", "user"));
    }

    public function search(Request $request)
    {
        $departments=Department::all();

            $query1=trim($request->get('search_department'));
            $query2=trim($request->get('search_article'));
            $query3=trim($request->get('search_is_bargain'));
            $query4=trim($request->get('search_is_new_collection'));

            if (!$query2) {$query2='%';}

            $articles=$this->index_base()
                ->where('departments.name', 'LIKE', '%'.$query1.'%')
                ->where('articles.name', 'LIKE', '%'. $query2. '%')
                ->where('articles.is_bargain', 'LIKE', '%'. $query3. '%')
                ->where('articles.is_new_collection', 'LIKE', '%'. $query4. '%')
                ->paginate(20);

                $advertisings=Advertising::all();
                $advertising=$advertisings->first();
                $aside_advertisings=AsideAdvertising::all();
                $user = Auth::user();

        return view("admin.article.index", compact("articles", "departments", "aside_advertisings", "advertising", "query1", "query2", "query3", "query4", "user"));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $section=Section::findOrFail($id);
        $department=$section->department;
        $categories=$section->categories;
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.create", compact("department","section", "categories", "aside_advertisings", "advertising", "user"));
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
        'description','image1', 'is_active', 'is_bargain', 'is_new_collection', 'code');
        $archivo=Article::create($entrada);

        if($request->file('image1')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image1'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image1'=>$path])->save();   //guardar en base de datos la ruta
        }

        if($request->file('image2')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image2'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image2'=>$path])->save();   //guardar en base de datos la ruta
        }

        if($request->file('image3')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image3'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image3'=>$path])->save();   //guardar en base de datos la ruta
        }
        return redirect()->route('article.index')->with('info', 'el articulo con el codigo ' . $archivo->code . ' fue creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::findOrFail($id);
        $category=$article->category;
        $section=$category->section;
        $department=$section->department;
        $article->created_at->toFormattedDateString();
        $article->updated_at->toFormattedDateString();
        $price=number_format($article->price,2,",",".");
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.show", compact("article", "department", "section", "category","price", "aside_advertisings", "advertising", "user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article=Article::findOrFail($id);
        $category=$article->category;
        $section=$category->section;
        $department=$section->department;
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.edit", compact("article", "category", "section", "department", "aside_advertisings", "advertising", "user"));
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
        $entrada=Article::findOrFail($id);
        $entrada->update($request->only('name','brand','model','size','use','price','stock',
        'description','is_active','is_bargain','is_new_collection'));

        if($request->file('image1')){        // verifica si hay un archivo
            $path1=$entrada->image1;
            Storage::disk('public')->delete($path1);
            $path=Storage::disk('public')->put('images', $request->file('image1'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image1'=>$path])->update();   //guardar en base de datos la ruta
        }

        if($request->file('image2')){        // verifica si hay un archivo
            $path2=$entrada->image2;
            Storage::disk('public')->delete($path2);
            $path=Storage::disk('public')->put('images', $request->file('image2'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image2'=>$path])->update();   //guardar en base de datos la ruta
        }

        if($request->file('image3')){        // verifica si hay un archivo
            $path3=$entrada->image3;
            Storage::disk('public')->delete($path3);
            $path=Storage::disk('public')->put('images', $request->file('image3'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image3'=>$path])->update();   //guardar en base de datos la ruta
        }

        return redirect()->route('article.index', $entrada->id)->with('info', 'el articulo con el codigo ' . $entrada->code . ' fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {

        $article=Article::findOrFail($id);
        $path1=$article->image1;
        Storage::disk('public')->delete($path1);
        $path2=$article->image2;
        Storage::disk('public')->delete($path2);
        $path3=$article->image3;
        Storage::disk('public')->delete($path3);
        $article->delete();
        return redirect()->route('article.index')->with('info', 'el articulo con el codigo ' . $article->code . ' fue eliminado');
    }


    public function selectDepartment ()
    {
        $departments=Department::all();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.selectDepartment", compact("departments", "aside_advertisings", "advertising", "user"));
    }

    public function selectSection ($id)
    {

        $department=Department::findOrFail($id);
        $sections=$department->sections;
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.article.selectSection", compact("department", "sections", "aside_advertisings", "advertising", "user"));
    }

    public function index_base ()
    {

        $articles_base=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select('articles.id','articles.code', 'articles.name', 'articles.is_active','articles.is_bargain', 'articles.is_new_collection',
                 'articles.stock',
                 'categories.name as name_category',
                  'sections.name as name_section',
                  'departments.name as name_department' )
                ->orderBy('name_department')->orderby('name_section')->orderBy('code');

        return $articles_base;
    }




}
