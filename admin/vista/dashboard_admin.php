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
      <img src="assets/img/Logo/image.png" alt="Logo" width="50" height="30" class="d-inline-block align-text-top me-2">
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
        <form action="auth/cerrar_sesion.php" method="POST">
          <li><button class="dropdown-item" type="submit">Cerrar Sesión</button></li>
        </form>
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
        <a href="index.php?route=admin" class="nav-link text-white" id="inicioLink">
          <i class="bi bi-house-door me-2"></i>Inicio
        </a>
      </li>
      <li class="nav-item mb-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#productosSubmenu" aria-expanded="false">
          <i class="bi bi-box me-2"></i>Productos
        </a>
        <ul class="collapse ps-4" id="productosSubmenu">
          <li><a class="nav-link text-white" href="index.php?route=admin&modulo=productos&accion=registrar">Registrar Producto</a></li>
          <li><a class="nav-link text-white" href="index.php?route=admin&modulo=productos&accion=ver">Ver productos</a></li>
          <li><a class="nav-link text-white" href="index.php?route=admin&modulo=productos&accion=modificar">Modificar Producto</a></li>
          <li><a class="nav-link text-white" href="index.php?route=admin&modulo=productos&accion=stock">Stock</a></li>

        </ul>
      </li>
<li class="nav-item mb-2">
  <a class="nav-link text-white d-flex align-items-center"
     href="index.php?route=admin&modulo=usuarios"
     style="text-decoration: none;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
         fill="white" class="bi bi-person me-2" viewBox="0 0 16 16">
      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 
               2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 
               1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 
               10.68 10.289 10 8 10s-3.516.68-4.168 
               1.332c-.678.678-.83 1.418-.832 1.664z"/>
    </svg>
    Gestión de usuarios
  </a>
</li>
<li class="nav-item mb-2">
  <a class="nav-link text-white d-flex align-items-center"
     href="#"
     id="gestionPedidosLink"
     style="text-decoration: none;">
    <i class="bi bi-cart4 me-2"></i>
    Gestión de pedidossssssssssss
  </a>
</li>


     
      <li class="nav-item mb-2">
        <a class="nav-link text-white dropdown-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#facturasSubmenu" aria-expanded="false">
          <i class="bi bi-receipt-cutoff me-2"></i>Facturas
        </a>
        <ul class="collapse ps-4" id="facturasSubmenu">
          <li><a class="nav-link text-white" href="#" id="registrarFactura">Registrar Factura</a></li>
          <li><a class="nav-link text-white" href="#" id="modificarFactura">Modificar Factura</a></li>
          <li><a class="nav-link text-white" href="#" id="verFacturas">Ver Facturas</a></li>
        </ul>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link text-white"><i class="bi bi-gear me-2"></i>Configuración</a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link text-white" id="soporteTecnicoLink">
          <i class="bi bi-question-circle me-2"></i>Soporte técnico
        </a>
      </li>
      
    </ul>
  </nav>

  <!-- Contenido -->
  <main class="flex-grow-1 p-4 mt-5" id="contenido-principal">
    
    <?php
      if(isset($_GET['modulo'])){
        $modulo = $_GET['modulo'];
        switch ($modulo) {
          
          case 'productos':
            include 'modulos/productos/controlador.php';
            $productos = new Productos();
            $productos->productos();
            break;

          case 'usuarios':
            include 'modulos/gestionUsuarios/controlador.php';
            include 'config/database.php';
            $conexion = Conexion::conectar();
            $usuarios = new GestionUsuarios($conexion);
            $usuarios->gestionUsuarios();
            break;
        }
      }else{
        include 'modulos/inicio/controlador.php';
        $inicio = new Inicio();
        $inicio->inicio();
      }

    ?>

  </main>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/admin/sidebar.js"></script>
<script>


