<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function encargado()
    {
        return $this->belongsTo(User::class, 'Encargado'); 
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'zonas_users');
    }

    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_zona');
    }
    public function puestos()
    {
        return $this->hasMany(Puestos::class);
    }
}



