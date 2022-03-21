<?php
require_once'../class/respuestas.class.php';
require_once'../class/usuarios.class.php';
require_once'../class/sesion.class.php';

$_respuesta = new respuestas;
if($_SERVER['REQUEST_METHOD'] == 'PUT'){
    
    //Recibimos datos del usuario por metodo post
    $postbody = file_get_contents('php://input');
    //decodificamos
    $datos = json_decode($postbody,true);
    // verificamos que esten los campo necesarios
    if(!isset($datos['token'] )){
        echo json_encode($_respuesta->status('error','campos requeridos no encontrados'));
    }else{
        
        $_login = new sesion;
        //metodo para buscar si le token es valido
        $datos_array = $_login->buscar_token($postbody);
        if($datos_array['status'] == 'activo'){
            
            $_usuario = new usuarios;
            $datos_array = $_usuario->modificar_datos($postbody,$datos_array['id_usuario']);
        }
        http_response_code(201);
        echo json_encode($datos_array);
    }
}else{
    echo json_encode($_respuesta->status('error','metodo no valido'));
}
?>