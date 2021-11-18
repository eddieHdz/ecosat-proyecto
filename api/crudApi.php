<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


    include_once '../conexion.php';
    include_once '../productos.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Producto($db);

    $stmt = $item->getProductos();
    $itemCount = $stmt->rowCount();
    $data = json_decode(file_get_contents("php://input",true));

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST':
                $item->idDepartamento = $data->idDepartamento;
                $item->descripcion = $data->descripcion;
                $item->precio = $data->precio;
                
                if($item->createProducto()){
                    echo 'Producto creado exitosamente.';
                } else{
                    echo 'El producto no fue creado.';
                }
            break;
        case 'GET':
                if($itemCount > 0){
            
                    $productoArreglo = array();
                    $productoArreglo["body"] = array();
            
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                        extract($row);
                        $e = array(
                            "idProducto" => $idProducto,
                            "idDepartamento" => $idDepartamento,
                            "descripcion" => $descripcion,
                            "precio" => $precio
                        );
            
                        array_push($productoArreglo["body"], $e);
                    }
                    echo json_encode($productoArreglo);
                }        
                else{
                    http_response_code(404);
                    echo json_encode(
                        array("message" => "No se encontraron registros.")
                    );
                }
            break;
        case 'PUT':
                $item->idProducto = $data->idProducto;        
                $item->idDepartamento = $data->idDepartamento;
                $item->descripcion = $data->descripcion;
                $item->precio = $data->precio;
                
                if($item->updateProducto()){
                    echo json_encode("El producto fue actualizado con exito");
                } else{
                    echo json_encode("El producto no se actualizo");
                }
            break;
        case 'DELETE':
                $item->idProducto = $data->idProducto;
        
                if($item->borrarProducto()){
                    echo json_encode("El Producto fue eliminado con exito.");
                } else{
                    echo json_encode("El producto no pudo ser eliminado");
                }
            break;        
    }
?>