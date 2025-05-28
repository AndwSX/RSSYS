<?php
require '../modelo/modelo.php'; // Conexión a la base de datos

function obtenerempleados($conect) {
    try {
        $sql = "SELECT * FROM empleados";
        $consulta = $conect->prepare($sql);
        $consulta->execute();
        $empleados = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Si la consulta no devuelve nada, inicializa como array vacío
        if (empty($empleados)) {
            $empleados = [];
        }

        return $empleados;
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
    }
}

if (isset($conect)) {
    $empleados = obtenerempleados($conect);
} else {
    die("Error: No se pudo conectar a la base de datos.");
}


require '../vista/empleados.php';

?>