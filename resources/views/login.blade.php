<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar Sesión - La Mejor Frutería</title>
  <link rel="stylesheet" href="/css/login.css">
  <link rel="icon" type="image/png" href="/imagenes/icono.jpg">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

  <div class="login-container">
    <div class="login-card">
      <h1 class="logo">🍉 La Mejor Frutería</h1>
      <h2>Iniciar Sesión</h2>

      @if ($errors->any())
        <div class="alert error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('login.post') }}" method="POST" class="login-form">
        @csrf
        <div class="form-group">
          <label for="correo">Correo electrónico</label>
          <input type="email" id="correo" name="correo" placeholder="tucorreo@example.com" required>
        </div>

        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="password" id="password" name="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn-login">Entrar</button>

        <p class="extra-text">
          ¿No tienes cuenta? <a href="{{ route('register.form') }}">Regístrate aquí</a>
        </p>
        <p class="extra-text">
          <a href="#">¿Olvidaste tu contraseña?</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
