<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;
    protected $fillable = ['venta_id', 'direccion_envio', 'fecha_envio', 'estado'];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }
    public function ventas() {
    return $this->belongsTo(Venta::class);
}

}
