<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Categoria;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function inicio(){
        $doctores=Doctor::all();
        $categorias=Categoria::all();
        return view('publico.inicio',compact('doctores','categorias'));
    }
}
