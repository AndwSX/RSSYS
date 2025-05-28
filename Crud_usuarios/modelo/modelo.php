<?php



try {
    $conect = new PDO('mysql:host=localhost:3307;dbname=abastos', 'root', '');
    $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Error al conectar con la base de datos: " . $e->getMessage());
}
?>