//Registrar factura
document.getElementById("registrarFactura").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("contenido-principal").innerHTML = `
      <h3>Registrar Factura - Paso 1</h3>
      <form id="formRegistrarFacturaPaso1">
        <div class="mb-3">
          <label for="idFactura" class="form-label">ID de la Factura</label>
          <input type="text" class="form-control" id="idFactura" required>
        </div>
        <div class="mb-3">
          <label for="fechaCreacion" class="form-label">Fecha de Creación</label>
          <input type="date" class="form-control" id="fechaCreacion" required>
        </div>
        <div class="mb-3">
          <label for="idEmpleado" class="form-label">Identificación del Empleado</label>
          <input type="text" class="form-control" id="idEmpleado" required>
        </div>
        <div class="mb-3">
          <label for="idComprador" class="form-label">Identificación del Comprador</label>
          <input type="text" class="form-control" id="idComprador" required>
        </div>
        <div class="mb-3">
          <label for="estadoCompra" class="form-label">Estado de Compra</label>
          <select class="form-select" id="estadoCompra" required>
            <option value="exitosa">Exitosa</option>
            <option value="rechazada">Rechazada</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="metodoPago" class="form-label">Método de Pago</label>
          <select class="form-select" id="metodoPago" required>
            <option value="bancoA">Banco A</option>
            <option value="bancoB">Banco B</option>
            <option value="bancoC">Banco C</option>
            <option value="bancoD">Banco D</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="total" class="form-label">Total</label>
          <input type="number" class="form-control" id="total" step="0.01" required>
        </div>
        <button type="button" class="btn btn-success me-2" id="siguientePasoFactura">Siguiente</button>
        <button type="button" class="btn btn-secondary" id="regresarInicioFactura">Regresar</button>
      </form>
    `;

    // Paso 2
    setTimeout(() => {
      document.getElementById("siguientePasoFactura").addEventListener("click", () => {
        document.getElementById("contenido-principal").innerHTML = `
          <h3>Registrar Factura - Paso 2</h3>
          <form id="formRegistrarFacturaPaso2">
            <div class="mb-3">
              <label for="cantidad" class="form-label">Cantidad</label>
              <input type="number" class="form-control" id="cantidad" required>
            </div>
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción</label>
              <input type="text" class="form-control" id="descripcion" required>
            </div>
            <div class="mb-3">
              <label for="imagenFactura" class="form-label">Imagen</label>
              <input type="file" class="form-control" id="imagenFactura" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary me-2" id="registrarFacturaFinal">Registrar Factura</button>
            <button type="button" class="btn btn-secondary" id="regresarPaso1Factura">Regresar</button>
          </form>
        `;

        // Volver al Paso 1
        document.getElementById("regresarPaso1Factura").addEventListener("click", () => {
          document.getElementById("registrarFactura").click();
        });

        document.getElementById("registrarFacturaFinal").addEventListener("click", function(e) {
          e.preventDefault();
          alert("Factura registrada exitosamente.");
          document.getElementById("verFacturas").click();
        });
      });

      document.getElementById("regresarInicioFactura").addEventListener("click", () => {
        document.getElementById("inicioLink").click();
      });
    }, 100);
  });

//Modificar factura
document.getElementById("modificarFactura").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("contenido-principal").innerHTML = `
      <h3>Modificar Factura - Paso 1</h3>
      <form id="formFacturaPaso1">
        <div class="mb-3"><label for="idFactura" class="form-label">ID de Factura</label><input type="text" class="form-control" id="idFactura" disabled value="001"></div>
        <div class="mb-3"><label for="fechaFactura" class="form-label">Fecha de Creación</label><input type="date" class="form-control" id="fechaFactura" value="2025-04-23"></div>
        <div class="mb-3"><label for="empleadoFactura" class="form-label">Empleado</label><input type="text" class="form-control" id="empleadoFactura" value="Empleado A"></div>
        <div class="mb-3"><label for="compradorFactura" class="form-label">Comprador</label><input type="text" class="form-control" id="compradorFactura" value="Comprador A"></div>
        <div class="mb-3"><label for="estadoFactura" class="form-label">Estado de Compra</label>
          <select class="form-select" id="estadoFactura">
            <option value="exitosa" selected>Exitosa</option>
            <option value="rechazada">Rechazada</option>
          </select>
        </div>
        <button type="button" class="btn btn-success me-2" id="siguientePasoFactura">Siguiente</button>
        <button type="button" class="btn btn-secondary" id="regresarInicioFactura">Regresar</button>
      </form>
    `;

    // Paso 2
    setTimeout(() => {
      document.getElementById("siguientePasoFactura").addEventListener("click", () => {
        document.getElementById("contenido-principal").innerHTML = `
          <h3>Modificar Factura - Paso 2</h3>
          <form>
            <div class="mb-3"><label for="metodoPagoFactura" class="form-label">Método de Pago</label>
              <select class="form-select" id="metodoPagoFactura">
                <option value="Banco A">Banco A</option>
                <option value="Banco B">Banco B</option>
                <option value="Banco C">Banco C</option>
              </select>
            </div>
            <div class="mb-3"><label for="totalFactura" class="form-label">Total</label><input type="number" class="form-control" id="totalFactura" value="1500.00"></div>
            <div class="mb-3"><label for="cantidadFactura" class="form-label">Cantidad</label><input type="number" class="form-control" id="cantidadFactura" value="5"></div>
            <div class="mb-3"><label for="descripcionFactura" class="form-label">Descripción</label><input type="text" class="form-control" id="descripcionFactura" value="Producto X"></div>
            <div class="mb-3"><label for="imagenFactura" class="form-label">Imagen de Factura</label><input type="file" class="form-control" id="imagenFactura"></div>
            <button type="submit" class="btn btn-primary me-2" id="modificarFacturaFinal">Modificar</button>
            <button type="button" class="btn btn-secondary" id="regresarModificarFactura">Regresar</button>
          </form>
        `;

        document.getElementById("regresarModificarFactura").addEventListener("click", () => {
          document.getElementById("modificarFactura").click();
        });

        document.getElementById("modificarFacturaFinal").addEventListener("click", function(e) {
          e.preventDefault();
          alert("Factura modificada exitosamente.");
          document.getElementById("verFacturas").click();
        });
      });

      document.getElementById("regresarInicioFactura").addEventListener("click", () => {
        document.getElementById("inicioLink").click();
      });
    }, 100);
  });

