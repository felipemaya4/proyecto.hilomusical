<?php
require_once'respuestas.class.php';
require_once'conexion/conexion.php';

class sesion extends conexion{
    
private $tabla = "usuarios_hilo";
private $tabla_token = "token_usuario";
private $id = "";
private $nombre = "";
private $email = "";
private $password = "";
private $token = "";
private $estado = "";
private $fecha ="";

public function validar_login($json){
    $_respuesta = new respuestas;
    $datos = json_decode($json,true);

    if(!isset($datos['email']) || !isset($datos['password'])){
        return $_respuesta->status('error','no estan los datos requeridos');
    }
    else{
        $this->email = $datos['email'];
        $this->password = md5($datos['password']);
        $result = $this->obtener_datos_usuario();
        if($result){
            
            $data_array = array(
                'email' => $this->email,
                'nombre' => $this->nombre,
                'token' => $this->token,
                'status' => $this->estado
            );
            return $data_array;
        }else{
            return $_respuesta->status('error','Verifique su correo o su contraseña');
        }
        
    }
}

private function obtener_datos_usuario(){
    
    $query = $query = "SELECT id, nombre FROM ".$this->tabla." WHERE email ='".$this->email."' AND password = '".$this->password."' ";
    $resp = parent::obtenerDatos($query);
    if($resp){
        $this->id = $resp[0]['id'];
        $this->nombre = $resp[0]['nombre'];
        $this->fecha = date("Y-m-d H:i");
        $this->token = md5(date("Y-m-d H:i:s"));
        $this->estado = "activo";
        $resp = $this->activar_sesion();
        if($resp){
            return true;
        }
        else{
            return false;
        }
    }else{
        
        return false;
    }    
       
}

private function activar_sesion(){

    $query = "INSERT INTO ".$this->tabla_token." (id_usuario, nombre, token, estado, fecha) VALUES ('".$this->id."','".$this->nombre."','".$this->token."','".$this->estado."','".$this->fecha."')";
    $resp = parent::nonQueryId($query);
    if($resp){
        return true;
    }else{
        return false; 
    }
    
}

public function buscar_token($json){ // ésta funcion busca si exite el token y está activo y le actualiza la fecha
    $_respuesta = new respuestas;
    $datos = json_decode($json,true);
    
    $query = "SELECT estado, id_usuario FROM ".$this->tabla_token." WHERE token ='".$datos['token']."'";
    $resp = parent::obtenerDatos($query);
    if($resp[0]['estado'] == 'activo'){               
        $fecha = date("Y-m-d H:i");
        $query ="UPDATE ".$this->tabla_token." SET fecha='".$fecha."' WHERE id_usuario='".$resp[0]['id_usuario']."'";
        $resp2 = parent::nonQuery($query);
        if($resp2 >= 0){
        $data_array = array(
                'status' => 'activo',
                'id_usuario' => $resp[0]['id_usuario']
            );
            return $data_array;
        }else{
            return $_respuesta->status("error","ha ocurrido algo, intente nuevamente");
        }
    }else{
        return $_respuesta->status('error','token no valido');
    }
    
}

public function cerrar_sesion($json){ // borrar el token de la tabla
        $_respuesta = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['token']) || !isset($datos['action'])){
            return $_respuesta->status("error","todos los campos son requeridos"); 
        }
        else{
            $query ="DELETE FROM ".$this->tabla_token." WHERE token='".$datos['token']."'";
            $resp = parent::nonQuery($query);
            if($resp >= 0){
                return $_respuesta->status("ok","sesion cerrada");
            }
            else{
                return $_respuesta->status("error","ha ocurrido algo, intente nuevamente");
            }
        }
    }
    

    
}
?>