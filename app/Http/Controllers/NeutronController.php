<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Article;
use App\Advertising;
use App\AsideAdvertising;
use Illuminate\Support\Facades\Auth;

class NeutronController extends Controller
{
    public function index()
    {
        $article_bargains=$this->article_list_basic()->where('articles.is_bargain', 1)->get();

        $article_new_collections=$this->article_list_basic()->where('articles.is_new_collection', 1)->get();

        $departments=Department::where('is_active', 1)->get();
        $flag=1;
        $flag1=1;
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();


        if(empty($advertising)){
            return view('neutron.pagina_en_construccion');}

            $user = Auth::user();

            if(empty($user)){
                return view("neutron.index", compact("article_bargains", "article_new_collections", "departments",
         "flag", "flag1", "advertising", "aside_advertisings"));
            }

            $role_type=$user->role;

        if($role_type->role_name == "administrador"){
        return view("admin.neutron.index", compact("article_bargains", "article_new_collections", "departments",
        "flag", "flag1", "advertising", "aside_advertisings", "user"));}

        if($role_type->role_name == "vendedor"){
        return view("seller.neutron.index", compact("article_bargains", "article_new_collections", "departments",
        "flag", "flag1", "advertising", "aside_advertisings", "user"));}

        if($role_type->role_name == "cliente"){
        return view("client.neutron.index", compact("article_bargains", "article_new_collections", "departments",
         "flag", "flag1", "advertising", "aside_advertisings", "user"));}

         if($role_type->role_name == "inactivo"){
         return view("neutron.index", compact("article_bargains", "article_new_collections", "departments",
         "flag", "flag1", "advertising", "aside_advertisings", "user"));}

    }

