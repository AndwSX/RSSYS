<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pedidos</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Gestion de pedidos </h1>

        <div class="row mt-4 p-4">
        <div class="col-4">
            <a href="../gestion_pedidos/insert.php" class="btn btn-success">Registrar pedido</a>
        </div>
        </div>

        <table class="table table-bordered border-darck">
            <thead class="bg-success text-white">
                <tr>
                    <th>id_factura</th>
                    <th>nombre</th>
                    <th>id_producto</th>
                    <th>cantidad</th>
                    <th>fecha</th>
                    <th>descripcion</th>
                    <th>estado</th>
                    <th>acciones</th>

                </tr>
            </thead>
           <tbody>
    <?php if (!empty($facturas)): ?>
        <?php foreach ($facturas as $row): ?>
            <tr>
                <td><?= htmlspecialchars($row['id_factura'] ?? 'Sin ID') ?></td>
                <td><?= htmlspecialchars($row['id_cliente']) ?></td>
                <td><?= htmlspecialchars($row['id_producto']) ?></td>
                <td><?= htmlspecialchars($row['cantidad']) ?></td>
                <td><?= htmlspecialchars($row['fecha']) ?></td>
                <td><?= htmlspecialchars($row['descripcion']) ?></td>
                <td><?= htmlspecialchars($row['estado']) ?></td>
                <td>
              
                    <div class="d-flex gap-2">

                       <a href="http://localhost/CRUD_USUARIOS/modelo/gestion_pedidos/update.php?id=<?= htmlspecialchars($row['id_factura']) ?>" class="btn btn-success">Modificar</a>
                        <form method="GET" action="http://localhost/CRUD_USUARIOS/modelo/gestion_pedidos/delet.php" onsubmit="return confirm('¿Seguro que deseas eliminar esta factura?')">

                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id_factura']) ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="8" class="text-center">No hay facturas registradas</td></tr>
<?php endif; ?>
</tbody>

        </table>
       
        
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
