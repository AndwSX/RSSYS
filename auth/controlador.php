<?php
session_start();
include 'auth/modelo.php';

class Auth{
    
    public $usuarioModel;
    private $db;

    public function __construct($db){
        $this->db = $db;
        $this->usuarioModel = new Usuario($this->db);
    }

    public function login(){ //Esta es la fncion para la ruta del login

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['iniciar_sesion'])) {
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];

            $datos = $this->usuarioModel->verificarUsuario($correo);

            if ($datos && password_verify($contrasena, $datos['contraseña'])) {
                $_SESSION['id_usuario'] = $datos['id_usuario'];
                $_SESSION['rol'] = $datos['rol'];
                $_SESSION['correo'] = $datos['correo'];

                if ($datos['rol'] === 'admin') {
                    header("Location: index.php?route=admin");

                } elseif ($datos['rol'] === 'empleado') {
                    header("Location: ../vista/empleado_inicio.php");
                } elseif ($datos['rol'] === 'cliente') {
                    header("Location: ../vista/dashboard_cliente.php");
                }
            } else {
                echo "<script>alert('Correo o contraseña incorrectos');window.location.href='index.php?modulo=login';</script>";
            }
            }
        }else{
            include 'auth/vista/login.php';
        }
    }

    public function registro(){ //Con esta ruta se maneja el registro de usuarios
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registrar'])) {
            // Recibir y sanitizar los datos del formulario
            $datos = [
                'nombre' => trim($_POST['nombre']),
                'apellido' => trim($_POST['apellido']),
                'tipo_documento' => $_POST['tipo_documento'],
                'documento' => trim($_POST['documento']),
                'fecha' => $_POST['fecha'],
                'correo' => trim($_POST['correo']),
                'celular' => trim($_POST['celular']),
                'direccion' => trim($_POST['direccion']),
                'contrasena' => password_hash($_POST['contrasena'], PASSWORD_DEFAULT) // Encriptar contraseña
            ];

            // Rol seleccionado por el usuario
            $rol = $_POST['rol'];

            // Validación de rol obligatorio
            if (empty($rol)) {
                echo "Debe seleccionar un rol (Empleado o Cliente).";
                exit();
            }

            $exito = $this->usuarioModel->registrarUsuario($datos, $rol);

            if ($exito) {
                echo '<script>
                alert("¡Registro exitoso! Serás redirigido al inicio de sesión.");
                window.location.href = "index.php?route=registro&registro=exitoso";
                </script>';
                exit();
            } else {
                echo "Error al registrar el usuario. Verifique los datos e intente nuevamente.";
            }
        } else {
            // Si alguien intenta acceder directamente
            include 'auth/vista/registro.php';
        }

        
    }

}



?>