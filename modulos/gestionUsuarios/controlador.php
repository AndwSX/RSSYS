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
            
            case 'nuevoProveedor':
                include 'modulos/gestionUsuarios/vista/nuevoProveedor.php';
                break;
            
            case 'registroClientes':
                $clientes = $this->usuariosModel->obtenerClientes($busqueda);
                include 'modulos/gestionUsuarios/vista/registroClientes.php';
                break;
            
            case 'registroEmpleados':
                $empleados = $this->usuariosModel->obtenerEmpleados($busqueda);
                include 'modulos/gestionUsuarios/vista/registroEmpleados.php';
                break;

            case 'proveedores':
                include 'modulos/gestionUsuarios/vista/proveedores.php';
                break;
            
            case 'gestionPedido':
                include 'modulos/gestionUsuarios/vista/gestionPedido.php';
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