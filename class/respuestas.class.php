<?php

class respuestas{

    public $response = [
        "status" => "ok",
        "result" => array()
    ];


    public function error_405(){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            "error_id" => "405",
            "error_msg" => "metodo no permitido"
        );
        return $this->response;
    }

    public function status($status = 'error',$msg = "datos incorrectos"){
        header('Content-Type: application/json');
        $this->response['status'] = $status;
        $this->response['result'] = array(
            "error_id" => "200",
            "error_msg" => $msg
        );
        return $this->response;
    }

    public function error_400(){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            "error_id" => "400",
            "error_msg" => "datos enviados incompletos o formato incorrecto"
        );
        return $this->response;
    }

    public function error_500($msg = "Error interno en el servidor"){
        $this->response['status'] = 'error';
        $this->response['result'] = array(
            "error" => "500",
            "error_msg" => $msg
        );
        return $this->response;
    }
}
?>