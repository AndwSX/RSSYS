<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Actualizar Factura</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center">Actualizar Factura</h2>

    <form action="" method="POST" class="row g-3">

        <input type="hidden" name="modo" value="actualizar" />
        <input type="hidden" name="id" value="<?= htmlspecialchars($factura['id_factura'] ?? '') ?>" />

        <?php 
        $campos = [
            'id_cliente' => 'ID Cliente',
            'id_producto' => 'ID Producto',
            'cantidad' => 'Cantidad',
            'fecha' => 'Fecha'
        ];

        foreach ($campos as $campo => $label): ?>
            <div class="col-md-4">
                <label for="<?= $campo ?>" class="form-label"><?= $label ?>:</label>
                <input 
                    type="<?= ($campo == 'fecha') ? 'text' : 'number' ?>"
                    id="<?= $campo ?>" 
                    name="<?= $campo ?>" 
                    class="form-control" 
                    required
                    <?= ($campo != 'fecha') ? 'min="1"' : '' ?>
                    maxlength="50"
                    value="<?= htmlspecialchars($factura[$campo] ?? '') ?>" />
            </div>
        <?php endforeach; ?>

        <!-- Campo descripción como textarea -->
        <div class="col-md-12">
            <label for="descripcion" class="form-label">Descripción:</label>
            <textarea 
                id="descripcion" 
                name="descripcion" 
                class="form-control" 
                rows="3"
                maxlength="255"><?= htmlspecialchars($factura['descripcion'] ?? '') ?></textarea>
        </div>

        <div class="col-12 text-center">
            <div class="d-flex justify-content-center gap-2">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="../../modelo/gestion_pedidos/sect.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
