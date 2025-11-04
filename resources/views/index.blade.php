<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>FrutaPura</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('imagenes/icono.jpg') }}">
</head>

<body>
  <!-- HEADER -->
  <header>
    <div class="logo">
      <img src="{{ asset('imagenes/fruta.jpg') }}" alt="Logo FrutaPura" />
      <h1>FrutaPura</h1>
    </div>
    <nav>
      <ul>
        <li><a href="{{ url('/') }}" class="active">Inicio</a></li>
        <li><a href="{{ url('login') }}">Productos</a></li>
        <li><a href="{{ url('sobre') }}">Sobre nosotros</a></li>
        <li><a href="{{ url('contacto') }}">Contacto</a></li>
        <li><a href="{{ url('login') }}">Registrate</a></li>
      </ul>
    </nav>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-text">
      <h2>Frescura y calidad directo del campo a tu mesa 🍓</h2>
      <p>Descubre las frutas más deliciosas, naturales y saludables.</p>
      <a href="{{ url('login') }}" class="btn">Iniciar sesión</a>
    </div>
  </section>

  <!-- DESTACADOS -->
  <section class="destacados">
    <h2>Frutas destacadas</h2>
    <div class="cards">
      <div class="card">
        <img src="{{ asset('imagenes/banano.jpg') }}" alt="Banano" />
        <h3>Banano Premium</h3>
        <p>Dulce, natural y perfecto para cualquier momento del día.</p>
        <a href="{{ url('login') }}" class="btn-comprar">Más información</a>
      </div>

      <div class="card">
        <img src="{{ asset('imagenes/fresa.jpg') }}" alt="Fresa" />
        <h3>Fresas Frescas</h3>
        <p>Ideales para postres, batidos o disfrutar solas. ¡Frescura pura!</p>
        <a href="{{ url('login') }}" class="btn-comprar">Más información</a>
      </div>

      <div class="card">
        <img src="{{ asset('imagenes/manzana.jpg') }}" alt="Manzana" />
        <h3>Manzanas Rojas</h3>
        <p>Crujientes y jugosas, una explosión de sabor saludable.</p>
        <a href="{{ url('login') }}" class="btn-comprar">Más información</a>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>© 2025 FrutaPura · Todos los derechos reservados 🍇</p>
    <p>Hecho con amor y por la naturaleza</p>
  </footer>
</body>
</html>
