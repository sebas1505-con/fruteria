<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Finalizar Compra 🍎</title>
  <link rel="stylesheet" href="css/fruta.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <!-- 🔹 NAVBAR -->
  <header class="navbar">
    <div class="navbar-container">
      <h1 class="logo">🧺 Finalizar Compra</h1>
      <a href="{{'frutas'}}" class="btn-comprar">Volver a la tienda</a>
    </div>
  </header>

  <!-- 🔹 CONTENIDO PRINCIPAL -->
  <main class="main-content finalizar-container">
    <section class="resumen-compra">
      <h2>Resumen de tu compra</h2>
      <ul id="lista-compra"></ul>
      <h3 id="total-final"></h3>

      <hr>

      <h2>Datos del comprador</h2>
      <form id="form-registro">
        <div class="campo">
          <label>Nombre completo:</label>
          <input type="text" id="nombre" required>
        </div>

        <div class="campo">
          <label>Correo electrónico:</label>
          <input type="email" id="correo" required>
        </div>

        <div class="campo">
          <label>Dirección de envío:</label>
          <input type="text" id="direccion" required>
        </div>

        <div class="campo">
          <label>Método de pago:</label>
          <select id="metodo" required>
            <option value="">Selecciona una opción</option>
            <option value="tarjeta">Tarjeta de crédito/débito</option>
            <option value="efectivo">Pago contra entrega</option>
            <option value="transferencia">Transferencia bancaria</option>
          </select>
        </div>

        <button type="submit" class="btn-finalizar">Confirmar Pedido ✅</button>
      </form>
    </section>
  </main>

  <script>
    const carrito = JSON.parse(localStorage.getItem('carrito')) || {};
    const listaCompra = document.getElementById('lista-compra');
    const totalFinal = document.getElementById('total-final');
    let total = 0;

    for (const [nombre, { precio, cantidad }] of Object.entries(carrito)) {
      const subtotal = precio * cantidad;
      total += subtotal;

      const li = document.createElement('li');
      li.textContent = `${nombre} × ${cantidad} = $${subtotal}`;
      listaCompra.appendChild(li);
    }

    totalFinal.textContent = `Total a pagar: $${total}`;

    document.getElementById('form-registro').addEventListener('submit', (e) => {
      e.preventDefault();

      const nombre = document.getElementById('nombre').value;
      const correo = document.getElementById('correo').value;
      const direccion = document.getElementById('direccion').value;
      const metodo = document.getElementById('metodo').value;

      if (!nombre || !correo || !direccion || !metodo) {
        alert("Por favor completa todos los campos antes de confirmar tu pedido.");
        return;
      }

      const venta = {
        cliente: { nombre, correo, direccion },
        metodo_pago: metodo,
        productos: Object.entries(carrito).map(([nombre, datos]) => ({
          producto: nombre,
          cantidad: datos.cantidad,
          precio_unitario: datos.precio,
          subtotal: datos.precio * datos.cantidad
        })),
        total: total,
        fecha: new Date().toLocaleString()
      };

      console.log("📦 Datos enviados al servidor:", venta);
      alert(`Gracias por tu compra, ${nombre} 🥰 Tu pedido fue registrado.`);
      localStorage.removeItem('carrito');
      window.location.href = "{{'frutas'}}";
    });
  </script>
</body>
</html>
