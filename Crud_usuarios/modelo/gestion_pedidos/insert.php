<?php
session_start();
require '../../modelo/modelo.php'; // conexión PDO en $conect

function insertarfacturas($conect, $datos) {
    try {
        $sql = "INSERT INTO facturas (id_cliente, id_producto, cantidad, fecha, descripcion) 
                VALUES (:id_cliente, :id_producto, :cantidad, :fecha, :descripcion)";
        
        $query = $conect->prepare($sql);
        $query->execute([
            ':id_cliente'   => $datos['id_cliente'],
            ':id_producto'  => $datos['id_producto'],
            ':cantidad'     => $datos['cantidad'],
            ':fecha'        => $datos['fecha'],
            ':descripcion'  => $datos['descripcion'] ?? null, // por si está vacío
        ]);

        $_SESSION['mensaje'] = "Pedido insertado correctamente.";
        $_SESSION['tipo_mensaje'] = "exito";
        header("location: http://localhost:/modelo/Gestion_pedidos/sect.php");
        exit();
        
    } catch (PDOException $e) {
    echo "Error en inserción: " . $e->getMessage();
    exit;
}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST); 
    if (
        !empty($_POST['id_cliente']) &&
        !empty($_POST['id_producto']) &&
        !empty($_POST['cantidad']) &&
        !empty($_POST['fecha'])
    ) {
        insertarfacturas($conect, $_POST);
    } else {
        $_SESSION['mensaje'] = "Por favor, complete todos los campos obligatorios.";
        $_SESSION['tipo_mensaje'] = "error";
        header("Location:modelo/Gestion_pedidos/insert.php");
        exit();
    }
}
    include '../../vista/pedidos/regisrar_pedido.php';
    ?>


