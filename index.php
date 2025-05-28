<?php

include 'homepage/controlador.php';
include 'auth/controlador.php';
include 'config/database.php';

$modules = '';

if(isset($_GET['modulo'])){

    $modules = $_GET['modulo'];

    switch($modules){

        case 'login':
        $conexion = Conexion::conectar();
        $login = new Auth($conexion);
        $login->login();
        break;
    }


}else{
    $index = new Homepage();
    $index->index();
}




?>