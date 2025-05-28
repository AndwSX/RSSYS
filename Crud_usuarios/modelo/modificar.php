<?php
require '../modelo/modelo.php';

$id = $_REQUEST['id'] ?? null;
$tabla = $_REQUEST['tabla'] ?? null;

if (!$id || !$tabla) {
    die("Error: Falta el ID o la tabla.");
}

$tablas_permitidas = ['clientes', 'empleados'];
if (!in_array($tabla, $tablas_permitidas)) {
    die("Error: Tabla no permitida.");
}

$campo_id = ($tabla === 'clientes') ? 'id_cliente' : 'id_empleado';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        ':nombre' => $_POST['nombre'] ?? '',
        ':apellido' => $_POST['apellido'] ?? '',
        ':documento' => $_POST['documento'] ?? '',
        ':numero' => $_POST['numero'] ?? '',
        ':fecha' => $_POST['fecha'] ?? '',
        ':celular' => $_POST['celular'] ?? '',
        ':direccion' => $_POST['direccion'] ?? '',
        ':id' => $id
    ];

    $sql = "UPDATE $tabla SET 
                nombre = :nombre, 
                apellido = :apellido, 
                documento = :documento, 
                numero = :numero, 
                fecha = :fecha, 
                celular = :celular, 
                direccion = :direccion 
            WHERE $campo_id = :id";

    $stmt = $conect->prepare($sql);
    if ($stmt->execute($datos)) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('successModal'));
                modal.show();
            });
        </script>";
    }
}

$stmt = $conect->prepare("SELECT * FROM $tabla WHERE $campo_id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Error: Usuario no encontrado.");
}


require '../vista/update.php';

?>