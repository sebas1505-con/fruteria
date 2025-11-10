<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Envio;

class RepartidorController 
{
    public function index()
    {
        $envios = Envio::with(['venta.cliente'])->orderBy('id', 'DESC')->get();
        return view('repartidor', compact('envios'));
    }

    public function entregar($id)
    {
        $envio = Envio::findOrFail($id);
        $envio->estado = "entregado";
        $envio->save();

        return redirect()->route('repartidor')->with('success', '✅ Pedido marcado como entregado');
    }
}
