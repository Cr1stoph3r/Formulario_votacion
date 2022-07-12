<?php
require_once "../connection/conection2.php";

class Desis{
    public static function insert($id, $copy){
        $db = ConexionBD();
        $query1=("INSERT INTO copiar VALUES('".$id."', '".$copy."'");
        $res=pg_query($query1);
        if(pg_affected_rows($res)){
            return TRUE;
        }
        return FALSE;
    }

}

echo Desis::insert('1', 'CREATE TABLE public.comuna
(
    nombre character varying(100) NOT NULL,
    cod_comuna character(5) NOT NULL,
    cod_provincia character(3) NOT NULL
);

ALTER TABLE IF EXISTS public.comuna
    OWNER to postgres;


CREATE TABLE public.provincia (
    nombre character varying(100) NOT NULL,
    cod_provincia character(3) NOT NULL,
    cod_region character(2) NOT NULL
);

ALTER TABLE IF EXISTS public.provincia
    OWNER to postgres;

CREATE TABLE public.region
(
    nombre character varying(100) NOT NULL,
    cod_region character(2) NOT NULL
);

ALTER TABLE IF EXISTS public.region
    OWNER to postgres;');
?>