<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividades extends Model
{
    use HasFactory;
    protected $fillable = ['name',
                            'clave'];

    public function puestos()
    {
        return $this->belongsToMany(puestos::class);
    }

    public function indicadores()
    {
        return $this->belongsToMany(Indicadores::class, 'actividades_indicadores');
    }
}
