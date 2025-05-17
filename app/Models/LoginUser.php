<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoginUser extends Model
{
    //Importamos la clase HasFactory para poder utilizar los factorys
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ip_address',
        'user_agent',
        'login_at',
    ];

    //Creamos la relacion uno a muchos con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
