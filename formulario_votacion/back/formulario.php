<?php
require_once "models/Combobox.php";
require_once "models/Formulario.php";
header('Access-Control-Allow-Origin: *');
header("Acces-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Acces-Control-Request-Method");
header('content-type: application/json; charset=utf-8');
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
        if(isset($_GET['id'])){
            echo json_encode(Combobox::getComuna($_GET['id']), JSON_UNESCAPED_UNICODE);
        }
        else{
            echo json_encode(Combobox::getRegion(), JSON_UNESCAPED_UNICODE);   
        }
        break;
    case 'POST':
        $rut = $_POST['rut'];
        $alias = $_POST['alias'];
        if(Formulario::validarRut($rut,$alias) == true){
            echo json_encode('falso');
        }else{
        $nombres = $_POST['nombres'];
        $email = $_POST['email'];
        $cod_region= $_POST['cod_region'];
        $cod_comuna= $_POST['cod_comuna'];
        $idcandidato = $_POST['idcandidato'];
        $difusion = $_POST['difusion'];
        
            if(Formulario::insert($nombres, $alias, $rut, $email, $cod_region, $cod_comuna, $idcandidato, $difusion)){
                http_response_code(200);
                echo json_encode('verdadero');
            }else{
                http_response_code(400);
            }
        }
        break;
    default:
    #code...
    break;
}
?>