<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable=[
        'nombre',
        'apellido',
        'imagen',
        'telefono',
        'categoria_id'
    ];
    public function especialidad(){
        return $this->belongsTo(Categoria::class,'categoria_id');
    }
}
