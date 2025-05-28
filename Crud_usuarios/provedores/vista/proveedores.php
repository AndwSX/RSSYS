<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <title>Registro Proveedor</title>
</head>
<body class="bg-light">

  <div class="container my-5 d-flex justify-content-center">
    <div class="col-lg-10 p-4 border rounded bg-white shadow">
      <h2 class="text-center fw-bold mb-4">Registro proveedor</h2>
      
      <form method="POST" action="../modelo/registrar.php" enctype="multipart/form-data">
        <div class="row">
          
          <!-- Columna del formulario -->
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Ingrese su cédula</label>
              <input type="text" class="form-control border-info" name="cedula" placeholder="Ingrese su cédula" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre completo</label>
              <input type="text" class="form-control border-info" name="nombre" placeholder="Ingrese nombres y apellidos completos" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Teléfono</label>
              <input type="text" class="form-control border-info" name="celular" placeholder="Ingrese su número de teléfono" required maxlength="10" pattern="\d{10}" title="Número de teléfono de 10 dígitos">
            </div>
            <div class="mb-3">
              <label class="form-label">Ciudad</label>
              <select class="form-control border-info" name="ciudad" required>
                <option value="">Selecciona una ciudad</option>
                <option value="Bogotá">Bogotá</option>
                <option value="Montería">Montería</option>
                <option value="Barranquilla">Barranquilla</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="correo" class="form-label">Correo Electrónico</label>
              <input type="email" class="form-control border-info" id="correo" name="correo" placeholder="Ingrese su correo" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Dirección</label>
              <input type="text" class="form-control border-info" name="direccion" placeholder="Ingrese dirección de empresa" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Cuenta de Banco</label>
              <input type="text" class="form-control border-info" name="cuentabanco" placeholder="Ingrese su número de cuenta" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nombre del Banco</label>
              <select class="form-control border-info" name="banco" required>
                <option value="">Seleccione un banco</option>
                <option value="Bancolombia">Bancolombia</option>
                <option value="Davivienda">Davivienda</option>
                <option value="Banco de Bogotá">Banco de Bogotá</option>
                <option value="Nequi">Nequi</option>
                <option value="Otro">Otro</option>
              </select>
            </div>
          </div>

          <!-- Columna de la imagen -->
          <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
            <label class="form-label">Insertar imagen</label>
            <input type="file" class="form-control mb-3" name="imagen">
            <img src="img/foto.jpg" alt="Imagen" class="img-fluid rounded-0 mb-3" style="max-width: 80%;"></div>

        </div>
        
        <div class="d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="http://localhost:3000/modelo/registros.php" class="btn btn-success">Volver</a>
        </div>

        <script>
            document.querySelectorAll('input.form-control, select.form-control').forEach(el => {
                el.classList.remove('border-info');
                el.classList.add('border-success');
            });
        </script>

      </form>
    </div>
  </div>

  <!-- Modal de eliminación exitosa -->
  <div class="modal fade" id="modalEliminado" tabindex="-1" aria-labelledby="modalEliminadoLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalEliminadoLabel">Éxito</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          ¡Registro eliminado correctamente!
        </div>
      </div>
    </div>
  </div>

  <!-- Script para mostrar el modal si el parámetro 'eliminado' está presente en la URL -->
  <?php if (isset($_GET['eliminado']) && $_GET['eliminado'] === 'ok'): ?>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        var modalEliminado = new bootstrap.Modal(document.getElementById('modalEliminado'));
        modalEliminado.show();
      });
    </script>
  <?php endif; ?>
  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
