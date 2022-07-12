<?php
require_once "connection/conexion.php";

class Formulario{
    public static function insert($nombres, $alias, $rut, $email, $cod_region, $cod_comuna, $idcandidato, $difusion){
        $db = ConexionBD();
        $query1=("INSERT INTO votante VALUES('".$rut."', '".$nombres."',
         '".$alias."', '".$email."', '".$cod_region."', '".$cod_comuna."')");
        $query2=("INSERT INTO formulario_votantes VALUES(DEFAULT,'".$rut."', '".$idcandidato."','".$difusion."')");
        $res1=pg_query($query1);
        $res2=pg_query($query2);
        if(pg_affected_rows($res1) && pg_affected_rows($res2)){
            return TRUE;
        }
        return FALSE;
    }
    public static function validarRut($rut, $alias){
        $db = ConexionBD();
        $query= "SELECT * FROM votante where rut = '".$rut."' or alias = '".$alias."'";
        $res =pg_query($db, $query);
        if($res){
            if(pg_num_rows($res)>0){
                return true;
            }else{
                return False;
            }
        }
        return false;
    }
}
?>