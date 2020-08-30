<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\Article;
use App\Advertising;
use App\AsideAdvertising;
use App\Role;
use Illuminate\Support\Facades\Auth;

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





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.advertising.create", compact("aside_advertisings", "advertising", "user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada=$request->only('advertising_header', 'bargain_header', 'new_collection_header', 'who_are', 'contact');
        $archivo=Advertising::create($entrada);

        if($request->file('image_header')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('image_header'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['image_header'=>$path])->save();   //guardar en base de datos la ruta
        }
        if($request->file('logo')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('logo'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['logo'=>$path])->save();   //guardar en base de datos la ruta
        }
        return redirect()->action('NeutronController@index');
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




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        if(empty($advertising)){
            return view('admin.advertising.pagina_en_construccion');}

        return view("admin.advertising.edit", compact("advertising", "aside_advertisings", "user"));
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
        $entrada=Advertising::findOrFail($id);
        $entrada->update($request->only('advertising_header', 'bargain_header', 'new_collection_header', 'who_are', 'contact'));
        if($request->file('image_header')){        // verifica si hay un archivo
            $path1=$entrada->image_header;
            Storage::disk('public')->delete($path1);
            $path=Storage::disk('public')->put('images', $request->file('image_header'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['image_header'=>$path])->update();   //guardar en base de datos la ruta
        }
        if($request->file('logo')){        // verifica si hay un archivo
            $path2=$entrada->logo;
            Storage::disk('public')->delete($path2);
            $path=Storage::disk('public')->put('images', $request->file('logo'));  //almacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['logo'=>$path])->update();   //guardar en base de datos la ruta
        }
        return redirect()->action('NeutronController@index');
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
