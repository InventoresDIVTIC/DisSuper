<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'empleado_user', 'empleado_id', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
    public function user_and_empleado()
    {
        return $this->belongsTo(User::class);
    }

    public function zonas()
    {
        return $this->belongsToMany(Zona::class, 'empleado_zona');
    }
   
   
   

}
