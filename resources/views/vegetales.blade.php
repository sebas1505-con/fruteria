<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>La Mejor Frutería 🍓</title>
  <link rel="stylesheet" href="css/fruta.css" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" href="imagenes/icono.jpg" type="image/png">
</head>

<body>
  <!-- 🔹 NAVBAR -->
  <header class="navbar">
    <div class="navbar-container">
      <h1 class="logo">🍊 La Mejor Frutería</h1>
      <nav>
        <ul class="nav-menu">
          <li><a href="{{'/'}}" class="active">Inicio</a></li>
          <li><a href="{{'productos'}}">Productos</a></li>
          <li><a href="{{'contacto'}}">Contacto</a></li>
        </ul>
      </nav>
      <button class="cart-btn" id="cart-btn">
        🛒
        <span class="cart-count" id="cart-count">0</span>
      </button>
    </div>
  </header>

  <!-- 🔹 CONTENIDO PRINCIPAL -->
  <main class="main-content">
    <!-- 👇 Todos tus productos originales -->
    <div class="card">
      <div class="card-image">
        <img src="imagenes/tomatearbol.jpg" alt="Banano" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Banano</a>
        <p>El mejor banano ¡Cómpralo ya!</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Banano', 3500)">Agregar al carrito</button>
      </div>
    </div>

  </main>

  <!-- 🔹 SIDEBAR DEL CARRITO -->
  <aside class="cart-sidebar" id="cart-sidebar">
    <div class="cart-header">
      <h2>🛒 Tu Carrito</h2>
      <button id="close-cart">&times;</button>
    </div>
    <ul class="cart-items" id="cart-items"></ul>
    <div class="cart-total">
      <p>Total: <span id="total">$0</span></p>
      <button class="btn-finalizar" id="btn-finalizar">Finalizar Compra</button>
    </div>
  </aside>

  <!-- 🔹 FOOTER -->
  <footer>
    <p>© 2025 La Mejor Frutería · Todos los derechos reservados 🍇</p>
  </footer>

  <script>
  // ==============================
  // 🔹 Variables globales
  // ==============================
  let carrito = JSON.parse(localStorage.getItem('carrito')) || {};

  const cartCount = document.getElementById('cart-count');
  const cartItemsList = document.getElementById('cart-items');
  const totalDisplay = document.getElementById('total');

  // ==============================
  // 🔹 Función: Agregar al carrito
  // ==============================
  function agregarAlCarrito(nombre, precio) {
    if (carrito[nombre]) {
      carrito[nombre].cantidad++;
    } else {
      carrito[nombre] = { precio, cantidad: 1 };
    }
    guardarCarrito();
    actualizarCarrito();
  }

  // ==============================
  // 🔹 Función: Eliminar producto
  // ==============================
  function eliminarDelCarrito(nombre) {
    delete carrito[nombre];
    guardarCarrito();
    actualizarCarrito();
  }

  // ==============================
  // 🔹 Función: Actualizar vista del carrito
  // ==============================
  function actualizarCarrito() {
    if (!cartItemsList) return; // Evita error si el HTML no tiene lista
    cartItemsList.innerHTML = "";
    let total = 0;
    let count = 0;

    for (const [nombre, { precio, cantidad }] of Object.entries(carrito)) {
      const subtotal = precio * cantidad;
      total += subtotal;
      count += cantidad;

      const li = document.createElement("li");
      li.innerHTML = `
        ${nombre} × ${cantidad} = $${subtotal}
        <button class="btn-eliminar" onclick="eliminarDelCarrito('${nombre}')">🗑️</button>
      `;
      cartItemsList.appendChild(li);
    }

    if (totalDisplay) totalDisplay.textContent = `$${total}`;
    if (cartCount) cartCount.textContent = count;
  }

  // ==============================
  // 🔹 Función: Guardar carrito
  // ==============================
  function guardarCarrito() {
    localStorage.setItem('carrito', JSON.stringify(carrito));
  }

  // ==============================
  // 🔹 Botón: Carrito → Ir a la vista "carrito"
  // ==============================
  const btnCarrito = document.getElementById('cart-btn');
  if (btnCarrito) {
    btnCarrito.addEventListener('click', () => {
      window.location.href = "{{ url('carrito') }}"; // redirige a la vista carrito
    });
  }

  // ==============================
  // 🔹 Botón: Finalizar compra
  // ==============================
  const btnFinalizar = document.getElementById('btn-finalizar');
  if (btnFinalizar) {
    btnFinalizar.addEventListener('click', () => {
      localStorage.setItem('carrito', JSON.stringify(carrito));
      window.location.href = "{{ url('compra') }}";
    });
  }

  // ==============================
  // 🔹 Cerrar sesión → limpiar carrito
  // ==============================
  const logoutLink = document.querySelector('a[href*="login"]');
  if (logoutLink) {
    logoutLink.addEventListener('click', () => {
      localStorage.removeItem('carrito');
    });
  }

  // ==============================
  // 🔹 Al cargar: actualizar vista
  // ==============================
  document.addEventListener('DOMContentLoaded', actualizarCarrito);
</script>
</body>
</html>
