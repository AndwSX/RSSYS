<?php
require_once("../modelo/modelo.php");

if (!isset($_GET['id']) || !isset($_GET['rol'])) {
    die("Error: Parámetros inválidos o faltantes.");
}

$id = intval($_GET['id']);
$rol = $_GET['rol'];

if ($rol === "comprador") {
    $tabla = "clientes";
    $columna = "id_cliente";
} elseif ($rol === "colaborador") {
    $tabla = "empleados";
    $columna = "id_empleado";
} else {
    die("Error: Rol no válido.");
}

$sql = "SELECT * FROM $tabla WHERE $columna = :id";
$stmt = $conect->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$registro = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$registro) {
    die("Error: El ID no existe en la base de datos.");
} else {
    echo "El ID existe en la tabla $tabla. Procediendo con la eliminación.<br>";
}

eliminarRegistro($conect, $tabla, $columna, $id);

function eliminarRegistro($conect, $tabla, $columna, $id) {
    try {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $tabla) || !preg_match('/^[a-zA-Z0-9_]+$/', $columna)) {
            throw new Exception("Nombre de tabla o columna no válido.");
        }

        $sql = "DELETE FROM $tabla WHERE $columna = :id";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Registro eliminado correctamente de la tabla $tabla.";
        } else {
            echo "Error al eliminar el registro.";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
    }
}
header("Location: ../../modelo/registros.php?eliminado=ok");
exit;


?>