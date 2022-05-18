<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\NosotrosController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\InstalacionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[InicioController::class,'inicio'])->name('inicio');
Route::get('/nosotros',[NosotrosController::class,'nosotros'])->name('nosotros');
Route::get('/instalaciones',[InstalacionController::class,'instalaciones'])->name('instalaciones');
Route::get('/contacto',[ContactoController::class,'contacto'])->name('contacto');
Route::post('/contacto',[ContactoController::class,'store'])->name('contacto.store');
Route::group(['middleware'=>['auth']],function(){

    Route::delete('/categoria/{categoria}',[CategoriaController::class,'destroy'])->name('categoria.destroy');
    Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categorias.create');
    Route::post('/categoria', [CategoriaController::class, 'store'])->name('categorias.store');
    Route::get('/categoria/{categoria}/edit',[CategoriaController::class,'edit'])->name('categoria.edit');
    Route::put('/categoria/{categoria}',[CategoriaController::class,'update'])->name('categoria.update');

    Route::delete('/doctor/{doctor}',[DoctorController::class,'destroy'])->name('doctor.destroy');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctores.create');
    Route::get('/doctor/{doctor}',[DoctorController::class,'show'])->name('doctor.show');
    Route::get('doctor/{doctor}/edit',[DoctorController::class,'edit'])->name('doctor.edit');
    Route::put('/doctor/{doctor}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::post('/doctor', [DoctorController::class, 'store'])->name('doctores.store');
    Route::get('/hospital/create', [HospitalController::class, 'create'])->name('hospitales.create');
    Route::post('/hospital', [HospitalController::class, 'store'])->name('hospitales.store');
    Route::get('/hospital/{hospital}/edit',[HospitalController::class,'edit'])->name('hospital.edit');
    Route::put('hospital/{hospital}',[HospitalController::class,'update'])->name('hospital.update');

    Route::post('/imagenes/store',[ImagenController::class,'store'])->name('imagenes.store');
    Route::post('/imagenes/destroy',[ImagenController::class,'destroy'])->name('imagenes.destroy');
});
Route::get('/categoria/{categoria}',[CategoriaController::class,'show'])->name('categoria.show');
Route::get('/doctor/{doctor}',[DoctorController::class,'show'])->name('doctor.show');
