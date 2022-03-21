<?php
require_once'../class/respuestas.class.php';
require_once'../class/usuarios.class.php';
require_once'curl.php';

$_respuesta = new respuestas;
if($JSON_response["success"] == '1' && $JSON_response["action"] == 'registro' && $JSON_response["score"] >= 0.5){
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_usuario = new usuarios;
        //Recibimos datos del usuario por metodo post
        $postbody = file_get_contents('php://input');
        //enviamos datos al manejador
        $datos_array = $_usuario->insertar_usuario($postbody);
        //enviamos la respuesta al cliente
        http_response_code(201);
        echo json_encode($datos_array);
        
    }else{
        echo json_encode($_respuesta->error_405());
    }
    
}else{
	echo json_encode($_respuesta->status('error','Ha ocurrido un error, intente nuevamente'));
}
    
?>