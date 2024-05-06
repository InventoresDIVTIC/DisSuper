<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    protected $table = 'documentos';
    protected $fillable = ['nombre_archivo'];
  
    public function indicadores()
    {
        return $this->hasMany(IndicadorDocumentos::class, 'Id_Documento');
    }
    public function emisor()
    {
        return $this->belongsTo(User::class, 'Id_Usuario_Autor');
    }

    public function receptor()
    {
        return $this->belongsTo(User::class, 'Id_Usuario_Revisar');
    }
    // Método de acceso al documento binario
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'documento_id');
    }
}





