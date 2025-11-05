<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Repartidor | Entregas 🚚</title>

<link rel="stylesheet" href="{{ asset('css/repartidor.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>

<header class="nav">
  <h2 class="logo">🚚 Panel del Repartidor</h2>

  <form action="{{ route('repartidor') }}" method="POST">
    @csrf
    <button class="btn-logout">Cerrar Sesión ✖</button>
  </form>
</header>

@if(session('success'))
  <div class="alert-success">{{ session('success') }}</div>
@endif

<section class="pedidos-container">

  @forelse($envios as $envio)
  <div class="pedido-card">
    <h3>Pedido #{{ $envio->id }}</h3>

    <p><strong>Cliente:</strong> {{ $envio->venta->cliente->nombre }}</p>
    <p><strong>Dirección:</strong> {{ $envio->direccion_envio }}</p>
    <p><strong>Total:</strong> ${{ $envio->venta->total }}</p>
    <p><strong>Fecha:</strong> {{ $envio->fecha_envio }}</p>

    <p class="estado">
      Estado:
      @if($envio->estado == 'en_camino')
        <span class="encamino">🟠 En camino</span>
      @else
        <span class="entregado">✅ Entregado</span>
      @endif
    </p>

    @if($envio->estado == "en_camino")
    <form method="POST" action="{{ route('repartidor.entregar', $envio->id) }}">
      @csrf
      <button class="btn-entregar">Marcar como entregado ✅</button>
    </form>

    <button class="btn-gps" onclick="verMapa('{{ $envio->direccion_envio }}')">📍 Ver ubicación</button>
    @endif
  </div>
  @empty

  <h2 class="no-pedidos">✅ No hay pedidos pendientes ahora</h2>

  @endforelse
</section>

<!-- SIMULACIÓN GPS -->
<div id="mapa-contenedor" class="mapa-oculto">
  <h2>📍 Rastreo GPS</h2>
  <p id="direccion-mapa"></p>
  <iframe id="mapa" width="100%" height="300" style="border-radius: 10px;"></iframe>
  <button class="btn-cerrar" onclick="cerrarMapa()">Cerrar</button>
</div>

<script>
function verMapa(direccion) {
  document.getElementById("direccion-mapa").innerText = direccion;
  document.getElementById("mapa").src = "https://www.google.com/maps?q=" + encodeURIComponent(direccion) + "&output=embed";
  document.getElementById("mapa-contenedor").classList.remove("mapa-oculto");
}

function cerrarMapa() {
  document.getElementById("mapa-contenedor").classList.add("mapa-oculto");
}
</script>

</body>
</html>
