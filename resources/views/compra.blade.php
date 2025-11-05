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
  let total = 0;
  let productos_envio = [];

  const lista = document.getElementById('lista-compra');
  const totalFinal = document.getElementById('total-final');

  for (const [nombre, { precio, cantidad }] of Object.entries(carrito)) {
    const subtotal = precio * cantidad;
    total += subtotal;

    productos_envio.push({
      producto: nombre,
      cantidad,
      precio_unitario: precio
    });

    const li = document.createElement('li');
    li.textContent = `${nombre} × ${cantidad} = $${subtotal}`;
    lista.appendChild(li);
  }

  totalFinal.textContent = `Total a pagar: $${total}`;

  document.querySelector('#form-registro').addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(e.target);
    
    const data = {
      nombre: formData.get('nombre'),
      correo: formData.get('correo'),
      direccion: formData.get('direccion'),
      metodo: formData.get('metodo'),
      productos: productos_envio,
      total: total
    };

    const response = await fetch("{{ route('compra.finalizar') }}", {
      method: "POST",
      headers: { "Content-Type": "application/json", "X-CSRF-TOKEN": "{{ csrf_token() }}" },
      body: JSON.stringify(data)
    });

    const result = await response.json();
    alert(result.mensaje);

    localStorage.removeItem('carrito');
    window.location.href = "/frutas";
  });
</script>

</body>
</html>
