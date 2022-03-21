<?php
require_once'../class/respuestas.class.php';
require_once'../class/sesion.class.php';

$_respuesta = new respuestas;
$_login = new sesion;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Recibimos datos del usuario por metodo post
        $postbody = file_get_contents('php://input');
        //enviamos datos al manejador
        $datos_array = $_login->buscar_token($postbody);
        //enviamos la respuesta al cliente
        http_response_code(201);
        echo json_encode($datos_array);
}
else{
    echo json_encode($_respuesta->status('error','metodo no valido'));
}
?>