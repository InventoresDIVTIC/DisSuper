<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'RPE_Empleado', // Agrega el campo RPE_Empleado
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the role associated with the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user','user_id','role_id');

    }
    public function hasRole($roleName)
    {
        return $this->roles()->where('id', 1)->where('name', $roleName)->exists();
        
    }
    public function empleados()
    {
        return $this->belongsToMany(Empleado::class, 'empleado_user', 'user_id', 'empleado_id');
    }
    public function empleado()
    {
        return $this->hasOne(Empleado::class, 'user_id');
    }
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
    public function empleado_USER()
    {
        return $this->hasOne(Empleado::class);
    }
   

}
