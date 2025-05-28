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
    <h2 class="text-center">Actualizar Datos</h2>

    <form action="../modelo/modificar.php" method="POST" class="row g-3">
        
        <!-- ID oculto -->
        <input type="hidden" name="id" value="<?= htmlspecialchars($registro[$campo_id]) ?>">
        <input type="hidden" name="tabla" value="<?= htmlspecialchars($tabla) ?>">

        <?php 
        $campos = [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'documento' => 'Documento',
            'numero' => 'Número',
            'fecha' => 'Fecha de Nacimiento',
            'celular' => 'Celular',
            'direccion' => 'Dirección'
        ];

        foreach ($campos as $campo => $label): ?>
            <div class="col-md-<?= ($campo == 'direccion') ? '6' : '3' ?>">
                <label for="<?= $campo ?>" class="form-label"><?= $label ?>:</label>
                <input type="<?= ($campo == 'fecha') ? 'date' : 'text' ?>" 
                       id="<?= $campo ?>" 
                       name="<?= $campo ?>" 
                       class="form-control" 
                       required 
                       maxlength="<?= ($campo == 'direccion') ? '100' : '30' ?>" 
                       value="<?= htmlspecialchars($registro[$campo] ?? '') ?>">
            </div>
        <?php endforeach; ?>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-success">Actualizar</button>
            <button type="button" class="btn btn-secondary" onclick="cancelar()">Cancelar</button>

            <script>
            function cancelar() {
                const tabla = document.querySelector('input[name="tabla"]').value.trim();
                if (tabla === 'clientes') {
                    window.location.href = '/modelo/select.php';
                } else {
                    window.location.href = '../modelo/empleados.php';
                }
            }
            </script>
        </div>
    </form>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">¡Actualización Exitosa!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                El usuario ha sido actualizado correctamente.
            </div>
            <<div class="modal-footer">
                 <button type="button" class="btn btn-success" onclick="aceptar()">Aceptar</button>
            </div>

            <script>
            function aceptar() {
                const tabla = document.querySelector('input[name="tabla"]').value.trim();
                                if (tabla === 'clientes') {
                                window.location.href = '/modelo/select.php';
                            } else {
                                window.location.href = '../modelo/empleados.php';
                            }
            }
            </script>
        </div>
    </div>
    
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>