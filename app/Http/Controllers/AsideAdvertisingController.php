<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\AdvertisingRequest;
use App\AsideAdvertising;
use App\Advertising;
use Illuminate\Support\Facades\Auth;

class AsideAdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.aside-advertising.index", compact("aside_advertisings", "advertising", "user"));
    }

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

        return view("admin.aside-advertising.create", compact("aside_advertisings", "advertising", "user"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdvertisingRequest $request)
    {

        $entrada=$request->only('advertising_text','advertising_url');

        $archivo=AsideAdvertising::create($entrada);

        if($request->file('advertising_image')){        // verifica si hay un archivo
            $path=Storage::disk('public')->put('images', $request->file('advertising_image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $archivo->fill(['advertising_image'=>$path])->save();   //guardar en base de datos la ruta
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
        $advertisings=Advertising::all();
        $advertising=$advertisings->first();
        $aside_advertising=AsideAdvertising::findOrFail($id);
        $aside_advertisings=AsideAdvertising::all();
        $aside_advertising->created_at->toFormattedDateString();
        $aside_advertising->updated_at->toFormattedDateString();
        $user = Auth::user();

        return view("admin.aside-advertising.show", compact("aside_advertising", "aside_advertisings", "advertising", "user"));
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
        $aside_advertising=AsideAdvertising::findOrFail($id);
        $aside_advertisings=AsideAdvertising::all();
        $user = Auth::user();

        return view("admin.aside-advertising.edit", compact("aside_advertising", "aside_advertisings", "advertising", "user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdvertisingRequest $request, $id)
    {
        $entrada=AsideAdvertising::findOrFail($id);

        $entrada->update($request->only('advertising_text','advertising_url'));
        if($request->file('advertising_image')){        // verifica si hay un archivo
            $path1=$entrada->image;
            Storage::disk('public')->delete($path1);

            $path=Storage::disk('public')->put('images', $request->file('advertising_image'));  //alamacenar en el disco publico, carpeta images, el archivo file
            $entrada->fill(['advertising_image'=>$path])->update();   //guardar en base de datos la ruta
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

        $aside_advertising=AsideAdvertising::findOrFail($id);
        $path=$aside_advertising->image;
        Storage::disk('public')->delete($path);
        $aside_advertising->delete();
        return redirect()->route('aside-advertising.index')->with('info', 'La publicidad fue eliminada');
    }
}