    public function article_list_department($id)
    {

        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        $query=$id;
        $articles=$this->article_list_basic()->where('department_id', $query)->paginate(20);

        if($articles->count() == 0){
            return redirect()->action('NeutronController@index');
        }

            $user = Auth::user();

            if(empty($user)){
                return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising"));
            }

            $role_type=$user->role;

        if($role_type->role_name == "administrador"){
        return view("admin.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

        if($role_type->role_name == "vendedor"){
        return view("seller.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

        if($role_type->role_name == "cliente"){
        return view("client.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}


         if($role_type->role_name == "inactivo"){
         return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

    }

    public function article_list_section($id)
    {
        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        $query=$id;
        $articles=$this->article_list_basic()->where('section_id', $query)->paginate(20);
        if($articles->count() == 0){
            return redirect()->action('NeutronController@index');
        }

        $user = Auth::user();

            if(empty($user)){
                return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising"));
            }

            $role_type=$user->role;

        if($role_type->role_name == "administrador"){
        return view("admin.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

        if($role_type->role_name == "vendedor"){
        return view("seller.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

        if($role_type->role_name == "cliente"){
        return view("client.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}


         if($role_type->role_name == "inactivo"){
         return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

    }



    public function article_list_category($id)
    {
        $departments=Department::where('is_active', 1)->get();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

        $query=$id;
        $articles=$this->article_list_basic()->where('category_id', $query)->paginate(20);
        if($articles->count() == 0){
            return redirect()->action('NeutronController@index');
        }

        $user = Auth::user();

        if(empty($user)){
            return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising"));
        }

        $role_type=$user->role;

    if($role_type->role_name == "administrador"){
    return view("admin.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

    if($role_type->role_name == "vendedor"){
    return view("seller.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

    if($role_type->role_name == "cliente"){
    return view("client.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

     if($role_type->role_name == "inactivo"){
     return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));}

    }

    public function article_detail($id)
    {
        $departments=Department::where('is_active', 1)->get();

        $article=Article::findOrfail($id);

        $article_category=$article->category;
        $article_section=$article_category->section;
        $article_department=$article_section->department;

        if($article_category->is_active  == 1 && $article_section->is_active  == 1 && $article_department->is_active  == 1 && $article->is_active  == 1
           && $article->price > 1 && $article->stock > 1 ){


           $stock_flag=1;
           if($article->stock <=6){
             $article_stock=$article->stock;
           }else{$article_stock=6;}

           $price=number_format($article->price,2,",",".");
           $advertisings=Advertising::all();
           $advertising=$advertisings->first();
           $aside_advertisings=AsideAdvertising::all();


           $user = Auth::user();

           if(empty($user)){
              return view("neutron.article_detail", compact("article", "stock_flag", "article_stock", "price",
              "article_category", "article_section", "article_department", "departments", "aside_advertisings", "advertising"));
           }

           $role_type=$user->role;

          if($role_type->role_name == "administrador"){
             return view("admin.neutron.article_detail",  compact("article", "stock_flag", "article_stock", "price",
             "article_category", "article_section", "article_department", "departments", "aside_advertisings", "advertising", "user"));}

          if($role_type->role_name == "vendedor"){
             return view("seller.neutron.article_detail",  compact("article", "stock_flag", "article_stock", "price",
             "article_category", "article_section", "article_department", "departments", "aside_advertisings", "advertising", "user"));}

          if($role_type->role_name == "cliente"){
             return view("client.neutron.article_detail",  compact("article", "stock_flag", "article_stock", "price",
             "article_category", "article_section", "article_department", "departments", "aside_advertisings", "advertising", "user"));}

           if($role_type->role_name == "inactivo"){
             return view("neutron.article_detail",  compact("article", "stock_flag", "article_stock", "price",
             "article_category", "article_section", "article_department", "departments", "aside_advertisings", "advertising", "user"));}

        }
        else { return redirect()->action('NeutronController@index');}
    }

    public function search(Request $request)
    {
        $departments=Department::all();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();

            $query=trim($request->get('search'));

            if (!$query) {return back();}


            $articles=$this->article_list_basic()
            ->where('articles.name', 'LIKE', '%'. $query. '%')
            ->paginate(20);

            $user = Auth::user();

            if(empty($user)){
                return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising"));
            }

            $role_type=$user->role;

        if($role_type->role_name == "administrador"){
            if($articles->count() == 0){return redirect()->action('NeutronController@index')->with('info', 'no se encontatron resultados para su busqueda');}
           return view("admin.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));
        }

        if($role_type->role_name == "vendedor"){
           if($articles->count() == 0){return redirect()->action('NeutronController@index')->with('info', 'no se encontatron resultados para su busqueda');}
           return view("seller.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));
        }

        if($role_type->role_name == "cliente"){
            if($articles->count() == 0){return redirect()->action('NeutronController@index')->with('info', 'no se encontatron resultados para su busqueda');}
            return view("client.neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "user"));
        }


         if($role_type->role_name == "inactivo"){
            if($articles->count() == 0){return redirect()->action('NeutronController@index')->with('info', 'no se encontatron resultados para su busqueda');}
            return view("neutron.article_list", compact("articles", "departments", "aside_advertisings", "advertising", "query", "user"));
        }


    }

    public function who_are()
    {
        $departments=Department::all();
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();

        $aside_advertisings=AsideAdvertising::all();
        return view("neutron.who_are", compact("articles", "departments", "aside_advertisings", "advertising"));

    }

/************************************************************************************************************** */

    public function article_list_basic()
    {

        $articles=Article::join('categories','categories.id','=','articles.category_id')
                ->join('sections','sections.id','=','categories.section_id')
                ->join('departments','departments.id','=','sections.department_id')
                ->select( 'categories.is_active as category_is_active', 'categories.id as category_id',
                 'articles.id', 'articles.name', 'articles.price','articles.is_active', 'articles.stock',
                 'articles.image1', 'articles.is_bargain', 'articles.stock', 'articles.is_new_collection',
                 'departments.id as department_id', 'departments.is_active as department_is_active',
                 'sections.id as section_id', 'sections.name as section_name', 'sections.is_active as section_is_active' )
                ->orderBy('name')
                ->where('articles.is_active', 1)->where('departments.is_active', 1)->where('sections.is_active', 1)
                ->where('categories.is_active', 1)->where('articles.stock', '>', 0)->where('articles.price', '>', 0);

        return $articles;


    }


}
