<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'colonia',
        'lat',
        'lng',
        'telefono',
        'apertura',
        'cierre',
        'uuid'
    ];
}
