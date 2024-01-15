<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['user_id', 'message', 'read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'documento_id');
    }
    public function autor()
{
    return $this->belongsTo(User::class, 'autor');
}

}