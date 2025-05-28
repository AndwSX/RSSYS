<?php
// Ruta ejemplo, ajusta según tu estructura
require '../../modelo/modelo.php'; // Archivo que crea $conect (PDO)

function obtenerFacturas($conect) {
    try {
        $stmt = $conect->prepare("SELECT * FROM facturas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Error al obtener las facturas: " . $e->getMessage());
    }
}

// Ejecutamos la función para obtener los datos
$facturas = obtenerFacturas($conect);

// Cargamos la vista y le pasamos $facturas
require '../../vista/pedidos/listarpd.php';
?>
