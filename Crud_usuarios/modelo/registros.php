<?php
require '../modelo/modelo.php'; 
session_start();

// Obtener parámetro de búsqueda si existe
$busqueda = $_GET['busqueda'] ?? '';

function obtenerClientes($conect, $busqueda = '') {
    try {
        $sql = "SELECT *, 'cliente' AS tipo FROM clientes";
        if (!empty($busqueda)) {
            $sql .= " WHERE nombre LIKE :busqueda OR apellido LIKE :busqueda OR documento LIKE :busqueda OR numero LIKE :busqueda OR celular LIKE :busqueda OR direccion LIKE :busqueda";
        }
        $consulta = $conect->prepare($sql);
        if (!empty($busqueda)) {
            $consulta->bindValue(':busqueda', "%$busqueda%");
        }
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        echo "Error de PDO (clientes): " . $e->getMessage();
        return [];
    }
}

function obtenerEmpleados($conect, $busqueda = '') {
    try {
        $sql = "SELECT *, 'empleado' AS tipo FROM empleados";
        if (!empty($busqueda)) {
            $sql .= " WHERE nombre LIKE :busqueda OR apellido LIKE :busqueda OR documento LIKE :busqueda OR numero LIKE :busqueda OR celular LIKE :busqueda OR direccion LIKE :busqueda";
        }
        $consulta = $conect->prepare($sql);
        if (!empty($busqueda)) {
            $consulta->bindValue(':busqueda', "%$busqueda%");
        }
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC) ?: [];
    } catch (PDOException $e) {
        echo "Error de PDO (empleados): " . $e->getMessage();
        return [];
    }
}

// Ejecutar consultas si hay conexión
if (isset($conect)) {
    $clientes = obtenerClientes($conect, $busqueda);
    $empleados = obtenerEmpleados($conect, $busqueda);
    $usuarios = array_merge($clientes, $empleados);
} else {
    die("Error: No se pudo conectar a la base de datos.");
}

// Cargar vista
require '../vista/pagina.php';
?>
