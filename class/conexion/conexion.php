<?php

define("SECRET_KEY", '6Ler8YoeAAAAAAjTkT4FMTqNp0LzAMsm9tz-LHe7');
$post = file_get_contents('php://input');
$array_data = json_decode($post,true);
$action       = $array_data['action'];
$token        = $array_data['recaptcha'];

class conexion{
    // atributos de la calse
    private $server;
    private $user;
    private $password;
    private $database;
    private $port;
    private $conexion;

    function __construct(){
        // obtenemos datos del archivo conla info de acceso a la base de datos con el metodo datosConexion
        $listadatos = $this->datosConexion();
        foreach($listadatos as $key=>$value){
            $this->server = $value['server'];
            $this->user = $value['user'];
            $this->password = $value['password'];
            $this->database = $value['database'];
            $this->port = $value['port'];
        };
        
        $this->conexion = new mysqli($this->server,$this->user,$this->password,$this->database,$this->port);
        if($this->conexion->connect_errno){
            echo "algo ocurrio con la conexion";
            die();
        }
    }
    // obtenemos datos del archivo config
    private function datosConexion(){
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion."/"."config");
        return json_decode($jsondata,true);
        
    }
    // normalizamos los datos con uft8
    private function convertirUTF8($array){
        array_walk_recursive($array,function(&$item,$key){
            if(!mb_detect_encoding($item,'utf-8',true)){
                $item = utf8_encode($item);
            }
        });
        return $array;
    }
    
    // esta funcion permite seleccionar datos de la base
    public function obtenerDatos($sqlstr){
        $results = $this->conexion->query($sqlstr);
        $resultArray =  array();
        foreach( $results as $key){
            $resultArray[] = $key;
        }
        return $this->convertirUTF8($resultArray);

    }
    
    //  funcion para realizar insert, update y delete
    public function nonQuery($sqlstr){
        $results =$this->conexion->query($sqlstr);
        return $this->conexion->affected_rows;
    }
    // insert datos y nos devuelve la fila afectada
    public function nonQueryId($sqlstr){
        $results = $this->conexion->query($sqlstr);
        $filas = $this->conexion->affected_rows;
        if($filas >= 1){
            return $this->conexion->insert_id;
        }else
            return 0;
    }
    
}
?>