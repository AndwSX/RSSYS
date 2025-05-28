<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center mb-4">Actualizar Datos</h2>

    <form action="../modelo/editar.php" method="POST">
        <input type="hidden" name="id_proveedor" value="<?= $registro['ID_Proveedor'] ?>">  

        <div class="row g-3">
            <?php 
            $campos = [
                'nombre' => 'Nombre', 
                'correo' => 'Correo', 
                'celular' => 'Celular', 
                'direccion' => 'Dirección', 
                'cuentabanco' => 'Cuenta Bancaria', 
                'banco' => 'Banco',
                'fecha' => 'Fecha',
                'ciudad' => 'Ciudad',
                'cedula' => 'Cédula'
            ];

            foreach ($campos as $campo => $label): ?>
                <div class="col-md-6">
                    <label for="<?= $campo ?>" class="form-label"><?= $label ?>:</label>
                    <input 
                        type="<?= ($campo == 'fecha') ? 'date' : 'text' ?>" 
                        id="<?= $campo ?>" 
                        name="<?= $campo ?>" 
                        class="form-control" 
                        required 
                        maxlength="<?= ($campo == 'direccion') ? '100' : '30' ?>" 
                        value="<?= htmlspecialchars($registro[$campo] ?? '') ?>">
                </div>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="../modelo/select.php" class="btn btn-secondary">Cancelar</a>
        </div>
    </form>

    <!-- Modal de éxito (opcional, para mostrar después de actualización) -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">¡Actualización Exitosa!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    El usuario ha sido actualizado correctamente.
                </div>
                <div class="modal-footer">
                    <a href="../provedores/modelo/select.php"class="btn btn-success">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
