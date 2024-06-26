<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicadores extends Model
{
    use HasFactory;

    public function actividades()
    {
        return $this->belongsToMany(Actividades::class, 'actividades_indicadores');
    }
}

