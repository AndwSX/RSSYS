<?php

class Productos{


    public function productos(){
        //Tomar el valor de la ruta para ver que seleccionan
        if(isset($_GET['accion'])){

            $accion = $_GET['accion'];
            
            switch ($accion) {

                case 'registrar':
                    include 'modulos/productos/vista/registrarProducto.php';
                    break;

                case 'ver':
                    include 'modulos/productos/vista/verProductos.php';
                    break;
                
                case 'modificar':
                    include 'modulos/productos/vista/modificarProducto.php';
                    break;

                case 'stock':
                    include 'modulos/productos/vista/stock.php';
                    break;

                default:
                    # code...
                    break;
            }

        }else{
            include 'modulos/productos/vista/verProductos.php';
        }

    }
}




?>