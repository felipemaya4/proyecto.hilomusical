<?php
require_once'../class/respuestas.class.php';
require_once'../class/sesion.class.php';
//recaptcha
require_once'curl.php';
//recaptcha
$_respuesta = new respuestas;
if($JSON_response["success"] == '1' && $JSON_response["action"] == 'login' && $JSON_response["score"] >= 0.5){
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_login = new sesion;
        //Recibimos datos del usuario por metodo post
        $postbody = file_get_contents('php://input');
        //enviamos datos al manejador
        //para abrir la sesion
        $datos_array = $_login->validar_login($postbody);
        //enviamos la respuesta al cliente
        http_response_code(201);
        echo json_encode($datos_array);
        
    }else{
        echo json_encode($_respuesta->error_405());
    }
    
}
elseif($_SERVER['REQUEST_METHOD'] == 'DELETE'){
    
    //Recibimos datos del usuario por metodo post
    $postbody = file_get_contents('php://input');
    //decodificamos
    $datos = json_decode($postbody,true);
    // verificamos que esten los campo necesarios
    if(!isset($datos['token'])){
        echo json_encode($_respuesta->status('error','campos requeridos no encontrados'));
    }else{
        // cerrar sesion 
        $_login = new sesion;
        $datos_array = $_login->cerrar_sesion($postbody);
        
        http_response_code(201);
        echo json_encode($datos_array);
    }
}else{
    echo json_encode($_respuesta->status('error','Ha ocurrido un error, intente nuevamente'));
}
        
?>