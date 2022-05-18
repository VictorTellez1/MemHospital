<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;

class NosotrosController extends Controller
{
    public function nosotros(){
        $hospitales=Hospital::all();
        return view('publico.nosotros',compact('hospitales'));
    }
}
