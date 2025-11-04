<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito - FrutaPura</title>
  <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('imagenes/icono.jpg') }}">
</head>
<body>
  <header>
    <h1>🛒 Tu Carrito</h1>
    <nav>
      <a href="{{ url('/usuario') }}" class="btn-volver">Volver</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn">Cerrar sesión</button>
      </form>
    </nav>
  </header>

  <main class="carrito-contenido">
    <h2>Productos agregados</h2>
    <table id="tabla-carrito">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio Unitario</th>
          <th>Subtotal</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody id="carrito-body"></tbody>
    </table>

    <div class="total-container">
      <h3>Total a pagar: <span id="total">$0</span></h3>
      <button class="btn-comprar" id="btn-comprar">Proceder al pago 💳</button>
    </div>
  </main>

  <footer>
    <p>© 2025 FrutaPura · Todos los derechos reservados 🍉</p>
  </footer>

  <script>
    // Cargar carrito desde localStorage
    let carrito = JSON.parse(localStorage.getItem('carrito')) || {};
    const tbody = document.getElementById('carrito-body');
    const totalDisplay = document.getElementById('total');

    function actualizarTabla() {
      tbody.innerHTML = "";
      let total = 0;

      for (const [nombre, { precio, cantidad }] of Object.entries(carrito)) {
        const subtotal = precio * cantidad;
        total += subtotal;

        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${nombre}</td>
          <td>${cantidad}</td>
          <td>$${precio}</td>
          <td>$${subtotal}</td>
          <td><button onclick="eliminar('${nombre}')">❌</button></td>
        `;
        tbody.appendChild(tr);
      }

      totalDisplay.textContent = `$${total}`;
    }

    function eliminar(nombre) {
      delete carrito[nombre];
      localStorage.setItem('carrito', JSON.stringify(carrito));
      actualizarTabla();
    }

    // Proceder al pago
    document.getElementById('btn-comprar').addEventListener('click', () => {
      localStorage.setItem('carrito', JSON.stringify(carrito));
      window.location.href = "{{ url('/pago') }}";
    });

    // Bloquear volver al login después de cerrar sesión
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = () => window.location.replace("/login");

    document.addEventListener('DOMContentLoaded', actualizarTabla);
  </script>
</body>
</html>
