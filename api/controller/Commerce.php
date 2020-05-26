<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

define('DATA_PATH', realpath(dirname(__FILE__).'/data/'));

include_once 'data/configs.php';
include_once 'models/products.php';
include_once 'models/categories.php';

$database = new Database();
$db = $database->getConnection();

$method = $_GET['do'];

    switch($method) {
        case "listAll" : 
            $product = new Products($db);
            $run = $product->listAll();
            $num = $run->rowCount();

            if($num>0):
                $results=array();

                while ($row = $run->fetch(PDO::FETCH_ASSOC)){
                    extract($row);

                    $list=array(
                        "id" => $id,
                        "name" => $name,
                        "sku" => $sku,
                        "description" => html_entity_decode($description),
                        "price" => $price,
                        "qtd" => $qtd,
                        "categories" => $categories
                    );

                    array_push($results, $list);
                }

                http_response_code(200);
                echo json_encode($results);
            endif;
        break;
        case "showProduct" : 
            $product = new Products($db);
            $id = $_GET['id'];
            $run = $product->showCategory($id);

            $results=array();

                while ($row = $run->fetch(PDO::FETCH_ASSOC)):
                    extract($row);

                    $list=array(
                        "id" => $id,
                        "name" => $name,
                        "sku" => $sku,
                        "price" => $price,
                        "qtd" => $qtd
                        "categories" => $categories
                    );

                    array_push($results, $list);
                endwhile;

                http_response_code(200);
                echo json_encode($results);
            
        break;

        case "editProduct" : 
            $data =  json_decode( file_get_contents("php://input") );

            if( !empty($data->id) && !empty($data->name) && !empty($data->code) ) :
                $product = new Products($db);
                $product->id = $data->id;
                $product->name = $data->name;
                $product->code = $data->code;

                if($product->editProduct( $product ) ):
                    http_response_code(200);
                    echo json_encode(array("message" => "Product was updated."));
                else :
                        http_response_code(503);
                        echo json_encode(array("error" => "Unable to edit- Internal Error."));
                endif;
                
                else :
                http_response_code(400);
            endif;            
        break;

        case "deleteProduct" :
            $category = new Category($db);
            $id = $_GET['id'];

            if($category->deleteCategory( $id ) ):
                http_response_code(200);
            endif;            
        break;

        // categories
        case "listCategories" :
            $category = new Category($db);
            $run = $category->listCategories();
            $num = $run->rowCount();

            if($num>0):
                $results=array();

                while ($row = $run->fetch(PDO::FETCH_ASSOC)):
                    extract($row);

                    $list=array(
                        "id" => $id,
                        "name" => $name,
                        "code" => $code
                    );

                    array_push($results, $list);
                endwhile;

                http_response_code(200);
                echo json_encode($results);
            endif;
        break;

        case "showCategory": 
            $category = new Category($db);
            $id = $_GET['id'];
            $run = $category->showCategory($id);

            $results=array();

                while ($row = $run->fetch(PDO::FETCH_ASSOC)):
                    extract($row);

                    $list=array(
                        "id" => $id,
                        "name" => $name,
                        "code" => $code
                    );

                    array_push($results, $list);
                endwhile;

                http_response_code(200);
                echo json_encode($results);
        break;

        case "addCategory" :
            $data =  json_decode( file_get_contents("php://input") );

            if( !empty($data->name) && !empty($data->code) ) :
                
                $category = new Category($db);
                $category->name = $data->name;
                $category->code = $data->code;

                if($category->addCategory($category)):
                    http_response_code(201);
                    echo json_encode(array("message" => "Product was created."));
                else :
                        http_response_code(503);
                        echo json_encode(array("error" => "Unable to create- Internal Error."));
                endif;
                
                else :
                http_response_code(400);
            endif;
        break;

        case "editCategory": 
            $data =  json_decode( file_get_contents("php://input") );

            if( !empty($data->id) && !empty($data->name) && !empty($data->code) ) :
                $category = new Category($db);
                $category->id = $data->id;
                $category->name = $data->name;
                $category->code = $data->code;

                if($category->editCategory( $category ) ):
                    http_response_code(200);
                    echo json_encode(array("message" => "Product was updated."));
                /*else :
                        http_response_code(503);
                        echo json_encode(array("error" => "Unable to edit- Internal Error."));*/
                endif;
                
                else :
                http_response_code(400);
            endif;
        break;

        case "deleteCategory" :
            $category = new Category($db);
            $id = $_GET['id'];

            if($category->deleteCategory( $id ) ):
                http_response_code(200);
            endif;
        break;

        default : 
            http_response_code(404);
            throw new Exception('Method is invalid.');
            exit();
        break;
    }
?>