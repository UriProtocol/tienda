<?php
    //Clase que se utilizara para crear el modelo que interactua
    //con la BD api_restful

    class Productos extends Conectar  //Va a heredar los metodos que tengo de conexion, todo de conectar
    {
        //Funcion para traer todos los registro de la tabla categoria
        public function getProducto()
        {
            //llamar la cadena de conexion a la BD
            $conectar=parent::conexion();

            //String para la consulta
            $sql="select * from items";

            //Prepara la conexion con el string
            $sql=$conectar->prepare($sql);

            //Ejecutar la consulta
            $sql->execute();

            //Se devuelve el resultado, si no se coloca el fetch_assoc, se repite varias veces
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        //funcion para traer un registro en particular
        public function getProducto_id($id)
        {
            $conectar=parent::conexion();
            $sql="select * from items where id=?";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$id);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        //funcion para traer un registro en particular
        public function postProducto($nombre, $precio, $imagen)
        {
            $conectar=parent::conexion();
            $sql="INSERT INTO items VALUES (null, ?, ?, ?);";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$precio);
            $sql->bindValue(3,$imagen);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        //funcion para actualizar un registro en la tabla de productos
        public function putProducto($nombre, $precio, $imagen, $id)
        {
            $conectar=parent::conexion();
            $sql="UPDATE items SET nombre=?, precio=?, imagen=? where id=?";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$precio);
            $sql->bindValue(3,$imagen);
            $sql->bindValue(4,$id);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

          //funcion para eliminar un registro en la tabla de productos
          public function deleteProducto($id)
          {
              $conectar=parent::conexion();
              $sql="DELETE FROM items where id=?";
              $sql=$conectar->prepare($sql);
              //Utilizar los parametros en la consulta
              $sql->bindValue(1,$id);
              $sql->execute();
  
              return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
          }
        public function putContactos($contacto, $plataforma)
        {
            $conectar=parent::conexion();
            $sql="UPDATE contactos SET contacto=? where plataforma=?";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$contacto);
            $sql->bindValue(2,$plataforma);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getContactos()
        {
            $conectar=parent::conexion();
            $sql="select * from contactos";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getInsta()
        {
            $conectar=parent::conexion();
            $sql="select * from instagram";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function insertInsta($link)
        {
            $conectar=parent::conexion();
            $sql="INSERT INTO instagram VALUES (null, ?);";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$link);
            $sql->execute();

            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
        public function deleteInsta($id)
          {
              $conectar=parent::conexion();
              $sql="DELETE FROM instagram where id=?";
              $sql=$conectar->prepare($sql);
              //Utilizar los parametros en la consulta
              $sql->bindValue(1,$id);
              $sql->execute();
  
              return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
          }
        public function putInsta($id, $link)
        {
            $conectar=parent::conexion();
            $sql="UPDATE instagram SET link=? where id=?";
            $sql=$conectar->prepare($sql);
            //Utilizar los parametros en la consulta
            $sql->bindValue(1,$link);
            $sql->bindValue(2,$id);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }
    } 


?>