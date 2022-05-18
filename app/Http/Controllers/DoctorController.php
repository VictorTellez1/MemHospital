<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
        $categorias=Categoria::all();
        return view('doctores.create',compact('categorias'));
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
            'apellido'=>'required',
            'imagen'=>'required',
            'telefono'=>'required',
            'categoria_id'=>'required|numeric',
        ]);
        $ruta_imagen=$request['imagen']->store('principales','public');
        //Resize a la imagen
        $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
        $img->save();
        $doctor=new Doctor($data);
        $doctor->imagen=$ruta_imagen;
        $doctor->save();
        return back()->with('estado','Se registro el doctor');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('doctores.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $categorias=Categoria::all();
        return view('doctores.edit',compact('doctor','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data=$request->validate([
            'nombre'=>'required',
            'apellido'=>'required',
            'telefono'=>'required',
            'categoria_id'=>'required|numeric',
        ]);
        $doctor->nombre=$data['nombre'];
        $doctor->apellido=$data['apellido'];
        $doctor->telefono=$data['telefono'];
        $doctor->categoria_id=$data['categoria_id'];
        if(request('imagen')){
            $ruta_imagen=$request['imagen']->store('principales','public');
            //Resize a la imagen
            $img=Image::make(public_path("storage/{$ruta_imagen}"))->fit(800,600);
            $img->save();
            $doctor->imagen=$ruta_imagen;
        }
            $doctor->save();

            return redirect()->action([HomeController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
    }
}
