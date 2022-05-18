<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function contacto(){
        $categorias=Categoria::all();
        return view('publico.contacto',compact('categorias'));
    }
    public function store(Request $request){
        $data=$request->validate([
            'nombre'=>'required',
            'telefono'=>'required',
            'edad'=>'required',
            'categoria_id'=>'required|numeric',
            'descripcion'=>'required',
        ]);
        return back()->with('estado','Se ha agendado tu cita');
    }
}
