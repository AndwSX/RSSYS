<?php
session_start();
include 'auth/modelo.php';
include 'admin/controlador.php';

class Auth{
    
    public $usuarioModel;
    private $db;

    public function __construct($db){
        $this->db = $db;
        $this->usuarioModel = new Usuario($this->db);
    }

    public function login(){

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
                    $dashboard = new DashboardAdmin();
                    $dashboard->dashboardAdmin();

                } elseif ($datos['rol'] === 'empleado') {
                    header("Location: ../vista/empleado_inicio.php");
                } elseif ($datos['rol'] === 'cliente') {
                    header("Location: ../vista/dashboard_cliente.php");
                }
            } else {
                echo "<script>alert('Correo o contraseña incorrectos');window.location.href='../vista/login.php';</script>";
            }
            }
        }else{
            include 'auth/vista/login.php';
        }
    }

}



?>