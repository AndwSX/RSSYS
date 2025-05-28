<?php
class Conexion {
    private static $conexion = null;

    private function __construct() {} // Evita instancias directas

    public static function conectar() {
        if (self::$conexion === null) {
            try {
                self::$conexion = new PDO("mysql:host=localhost:3306;dbname=abastos", "root", "");
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return self::$conexion;
    }
}

?>