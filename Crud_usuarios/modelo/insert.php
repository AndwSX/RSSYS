<?php
session_start();
require '../modelo/modelo.php';

function insertarRegistro($conect, $datos) {
    $roles = ['comprador' => 'clientes', 'colaborador' => 'empleados'];
    
    if (!isset($roles[$datos['rol']])) {
        $_SESSION['mensaje'] = "Error: Rol no válido.";
        $_SESSION['tipo_mensaje'] = "error";
        return false;
    }
    
    try {
        $sql = "INSERT INTO " . $roles[$datos['rol']] . " 
                (nombre, apellido, documento, numero, fecha, rol, celular, direccion) 
                VALUES (:nombre, :apellido, :documento, :numero, :fecha, :rol, :celular, :direccion)";
        $query = $conect->prepare($sql);
        $query->execute($datos);

        $_SESSION['mensaje'] = "Registro insertado correctamente.";
        $_SESSION['tipo_mensaje'] = "exito";
        return true;
    } catch (PDOException $e) {
        $_SESSION['mensaje'] = "Error al insertar el registro: " . $e->getMessage();
        $_SESSION['tipo_mensaje'] = "error";
        return false;
    }
}

// Procesar POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = [];
    $campos = ['nombre', 'apellido', 'documento', 'numero', 'fecha', 'rol', 'celular', 'direccion'];
    
    foreach ($campos as $campo) {
        if (empty($_POST[$campo])) {
            $errores[] = "Error: El campo $campo es obligatorio.";
        }
    }
    
    if (!empty($_POST['numero']) && (!is_numeric($_POST['numero']) || strlen($_POST['numero']) > 11)) {
        $errores[] = "Error: El número de documento debe tener máximo 11 caracteres y solo debe contener números.";
    }
    
    if (!empty($_POST['nombre']) && (!preg_match("/^[a-zA-Z ]*$/", $_POST['nombre']) || strlen($_POST['nombre']) > 30)) {
        $errores[] = "Error: El nombre debe tener máximo 30 caracteres y contener solo letras.";
    }
    
    if (!empty($errores)) {
        // Guardar errores en sesión para mostrarlos luego
        $_SESSION['mensaje'] = implode("<br>", $errores);
        $_SESSION['tipo_mensaje'] = "error";
        // Redirigir para evitar reenvío del formulario
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    
    $insertado = insertarRegistro($conect, $_POST);
    if ($insertado) {
        // Redirigir para limpiar POST y mostrar mensaje éxito
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        // En caso de fallo ya se setearon mensajes en la función
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Mostrar mensajes guardados en sesión
if (isset($_SESSION['mensaje'])) {
    $clase = $_SESSION['tipo_mensaje'] === 'exito' ? 'text-success' : 'text-danger';
    echo "<p class='$clase'>" . $_SESSION['mensaje'] . "</p>";
    unset($_SESSION['mensaje'], $_SESSION['tipo_mensaje']);
}

require '../vista/vista.php';
?>
