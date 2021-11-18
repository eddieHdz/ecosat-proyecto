<?php
    class Producto{

        // Connection
        private $conn;

        // Table
        private $db_table = "productos";

        // Columns
        public $idProducto;
        public $idDepartamento;
        public $descripcion;
        public $precio;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // GET ALL
        public function getProductos(){
            $sqlQuery = "SELECT idProducto, idDepartamento, descripcion, precio FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // CREATE
        public function createProducto(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        idDepartamento = :idDepartamento, 
                        descripcion = :descripcion, 
                        precio = :precio";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->idDepartamento=htmlspecialchars(strip_tags($this->idDepartamento));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
        
            // bind data
            $stmt->bindParam(":idDepartamento", $this->idDepartamento);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":precio", $this->precio);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // UPDATE
        public function updateProducto(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        idDepartamento = :idDepartamento, 
                        descripcion = :descripcion, 
                        precio = :precio
                    WHERE 
                        idProducto = :idProducto";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->idDepartamento=htmlspecialchars(strip_tags($this->idDepartamento));
            $this->descripcion=htmlspecialchars(strip_tags($this->descripcion));
            $this->precio=htmlspecialchars(strip_tags($this->precio));
            $this->idProducto=htmlspecialchars(strip_tags($this->idProducto));
        
            // bind data
            $stmt->bindParam(":idDepartamento", $this->idDepartamento);
            $stmt->bindParam(":descripcion", $this->descripcion);
            $stmt->bindParam(":precio", $this->precio);
            $stmt->bindParam(":idProducto", $this->idProducto);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function borrarProducto(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idProducto = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->idProducto=htmlspecialchars(strip_tags($this->idProducto));
        
            $stmt->bindParam(1, $this->idProducto);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
    }
?>