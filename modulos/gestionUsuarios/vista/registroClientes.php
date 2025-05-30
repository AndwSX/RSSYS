<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Registro de Clientes</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Registro de Clientes</h1>
        <table class="table table-bordered border-darck">
            <thead class="bg-success text-white">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Número</th>
                    <th>Fecha</th>
                    <th>Rol</th>
                    <th>Celular</th>                    
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($clientes)): ?>
                    <?php foreach ($clientes as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_cliente'] ?? 'Sin ID') ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['apellido']) ?></td>
                            <td><?= htmlspecialchars($row['documento']) ?></td>
                            <td><?= htmlspecialchars($row['numero']) ?></td>
                            <td><?= htmlspecialchars($row['fecha']) ?></td>
                            <td><?= htmlspecialchars($row['rol']) ?></td>
                            <td><?= htmlspecialchars($row['celular']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="modificar.php?id=<?= htmlspecialchars($row['id_cliente'] ?? $row['id_empleado']) ?>&tabla=<?= ($row['rol'] == 'comprador') ? 'clientes' : 'empleados' ?>" class="btn btn-success">Modificar</a>
                                    <form method="GET" action="../modelo/eliminar.php" onsubmit="return confirm('¿Seguro que deseas eliminar este registro?')">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id_cliente']) ?>">
                                        <input type="hidden" name="rol" value="<?= htmlspecialchars($row['rol']) ?>">
                                        <button type="submit" class="btn btn-success">Eliminar</button>
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
       
        <div class="row mt-3">
        <div class="col-4">
            <a href="index.php?route=admin&modulo=usuarios" class="btn btn-success">Volver</a>
        </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
