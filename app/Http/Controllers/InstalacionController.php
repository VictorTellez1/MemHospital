<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

class InstalacionController extends Controller
{
    public function instalaciones(){
        $imagenes=Imagen::all();
        return view('publico.instalaciones',compact('imagenes'));
    }
}
