<?php
include 'modulos/gestionUsuarios/modelo.php';

class GestionUsuarios{
    public $usuariosModel;
    private $db;

    public function __construct($db){
        $this->db = $db;
        $this->usuariosModel = new Usuarios($this->db);
    }

    public function gestionUsuarios(){
        $accion = $_GET['accion'] ?? '';

        switch ($accion) {
            case 'nuevoRegistro':
                include 'modulos/gestionUsuarios/vista/nuevoRegistro.php';
                break;
                
            default:
                // Obtener parámetro de búsqueda si existe
                $busqueda = $_GET['busqueda'] ?? '';
                $clientes = $this->usuariosModel->obtenerClientes($busqueda);
                $empleados = $this->usuariosModel->obtenerEmpleados($busqueda);
                $usuarios = array_merge($clientes, $empleados);
                include 'modulos/gestionUsuarios/vista/pagina.php';
                break;    
           
        }
        
    }
}

?>