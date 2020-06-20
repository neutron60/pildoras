<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Department;
use App\Article;
use App\Advertising;
use App\AsideAdvertising;


class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   /* public function __construct()
    {
        $this->middleware('auth');
    }
*/


    public function index()
    {

        $article_bargains=Article::join('categories','categories.id','=','articles.category_id')
        ->join('sections','sections.id','=','categories.section_id')
        ->join('departments','departments.id','=','sections.department_id')
        ->select('articles.id', 'articles.name', 'articles.price','articles.is_active','articles.is_bargain', 'articles.stock',
         'articles.is_new_collection', 'articles.image1', 'articles.stock',
         'departments.is_active as department_is_active',
         'sections.is_active as section_is_active',
         'categories.is_active as category_is_active')
         ->where('articles.is_bargain', 1)->where('articles.is_active', 1)->where('articles.stock', '>', 0)
         ->where('departments.is_active', 1)
         ->where('sections.is_active', 1)
        ->where('categories.is_active', 1)
        ->get();

        $article_new_collections=Article::join('categories','categories.id','=','articles.category_id')
        ->join('sections','sections.id','=','categories.section_id')
        ->join('departments','departments.id','=','sections.department_id')
        ->select('articles.id', 'articles.name', 'articles.price','articles.is_active','articles.is_bargain', 'articles.stock',
         'articles.is_new_collection', 'articles.image1', 'articles.stock',
         'departments.is_active as department_is_active',
         'sections.is_active as section_is_active',
         'categories.is_active as category_is_active')
         ->where('articles.is_new_collection', 1)->where('articles.is_active', 1)->where('articles.stock', '>', 0)
         ->where('departments.is_active', 1)
         ->where('sections.is_active', 1)
        ->where('categories.is_active', 1)
        ->get();


        $departments=Department::where('is_active', 1)->get();
        $flag=1;
        $flag1=1;
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.advertising.index", compact("article_bargains", "article_new_collections", "departments",
         "flag", "flag1", "advertising", "aside_advertisings"));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aside_advertisings=AsideAdvertising::all();
        return view("admin.advertising.create", compact("aside_advertisings"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada=$request->only('advertising_header', 'bargain_header', 'new_collection_header', 'image_header');
        $archivo=Advertising::create($entrada);

        if($request->file('image_header')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image_header'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image_header'=>asset($path)])->save();   //guardar en base de datos la ruta
        }
        return redirect()->route('advertising.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function article_list_department($id)
    {
        $query=$id;

        $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select('articles.id', 'articles.name', 'articles.price','articles.is_active','articles.is_bargain', 'articles.stock',
                 'articles.is_new_collection', 'articles.image1', 'articles.stock',
                 'departments.id as department_id', 'departments.is_active as department_is_active',
                 'sections.is_active as section_is_active',
                 'categories.is_active as category_is_active')
                ->orderBy('is_new_collection', 'desc')->orderby('is_bargain', 'desc')->orderBy('name')
                ->where('departments.id', $query)
                ->where('articles.is_active', 1)->where('departments.is_active', 1)->where('sections.is_active', 1)
                ->where('categories.is_active', 1)->where('articles.stock', '>', 0)
                ->paginate(20);
                $aside_advertisings=AsideAdvertising::all();


    return view("admin.advertising.article_list", compact("articles", "aside_advertisings"));
    }

    public function article_list_section($id)
    {
        $query=$id;

        $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select('sections.id as section_id', 'sections.name as section_name', 'sections.is_active as section_is_active',
                 'articles.id', 'articles.name', 'articles.price','articles.is_active', 'articles.stock',
                 'articles.image1',
                 'departments.id as department_id', 'departments.is_active as department_is_active',
                 'categories.is_active as category_is_active')
                ->orderBy('is_new_collection', 'desc')->orderby('is_bargain', 'desc')->orderBy('name')
                ->where('sections.id', $query)
                ->where('articles.is_active', 1)->where('departments.is_active', 1)->where('sections.is_active', 1)
                ->where('categories.is_active', 1)->where('articles.stock', '>', 0)
                ->paginate(20);

                $aside_advertisings=AsideAdvertising::all();

    return view("admin.advertising.article_list", compact("articles", "aside_advertisings"));
    }

    public function article_list_category($id)
    {
        $query=$id;

        $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select( 'categories.is_active as category_is_active', 'categories.id as category_id',
                 'articles.id', 'articles.name', 'articles.price','articles.is_active', 'articles.stock',
                 'articles.image1',
                 'departments.id as department_id', 'departments.is_active as department_is_active',
                 'sections.id as section_id', 'sections.name as section_name', 'sections.is_active as section_is_active' )
                ->orderBy('is_new_collection', 'desc')->orderby('is_bargain', 'desc')->orderBy('name')
                ->where('categories.id', $query)
                ->where('articles.is_active', 1)->where('departments.is_active', 1)->where('sections.is_active', 1)
                ->where('categories.is_active', 1)->where('articles.stock', '>', 0)
                ->paginate(20);
                $aside_advertisings=AsideAdvertising::all();


    return view("admin.advertising.article_list", compact("articles", "aside_advertisings"));
    }

    public function article_detail($id)
    {


        $article=Article::findOrfail($id);

        $article_category=$article->category;
        $article_section=$article_category->section;
        $article_department=$article_section->department;
        if($article_category->is_active  == 1 && $article_section->is_active  == 1 && $article_department->is_active  == 1 && $article->is_active  == 1){

        $stock_flag=1;
        if($article->stock <=6){
            $article_stock=$article->stock;
        }else{$article_stock=6;}

        $price=number_format($article->price,2,",",".");
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.advertising.article_detail", compact("article", "stock_flag", "article_stock", "price", "article_category", "article_section",
        "article_department", "aside_advertisings"));
        }
        else { echo 'favor contactar al administrador de la pagina';}
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       /* $advertising=Advertising::findOrfail($id);*/
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.advertising.edit", compact("advertising", "aside_advertisings"));
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
        $entrada=Advertising::findOrfail($id);
        $entrada->update($request->only('advertising_header', 'bargain_header', 'new_collection_header', 'image_header'));
        if($request->file('image_header')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image_header'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image_header'=>asset($path)])->update();   //guardar en base de datos la ruta
        }
        return redirect()->route('advertising.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
