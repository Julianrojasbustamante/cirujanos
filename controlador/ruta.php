<?php

class Ruta_Controlador{
    
    public function raiz_controlador(){
        $respuesta = Ruta_Modelo::raiz_modelo();
        return $respuesta;
    }

    static public function fecha_controlador(){
        $respuesta = Ruta_Modelo::fecha_modelo();
        return $respuesta;
    }

    public function enlace_controlador(){
        $url = array();
        if(isset($_GET["url"])) {
            $url = explode("/", $_GET["url"]);
            $enlace = $url[0];
        }else {
            $enlace = "index";
        }
        $respuesta = Ruta_Modelo::enlace_modelo($enlace);
        include $respuesta;
    }
}