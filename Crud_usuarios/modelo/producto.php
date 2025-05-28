<?php
require 'conexion.php';  // Archivo donde creas la conexión PDO $conexion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'] ?? null;
    $id_empleado = $_POST['id_empleado'] ?? null;
    $productos = $_POST['productos'] ?? null;

    if (!$id_cliente || !$id_empleado || empty($productos['id_producto'])) {
        die("Faltan datos obligatorios.");
    }

    try {
        $conexion->beginTransaction();

        // Insertar factura
        $stmtFactura = $conexion->prepare("
            INSERT INTO facturas (id_cliente, id_empleado, fecha) 
            VALUES (:id_cliente, :id_empleado, NOW())
        ");
        $stmtFactura->execute([
            ':id_cliente' => $id_cliente,
            ':id_empleado' => $id_empleado
        ]);

        $id_factura = $conexion->lastInsertId();

        // Preparar sentencias para detalle y stock
        $stmtDetalle = $conexion->prepare("
            INSERT INTO detalle_facturas (id_factura, id_producto, cantidad, precio) 
            VALUES (:id_factura, :id_producto, :cantidad, :precio)
        ");
        $stmtStock = $conexion->prepare("
            UPDATE productos SET stock = stock - :cantidad 
            WHERE id_producto = :id_producto AND stock >= :cantidad
        ");
        $stmtPrecio = $conexion->prepare("
            SELECT precio FROM productos WHERE id_producto = :id_producto
        ");

        for ($i = 0; $i < count($productos['id_producto']); $i++) {
            $id_producto = $productos['id_producto'][$i];
            $cantidad = $productos['cantidad'][$i];

            // Obtener precio del producto
            $stmtPrecio->execute([':id_producto' => $id_producto]);
            $precio = $stmtPrecio->fetchColumn();

            if ($precio === false) {
                throw new Exception("Producto no encontrado: $id_producto");
            }

            // Insertar detalle de la factura
            $stmtDetalle->execute([
                ':id_factura' => $id_factura,
                ':id_producto' => $id_producto,
                ':cantidad' => $cantidad,
                ':precio' => $precio
            ]);

            // Actualizar stock del producto
            $stmtStock->execute([
                ':cantidad' => $cantidad,
                ':id_producto' => $id_producto
            ]);

            if ($stmtStock->rowCount() == 0) {
                throw new Exception("Stock insuficiente para producto ID: $id_producto");
            }
        }

        $conexion->commit();
        echo "✅ Pedido guardado correctamente.";

    } catch (Exception $e) {
        $conexion->rollBack();
        echo "❌ Error al guardar pedido: " . $e->getMessage();
    }
} else {
    echo "Método no permitido.";
}
