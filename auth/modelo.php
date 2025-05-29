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
    //Funcion para registrar un nuevo usuario 
    public function registrarUsuario($datos, $rol) {
        try {
            if ($rol === "empleado") {
                $sql = "INSERT INTO empleados 
                        (nombre, apellido, documento, numero, fecha, rol, correo, celular, direccion, contraseña) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            } elseif ($rol === "cliente") {
                $sql = "INSERT INTO clientes 
                        (nombre, apellido, documento, numero, fecha, rol, correo, celular, direccion, contraseña) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            } else {
                throw new Exception("Rol inválido.");
            }

            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $datos['nombre'],
                $datos['apellido'],
                $datos['tipo_documento'],
                $datos['documento'],
                $datos['fecha'],
                $rol,
                $datos['correo'],
                $datos['celular'],
                $datos['direccion'],
                $datos['contrasena']
            ]);
        } catch (Exception $e) {
            // Para debug, puedes activar esto temporalmente
            // echo "Error: " . $e->getMessage();
            return false;
        }
    }

}