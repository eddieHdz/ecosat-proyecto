<?php
    require_once 'models/usuario.php';
    class usuarioController{
        public function index(){
            echo "Controlador Usuarios, accion index";
        }
        public function registro(){
            require_once 'view/usuario/registro.php';
        }
        public function save(){
            if(isset($_POST)){
                $usuario = new Usuario();
                $usuario->setNombre($_POST['nombre']);
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setPassword($_POST['password']);
                
                $save =  $usuario->save();
                if($save){
                    $_SESSION['register']="complete";
                }else{
                    $_SESSION['register']="failed";
                }
            }else{
                $_SESSION['register']="failed";                
            }
            header("Location:".base_url.'usuario/registro');
        }

        public function login(){
            if(isset($_POST)){
                $usuario = new Usuario();
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setPassword($_POST['password']);

                $identity = $usuario->login();
                if($identity && is_object($identity)){
                    $_SESSION['identity'] = $identity;
                    if($identity->idTipoUsuario == 2){
                        $_SESSION['supervisor'] = true;
                    }
                }else{
                    $_SESSION['error_login'] = 'Identificacion fallida';
                }
            }
            header("Location:".base_url);
        }

        public function logout(){
            if(isset($_SESSION['identity'])){
                unset($_SESSION['identity']);
            }

            if(isset($_SESSION['supervisor'])){
                unset($_SESSION['supervisor']);
            }
            header("Location:".base_url);
        }
    }

?>