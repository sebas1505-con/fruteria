<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pago - FrutaPura</title>
  <link rel="stylesheet" href="{{ asset('css/pago.css') }}">
</head>
<body>
  <header>
    <h1>💳 Confirmar Pago</h1>
    <nav>
      <a href="{{ url('/carrito') }}">← Volver al carrito</a>
    </nav>
  </header>

  <main class="destacados">
    <h2>Detalles de tu compra</h2>

    <form action="{{ route('compra') }}" method="POST" class="form-pago">
      @csrf
      <div>
        <label>Nombre completo</label>
        <input type="text" name="nombre" required>
      </div>

      <div>
        <label>Dirección de envío</label>
        <input type="text" name="direccion" required>
      </div>

      <div>
        <label>Método de pago</label>
        <select name="metodo" required>
          <option value="">Seleccionar...</option>
          <option value="tarjeta">Tarjeta de crédito</option>
          <option value="transferencia">Transferencia bancaria</option>
          <option value="contraentrega">Pago contra entrega</option>
        </select>
      </div>

      <button type="submit" class="btn-comprar">Finalizar compra ✅</button>
    </form>
  </main>

  <script>
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
      window.location.replace("/login");
    };
  </script>
</body>
</html>
