<?php
    require_once 'models/producto.php';

    class productoController{
        public function index(){
            //echo "Controlador Producto, accion index";
            require_once 'view/producto/destacados.php';
        }
        public function gestion(){

            $producto = new Producto();
            $productos = $producto->getAll();

            require_once 'view/producto/gestion.php';
        }

        public function crear(){
            require_once 'view/producto/crear.php';
        }

        public function save(){
            if(isset($_POST)){
                $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion']:false;
                $precio = isset($_POST['precio']) ? $_POST['precio']:false;

                if($descripcion && $precio){
                    $producto = new Producto();
                    $producto->setDescripcion($descripcion);
                    $producto->setPrecio($precio);
                    $save = $producto->save();

                    if($save){
                        $_SESSION['producto'] = "complete";
                    }else{
                        $_SESSION['producto'] = "failed";
                    }
                }else{
                    $_SESSION['producto'] = 'failed';
                }
            }else{
                $_SESSION['producto'] = 'failed';
            }
            header('Location:'.base_url.'producto/gestion');
        }
    }

?>