<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Solicitar pedido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">

<form action="" method="POST" style="width: 400px;">
  <div class="card p-4 shadow">
      <h2 class="mb-4">Registrar Nuevo Pedido</h2>

      <label for="id_cliente" class="form-label">Cliente</label>
      <input type="text" name="id_cliente" class="form-control mb-3" id="id_cliente" required>

      <label for="id_producto" class="form-label">Producto</label>
      <input type="text" name="id_producto" class="form-control mb-3" id="id_producto" required>

      <label for="cantidad" class="form-label">Cantidad</label>
      <input type="number" name="cantidad" class="form-control mb-3" id="cantidad" min="1" required>

      <label for="fecha" class="form-label">Fecha</label>
      <input type="date" name="fecha" class="form-control mb-3" id="fecha" required>

      <label for="descripcion" class="form-label">Descripción:</label>
      <textarea name="descripcion" class="form-control mb-4" id="descripcion" rows="3"></textarea>

      <button type="submit" class="btn btn-success w-100 mb-2">Registrar</button>
      <a href="../../modelo/gestion_pedidos/sect.php" class="btn btn-secondary w-100">Cancelar</a>
  </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
