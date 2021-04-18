<?php
require_once "../../modelo/core.php";
require_once "../../controlador/core.php";

class Core_Ajax{
    public $formulario_eliminar_slider_auditoria_usuario;
    public function formulario_eliminar_slider_ajax(){
        $datos = array("formulario_eliminar_slider_auditoria_usuario"=>$this->formulario_eliminar_slider_auditoria_usuario);
        $respuesta = Core_Controlador::formulario_eliminar_slider_controlador($datos);
        echo $respuesta;
        
    }

    public $eliminar_slider_id;
    public $eliminar_slider_auditoria_usuario;
    public function eliminar_slider_ajax(){
        $datos = array("eliminar_slider_id"=>$this->eliminar_slider_id,
                        "eliminar_slider_auditoria_usuario"=>$this->eliminar_slider_auditoria_usuario);
        $respuesta = Core_Controlador::eliminar_slider_controlador($datos);
        echo $respuesta;
    }

    public $formulario_editar_slider_auditoria_usuario;
    public $formulario_editar_slider_auditoria_creado;
    public function formulario_editar_slider_ajax(){
        $datos = array("formulario_editar_slider_auditoria_usuario"=>$this->formulario_editar_slider_auditoria_usuario,
                        "formulario_editar_slider_auditoria_creado"=>$this->formulario_editar_slider_auditoria_creado);
        $respuesta = Core_Controlador::formulario_editar_slider_controlador($datos);
        echo $respuesta;
        
    }

    public $editar_slider_id;
    public $editar_slider_auditoria_creado;
    public $editar_slider_auditoria_usuario;
    public $editar_slider_imagen;
    public function editar_slider_ajax(){
        $datos = array("editar_slider_id"=>$this->editar_slider_id,
                        "editar_slider_auditoria_creado"=>$this->editar_slider_auditoria_creado,
                        "editar_slider_auditoria_usuario"=>$this->editar_slider_auditoria_usuario,
                        "editar_slider_imagen"=>$this->editar_slider_imagen);
        $respuesta = Core_Controlador::editar_slider_controlador($datos);
        echo $respuesta;
    }

    public $formulario_agregar_slider_auditoria_usuario;
    public $formulario_agregar_slider_auditoria_creado;
    public function formulario_agregar_slider_ajax(){
        $datos = array("formulario_agregar_slider_auditoria_usuario"=>$this->formulario_agregar_slider_auditoria_usuario,
                        "formulario_agregar_slider_auditoria_creado"=>$this->formulario_agregar_slider_auditoria_creado);
        $respuesta = Core_Controlador::formulario_agregar_slider_controlador($datos);
        echo $respuesta;
    }

    public $agregar_slider_auditoria_usuario;
    public $agregar_slider_auditoria_creado;
    public $agregar_slider_imagen;
    public function agregar_slider_ajax(){
        $datos = array("agregar_slider_auditoria_usuario"=>$this->agregar_slider_auditoria_usuario,
                        "agregar_slider_auditoria_creado"=>$this->agregar_slider_auditoria_creado,
                        "agregar_slider_imagen"=>$this->agregar_slider_imagen);
        $respuesta = Core_Controlador::agregar_slider_controlador($datos);
        echo $respuesta;
    }

    public $formulario_editar_menu_auditoria_usuario;
    public $formulario_editar_menu_auditoria_modificado;
    public function formulario_editar_menu_ajax(){
        $datos = array("formulario_editar_menu_auditoria_usuario"=>$this->formulario_editar_menu_auditoria_usuario,
                        "formulario_editar_menu_auditoria_modificado"=>$this->formulario_editar_menu_auditoria_modificado,
                        "formulario_editar_menu_raiz"=>$this->formulario_editar_menu_raiz);
        $respuesta = Core_Controlador::formulario_editar_menu_controlador($datos);
        echo $respuesta;
    }

