<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = 'documentos';

    public function indicadores()
    {
        return $this->hasMany(IndicadorDocumento::class, 'Id_Documento');
    }
}