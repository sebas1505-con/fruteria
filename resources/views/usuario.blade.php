<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FrutaPura 🍍 | Usuario</title>
  <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
  <link rel="icon" type="image/png" href="{{ asset('imagenes/icono.jpg') }}">
</head>
<body>
  <!-- HEADER -->
  <header class="navbar">
    <h1 class="logo">🍓 FrutaPura</h1>
    <nav>
      <ul class="nav-menu">
        <li><a href="{{ url('/') }}">Inicio</a></li>
        <li><a href="{{ url('frutas') }}" class="active">Frutas</a></li>
        <li><a href="{{ url('vegetales') }}">Vegetales</a></li>
        <li><a href="{{ url('contacto') }}">Perfil</a></li>
        <li><a href="{{ url('login') }}">Cerrar sesión</a></li>
      </ul>
    </nav>

    <button class="cart-btn" id="cart-btn">
      🛒
      <span class="cart-count" id="cart-count">0</span>
    </button>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-text">
      <h2>¡Frescura y calidad directo del campo a tu mesa! 🍓</h2>
      <p>Descubre las frutas más deliciosas, naturales y saludables.</p>
      <a href="{{ url('productos') }}" class="btn">Ver mas</a>
    </div>
  </section>

  <!-- PRODUCTOS -->
  <main class="main-content">
    <div class="card">
      <img src="{{ asset('imagenes/banano.jpg') }}" alt="Banano">
      <div class="card-body">
        <a href="#" class="card-title">Banano Premium</a>
        <p>Dulce, natural y lleno de energía.</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Banano', 1500)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('imagenes/fresa.jpg') }}" alt="Fresa">
      <div class="card-body">
        <a href="#" class="card-title">Fresas Frescas</a>
        <p>Frescura pura para tus postres o batidos.</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Fresas', 2000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <img src="{{ asset('imagenes/manzana.jpg') }}" alt="Manzana">
      <div class="card-body">
        <a href="#" class="card-title">Manzana Roja</a>
        <p>Crujiente, jugosa y saludable.</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Manzana', 1800)">Agregar al carrito</button>
      </div>
    </div>
  </main>

  <!-- CARRITO -->
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

  <!-- FOOTER -->
  <footer>
    <p>© 2025 FrutaPura · Todos los derechos reservados 🍉</p>
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
