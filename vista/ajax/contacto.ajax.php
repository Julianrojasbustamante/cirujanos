<?php
// require_once "../../modelo/core.php";
require_once "../../controlador/core.php";

class Contacto_Ajax{

    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;
    public function registro_contacto_ajax(){
        $datos = array("nombre"=>htmlspecialchars($this->nombre),
                        "email"=>htmlspecialchars($this->email),
                        "telefono"=>htmlspecialchars($this->telefono),
                        "mensaje"=>htmlspecialchars($this->mensaje));
        $respuesta = Core_Controlador::registro_contacto_controlador($datos);
        echo $respuesta;
        // print_r($datos);
    }
}

if(isset($_POST["nombre"]) && $_POST["nombre"] != "" && $_POST["email"] != "" && isset($_POST["email"]) && isset($_POST["telefono"]) && $_POST["email"] != "" && isset($_POST["mensaje"])){
    $contacto = new Contacto_Ajax();
    $contacto -> nombre = $_POST["nombre"];
    $contacto -> email = $_POST["email"];
    $contacto -> telefono = $_POST["telefono"];
    $contacto -> mensaje = $_POST["mensaje"];
    $contacto -> registro_contacto_ajax();
}