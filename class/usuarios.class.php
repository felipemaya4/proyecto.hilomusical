<?php
require_once'respuestas.class.php';
require_once'conexion/conexion.php';

class usuarios extends conexion{

    private $tabla = "usuarios_hilo";
    private $keyuser = "";
    private $email = "";
    private $nombre = "";
    private $apellido ="";
    private $password = "";
    private $validationPassword = "";
    private $autoriza_envio_emails = "";
    private $autoriza_terminos = "";
    private $empresa = "";
    
    private $criptopassword ="";
    private $cargo_empresa = "";
    private $celular = "";
    private $telefono = "";
    private $direccion = "";
    private $pais = "";
    private $ciudad = "";
    private $rol = "";
    private $plan = "";
    private $fecha_registro = "";
    private $fecha_fin = "";
    private $estado = "";
    private $maxsesiones = "";
    private $locales = "";
    private $conectado = "";
    private $borrarsesiones = "";

    
    public function insertar_usuario($json){
        $_respuesta = new respuestas;
        $datos = json_decode($json,true);
            // validar que existan los campos y no estén vacios
        if(!isset($datos['name']) || !isset($datos['email']) || !isset($datos['password']) || !isset($datos['lastName']) || !isset($datos['userType']) || !isset($datos['validationPassword']) || !isset($datos['checkSendNews']) || !isset($datos['acceptTerms']) || 
            empty($datos['name']) || empty($datos['email']) || empty($datos['password']) || empty($datos['lastName']) || empty($datos['userType']) || empty($datos['validationPassword']) || empty($datos['checkSendNews']) || empty($datos['acceptTerms'])){
            return $_respuesta->status("error","todos los campos son requeridos"); 
         }
        else{
            // asignar datos
            $this->email = $this->test_input($datos['email']);
            $this->keyuser = md5($this->email);
            $this->nombre = $this->test_input($datos['name']);
            $this->apellido =$this->test_input($datos['lastName']);
            $this->password = $this->test_input($datos['password']);
            $this->empresa = $this->test_input($datos['userType']);
            $this->validationPassword = $this->test_input($datos['validationPassword']);
            $this->rol = "1";
            $this->autoriza_envio_emails = $this->test_input($datos['checkSendNews']);
            $this->autoriza_terminos = $this->test_input($datos['acceptTerms']);
            $this->fecha_registro = date('Y-m-d');
            $this->fecha_fin = date("Y-m-d",strtotime($this->fecha_registro."+ 8 days"));
            
            if($this->verificar_correo()){// si es ya está
                
                return $_respuesta->status("error","correo invalido o ya registrado");
            }
            else{ // si no existe correo, proceder
                if($this->validar_password()){ 
                    
                    $resp = $this->insertar();
                    
                    if($resp){
                        
                        return $_respuesta->status('ok',"usuario registrado con exito");
                    
                    }else{
                    
                        return $_respuestas->error_500;
            
                    }
                }else{
                    
                    return $_respuesta->status("error","verifique la contraseña, debe tener:
                                <ul> 
                                    <li>minimo 6 caracteres</li>
                                    <li>una letra mayuscula</li>
                                    <li>una letra minuscula</li>
                                    <li>un número</li>");
                }
                
            }
        }
    }

    private function insertar(){
        
        $query = "INSERT INTO ".$this->tabla." (keyuser, email, nombre, apellido, password, rol, autoriza_envio_emails, autoriza_terminos, fecha_registro, fecha_fin) 
        VALUES ('".$this->keyuser."', '".$this->email."', '".$this->nombre."', '".$this->apellido."', '".$this->criptopassword."', '".$this->rol."', '".$this->autoriza_envio_emails."', '".$this->autoriza_terminos."','".$this->fecha_registro."','".$this->fecha_fin."')";
        $resp = parent::nonQueryid($query);
        
        if($resp){
            
            return $resp;
            
        }else{
            
            return 0;
            
        }
        
    }

    private function verificar_correo(){
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $query = "SELECT id, email FROM ".$this->tabla." WHERE email ='".$this->email."' ";
            $resp = parent::obtenerDatos($query);
            
            if($resp){
                
                return true;
                
            }else{
                
                return false;
                
            }
        }else{
            return true;
        }
    }

    private function validar_password(){ // validar que contraseña sea minimo de 6 caracteres tenga letras mayusculas y minusculas y nuemeron
    
        $pass1 = $this->password;
        $pass2 = $this->validationPassword;
        
    if($pass1 === $pass2){
        
        if(preg_match('/ /',$pass1)){
            
            return 0;
            
        }else{
            
            if(preg_match('`[a-z]`',$pass1) && preg_match('`[A-Z]`',$pass1) && preg_match('`[0-9]`',$pass1) && strlen($pass1)>=6 ){
                
                $this->encriptar_pass();
                return true;
            }else{
                
                return 0;
            
            }
        }
    }else{
        
        return 0;
        
    }  
        
    } 
    
    private function encriptar_pass(){
        $this->criptopassword = md5($this->password);
    }



    public function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function modificar_datos($json,$id){
        $_respuesta = new respuestas;
        $datos = json_decode($json,true);
        if(!isset($datos['celular']) || !isset($datos['ciudad'])){
            return $_respuesta->status("error","todos los campos son requeridos"); 
        }
        else{
            $query ="UPDATE ".$this->tabla." SET celular='".$datos['celular']."', ciudad='".$datos['ciudad']."' WHERE id='".$id."'";
            $resp = parent::nonQuery($query);
            if($resp >= 0){
                return $_respuesta->status("ok","los datos fueron actualizados");
            }
            else{
                return $_respuesta->status("error","ha ocurrido algo, intente nuevamente");
            }
        }
    }














    
}
?>