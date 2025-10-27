<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>La Mejor Frutería</title>
  <link rel="icon" type="image/png" href="imagenes/icono.jpg">
  <link rel="stylesheet" href="/css/productos.css">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="navbar-container">
      <div class="navbar-logo">
        <h1>La Mejor Frutería 🍎</h1>
      </div>

      <ul class="navbar-menu">
        <li><a href="index.html">Inicio</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="login.html">Contacto</a></li>

      </ul>

      <button class="btn-ver-ahora" onclick="window.location.href='login.html'">
        Iniciar Sesión
      </button>

      <button class="menu-btn" id="menu-btn">
        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </nav>

  <!-- Cards -->
  <section class="cards">
    <div class="card">
      <img src="imagenes/fruta.jpg" alt="Frutas frescas" />
      <h3>Frutas</h3>
      <a href="frutas.html" class="btn">Ver más</a>
    </div>

    <div class="card">
      <img src="imagenes/vegetales.jpg" alt="Vegetales orgánicos" />
      <h3>Verduras</h3>
      <a href="vegetales.html" class="btn">Ver más</a>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>© 2025 La Mejor Frutería · Todos los derechos reservados</p>
    <p>Hecho con amor y por la naturaleza 🌱</p>
  </footer>

</body>
</html>
