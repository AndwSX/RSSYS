<?php
include 'conexion.php';

if (!isset($_GET['id_proveedor'])) {
    die("Error: Parámetro 'id_proveedor' faltante.");
}

$id = intval($_GET['id_proveedor']);

$sql = "SELECT * FROM proveedores WHERE id_proveedor = :id";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Error: El ID no existe en la tabla proveedores.");
}

function eliminarProveedor($conexion, $id) {
    try {
        $sql = "DELETE FROM proveedores WHERE id_proveedor = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Redirigir con el parámetro 'eliminado=ok' al terminar la eliminación
            header("Location: http://localhost:3000/provedores/modelo/select.php?eliminado=ok");
            exit();
        } else {
            echo "Error al eliminar el registro.";
        }
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
    }
}

eliminarProveedor($conexion, $id);
?>
