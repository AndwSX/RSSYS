<?php
if (isset($_GET['vista'])) {
    if ($_GET['vista'] == 'proveedores') {
        include '../vista/.php';
    }
} else {
    include 'modelo/registrar.php'; // Vistaaa
}
?>