//ver factura

document.getElementById("verFacturas").addEventListener("click", function(e) {
    e.preventDefault();
    document.getElementById("contenido-principal").innerHTML = `
      <h3>Ver Facturas</h3>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID de Factura</th>
            <th>Fecha</th>
            <th>Empleado</th>
            <th>Comprador</th>
            <th>Estado</th>
            <th>Método de Pago</th>
            <th>Total</th>
            <th>Cantidad</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody id="facturaTableBody">
          <!-- Aquí se llenarán los registros -->
          <tr>
            <td>001</td>
            <td>2025-04-23</td>
            <td>Empleado A</td>
            <td>Comprador A</td>
            <td>Exitosa</td>
            <td>Banco A</td>
            <td>$1500.00</td>
            <td>5</td>
            <td>Producto X</td>
            <td>
              <button class="btn btn-warning btn-sm" id="editarFacturaBtn">Editar</button>
              <button class="btn btn-danger btn-sm" id="eliminarFacturaBtn">Eliminar</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button class="btn btn-primary" id="volverFacturas">Volver</button>
    `;

    document.getElementById("volverFacturas").addEventListener("click", () => {
      document.getElementById("inicioLink").click();
    });

    // Funciones de edición y eliminación de facturas
    document.getElementById("editarFacturaBtn").addEventListener("click", () => {
      document.getElementById("modificarFactura").click();
    });
    document.getElementById("eliminarFacturaBtn").addEventListener("click", () => {
      alert("Factura eliminada");
      // Aquí agregamos la lógica para eliminar la factura
    });
  });

// Soporte Técnico
document.getElementById("soporteTecnicoLink").addEventListener("click", function (e) {
  e.preventDefault();
  document.getElementById("contenido-principal").innerHTML = `
    <h3>Soporte Técnico</h3>
    <div class="card p-4">
      <p><strong>Número de Contacto:</strong> +57 312 345 6789</p>
      <p><strong>Correo Electrónico:</strong> <a href="mailto:soporte@risomazys.com">soporte@risomazys.com</a></p>
      <p><strong>Redes Sociales:</strong></p>
      <ul class="list-unstyled">
        <li><i class="bi bi-facebook me-2"></i><a href="https://facebook.com/risomazys" target="_blank">Facebook</a></li>
        <li><i class="bi bi-instagram me-2"></i><a href="https://instagram.com/risomazys" target="_blank">Instagram</a></li>
        <li><i class="bi bi-twitter me-2"></i><a href="https://twitter.com/risomazys" target="_blank">Twitter</a></li>
      </ul>
      <p class="mt-3">Estamos disponibles para ayudarte de <strong>lunes a viernes</strong>, de <strong>8:00 a.m. a 6:00 p.m.</strong></p>
    </div>
  `;
});

//iframe js
 document.getElementById("gestionPedidosLink").addEventListener("click", function (e) {
    e.preventDefault();
    const contenido = document.getElementById("contenido-principal");
    contenido.innerHTML = `
      <h2>Gestión de Pedidos</h2>
      <iframe src="../../modelo/gestion_pedidos/sect.php" width="100%" height="600" frameborder="0"></iframe>
    `;
  });

</script>
</body>
</html>
