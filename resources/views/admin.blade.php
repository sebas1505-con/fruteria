<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel Administrador - FrutaPura</title>
  <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">
</head>
<body>
  <header>
    <h1>⚙️ Panel de Administración</h1>
    <nav>
      <a href="{{ url('/') }}">Inicio</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn">Cerrar sesión</button>
      </form>
    </nav>
  </header>

  <main class="destacados">
    <h2>Gestión del Sistema</h2>

    <div class="cards">
      <div class="card">
        <h3>Usuarios</h3>
        <p>Ver, editar o eliminar usuarios registrados.</p>
        <a href="#" class="btn-comprar">Gestionar</a>
      </div>

      <div class="card">
        <h3>Productos</h3>
        <p>Agregar, modificar o eliminar productos.</p>
        <a href="#" class="btn-comprar">Administrar</a>
      </div>

      <div class="card">
        <h3>Ventas</h3>
        <p>Ver reportes de ventas y facturación.</p>
        <a href="#" class="btn-comprar">Revisar</a>
      </div>
    </div>
  </main>

  <script>
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function() {
      window.location.replace("/login");
    };
  </script>
</body>
</html>
