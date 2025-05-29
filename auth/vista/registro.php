<?php if (isset($_GET['registro']) && $_GET['registro'] == 'exitoso'): ?>
  <div class="alert alert-success text-center" role="alert">
    ¡Registro exitoso! Ahora puedes iniciar sesión.
  </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Registro - Rizomazys</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/registro.css"/>
</head>
<body>
  <div class="register-container d-flex">
    <!-- Panel Izquierdo -->
    <div class="left-panel d-flex flex-column justify-content-center align-items-center">
      <div class="text-center">
        <div class="logo-box mb-3">
          <img src="assets/img/risomazys.jpg" alt="Logo" class="logo-img" />
        </div>
        <h1 class="brand-title">RIZOMASYS</h1>
      </div>
    </div>

    <!-- Panel Derecho / Formulario -->
    <div class="right-panel d-flex justify-content-center align-items-center">
      <div class="form-box shadow p-4 rounded bg-white w-100">
        <h3 class="text-center mb-4 text-success fw-bold">Registrarse</h3>

        <form action="index.php?route=registro" method="POST">
          <div class="row mb-3">
            <div class="col">
              <input type="text" name="nombre" class="form-control" placeholder="Nombre" required />
            </div>
            <div class="col">
              <input type="text" name="apellido" class="form-control" placeholder="Apellido" required />
            </div>
          </div>

          <div class="mb-3">
            <select name="tipo_documento" class="form-select" required>
              <option value="" selected disabled>Tipo de Documento</option>
              <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
              <option value="Cédula de Extranjería">Cédula de Extranjería</option>
              <option value="Pasaporte">Pasaporte</option>
              <option value="Otro">Otro</option>
            </select>
          </div>

          <div class="mb-3">
            <input type="text" name="documento" class="form-control" placeholder="Número de Documento" required />
          </div>

          <div class="mb-3">
            <label class="form-label">Fecha de Nacimiento</label>
            <input type="date" name="fecha" class="form-control" required />
          </div>

          <div class="mb-3 role-buttons d-flex justify-content-between">
            <button type="button" class="btn btn-outline-success" onclick="seleccionarRol('empleado')">Empleado</button>
            <button type="button" class="btn btn-outline-secondary" onclick="seleccionarRol('cliente')">Cliente</button>
            <input type="hidden" name="rol" id="rolInput" required />
          </div>


          <div class="mb-3">
            <input type="tel" name="celular" class="form-control" placeholder="Celular" required />
          </div>

          <div class="mb-3">
            <input type="text" name="direccion" class="form-control" placeholder="Dirección" required />
          </div>

          <!-- Correo y contraseña movidos al final -->
          <div class="mb-3">
            <input type="email" name="correo" class="form-control" placeholder="Correo electrónico" required />
          </div>

          <div class="mb-3">
            <input type="password" name="contrasena" class="form-control" placeholder="Contraseña" required />
          </div>

          <div class="d-grid mb-3">
            <button type="submit" name="registrar" class="btn btn-success">Registrarse</button>
          </div>

          <div class="text-center">
            <a href="index.php?route=login" class="link-success">Volver al Inicio de Sesión</a>
          </div>
        </form>
      </div>
    </div>
  </div>

 <script>
  function seleccionarRol(rol) {
    document.getElementById('rolInput').value = rol;
    const botones = document.querySelectorAll('.btn-outline-success, .btn-outline-secondary');
    botones.forEach(btn => btn.classList.remove('btn-selected'));
    if (rol === 'empleado') {
      botones[0].classList.add('btn-selected');
    } else {
      botones[1].classList.add('btn-selected');
    }
  }
</script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
