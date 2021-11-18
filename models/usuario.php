<?php
    class Usuario{
        private $idUsuario;
        private $idTipoUsuario;
        private $nombre;
        private $usuario;
        private $password;
        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getIdUsuario(){
                return $this->idUsuario;
        } 
        public function setIdUsuario($idUsuario){
                $this->idUsuario = $idUsuario;
                return $this;
        }
 
        public function getIdTipoUsuario(){
                return $this->idTipoUsuario;
        } 
        public function setIdTipoUsuario($idTipoUsuario){
                $this->idTipoUsuario = $idTipoUsuario;
                return $this;
        }
 
        public function getNombre(){
                return $this->nombre;
        } 
        public function setNombre($nombre){
                $this->nombre = $this->db->real_escape_string($nombre);
                return $this;
        }

        public function getUsuario(){
                return $this->usuario;
        } 
        public function setUsuario($usuario){
                $this->usuario = $this->db->real_escape_string($usuario);
                return $this;
        }

        public function getPassword(){
                return $this->password;
        } 
        public function setPassword($password){
                //$this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost'=> 4]);
                $this->password = $password;
                return $this;
        }

        public function save(){
            $sql = "INSERT INTO usuarios VALUES(0,3,'{$this->getNombre()}','{$this->getUsuario()}','{$this->getPassword()}')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }

        public function login(){
            $result = false;
            $usuario = $this->usuario;
            $password = $this->password;

            $sql = "SELECT * FROM usuarios where usuario = '$usuario'";
            $login = $this->db->query($sql);
            
            if($login && $login->num_rows == 1){
                $usuario = $login->fetch_object();
                //$verify = password_verify($password,$usuario->contrasena);
                if($password == $usuario->contrasena){
                        $result = $usuario;
                }
            }
            return $result;                
        }
    }
?>