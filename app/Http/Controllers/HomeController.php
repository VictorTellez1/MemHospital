<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Categoria;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hospitales=Hospital::all();
        $categorias=Categoria::all();
        $doctores=Doctor::all();
        return view('home',compact('categorias','doctores','hospitales'));
    }
}
