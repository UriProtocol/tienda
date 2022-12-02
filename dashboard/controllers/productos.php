<?php
    //Crear el controlador que se comunique con el modelo
    //para acceder a los metodos del modelo a traves de los 
    //endpoints

    //Agregar la siguiente linea para que la app sepa que se utilizaran JSON
    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Productos.php");

    //crear un objeto de tipo categoria para instanciar los metodos
    //del modelo
    $producto=new Productos();

    //Recibir la informacion en un JSON que hay que preparar en el objeto body
    $body=json_decode(file_get_contents("php://input"),true);

    //Crear un switch para navegar entre los diferentes
    //servicios que ofrece el API a traves de los endpoints
    switch($_GET["op"])
    {
        //Case para regresar todos los registros de categoria
        case "selectall": $datos=$producto->getProducto();
            echo json_encode($datos);
            break;

        //Case para regresar un registros en particular de categoria
        case "selectid": $datos=$producto->getProducto_id($body["id"]);
            echo json_encode($datos);
            break;

        //Case para insertar un registro en la tabla productos
        case "insert": $datos=$producto->postProducto($body["nombre"], $body["precio"], $body["imagen"]);
            echo json_encode("Registro insertado exitosamente");
            break;
        
        //Case para actualizar un registro en la tabla productos
        case "update": $datos=$producto->putProducto($body["nombre"], $body["precio"], $body["imagen"], $body["id"]);
            echo json_encode("Registro actualizado exitosamente");
            break;
        
        //Case para eliminar un registro en la tabla productos
        case "delete": $datos=$producto->deleteProducto($body["id"]);
            echo json_encode("Registro eliminado exitosamente");
            break;

        //Case para actualizar un registro en la tabla contactos
        case "updateCon": $datos=$producto->putContactos($body["contacto"], $body["plataforma"]);
            echo json_encode("Contacto actualizado exitosamente");
            break;

        //Case para obtener los datos de la tabla ccontactos
        case "getCon": $datos=$producto->getContactos();
            echo json_encode($datos);
            break;

        //Case para obtener los datos de la tabla de instagram
        case "getInsta": $datos=$producto->getInsta();
            echo json_encode($datos);
            break;
        
        //Case para ingresar campos a la tabla de instagram
        case "insertInsta": $datos=$producto->insertInsta($body["link"]);
            echo json_encode("Publicación insertada exitósamente");
            break;

        //Case para eliminar campos de la tabla de instagram
        case "deleteInsta": $datos=$producto->deleteInsta($body['id']);
            echo json_encode("Publicación eliminada exitósamente");
            break;

        //Case para actualizar los campos de la tabla de instagram
        case "putInsta": $datos=$producto->putInsta($body['id'], $body['link']);
            echo json_encode("Publicación actualizada exitósamente");
            break;
    }


?>