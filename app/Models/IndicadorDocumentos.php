<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicadorDocumentos extends Model
{
    protected $table = 'indicador_documentos';

    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'Id_Documento');
    }
}
