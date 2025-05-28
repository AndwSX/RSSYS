<?php
require '../../modelo/modelo.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$factura = null; // Inicializar la variable para que esté disponible en la vista

// Si se recibe un id por GET, se carga la factura
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $stmt = $conect->prepare("SELECT * FROM facturas WHERE id_factura = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $factura = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$factura) {
        die("Factura no encontrada.");
    }
}

// 🔹 Si se quiere actualizar la factura
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['modo']) && $_POST['modo'] === 'actualizar' &&
        isset($_POST['id'], $_POST['id_cliente'], $_POST['id_producto'], $_POST['cantidad'], $_POST['fecha'])) {

        $id = (int) $_POST['id'];

        try {
            $sql = "UPDATE facturas SET
                        id_cliente = :id_cliente,
                        id_producto = :id_producto,
                        cantidad = :cantidad,
                        fecha = :fecha,
                        descripcion = :descripcion
                    WHERE id_factura = :id";

            $stmt = $conect->prepare($sql);
            $stmt->execute([
                ':id_cliente'   => $_POST['id_cliente'],
                ':id_producto'  => $_POST['id_producto'],
                ':cantidad'     => $_POST['cantidad'],
                ':fecha'        => $_POST['fecha'],
                ':descripcion'  => $_POST['descripcion'] ?? null,
                ':id'           => $id
            ]);

            if ($stmt->rowCount() > 0) {
    echo "<script>
        alert('Factura actualizada correctamente.');
        window.location.href = 'http://localhost/CRUD_USUARIOS/modelo/gestion_pedidos/sect.php';
    </script>";
    exit;
} else {
    echo "<script>
        alert('No se realizaron cambios en la factura.');
        window.history.back();
    </script>";
    exit;
}

        } catch (PDOException $e) {
            die("Error al actualizar la factura: " . $e->getMessage());
        }
    }
} 

else {
    echo "Acceso no permitidoooo.";
}

include '../../vista/pedidos/actualizar.php';
?>


