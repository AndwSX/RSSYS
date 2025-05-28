<?php
include  'conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $ciudad = $_POST['ciudad']; 
    $correo = $_POST['correo'];
    $direccion = $_POST['direccion'];
    $cuentabanco = $_POST['cuentabanco'];
    $banco = $_POST['banco'];
    $fecha = date('Y-m-d');

    try {
        $stmt = $conexion->prepare("
            INSERT INTO proveedores (
                cedula,
                nombre,
                celular,
                ciudad,
                correo,
                direccion,
                cuentabanco,
                banco,
                fecha 
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$cedula, $nombre, $correo, $ciudad, $celular, $direccion, $cuentabanco,$banco, $fecha]);
        header('Location: http://localhost:3000/provedores/modelo/registrar.php?registrado=ok');
        exit();
    } catch (PDOException $e) {
        echo " Error al registrar: " . $e->getMessage();
    }

}

include '../vista/proveedores.php';
?>
