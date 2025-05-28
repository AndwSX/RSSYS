<h3>Modificar Producto</h3>
<form id="modificarPaso1">
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
  <button type="button" class="btn btn-secondary" id="regresarInicioMod">Regresar</button>
</form>
