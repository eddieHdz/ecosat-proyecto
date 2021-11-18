<?php
    class productoController{
        public function index(){
            //echo "Controlador Producto, accion index";
            require_once 'view/producto/destacados.php';
        }
        public function gestion(){
            require_once 'view/producto/gestion.php';
        }
    }

?>