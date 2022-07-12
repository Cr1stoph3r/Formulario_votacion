<?php
//Conexion a la base de datos postgres
function ConexionBD(){
        $host = "localhost";
        $dbname = "PruebaDeisi";
        $username =  "postgres";
        $password = "1234567";  

        $conn = pg_connect("host=$host dbname=$dbname user=$username  password=$password");
        return $conn;
    }
?>