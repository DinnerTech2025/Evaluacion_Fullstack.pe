<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{

    //Importamos la clase HasFactory para poder utilizar los factorys
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'user_id',
    ];


    //Creamos la relacion uno a uno con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