    public $editar_menu_auditoria_usuario;
    public $editar_menu_auditoria_modificado;
    public $editar_menu_id_menu;
    public $editar_menu_ruta_menu;
    public function editar_menu_ajax(){
        $datos = array("editar_menu_auditoria_usuario"=>$this->editar_menu_auditoria_usuario,
                        "editar_menu_auditoria_modificado"=>$this->editar_menu_auditoria_modificado,
                        "editar_menu_id_menu"=>$this->editar_menu_id_menu,
                        "editar_menu_ruta_menu"=>$this->editar_menu_ruta_menu,
                        "editar_menu_nombre_menu"=>$this->editar_menu_nombre_menu,
                        "editar_menu_ruta"=>$this->editar_menu_ruta);
        $respuesta = Core_Controlador::editar_menu_controlador($datos);
        echo $respuesta;
    }

    public $formulario_eliminar_menu_auditoria_usuario;
    public function formulario_eliminar_menu_ajax(){
        $datos = array("formulario_eliminar_menu_auditoria_usuario"=>$this->formulario_eliminar_menu_auditoria_usuario);
        $respuesta = Core_Controlador::formulario_eliminar_menu_controlador($datos);
        echo $respuesta;
    }

    public $eliminar_menu_auditoria_usuario;
    public $eliminar_menu_id_menu;
    public function eliminar_menu_ajax(){
        $datos = array("eliminar_menu_auditoria_usuario"=>$this->eliminar_menu_auditoria_usuario,
                        "eliminar_menu_id_menu"=>$this->eliminar_menu_id_menu);
        $respuesta = Core_Controlador::eliminar_menu_controlador($datos);
        echo $respuesta;
    }

