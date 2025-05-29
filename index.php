<?php

include 'homepage/controlador.php';
include 'auth/controlador.php';
include 'admin/controlador.php';

$route = '';

if(isset($_GET['route'])){

    $route = $_GET['route'];

    switch($route){

        case 'login':
            include 'config/database.php';
            $conexion = Conexion::conectar();
            $login = new Auth($conexion);
            $login->login();
            break;
        
        case 'registro':
            include 'config/database.php';
            $conexion = Conexion::conectar();
            $registro = new Auth($conexion);
            $registro->registro();
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