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



    public function index()
    {
        $article_bargains=Article::where('is_bargain', 1)->where('is_active', 1)->get();
        $article_new_collections=Article::where('is_new_collection', 1)->where('is_active', 1)->get();
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
        return view("admin.advertising.create");
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

    public function article_list($id)
    {
        $query=$id;

        $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select('articles.id', 'articles.name', 'articles.price','articles.is_active','articles.is_bargain',
                 'articles.is_new_collection', 'departments.id as department_id', 'articles.image1', 'articles.stock' )
                ->orderBy('is_new_collection', 'desc')->orderby('is_bargain', 'desc')->orderBy('name')
                ->where('departments.id', $query)
                ->where('articles.is_active', 1)
                ->paginate(20);



    return view("admin.advertising.article_list", compact("articles"));
    }

    public function article_detail($id)
    {

        $article=Article::findOrfail($id);
        $stock_flag=1;
        if($article->stock <=6){
            $article_stock=$article->stock;
        }else{$article_stock=6;}



        return view("admin.advertising.article_detail", compact("article", "stock_flag", "article_stock"));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertising=Advertising::findOrfail($id);

        return view("admin.advertising.edit", compact("advertising"));
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
