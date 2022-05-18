<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Categoria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'nombre'=>'required',
            'imagen_principal'=>'required|image|max:1000',
            'descripcion'=>'required|min:50',
        ]);
        $ruta_imagen=$request['imagen_principal']->store('principales','public');
        $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
        $img->save();
        $slug=Str::slug($data['nombre']);
        $categoria=new Categoria($data);
        $categoria->imagen=$ruta_imagen;
        $categoria->slug=$slug;
        $categoria->save();

        return back()->with('estado','Se registro la categoria');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        $doctores=Doctor::where('categoria_id','=',$categoria->id)->get();
        return view('categoria.show',compact('categoria','doctores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data=$request->validate([
            'nombre'=>'required',
            'descripcion'=>'required',
        ]);
        $categoria->nombre=$data['nombre'];
        $categoria->descripcion=$data['descripcion'];
        if(request('imagen')){
            $ruta_imagen=$request['imagen']->store('principales','public');
            //Resize a la imagen
            $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
            $img->save();
            $categoria->imagen=$ruta_imagen;
        }
            $categoria->save();

            return redirect()->action([HomeController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

    }
}
