<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\AsideAdvertising;

class AsideAdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.aside-advertising.index", compact("aside_advertisings"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aside_advertisings=AsideAdvertising::all();
        return view("admin.aside-advertising.create", compact("aside_advertisings"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $entrada=$request->only('advertising_text','advertising_image','advertising_url');

        $archivo=AsideAdvertising::create($entrada);

        if($request->file('advertising_image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('advertising_image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['advertising_image'=>asset($path)])->save();   //guardar en base de datos la ruta
        }

        return redirect()->route('aside-advertising.index')->with('info', 'la publicidad fue creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aside_advertising=AsideAdvertising::findOrfail($id);
        $aside_advertisings=AsideAdvertising::all();
        $aside_advertising->created_at->toFormattedDateString();
        $aside_advertising->updated_at->toFormattedDateString();


        return view("admin.aside-advertising.show", compact("aside_advertising", "aside_advertisings"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aside_advertising=AsideAdvertising::findOrfail($id);
        $aside_advertisings=AsideAdvertising::all();

        return view("admin.aside-advertising.edit", compact("aside_advertising", "aside_advertisings"));
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
        $entrada=AsideAdvertising::findOrfail($id);
        echo "hola";

        $entrada->update($request->only('advertising_text','advertising_image','advertising_url'));
        if($request->file('advertising_image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('advertising_image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['advertising_image'=>asset($path)])->update();   //guardar en base de datos la ruta
        }

        return redirect()->route('aside-advertising.show', $entrada->id)->with('info', 'la publicida fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aside_advertising=AsideAdvertising::findOrfail($id);
        $aside_advertising->delete();
        return redirect()->route('aside-advertising.index')->with('info', 'La publicidad fue eliminada');
    }
}
