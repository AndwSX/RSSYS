<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de provedores</title>
</head>
<body>
    <div class="container">
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
?>
        <h1 class="text-center">Registro de provedores</h1>
        <table class="table table-bordered border-darck">
            <thead class="bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>cedula</th>
                    <th>Nombre completo</th>
                    <th>Telefono</th>
                    <th>Ciudad</th>
                    <th>correo</th>
                    <th>direccion</th>
                    <th>#cuenta de banco</th>                    
                    <th>Nombre del banco</th>
                    <th>Fecha de registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($proveedores)): ?>
                    <?php foreach ($proveedores as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['ID_Proveedor'] ?? 'Sin ID') ?></td>
                            <td><?= htmlspecialchars($row['cedula'] ) ?></td>
                            <td><?= htmlspecialchars($row['nombre'] ) ?></td>
                            <td><?= htmlspecialchars($row['celular']) ?></td>
                            <td><?= htmlspecialchars($row['ciudad']) ?></td>
                            <td><?= htmlspecialchars($row['correo']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                            <td><?= htmlspecialchars($row['cuentabanco']) ?></td>
                            <td><?= htmlspecialchars($row['banco']) ?></td>
                            <td><?= htmlspecialchars($row['fecha']) ?></td>
                            
                            <td>
                                <div class="d-flex gap-2">
                                <a href="../modelo/editar.php?id_proveedor=<?= htmlspecialchars($row['ID_Proveedor']) ?>" class="btn btn-success">Modificar</a>

                                    <form method="GET" action="../modelo/eliminar.php" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?')">
                                    <input type="hidden" name="id_proveedor" value="<?= htmlspecialchars($row['ID_Proveedor']) ?>">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>

                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="text-center">No hay clientes registrados</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-4">
            <a href="index.php?route=admin&modulo=usuarios" class="btn btn-success">Volver</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>