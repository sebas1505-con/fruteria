<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro - La Mejor Frutería</title>
  <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>
  <div class="register-container">
    <div class="register-card">
      <h2>REGÍSTRATE</h2>

      @if(session('success'))
        <div class="alert success">
          {{ session('success') }}
        </div>
      @endif

      @if ($errors->any())
        <div class="alert error">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="input-group">
          <input type="text" name="nombre" placeholder="Nombre completo" required value="{{ old('nombre') }}">
        </div>

        <div class="input-group">
          <input type="email" id="correo" name="correo" placeholder="Correo electrónico" required value="{{ old('correo') }}">
        </div>

        <div class="input-group">
          <input type="password" name="password" placeholder="Contraseña" required>
        </div>

        <div class="input-group">
          <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required>
        </div>

        <button type="submit">Crear cuenta</button>
      </form>

      <a href="{{ route('login') }}" class="forgot">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
  </div>
</body>
</html>
