<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;
    protected $fillable = ['name',
                            'clave'];

    public function puestos()
    {
        return $this->belongsToMany(Puestos::class);
    }

    public function indicadores()
    {
        return $this->belongsToMany(Indicadores::class, 'actividades_indicadores');
    }
}
