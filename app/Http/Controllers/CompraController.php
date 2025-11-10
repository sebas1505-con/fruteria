<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Envio;
use Illuminate\Routing\Controller;

class CompraController extends Controller
{
    public function index()
    {
        return view('compra');
    }

    public function finalizar(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'direccion' => 'required',
            'metodo' => 'required',
            'productos' => 'required|array',
            'total' => 'required|numeric'
        ]);

        // ✅ Crear registro de venta
        $venta = Venta::create([
            'nombre_cliente' => $data['nombre'],
            'correo_cliente' => $data['correo'],
            'direccion' => $data['direccion'],
            'metodo_pago' => $data['metodo'],
            'total' => $data['total']
        ]);

        // ✅ Guardar detalles de productos
        foreach ($data['productos'] as $producto) {
            DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto' => $producto['producto'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio_unitario']
            ]);
        }

        // ✅ Crear asignación de envío al repartidor
        Envio::create([
            'venta_id' => $venta->id,
            'estado' => 'Pendiente',
            'repartidor' => 'Juan Pérez' // puedes cambiarlo por consulta real
        ]);

        return response()->json([
            'mensaje' => 'Compra registrada y asignada al repartidor'
        ]);
    }
}
