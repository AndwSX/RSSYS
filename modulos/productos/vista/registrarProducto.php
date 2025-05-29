<form id="formPaso1">
  <h3>Registrar Producto</h3>
  <div class="mb-3">
    <label for="nombreProducto" class="form-label">Nombre del Producto</label>
    <input type="text" class="form-control" id="nombreProducto">
  </div>

  <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad</label>
    <input type="number" class="form-control" id="cantidad">
  </div>

  <div class="mb-3">
    <label for="categoria" class="form-label">Categoría</label>
    <select class="form-select" id="categoria">
      <option selected disabled>Selecciona una categoría</option>
      <option value="sabanera">Sabanera</option>
      <option value="criolla">Criolla</option>
      <option value="pastusa">Pastusa</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="precio" class="form-label">Precio</label>
    <input type="number" class="form-control" id="precio">
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea class="form-control" id="descripcion" rows="3"></textarea>
  </div>

  <button type="button" class="btn btn-success me-2" id="siguientePaso">Siguiente</button>
  <button type="button" class="btn btn-secondary" id="regresarInicio" onclick="window.location.href='index.php?route=admin&modulo=productos&accion=ver';">Regresar</button>
</form>

<form id="formPaso2" style="display: none;">
  <h3>Registrar Producto - Paso 2</h3>
  <div class="mb-3">
    <label for="codigo" class="form-label">Código del Producto</label>
    <input type="text" class="form-control" id="codigo">
  </div>
  <div class="mb-3">
    <label for="fechaRegistro" class="form-label">Fecha de Registro</label>
    <input type="date" class="form-control" id="fechaRegistro">
  </div>
  <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select class="form-select" id="estado">
      <option value="disponible">Disponible</option>
      <option value="agotado">Agotado</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="imagen" class="form-label">Imagen del Producto</label>
    <input type="file" class="form-control" id="imagen">
  </div>
  <button type="submit" class="btn btn-primary me-2" id="registrarFinal">Registrar</button>
  <button type="button" class="btn btn-secondary" id="regresarRegistro">Regresar</button>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const paso1 = document.getElementById("formPaso1");
    const paso2 = document.getElementById("formPaso2");
    const btnSiguiente = document.getElementById("siguientePaso");
    const btnRegresar = document.getElementById("regresarRegistro");

    btnSiguiente.addEventListener("click", function () {
      paso1.style.display = "none";
      paso2.style.display = "block";
    });

    btnRegresar.addEventListener("click", function () {
      paso2.style.display = "none";
      paso1.style.display = "block";
    });
  });
</script>

