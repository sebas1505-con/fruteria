<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panel de Usuario - FrutaPura</title>
  <link rel="stylesheet" href="/css/usuario.css">
  <link rel="icon" type="image/png" href="/imagenes/icono.jpg">
</head>
<body>

<header>
  <div class="logo">
    <img src="/imagenes/fruta.jpg" alt="Logo FrutaPura">
    <h1>FrutaPura</h1>
  </div>

  <nav>
    <ul>
      <li><a href="{{ url('/') }}">Inicio</a></li>
      <li><a href="{{ url('/productos') }}">Productos</a></li>
      <li><a href="{{ url('/sobre') }}">Sobre nosotros</a></li>
      <li><a href="{{ url('/contacto') }}">Contacto</a></li>
      <li><a class="active" href="{{ url('/usuario') }}">Mi cuenta</a></li>
    </ul>
  </nav>
</header>
<h1>Bienvenido, {{ Auth::user()->nombre }}</h1>
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

  <div class="perfil-info">
    <div class="perfil-card">
      <img src="/imagenes/user.png" alt="Foto">
      <h3>{{ Auth::user()->name }}</h3>
      <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
      <p><strong>Rol:</strong> Cliente</p>
    </div>

    <div class="perfil-acciones">
      <h3>Acciones rápidas</h3>
      <button>Editar datos</button>
      <button>Ver pedidos</button>
      <button>Cerrar sesión</button>
    </div>
  </div>
</section>

<section class="pedidos">
  <h2>Mis pedidos recientes</h2>
  <table>
    <thead>
      <tr>
        <th>Pedido #</th>
        <th>Fecha</th>
        <th>Estado</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>#0123</td>
        <td>21/01/2025</td>
        <td>Entregado
