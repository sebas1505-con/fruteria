<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios'; // Muy importante si tu tabla no se llama "users"

    protected $fillable = [
        'nombre',
        'correo',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    // Para que Auth use "correo" como identificador
    public function getAuthIdentifierName()
    {
        return 'correo';
    }
}