    public $formulario_agregar_contenido_auditoria_usuario;
    public $formulario_agregar_contenido_auditoria_creado;
    public $formulario_agregar_contenido_orden;
    public $formulario_agregar_contenido_seccion;
    public function formulario_agregar_contenido_ajax(){
        $datos = array("formulario_agregar_contenido_auditoria_usuario"=>$this->formulario_agregar_contenido_auditoria_usuario,
                        "formulario_agregar_contenido_auditoria_creado"=>$this->formulario_agregar_contenido_auditoria_creado,
                        "formulario_agregar_contenido_orden"=>$this->formulario_agregar_contenido_orden,
                        "formulario_agregar_contenido_seccion"=>$this->formulario_agregar_contenido_seccion);
        $respuesta = Core_Controlador::formulario_agregar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $agregar_contenido_auditoria_usuario;
    public $agregar_contenido_auditoria_creado;
    public $agregar_contenido_orden;
    public $agregar_contenido_el_contenido;
    public $agregar_contenido_tipo;
    public $agregar_contenido_seccion;
    public $agregar_contenido_disposicion;
    public function agregar_contenido_ajax(){
        $datos = array("agregar_contenido_auditoria_usuario"=>$this->agregar_contenido_auditoria_usuario,
                        "agregar_contenido_auditoria_creado"=>$this->agregar_contenido_auditoria_creado,
                        "agregar_contenido_orden"=>$this->agregar_contenido_orden,
                        "agregar_contenido_el_contenido"=>$this->agregar_contenido_el_contenido,
                        "agregar_contenido_tipo"=>$this->agregar_contenido_tipo,
                        "agregar_contenido_seccion"=>$this->agregar_contenido_seccion,
                        "agregar_contenido_disposicion"=>$this->agregar_contenido_disposicion);
        $respuesta = Core_Controlador::agregar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $formulario_editar_contenido_auditoria_usuario;
    public $formulario_editar_contenido_comparador;
    public $formulario_editar_contenido_id_contenido;
    public $formulario_editar_contenido_seccion;
    public $formulario_editar_contenido_auditoria_creado;
    public function formulario_editar_contenido_ajax(){
        $datos = array("formulario_editar_contenido_auditoria_usuario"=>$this->formulario_editar_contenido_auditoria_usuario,
                        "formulario_editar_contenido_comparador"=>$this->formulario_editar_contenido_comparador,
                        "formulario_editar_contenido_id_contenido"=>$this->formulario_editar_contenido_id_contenido,
                        "formulario_editar_contenido_seccion"=>$this->formulario_editar_contenido_seccion,
                        "formulario_editar_contenido_auditoria_creado"=>$this->formulario_editar_contenido_auditoria_creado);
        $respuesta = Core_Controlador::formulario_editar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $editar_contenido_disposicion;
    public $editar_contenido_auditoria_usuario;
    public $editar_contenido_auditoria_creado;
    public $editar_contenido_el_contenido;
    public $editar_contenido_id_contenido;
    public $editar_contenido_tipo;
    public $editar_contenido_orden;
    public $editar_contenido_seccion;
    public $editar_contenido_titulo;
    public function editar_contenido_ajax(){
        $datos = array("editar_contenido_disposicion"=>$this->editar_contenido_disposicion,
                        "editar_contenido_auditoria_usuario"=>$this->editar_contenido_auditoria_usuario,
                        "editar_contenido_auditoria_creado"=>$this->editar_contenido_auditoria_creado,
                        "editar_contenido_el_contenido"=>$this->editar_contenido_el_contenido,
                        "editar_contenido_id_contenido"=>$this->editar_contenido_id_contenido,
                        "editar_contenido_tipo"=>$this->editar_contenido_tipo,
                        "editar_contenido_orden"=>$this->editar_contenido_orden,
                        "editar_contenido_seccion"=>$this->editar_contenido_seccion,
                        "editar_contenido_titulo"=>$this->editar_contenido_titulo);
        $respuesta = Core_Controlador::editar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $formulario_eliminar_contenido_auditoria_usuario;
    public $formulario_eliminar_contenido_id_contenido;
    public function formulario_eliminar_contenido_ajax(){
        $datos = array("formulario_eliminar_contenido_auditoria_usuario"=>$this->formulario_eliminar_contenido_auditoria_usuario,
                        "formulario_eliminar_contenido_id_contenido"=>$this->formulario_eliminar_contenido_id_contenido);
        $respuesta = Core_Controlador::formulario_eliminar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $eliminar_contenido_auditoria_usuario;
    public $eliminar_contenido_id_contenido;
    public function eliminar_contenido_ajax(){
        $datos = array("eliminar_contenido_auditoria_usuario"=>$this->eliminar_contenido_auditoria_usuario,
                        "eliminar_contenido_id_contenido"=>$this->eliminar_contenido_id_contenido);
        $respuesta = Core_Controlador::eliminar_contenido_controlador($datos);
        echo $respuesta;
    }

    public $nuevo_servicio_auditoria_usuario;
    public $nuevo_servicio_auditoria_creado;
    public $nuevo_servicio_imagen;
    public $nuevo_servicio_titulo;
    public function nuevo_servicio_ajax(){
        $datos = array("nuevo_servicio_auditoria_usuario"=>$this->nuevo_servicio_auditoria_usuario,
                        "nuevo_servicio_auditoria_creado"=>htmlspecialchars($this->nuevo_servicio_auditoria_creado),
                        "nuevo_servicio_imagen"=>$this->nuevo_servicio_imagen,
                        "nuevo_servicio_titulo"=>htmlspecialchars($this->nuevo_servicio_titulo));
        $respuesta = Core_Controlador::nuevo_servicio_controlador($datos);
        echo $respuesta;
    }

    public $formulario_editar_servicio_auditoria_usuario;
    public $formulario_editar_servicio_id;
    public function formulario_editar_servicio_ajax(){
        $datos = array("formulario_editar_servicio_auditoria_usuario"=>$this->formulario_editar_servicio_auditoria_usuario,
                        "formulario_editar_servicio_id"=>$this->formulario_editar_servicio_id);
        $respuesta = Core_Controlador::formulario_editar_servicio_controlador($datos);
        echo $respuesta;
    }

    public $editar_servicio_auditoria_usuario;
    public $editar_servicio_id;
    public $editar_servicio_imagen;
    public $editar_servicio_titulo;
    public $editar_servicio_descripcion;
    public function editar_servicio_ajax(){
        $datos = array("editar_servicio_auditoria_usuario"=>$this->editar_servicio_auditoria_usuario,
                        "editar_servicio_id"=>htmlspecialchars($this->editar_servicio_id),
                        "editar_servicio_imagen"=>htmlspecialchars($this->editar_servicio_imagen),
                        "editar_servicio_titulo"=>htmlspecialchars($this->editar_servicio_titulo));
        $respuesta = Core_Controlador::editar_servicio_controlador($datos);
        echo $respuesta;
    }

}

if(isset($_POST["formulario_eliminar_slider_auditoria_usuario"])){
    $slider = new Core_Ajax();
    $slider -> formulario_eliminar_slider_auditoria_usuario = $_POST["formulario_eliminar_slider_auditoria_usuario"];
    $slider -> formulario_eliminar_slider_ajax();
}

if(isset($_POST["eliminar_slider_id"]) && isset($_POST["eliminar_slider_auditoria_usuario"])){
    $slider = new Core_Ajax();
    $slider -> eliminar_slider_id = $_POST["eliminar_slider_id"];
    $slider -> eliminar_slider_auditoria_usuario = $_POST["eliminar_slider_auditoria_usuario"];
    $slider -> eliminar_slider_ajax();
}

if(isset($_POST["formulario_editar_slider_auditoria_usuario"]) && isset($_POST["formulario_editar_slider_auditoria_creado"])){
    $slider = new Core_Ajax();
    $slider -> formulario_editar_slider_auditoria_usuario = $_POST["formulario_editar_slider_auditoria_usuario"];
    $slider -> formulario_editar_slider_auditoria_creado = $_POST["formulario_editar_slider_auditoria_creado"];
    $slider -> formulario_editar_slider_ajax();
}

if(isset($_POST["editar_slider_id"]) && isset($_POST["editar_slider_auditoria_creado"])){
    $slider = new Core_Ajax();
    $slider -> editar_slider_id = $_POST["editar_slider_id"];
    $slider -> editar_slider_auditoria_creado = $_POST["editar_slider_auditoria_creado"];
    $slider -> editar_slider_auditoria_usuario = $_POST["editar_slider_auditoria_usuario"];
    $slider -> editar_slider_imagen = $_FILES["editar_slider_imagen"];
    $slider -> editar_slider_ajax();
}

if(isset($_POST["formulario_agregar_slider_auditoria_usuario"]) && isset($_POST["formulario_agregar_slider_auditoria_creado"])){
    $slider = new Core_Ajax();
    $slider -> formulario_agregar_slider_auditoria_usuario = $_POST["formulario_agregar_slider_auditoria_usuario"];
    $slider -> formulario_agregar_slider_auditoria_creado = $_POST["formulario_agregar_slider_auditoria_creado"];
    $slider -> formulario_agregar_slider_ajax();
}

if(isset($_POST["agregar_slider_auditoria_usuario"]) && isset($_POST["agregar_slider_auditoria_creado"])){
    $slider = new Core_Ajax();
    $slider -> agregar_slider_auditoria_usuario = $_POST["agregar_slider_auditoria_usuario"];
    $slider -> agregar_slider_auditoria_creado = $_POST["agregar_slider_auditoria_creado"];
    $slider -> agregar_slider_imagen = $_FILES["agregar_slider_imagen"];
    $slider -> agregar_slider_ajax();
}

if(isset($_POST["formulario_editar_menu_auditoria_usuario"]) && isset($_POST["formulario_editar_menu_auditoria_modificado"])){
    $menu = new Core_Ajax();
    $menu -> formulario_editar_menu_auditoria_usuario = $_POST["formulario_editar_menu_auditoria_usuario"];
    $menu -> formulario_editar_menu_auditoria_modificado = $_POST["formulario_editar_menu_auditoria_modificado"];
    $menu -> formulario_editar_menu_raiz = $_POST["formulario_editar_menu_raiz"];
    $menu -> formulario_editar_menu_ajax();
}

if(isset($_POST["editar_menu_auditoria_usuario"]) && isset($_POST["editar_menu_auditoria_modificado"]) && isset($_POST["editar_menu_nombre_menu"])){
    $menu = new Core_Ajax();
    $menu -> editar_menu_auditoria_usuario = $_POST["editar_menu_auditoria_usuario"];
    $menu -> editar_menu_auditoria_modificado = $_POST["editar_menu_auditoria_modificado"];
    $menu -> editar_menu_id_menu = $_POST["editar_menu_id_menu"];
    $menu -> editar_menu_ruta_menu = $_POST["editar_menu_ruta_menu"];
    $menu -> editar_menu_nombre_menu = $_POST["editar_menu_nombre_menu"];
    $menu -> editar_menu_ruta = $_POST["editar_menu_ruta"];
    $menu -> editar_menu_ajax();
}

if(isset($_POST["formulario_eliminar_menu_auditoria_usuario"])){
    $menu = new Core_Ajax();
    $menu -> formulario_eliminar_menu_auditoria_usuario = $_POST["formulario_eliminar_menu_auditoria_usuario"];
    $menu -> formulario_eliminar_menu_ajax();
}

if(isset($_POST["eliminar_menu_auditoria_usuario"]) && isset($_POST["eliminar_menu_id_menu"])){
    $menu = new Core_Ajax();
    $menu -> eliminar_menu_auditoria_usuario = $_POST["eliminar_menu_auditoria_usuario"];
    $menu -> eliminar_menu_id_menu = $_POST["eliminar_menu_id_menu"];
    $menu -> eliminar_menu_ajax();
}

if(isset($_POST["formulario_agregar_contenido_auditoria_usuario"]) && isset($_POST["formulario_agregar_contenido_auditoria_creado"])){
    $contenido = new Core_Ajax();
    $contenido -> formulario_agregar_contenido_auditoria_usuario = $_POST["formulario_agregar_contenido_auditoria_usuario"];
    $contenido -> formulario_agregar_contenido_auditoria_creado = $_POST["formulario_agregar_contenido_auditoria_creado"];
    $contenido -> formulario_agregar_contenido_orden = $_POST["formulario_agregar_contenido_orden"];
    $contenido -> formulario_agregar_contenido_seccion = $_POST["formulario_agregar_contenido_seccion"];
    $contenido -> formulario_agregar_contenido_ajax();
}

if(isset($_POST["agregar_contenido_auditoria_usuario"]) && isset($_POST["agregar_contenido_auditoria_creado"]) && isset($_POST["agregar_contenido_orden"]) && isset($_POST["agregar_contenido_tipo"])){
    $contenido = new Core_Ajax();
    $contenido -> agregar_contenido_auditoria_usuario = $_POST["agregar_contenido_auditoria_usuario"];
    $contenido -> agregar_contenido_auditoria_creado = $_POST["agregar_contenido_auditoria_creado"];
    $contenido -> agregar_contenido_orden = $_POST["agregar_contenido_orden"];
    if($_POST["agregar_contenido_tipo"] == 1 || $_POST["agregar_contenido_tipo"] == 3){
        $contenido -> agregar_contenido_el_contenido = $_POST["agregar_contenido_el_contenido"];
    }else if($_POST["agregar_contenido_tipo"] == 2){
        $contenido -> agregar_contenido_el_contenido = $_FILES["agregar_contenido_el_contenido"];
    }
    $contenido -> agregar_contenido_tipo = $_POST["agregar_contenido_tipo"];
    $contenido -> agregar_contenido_seccion = $_POST["agregar_contenido_seccion"];
    $contenido -> agregar_contenido_disposicion = $_POST["agregar_contenido_disposicion"];
    $contenido -> agregar_contenido_ajax();
}

if(isset($_POST["formulario_editar_contenido_auditoria_usuario"]) && isset($_POST["formulario_editar_contenido_id_contenido"])){
    $contenido = new Core_Ajax();
    $contenido -> formulario_editar_contenido_auditoria_usuario = $_POST["formulario_editar_contenido_auditoria_usuario"];
    $contenido -> formulario_editar_contenido_id_contenido = $_POST["formulario_editar_contenido_id_contenido"];
    $contenido -> formulario_editar_contenido_comparador = $_POST["formulario_editar_contenido_comparador"];
    $contenido -> formulario_editar_contenido_seccion = $_POST["formulario_editar_contenido_seccion"];
    $contenido -> formulario_editar_contenido_auditoria_creado = $_POST["formulario_editar_contenido_auditoria_creado"];
    $contenido -> formulario_editar_contenido_ajax();
}

if(isset($_POST["editar_contenido_disposicion"]) && isset($_POST["editar_contenido_tipo"])){
    $contenido = new Core_Ajax();
    $contenido -> editar_contenido_disposicion = $_POST["editar_contenido_disposicion"];
    $contenido -> editar_contenido_auditoria_usuario = $_POST["editar_contenido_auditoria_usuario"];
    $contenido -> editar_contenido_auditoria_creado = $_POST["editar_contenido_auditoria_creado"];
    if($_POST["editar_contenido_tipo"] == 1 || $_POST["editar_contenido_tipo"] == "mismo contenido"){
        $contenido -> editar_contenido_el_contenido = $_POST["editar_contenido_el_contenido"];
    }else if($_POST["editar_contenido_tipo"] == 2){
        $contenido -> editar_contenido_el_contenido = $_FILES["editar_contenido_el_contenido"];
    }
    $contenido -> editar_contenido_id_contenido = $_POST["editar_contenido_id_contenido"];
    $contenido -> editar_contenido_tipo = $_POST["editar_contenido_tipo"];
    $contenido -> editar_contenido_orden = $_POST["editar_contenido_orden"];
    $contenido -> editar_contenido_seccion = $_POST["editar_contenido_seccion"];
    $contenido -> editar_contenido_titulo = $_POST["editar_contenido_titulo"];
    $contenido -> editar_contenido_ajax();
}

if(isset($_POST["formulario_eliminar_contenido_auditoria_usuario"]) && isset($_POST["formulario_eliminar_contenido_id_contenido"])){
    $contenido = new Core_Ajax();
    $contenido -> formulario_eliminar_contenido_auditoria_usuario = $_POST["formulario_eliminar_contenido_auditoria_usuario"];
    $contenido -> formulario_eliminar_contenido_id_contenido = $_POST["formulario_eliminar_contenido_id_contenido"];
    $contenido -> formulario_eliminar_contenido_ajax();
}

if(isset($_POST["eliminar_contenido_auditoria_usuario"]) && isset($_POST["eliminar_contenido_id_contenido"])){
    $contenido = new Core_Ajax();
    $contenido -> eliminar_contenido_auditoria_usuario = $_POST["eliminar_contenido_auditoria_usuario"];
    $contenido -> eliminar_contenido_id_contenido = $_POST["eliminar_contenido_id_contenido"];
    $contenido -> eliminar_contenido_ajax();
}

if(isset($_POST["nuevo_servicio_auditoria_usuario"]) && isset($_POST["nuevo_servicio_titulo"])){
    $servicio = new Core_Ajax();
    $servicio -> nuevo_servicio_auditoria_usuario = $_POST["nuevo_servicio_auditoria_usuario"];
    $servicio -> nuevo_servicio_auditoria_creado = $_POST["nuevo_servicio_auditoria_creado"];
    $servicio -> nuevo_servicio_imagen = $_FILES["nuevo_servicio_imagen"];
    $servicio -> nuevo_servicio_titulo = $_POST["nuevo_servicio_titulo"];
    $servicio -> nuevo_servicio_ajax();
}

if(isset($_POST["formulario_editar_servicio_auditoria_usuario"]) && isset($_POST["formulario_editar_servicio_id"])){
    $servicio = new Core_Ajax();
    $servicio -> formulario_editar_servicio_auditoria_usuario = $_POST["formulario_editar_servicio_auditoria_usuario"];
    $servicio -> formulario_editar_servicio_id = $_POST["formulario_editar_servicio_id"];
    $servicio -> formulario_editar_servicio_ajax();
}

if(isset($_POST["editar_servicio_titulo"]) && $_POST["editar_servicio_titulo"] != ""){
    $servicio = new Core_Ajax();
    $servicio -> editar_servicio_auditoria_usuario = $_POST["editar_servicio_auditoria_usuario"];
    $servicio -> editar_servicio_id = $_POST["editar_servicio_id"];
    $servicio -> editar_servicio_imagen = $_FILES["editar_servicio_imagen"];
    $servicio -> editar_servicio_titulo = $_POST["editar_servicio_titulo"];
    $servicio -> editar_servicio_ajax();
}