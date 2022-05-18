<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Instalar intervation image

        //Leer la imagen
        $ruta_imagen=$request->file('file')->store('hospital','public'); //Para almacenar es el store, crear el enlace simbolico php artisan storege:link
        //Resize a la imagen
        $imagen=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,450);
        //Guardar la imagen
        $imagen->save();

        //Almacenar con Modelo
        $imagenDB=new Imagen;
        $imagenDB->establecimiento=$request['uuid'];
        $imagenDB->ruta_imagen=$ruta_imagen;
        $imagenDB->save(); //Guarda en la base de datos

        //Retornar respuesta
        $respuesta=[
            'archivo'=>$ruta_imagen
        ];

        return response()->json($respuesta); //Sirve para acceder a informacion de formulario
        // return $request->file('file'); //Para leer archivos
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagen $imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen, Request $request)
    {
        $imagen=$request->get('imagen'); //Para obtener la ruta de la imagen
        // $respuesta=[
        //     'Imagen_eliminar'=>$imagen
        // ]; Esto te ayudaria a saber que se le esta enviando hacia el servidor
        if(File::exists('storage/'.$imagen)){
            //Elimina imagen del servidor
            File::delete('storage/'.$imagen);
            //Eliminar de la bd
            Imagen::where('ruta_imagen','=',$imagen)->delete();
            $respuesta=[
                'manesaje'=>'Imagen Eliminada',
                'imagen'=>$imagen
            ];
        }
        //Eliminar de la base de datos

        return response()->json($respuesta);
    }
}
