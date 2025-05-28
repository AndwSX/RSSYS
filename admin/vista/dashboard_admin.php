<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Inicio | Risomazys</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="assets/css/dashboardAdmin.css">
</head>
<body>
<!-- Barra superior -->
<nav class="navbar navbar-expand-lg navbar-dark bg-teal fixed-top">
  <div class="container-fluid">
    <button class="btn btn-light me-2" id="toggleSidebar"><i class="bi bi-list"></i></button>
    <span class="navbar-brand mb-0 h1">
      <img src="../Logo/image.png" alt="Logo" width="50" height="30" class="d-inline-block align-text-top me-2">
      Risomazys
    </span>
    <div class="dropdown ms-auto">
      <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown">
        Administrador
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li><a class="dropdown-item" href="#">Editar perfil</a></li>
        <li><a class="dropdown-item" href="#">Configuración</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/homepagephp/controlador/cerrar_sesion.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Contenedor principal -->
<div class="d-flex">
  
  <!-- Sidebar -->
  <nav class="sidebar bg-teal p-3" id="sidebar">
    <ul class="nav flex-column mt-4">
      <li class="nav-item mb-2">
        <a href="#" class="nav-link text-white" id="inicioLink">
          <i class="bi bi-house-door me-2"></i>Inicio
        </a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#productosSubmenu" aria-expanded="false">
          <i class="bi bi-box me-2"></i>Productos
        </a>
        <ul class="collapse ps-4" id="productosSubmenu">
          <li><a class="nav-link text-white" href="#" id="registrarProducto">Registrar Producto</a></li>
          <li><a class="nav-link text-white" href="#" id="verProductos">Ver productos</a></li>
          <li><a class="nav-link text-white" href="#" id="modificarProducto">Modificar Producto</a></li>
          <li><a class="nav-link text-white" href="#" id="verStock">Stock</a></li>
        </ul>
      </li>
      <!-- Resto del menú igual que antes -->
    </ul>
  </nav>
  
  <!-- Contenido principal -->
  <main class="flex-grow-1 p-4 mt-5" id="contenido-principal">
    <h2>Bienvenido a Risomazys</h2>
    <p>Selecciona una opción del menú para comenzar.</p>
    <div class="alert alert-info mt-4" role="alert">
      Este es un mensaje de alerta para mostrar notificaciones importantes.
    </div>
  </main>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../js/JS_products.js"></script>
<script src="../js/dashboard_functions.js"></script>
</body>
</html>