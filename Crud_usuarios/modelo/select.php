<?php
require '../modelo/modelo.php'; // Conexión a la base de datos

function obtenerClientes($conect) {
    try {
        $sql = "SELECT * FROM clientes";
        $consulta = $conect->prepare($sql);
        $consulta->execute();
        $clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);

        if (empty($clientes)) {
            $clientes = [];
        }

        return $clientes;
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
        }
}


if (isset($conect)) {
    $clientes = obtenerClientes($conect);
} else {
    die("Error: No se pudo conectar a la base de datos.");
}

require '../vista/clientes.php';

?>