<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - La Mejor Frutería</title>
  <link rel="stylesheet" href="/css/login.css">
  <link rel="icon" type="image/png" href="imagenes/icono.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-container">
    <div class="login-card">
      <h1 class="logo">🍉 La Mejor Frutería</h1>
      <h2>Iniciar Sesión</h2>

      <form action="#" method="POST" class="login-form">
        <div class="form-group">
          <label for="email">Correo electrónico</label>
          <input type="email" id="email" name="email" placeholder="tucorreo@example.com" required>
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-login">Entrar</button>

        <p class="extra-text">
          ¿No tienes cuenta? <a href="registro.html">Regístrate aquí</a>
        </p>
        <p class="extra-text">
          <a href="#">¿Olvidaste tu contraseña?</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
