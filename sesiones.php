<?php

session_start();


if(!isset($_SESSION['username'])){
    header("location: ../login.php"); //Regresarse a otro lugar, en este caso si no se inica sesion
}
else {
   //Aproximadamente dura 180 segundos la sesion
    $id = $_SESSION['id'];
    $us=$_SESSION['username'];
    $priv=$_SESSION['privilegio'];
    $ps=$_SESSION['password'];
}

?>