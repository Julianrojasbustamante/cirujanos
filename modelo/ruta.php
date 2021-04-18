<?php

class Ruta_Modelo{

    public function raiz_modelo(){
        return  "http://localhost/cirujanos/";
    }

    static public function fecha_modelo(){
        date_default_timezone_set("America/Bogota");
        $fecha_servidor = date("Y-m-d H:i:sa");
        return  $fecha_servidor;
    }

    static public function enlace_modelo($enlace){
        if ($enlace == "contacto" ||
            $enlace == "nosotros" ||
            $enlace == "") {
            $modulo = "vista/modulo/".$enlace.".php";
        }else if($enlace == "recuperar-contrasena" ||
            $enlace == "salir" ||
            $enlace == "login"){
            $modulo = "vista/modulo/core/".$enlace.".php";
        }else {
            $modulo = "vista/modulo/inicio.php";
        }
        return $modulo;
    }
}