<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuncionesPuestos extends Model
{
    protected $fillable = ['clave_funcion', 'nombre_funciones', 'tipo_funcion'];
    use HasFactory;
}
