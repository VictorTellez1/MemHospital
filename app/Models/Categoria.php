<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable=[
        'nombre',
        'slug',
        'imagen',
        'descripcion',
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function especialidad(){
        return $this->hasMany(Doctor::class);
    }
}
