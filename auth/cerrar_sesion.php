<?php
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redireccionar al login o página principal
header("Location: ../index.php");
exit();
?>
