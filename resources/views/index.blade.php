<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FrutaPura</title>
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="imagenes/icono.jpg">

</head>

<body>
  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="imagenes/fruta.jpg" alt="Logo FrutaPura" />
      <h1>FrutaPura</h1>
    </div>
    <nav>
      <ul>
        <li><a href="{{'/'}}" class="active">Inicio</a></li>
        <li><a href="{{'productos'}}">Productos</a></li>
        <li><a href="{{'sobre'}}">Sobre nosotros</a></li>
        <li><a href="{{'contacto'}}">Contacto</a></li>
        <button class="menu-btn" id="menu-btn">
        <svg class="menu-icon" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
      </ul>
    </nav>
  </header>
  <section class="hero">
    <div class="hero-text">
      <h2>En FrutaPura encuentras lo mejor, con frescura y calidad</h2>
      <p>Las frutas más deliciosas y frescas directo del campo a tu mesa.</p>
      <a href="productos.html" class="btn">Ver productos</a>
    </div>
  </section>
  <section class="destacados">
    <h2>Frutas destacadas</h2>
    <div class="cards">
      <div class="card">
        <img src="imagenes/banano.jpg" alt="Banano" />
        <h3>Banano Premium</h3>
        <p>Dulce, natural y perfecto para cualquier momento del día.</p>
      </div>
      <div class="card">
        <img src="imagenes/fresa.jpg" alt="Fresa" />
        <h3>Fresas Frescas</h3>
        <p>Ideales para postres, batidos o disfrutar solas. ¡Frescura pura!</p>
      </div>
      <div class="card">
        <img src="imagenes/manzana.jpg" alt="Manzana" />
        <h3>Manzanas Rojas</h3>
        <p>Crujientes y jugosas, una explosión de sabor saludable.</p>
      </div>
    </div>
  </section>
  <footer>
    <p>© 2025 FrutaPura · Todos los derechos reservados</p>
    <p>Hecho con amor y por la naturaleza</p>
  </footer>
</body>
</html>
