<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Nombre real de la tabla
    protected $table = 'usuarios';

    // Llave primaria
    protected $primaryKey = 'id_usuario'; // cámbialo si tu campo es distinto

    // Campos asignables
    protected $fillable = [
        'nombre',
        'correo',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Campo usado para login (Auth)
    public function getAuthIdentifierName()
    {
        return 'correo';
    }
}
