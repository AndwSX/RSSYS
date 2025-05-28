<?php
require_once("../../modelo/modelo.php");

// Verificar que llegue el parámetro 'id'
if (!isset($_GET['id'])) {
    die("Error: Falta el parámetro ID.");
}

$id = intval($_GET['id']);
$tabla = "facturas";
$columna = "id_factura";

// Verificar si el registro existe antes de eliminarlo
$sql = "SELECT * FROM $tabla WHERE $columna = :id";
$stmt = $conect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Error: La factura con ID $id no existe.");
}

// Ejecutar eliminación
eliminarFactura($conect, $tabla, $columna, $id);

function eliminarFactura($conect, $tabla, $columna, $id) {
    try {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla) || !preg_match('/^[a-zA-Z0-9_]+$/', $columna)) {
            throw new Exception("Nombre de tabla o columna no válido.");
        }

        $sql = "DELETE FROM $tabla WHERE $columna = :id";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

    } catch (Exception | PDOException $e) {
        // Redirige con mensaje de error si algo falla
        header("Location: ../../modelo/facturas.php?error=" . urlencode($e->getMessage()));
        exit;
    }
}

// Redirigir al listado de facturas
header("Location: http://localhost:3000/modelo/Gestion_pedidos/sect.php");
exit;
?>
