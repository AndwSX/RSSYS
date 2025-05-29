<?php

class Usuarios{
    private $db;

    public function __construct($conexion){
        $this->db = $conexion;
    }

    //Funcion para obtener los clientes del sistema
    function obtenerClientes($busqueda) {
        try {
            $sql = "SELECT *, 'cliente' AS tipo FROM clientes";
            if (!empty($busqueda)) {
                $sql .= " WHERE nombre LIKE :busqueda OR apellido LIKE :busqueda OR documento LIKE :busqueda OR numero LIKE :busqueda OR celular LIKE :busqueda OR direccion LIKE :busqueda";
            }
            $consulta = $this->db->prepare($sql);
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

    //Funcion para obtener a los empleados
    function obtenerEmpleados($busqueda) {
        try {
            $sql = "SELECT *, 'empleado' AS tipo FROM empleados";
            if (!empty($busqueda)) {
                $sql .= " WHERE nombre LIKE :busqueda OR apellido LIKE :busqueda OR documento LIKE :busqueda OR numero LIKE :busqueda OR celular LIKE :busqueda OR direccion LIKE :busqueda";
            }
            $consulta = $this->db->prepare($sql);
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

}

?>