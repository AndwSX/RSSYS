<form id="modificarPaso1">
  <h3>Modificar Producto</h3>
  <div class="mb-3">
    <label for="idProducto" class="form-label">ID o Código del Producto</label>
    <input type="text" class="form-control" id="idProducto" placeholder="Buscar producto...">
  </div>

  <div class="mb-3">
    <label for="nuevoNombre" class="form-label">Nuevo Nombre</label>
    <input type="text" class="form-control" id="nuevoNombre">
  </div>

  <div class="mb-3">
    <label for="nuevaCantidad" class="form-label">Nueva Cantidad</label>
    <input type="number" class="form-control" id="nuevaCantidad">
  </div>

  <div class="mb-3">
    <label for="nuevaCategoria" class="form-label">Nueva Categoría</label>
    <select class="form-select" id="nuevaCategoria">
      <option selected disabled>Selecciona una categoría</option>
      <option value="sabanera">Sabanera</option>
      <option value="criolla">Criolla</option>
      <option value="pastusa">Pastusa</option>
    </select>
  </div>

  <button type="button" class="btn btn-success me-2" id="modificarSiguiente">Siguiente</button>
  <button type="button" class="btn btn-secondary" id="regresarInicioMod" onclick="window.location.href='index.php?route=admin&modulo=productos&accion=ver';">Regresar</button>
</form>

<form id="modificarPaso2" style="display: none;">
  <h3>Modificar Producto - Paso 2</h3>
  <div class="mb-3">
    <label for="nuevoPrecio" class="form-label">Nuevo Precio</label>
    <input type="number" class="form-control" id="nuevoPrecio">
  </div>

  <div class="mb-3">
    <label for="nuevaDescripcion" class="form-label">Nueva Descripción</label>
    <textarea class="form-control" id="nuevaDescripcion" rows="3"></textarea>
  </div>

  <div class="mb-3">
    <label for="nuevoEstado" class="form-label">Nuevo Estado</label>
    <select class="form-select" id="nuevoEstado">
      <option value="disponible">Disponible</option>
      <option value="agotado">Agotado</option>
    </select>
  </div>

  <button type="submit" class="btn btn-primary me-2" id="modificarFinal">Guardar Cambios</button>
  <button type="button" class="btn btn-secondary" id="regresarModificar">Regresar</button>
</form>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const paso1 = document.getElementById("modificarPaso1");
    const paso2 = document.getElementById("modificarPaso2");
    const btnSiguiente = document.getElementById("modificarSiguiente");
    const btnRegresar = document.getElementById("regresarModificar");

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


