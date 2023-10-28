<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puestos extends Model
{
    use HasFactory;

    protected $fillable = [
        'clave_puesto', // Asegúrate de que 'ClavePuesto' esté incluido en $fillable
        'nombre',
        'empresa_proceso',
        'area_responsabilidad',
        'rama_actividad',
        'especialidad',
        'zona_id',
    ];

    public function zona()
    {
        return $this->belongsTo(Zona::class);
    }
}
