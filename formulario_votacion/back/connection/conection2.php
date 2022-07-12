<?php
//Conexion a la base de datos postgres
function ConexionBD(){
        $host = "192.168.1.11";
        $dbname = "externo02";
        $username =  "externo";
        $password = "desis123";  

        $conn = pg_connect("host=$host dbname=$dbname user=$username  password=$password");
        return $conn;
    }
?>