<?php

class DashboardAdmin{

    public function dashboardAdmin(){
        if (!isset($_SESSION['id_usuario']) || $_SESSION['rol'] !== 'admin') {
            header("Location: index.php");
            exit();
        }
        include 'admin/vista/dashboard_admin.php';
    }

}




?>