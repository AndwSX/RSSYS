<h3>Registrar Producto</h3>
<form id="formPaso1">
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
  <button type="button" class="btn btn-secondary" id="regresarInicio">Regresar</button>
</form>
