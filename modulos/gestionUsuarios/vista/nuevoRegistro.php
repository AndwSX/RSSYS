<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <title>Registro</title>
</head>
<body>
<form action="" method="post">
  <div class="container mt-5">
    <div class="row d-flex align-items-center">
      <div class="col-md-6 text-center">
        <img
          src="assets/img/Logo/Logo.png"
          alt="Logo"
          class="img-fluid d-block mx-auto ms-5"
          style="max-width: 80%"
        />
      </div>

      <div class="col-md-6">
        <div class="p-4 border rounded bg-light">
          <h1 class="text-center mb-4">Registrarse</h1>

          <!-- Nombre y Apellido -->
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Nombre</label>
              <input type="text" name="nombre" class="form-control" required />
            </div>
            <div class="col">
              <label class="form-label">Apellido</label>
              <input type="text" name="apellido" class="form-control" required />
            </div>
          </div>

          <!-- Documento -->
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Tipo de documento:</label>
              <select name="documento" id="documento" class="form-select" required>
                <option value="" disabled selected>Seleccione un tipo de documento</option>
                <option value="cedula">Cédula</option>
                <option value="cedula_extranjeria">Cédula de extranjería</option>
                <option value="pasaporte">Pasaporte</option>
              </select>
            </div>
            <div class="col">
              <label class="form-label">Número de Documento</label>
              <input type="text" name="numero" class="form-control" required />
            </div>
          </div>

          <!-- Fecha de Nacimiento y Rol -->
          <div class="row mb-3">
            <div class="col">
              <label for="fecha" class="form-label">Fecha de Nacimiento</label>
              <input
                type="date"
                name="fecha"
                class="form-control"
                min="1900-01-01"
                max="2024-12-31"
                required
              />
            </div>
            <div class="col">
              <label for="rol" class="form-label d-block">Elige Tu Rol</label>
              <input type="hidden" name="rol" id="rol" value="comprador" />
              <div class="d-flex gap-2">
                <button
                  type="button"
                  class="btn btn-success"
                  onclick="document.getElementById('rol').value='comprador'"
                >
                  Comprador
                </button>
                <button
                  type="button"
                  class="btn btn-success"
                  onclick="document.getElementById('rol').value='colaborador'"
                >
                  Colaborador
                </button>
              </div>
            </div>
          </div>

          <!-- Celular y Dirección -->
          <div class="row mb-3">
            <div class="col">
              <label for="celular" class="form-label">Celular</label>
              <input type="text" name="celular" class="form-control" required />
            </div>
            <div class="col">
              <label for="direccion" class="form-label">Dirección</label>
              <input type="text" name="direccion" class="form-control" required />
            </div>
          </div>

          <!-- Botón de enviar -->
          <div class="text-center">
            <button type="submit" class="btn btn-success">REGISTRARSE</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Botón Volver -->
    <div class="row mt-3">
  <div class="col-4">
    <a href="index.php?route=admin&modulo=usuarios" class="btn btn-success">Volver</a>
  </div>
</div>
  
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
