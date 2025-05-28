
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
  <div class="login-container d-flex">
    <div class="left-panel d-flex justify-content-center align-items-center">
      <div class="text-center">
        <img src="assets/img/risomazys.jpg" alt="Logo" class="logo-img mb-4">
        <h1 class="text-white fw-bold">RIZOMASYS</h1>
      </div>
    </div>
    <div class="right-panel d-flex justify-content-center align-items-center">
      <div class="form-box shadow p-5 rounded bg-white">
        <h2 class="text-success fw-bold text-center mb-4">Iniciar Sesión</h2>
        <form action="index.php?modulo=login" method="POST">
          <input type="email" name="correo" class="form-control mb-3" placeholder="Correo electrónico" required>
          <input type="password" name="contrasena" class="form-control mb-4" placeholder="Contraseña" required>
          <button type="submit" name="iniciar_sesion" class="btn btn-success w-100 mb-3">Ingresar</button>
        </form>
        <div class="text-center">
          <a href="olvide_contraseña.html" class="d-block link-success">¿Olvidaste tu contraseña?</a>
          <a href="registro.php" class="d-block link-success">Registrarse</a>
          <a href="../vista/inicio.php" class="d-block link-success">Volver al inicio</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
