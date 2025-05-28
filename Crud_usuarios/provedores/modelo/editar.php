<?php
require 'conexion.php';


$id_proveedor = $_REQUEST['id_proveedor'] ?? null;
if (!$id_proveedor) {
    die("Error: Falta el ID del proveedor.");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        ':nombre'      => $_POST['nombre'] ?? '',
        ':correo'      => $_POST['correo'] ?? '',
        ':celular'     => $_POST['celular'] ?? '',
        ':direccion'   => $_POST['direccion'] ?? '',
        ':cuentabanco' => $_POST['cuentabanco'] ?? '',
        ':banco'       => $_POST['banco'] ?? '',
        ':estadoprov'  => $_POST['estadoprov'] ?? '',
        ':fecha'       => $_POST['fecha'] ?? '',
        ':ciudad'      => $_POST['ciudad'] ?? '',
        ':cedula'      => $_POST['cedula'] ?? '',
        ':id_proveedor'=> $_POST['id_proveedor'] ?? $id_proveedor
    ];

    $sql = "UPDATE proveedores SET 
                nombre = :nombre, 
                correo = :correo, 
                celular = :celular, 
                direccion = :direccion, 
                cuentabanco = :cuentabanco, 
                banco = :banco, 
                estadoprov = :estadoprov,
                fecha = :fecha,
                ciudad = :ciudad,
                cedula = :cedula 
            WHERE id_proveedor = :id_proveedor";

    $stmt = $conexion->prepare($sql);
    if ($stmt->execute($datos)) {
        // Mostrar modal o redireccionar
        echo "<script>alert('Registro actualizado correctamente.'); window.location.href='../modelo/select.php';</script>";
        exit;
    } else {
        echo "Error al actualizar el registro.";
    }
}

// Obtener los datos actuales del proveedor
$stmt = $conexion->prepare("SELECT * FROM proveedores WHERE id_proveedor = :id_proveedor");
$stmt->bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Error: Proveedor no encontrado.");
}

// Cargar formulario
require '../vista/modificarformulario.php';
?>
