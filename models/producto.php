<?php
    class Producto{
        private $idProducto;
        private $idDepartamento;
        private $descripcion;
        private $precio;
        private $db; 

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getIdProducto(){
            return $this->idProducto;
        }
        public function setIdProducto($idProducto){
            $this->idProducto = $idProducto;
            return $this;
        }
 
        public function getIdDepartamento(){
            return $this->idDepartamento;
        }
        public function setIdDepartamento($idDepartamento){
            $this->idDepartamento = $idDepartamento;
            return $this;
        }
 
        public function getDescripcion(){
            return $this->descripcion;
        } 
        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
            return $this;
        }
 
        public function getPrecio(){
            return $this->precio;
        } 
        public function setPrecio($precio){
            $this->precio = $precio;
            return $this;
        }

        public function getAll(){
            $productos = $this->db->query("SELECT * FROM productos ORDER BY 1 DESC");
            return $productos;
        }

        public function save(){
            $sql = "INSERT INTO productos VALUES(0,1,'{$this->getDescripcion()}','{$this->getPrecio()}')";
            $save = $this->db->query($sql);

            $result = false;
            if($save){
                $result = true;
            }
            return $result;
        }
    }
?>