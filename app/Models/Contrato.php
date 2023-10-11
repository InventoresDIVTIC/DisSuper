<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;
    protected $fillable = ['name'];



    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
    public function setNameAttribute($value)//convierte el tenxto ingresado de nuevo contrato a mayusculas
    {
        $this->attributes['name'] = strtoupper($value);
    }
}
