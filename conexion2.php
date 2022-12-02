<?php
   //definir la variables de conexion
   
   $servidor="localhost";
   $bd="tienda";
   $user="root"; //pero a ti el dolor te genera placer
   $pass="";

   //Crear conexion
   $con = new mysqli($servidor, $user, $pass, $bd);

   //Checar conexion
   // if ($con->connect_error) {
   // die("Conexion fallida: " . $con->connect_error);
   // }
   // echo "Conectado con exito"; 
  
?>