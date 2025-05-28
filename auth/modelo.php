<?php

class Usuario {
    private $db;

    public function __construct($conexion){
        $this->db = $conexion;
    }

public function verificarUsuario($correo) {
    // Verificar si es admin
    $sql = "SELECT id_usuario AS id_usuario, correo, contraseña, 'admin' AS rol FROM usuarios WHERE correo = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$correo]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($admin) return $admin;

    // Verificar si es empleado
    $sql = "SELECT id_empleado AS id_usuario, correo, contraseña, 'empleado' AS rol FROM empleados WHERE correo = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$correo]);
    $empleado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($empleado) return $empleado;

    // Verificar si es cliente
    $sql = "SELECT id_cliente AS id_usuario, correo, contraseña, 'cliente' AS rol FROM clientes WHERE correo = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->execute([$correo]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($cliente) return $cliente;

    // No se encontró
    return false;
}

}