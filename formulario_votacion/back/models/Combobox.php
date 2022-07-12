<?php
require_once "connection/conexion.php";
class Combobox {
    public static function getRegion(){
        $db = ConexionBD();
        $query = "SELECT * FROM region";
        $resultado = pg_query($db,$query);
        $datos = [];
        if($resultado){
            if(pg_num_rows($resultado)>0){

                while ($obj=pg_fetch_assoc($resultado)){
                    $datos[] = [
                        'region' => $obj['nombre'],
                        'id_region' => $obj['cod_region']
                    ];
                }
            }
            return $datos;
        }
    }//end getRegion

    public static function getComuna($cod_region){
        $db = ConexionBD();
        $query = "select c.cod_comuna as cod, c.nombre as nom from 
        provincia p left join comuna c on c.cod_provincia = p.cod_provincia where cod_region = '$cod_region';";
        $resultado = pg_query($db,$query);
        $datos = [];
        if($resultado){
            if(pg_num_rows($resultado)>0){

                while ($obj=pg_fetch_assoc($resultado)){
                    $datos[] = [
                        'comuna' => $obj['nom'],
                        'id_comuna' => $obj['cod']
                    ];
                }
            }
            return $datos;
        }
    }//end getComuna
    public static function getCandidato(){
        $db = ConexionBD();
        $query = "select * from candidatos;";
        $resultado = pg_query($db,$query);
        $datos = [];
        if($resultado){
            if(pg_num_rows($resultado)>0){

                while ($obj=pg_fetch_assoc($resultado)){
                    $datos[] = [
                        'nombre' => $obj['nombre_completo'],
                        'id_candidato' => $obj['idcandidato']
                    ];
                }
            }
            return $datos;
        }
    }//end getComuna
}// end class Combobox

?>

