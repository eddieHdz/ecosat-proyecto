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

                    if(isset($_GET['idProducto'])){
                        $id = $_GET['idProducto'];
                        $producto->setIdProducto($id);
                        $save = $producto->edit();
                    }else{
                        $save = $producto->save();
                    }
                              

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

        public function editar(){
            if(isset($_GET['idProducto'])){  
            
            $idProducto = $_GET['idProducto'];
            $edit = true;
            $producto = new Producto();
            $producto->setIdProducto($idProducto);
            $pro = $producto->getOne();
            require_once 'view/producto/crear.php';
            }else{
                header('Location:'.base_url.'producto/gestion');
            }
            
        }

        public function eliminar(){
            if(isset($_GET['idProducto'])){
                $idProducto = $_GET['idProducto'];
                $producto = new Producto();
                $producto->setIdProducto($idProducto);

                $delete = $producto->delete();
                if($delete){
                    $_SESSION['delete'] = "complete";
                }else{
                    $_SESSION['delete'] = "failed";
                }
            }else{
                $_SESSION['delete'] = "failed";
            }
            header('Location:'.base_url.'producto/gestion');
        }
    }

?>