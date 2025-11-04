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
          <li><a href="{{'usuario'}}">Volver</a></li>
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
        <img src="imagenes/banano.jpg" alt="Banano" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Banano</a>
        <p>El mejor banano ¡Cómpralo ya!</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Banano', 3500)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/fresa.jpg" alt="Fresa" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Fresa</a>
        <p>Fresa rica ¡Cómprala ya!</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Fresa', 4000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/guayaba.jpg" alt="Guayaba" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Guayaba</a>
        <p>Rica guayaba ¡Cómprala ya!</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Guayaba', 3000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/uva.jpg" alt="Uva" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Uva</a>
        <p>Dulce y jugosa ¡Pruébala!</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Uva', 5000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/sandia.jpg" alt="Sandía" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Sandía</a>
        <p>Refrescante para el calor 🍉</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Sandía', 6000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/pera.jpg" alt="Pera" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Pera</a>
        <p>Deliciosa y suave 🍐</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Pera', 4000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/papaya.jpg" alt="Papaya" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Papaya</a>
        <p>Saludable y fresca 🧡</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Papaya', 5500)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/melon.jpg" alt="Melón" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Melón</a>
        <p>Suave y jugoso 🍈</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Melón', 5000)">Agregar al carrito</button>
      </div>
    </div>

    <div class="card">
      <div class="card-image">
        <img src="imagenes/manzana.jpg" alt="Manzana" />
      </div>
      <div class="card-body">
        <a href="#" class="card-title">Manzana</a>
        <p>Rica y crujiente 🍎</p>
        <button class="btn-comprar" onclick="agregarAlCarrito('Manzana', 4500)">Agregar al carrito</button>
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

  <!-- 🔹 SCRIPT -->
  <script>
    let carrito = {};
    const cartCount = document.getElementById('cart-count');
    const cartSidebar = document.getElementById('cart-sidebar');
    const cartItemsList = document.getElementById('cart-items');
    const totalDisplay = document.getElementById('total');

    function agregarAlCarrito(nombre, precio) {
      if (carrito[nombre]) {
        carrito[nombre].cantidad++;
      } else {
        carrito[nombre] = { precio, cantidad: 1 };
      }
      actualizarCarrito();
    }

    function eliminarDelCarrito(nombre) {
      delete carrito[nombre];
      actualizarCarrito();
    }

    function actualizarCarrito() {
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

      totalDisplay.textContent = `$${total}`;
      cartCount.textContent = count;
    }

    document.getElementById('cart-btn').addEventListener('click', () => {
      cartSidebar.classList.add('visible');
    });

    document.getElementById('close-cart').addEventListener('click', () => {
      cartSidebar.classList.remove('visible');
    });

    document.getElementById('btn-finalizar').addEventListener('click', () => {
      localStorage.setItem('carrito', JSON.stringify(carrito));
      window.location.href = '{{'compra'}}';
    });
  </script>
</body>
</html>
