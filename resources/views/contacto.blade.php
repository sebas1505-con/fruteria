
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacto - La Mejor Frutería</title>
  <link rel="stylesheet" href="/css/contacto.css">
  <link rel="icon" type="image/png" href="imagenes/icono.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  
  <!-- Navbar -->
  <header class="navbar">
    <div class="navbar-container">
      <h1 class="logo">La Mejor Frutería 🍊</h1>
      <nav>
        <ul class="nav-menu">
          <li><a href="{{'/'}}">Inicio</a></li>
          <li><a href="{{'productos'}}">Productos</a></li>
          <li><a href="{{'contacto'}}" class="active">Contacto</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Sección de contacto -->
  <main class="contact-section">
    <div class="contact-container">
      <h2>Contáctanos</h2>
      <p>¿Tienes alguna pregunta o deseas realizar un pedido especial? Envíanos un mensaje y te responderemos lo antes posible.</p>
      
      <form class="contact-form" action="#" method="post">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
        </div>
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" placeholder="tucorreo@example.com" required>
        </div>
        <div class="form-group">
          <label for="mensaje">Mensaje</label>
          <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
        </div>
        <button type="submit" class="btn-enviar">Enviar mensaje</button>
      </form>
    </div>

    <aside class="contact-info">
      <h3>Información de contacto</h3>
      <p><strong>Dirección:</strong> Calle de las Frutas #25, Ciudad Verde</p>
      <p><strong>Teléfono:</strong> +57 321 456 7890</p>
      <p><strong>Correo:</strong> contacto@lamejorfruteria.com</p>

      <div class="social-links">
        <a href="#"><img src="imagenes/facebook.png" alt="Facebook"></a>
        <a href="#"><img src="imagenes/instagram.png" alt="Instagram"></a>
        <a href="#"><img src="imagenes/whatsapp.png" alt="WhatsApp"></a>
      </div>
    </aside>
  </main>

  <footer>
