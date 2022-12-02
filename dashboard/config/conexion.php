<?php
    //clase para establecer conexion con la BD api_restful

    class Conectar
    {
        protected $dbh;

        protected function Conexion()
        {
            try
            {
                $conectar=$this->dbh=new PDO("mysql:local=localhost;dbname=tienda","root","");
                return $conectar;
            }
            catch (Exception $e)
            {
                print "Error en la BD!".$e->getMessage()."</br>";
                die("Verifica por favor ...");
            }
        }
    }
?>