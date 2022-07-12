<?php
require_once "models/Combobox.php";
header('Access-Control-Allow-Origin: *');
header("Acces-Control-Allow-Headers: X-API-KEY, Origin, Content-Type, Accept, Acces-Control-Request-Method");
header('content-type: application/json; charset=utf-8');
switch ($_SERVER['REQUEST_METHOD']){
    case 'GET':
            echo json_encode(Combobox::getCandidato(), JSON_UNESCAPED_UNICODE);   
        break;
    default:
    #code...
    break;
}
?>