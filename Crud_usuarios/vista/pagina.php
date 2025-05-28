<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de navegación -->
    <nav class="navbar bg-success mb-4">
        <div class="container">
            <div class="row justify-content-center text-center w-100">
                <div class="col-md-2 mb-2">
                    <a href="../modelo/insert.php" class="btn btn-success w-100">Nuevo Registro</a>
                </div>
                <div class="col-2">
                <a href="../provedores/modelo/registrar.php" class="btn btn-success">Nuevo proveedor</a>
            </div>

                <div class="col-md-2 mb-2">
                    <a href="../modelo/select.php" class="btn btn-success w-100">Registro clientes</a>
                </div>
                <div class="col-md-2 mb-2">
                    <a href="../modelo/empleados.php" class="btn btn-success w-100">Registro empleados</a>
                </div>
                <div class="col-2">
                    <a href="../provedores/modelo/select.php" class="btn btn-success">Proveedores </a>
            </div>
             <div class="col-md-2 mb-2">
                  <a href="/CRUD_USUARIOS/modelo/gestion_pedidos/sect.php" class="btn btn-success">gestión de pedidos</a>

            </div>

            </div>
        </div>
    </nav>

    <div class="container">
        <h1 class="text-center mb-4">Gestión de Usuarios</h1>

        <form method="GET" action="">
    <div class="row d-flex justify-content-end mb-3">
        <div class="col-md-3 d-flex">
            <input type="text" name="busqueda" class="form-control form-control-sm me-2" placeholder="Buscar" value="<?= htmlspecialchars($busqueda ?? '') ?>">
            <button class="btn btn-success btn-sm" type="submit">Buscar</button>
        </div>
    </div>
</form>

        <table class="table table-bordered border-drack">
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
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($usuarios)): ?>
                    <?php foreach ($usuarios as $row): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_cliente'] ?? $row['id_empleado'] ?? '') ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['apellido']) ?></td>
                            <td><?= htmlspecialchars($row['documento']) ?></td>
                            <td><?= htmlspecialchars($row['numero']) ?></td>
                            <td><?= htmlspecialchars($row['fecha']) ?></td>
                            <td><?= htmlspecialchars($row['rol']) ?></td>
                            <td><?= htmlspecialchars($row['celular']) ?></td>
                            <td><?= htmlspecialchars($row['direccion']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="10" class="text-center">No hay registros</td></tr>
                <?php endif; ?>
            </tbody>
        </table>

        <?php if (isset($_GET['mensaje'])): ?>
            <div class="alert alert-info mt-3"><?= htmlspecialchars($_GET['mensaje']) ?></div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
