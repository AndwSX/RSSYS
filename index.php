<?php

include 'homepage/controlador.php';
include 'config/database.php';
include 'auth/controlador.php';
include 'admin/controlador.php';

$route = '';

if(isset($_GET['route'])){

    $route = $_GET['route'];

    switch($route){

        case 'login':
            $conexion = Conexion::conectar();
            $login = new Auth($conexion);
            $login->login();
            break;

        case 'admin':
            session_start();
            if(isset($_SESSION['rol']) AND $_SESSION['rol'] == 'admin' ){
                $dashboard = new DashboardAdmin();
                $dashboard->dashboardAdmin();
                break;
            }
            header("Location: index.php?route=login");
            break;
    }


}else{
    $index = new Homepage();
    $index->index();
}




?>