<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Core_Controlador{
    public function mostrar_formulario_controlador($nombre_lista, $id_distinto) {
        $consulta = Core_Modelo::mostrar_formulario_modelo($nombre_lista, $id_distinto);
        foreach ($consulta as $fila => $item) {
            echo '<option value="'.$item["id"].'"> '.$item["nombre"].'</option>';
        }
    }

    public function administrador_ingreso_controlador(){
        if(isset($_POST["ingreso_correo"]) && isset($_POST["ingreso_contrasena"])) {
            $encriptar = crypt(htmlspecialchars($_POST["ingreso_contrasena"]), '$2a$07$GSVs6pSNqiKLkHE6dOtZPejPtcf/bRSl2n2WvmNE2yIZAEW7t9J.a');
            $datos_ingreso = array("correo"=>htmlspecialchars($_POST["ingreso_correo"]), "contrasena"=>$encriptar);
            $respuesta = Core_Modelo::administrador_ingreso_modelo("usuario", $datos_ingreso);
            if($respuesta != false && $_POST["ingreso_contrasena"] != 'UsuarioSistema'){
                date_default_timezone_set("America/Bogota");
                $fecha = date("Y-m-d H:i:sa");
                $datos_registro_ingreso = array("id_usuario"=>$respuesta["id"], "fecha"=>$fecha);
                $ingreso = Core_Modelo::administrador_registro_ingreso_modelo("usuario", $datos_registro_ingreso);
                $_SESSION["id"] = $respuesta["id"];
                $_SESSION["rol"] = $respuesta["rol"];
                $_SESSION["validar_sesion"] = "ok";
                echo '<script type="text/javascript">
                var pagina = "inicio";
                var segundos = 0;
                function redireccion() {
                    document.location.href=pagina;
                }
                setTimeout("redireccion()",segundos);
                </script>';
            }
            else if($respuesta != false && $encriptar == '$2a$07$GSVs6pSNqiKLkHE6dOtZPelYlIQQPV/f2H6on4TRJk3qk4W6fxuS2'){
                date_default_timezone_set("America/Bogota");
                $fecha = date("Y-m-d H:i:sa");
                $datos_registro_ingreso = array("id_usuario"=>$respuesta["id"], "fecha"=>$fecha);
                $ingreso = Core_Modelo::administrador_registro_ingreso_modelo("usuario", $datos_registro_ingreso);
                $_SESSION["id"] = $respuesta["id"];
                $_SESSION["validar_sesion"] = "pendiente";
                echo '<script type="text/javascript">
                var pagina = "cambio-contrasena";
                var segundos = 0;
                function redireccion() {
                    document.location.href=pagina;
                }
                setTimeout("redireccion()",segundos);
                </script>';
            }
            else if(isset($_SESSION["id"]) && isset($_SESSION["validar_sesion"])){
                echo '<script type="text/javascript">
                        var pagina = "inicio";
                        var segundos = 0;
                        function redireccion() {
                            document.location.href=pagina;
                        }
                        setTimeout("redireccion()",segundos);
                    </script>';
            }else {
                echo '<div class="alert alert-danger text-center">Error al ingresar, verifique sus datos.</div>';
            }
        }
    }   

    public function perfil_usuario_controlador(){
        // <img src="'.$GLOBALS['raiz'].'sistema/vista/img/avatar/'.$respuesta["avatar"].'" width="30" height="30" class="rounded-circle">
        $respuesta = Core_Modelo::perfil_usuario_modelo("usuario", $_SESSION["id"]);
        // echo '<a href="'.$GLOBALS["raiz"].'zona-clientes" title="Mi perfil" class="text-white">
        //         <span class="espaciado-elemento-menu">'.$respuesta["nombres"].'</span>
        //     </a>';
        echo '<h3>'.$respuesta["nombres"].'</h3>';
    }

    public function menu_controldor(){
        $respuesta = Core_Modelo::menu_modelo("menu");
        foreach ($respuesta as $fila => $columna){
            if($columna["nivel"] == 2){
                echo '<li class="nav-item dropdown texto-linea menu-hover mx-2"><a class="dropdown-toggle color-texto-menu" id="navbarDropdownMenuLink'.$columna["hijo"].'" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$columna["nombre"].'</a> 
                        <div class="dropdown-menu tamanio-texto-menu" aria-labelledby="navbarDropdownMenuLink'.$columna["hijo"].'">';
                $submenu = Core_Modelo::sub_menu_modelo("menu", $columna["id"]);
                foreach ($submenu as $row => $column){
                    echo '<ul class="treeview-menu">
                            <li><a class="dropdown-item" href="'.$column["ruta"].'">'.$column["nombre"].'</a></li>
                        </ul>';
                }
                echo'   </div>
                    </li>';
            }else{
                echo '<li class="nav-item rounded color-caja-texto-menu">
                        <a class="nav-link texto-menu"  href="'.$GLOBALS["raiz"].''.$columna["ruta"].'">'.$columna["nombre"].'</a>
                    </li>';
            }
        }
    }

    static public function formulario_editar_menu_controlador($datos){
        $raiz = $datos["formulario_editar_menu_raiz"];
        $respuesta = Core_Modelo::menu_modelo("menu");
        foreach ($respuesta as $fila => $columna){
            if($columna["nivel"] == 2){
                echo'<div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">Menú</span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="editar_menu_nombre_'.$columna["id"].'" value="'.$columna["nombre"].'" aria-describedby="inputGroupPrepend2">
                            <button type="button" editar_menu_ruta_menu="'.$columna["ruta"].'" editar_menu_id_menu="'.$columna["id"].'" editar_menu_auditoria_modificado="'.$datos["formulario_editar_menu_auditoria_modificado"].'" editar_menu_auditoria_usuario="'.$datos["formulario_editar_menu_auditoria_usuario"].'" class="btn-success btn-sm modificar-menu" title="Editar menú"><i class="fas fa-pencil-alt"></i></button>
                            <input type="hidden" id="editar_menu_ruta" value="'.$raiz.'">
                        </div>
                    </div>';
                $submenu = Core_Modelo::sub_menu_modelo("menu", $columna["id"]);
                foreach ($submenu as $row => $column){
                    echo'<div class="form-group has-feedback">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-sm" id="inputGroupPrepend2">Sub-menú</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="editar_menu_nombre_'.$column["id"].'" value="'.$column["nombre"].'" aria-describedby="inputGroupPrepend2">
                                <button type="button" editar_menu_ruta_menu="'.$column["ruta"].'" editar_menu_id_menu="'.$column["id"].'" editar_menu_auditoria_modificado="'.$datos["formulario_editar_menu_auditoria_modificado"].'" editar_menu_auditoria_usuario="'.$datos["formulario_editar_menu_auditoria_usuario"].'" class="btn-success btn-sm modificar-menu" title="Editar menú"><i class="fas fa-pencil-alt"></i></button>
                            </div>
                        </div>';
                }
            }else{
                echo'<div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">Menú</span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="editar_menu_nombre_'.$columna["id"].'" value="'.$columna["nombre"].'" aria-describedby="inputGroupPrepend2">
                            <button type="button" editar_menu_ruta_menu="'.$columna["ruta"].'" editar_menu_id_menu="'.$columna["id"].'" editar_menu_auditoria_modificado="'.$datos["formulario_editar_menu_auditoria_modificado"].'" editar_menu_auditoria_usuario="'.$datos["formulario_editar_menu_auditoria_usuario"].'" class="btn-success btn-sm modificar-menu" title="Editar menú"><i class="fas fa-pencil-alt"></i></button>
                        </div>
                    </div>';
            }
        }
    }
    
    static public function editar_menu_controlador($datos){
        $nueva_ruta_menu = strtolower($datos["editar_menu_nombre_menu"]);
        $nueva_ruta_menu = str_replace(" ", "-", $nueva_ruta_menu);
        $nueva_ruta_menu = str_replace("ñ", "n", $nueva_ruta_menu);
        $nueva_ruta_menu = str_replace("Ñ", "n", $nueva_ruta_menu);
        $ruta_sin_http = str_replace("http://", "", $datos["editar_menu_ruta"]);
        $old_name = $ruta_sin_http . 'vista/modulo/' . $datos["editar_menu_ruta_menu"] . '.php'; 
        $new_name = $ruta_sin_http .'vista/modulo/' . $nueva_ruta_menu . '.php'; 
        // echo $old_name, $new_name;
        // echo $nueva_ruta_menu;
        // rename($old_name, $new_name);
        $respuesta = Core_Modelo::editar_menu_modelo("menu", $datos, $nueva_ruta_menu);
        echo $respuesta;
    }

    public function slider_controlador(){
        $respuesta = Core_Modelo::slider_modelo("slider");
        echo '<div class="row">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">';
                    foreach ($respuesta as $fila => $columna){
                        echo'<li data-target="#carouselExampleCaptions" data-slide-to="'.$fila.'" class="active"></li>';
                    }
                echo'</ol
                <div class="carousel-inner">
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Atrás</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>    ';
                foreach ($respuesta as $fila => $columna){
                    if($fila == 0){
                        echo'<div class="carousel-item active">';
                    }else{
                        echo'<div class="carousel-item">';
                    }
                    echo'<img src="'.$GLOBALS['raiz'].'vista/img/slider/'.$columna["slider"].'" class="d-block w-100" alt="...">
                        </div>';
                }
            echo '</div>
                 
            </div>
        </div>';
           
    }

    static public function formulario_eliminar_menu_controlador($datos){
        $respuesta = Core_Modelo::menu_modelo("menu");
        echo '<div class="alert alert-danger text-center">
            <i class="icon fa fa-ban"></i><strong>ATENCIÓN:</strong><br>
            <h5>Al eliminar cualquier elemento del menú ya no podrá acceder al mismo!</h5>
            <h6>Para recuperarlo deberá comunicarse con soporte técnico o crearlo nuevamente.</h6>
        </div>';
        foreach ($respuesta as $fila => $columna){
            if($columna["nivel"] == 2){
                echo'<div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">Menú</span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="nombre_menu" value="'.$columna["nombre"].'" aria-describedby="inputGroupPrepend2" disabled>
                            <button type="button" eliminar_menu_id_menu="'.$columna["id"].'" eliminar_menu_auditoria_modificado="'.$datos["formulario_eliminar_menu_auditoria_modificado"].'" eliminar_menu_auditoria_usuario="'.$datos["formulario_eliminar_menu_auditoria_usuario"].'" class="btn-danger btn-lg borrar-menu" title="Eliminar menú"><i class="fas fa-minus-circle"></i></button>
                        </div>
                    </div>';
                $submenu = Core_Modelo::sub_menu_modelo("menu", $columna["id"]);
                foreach ($submenu as $row => $column){
                    echo'<div class="form-group has-feedback">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text form-control-sm" id="inputGroupPrepend2">Sub-menú</span>
                                </div>
                                <input type="text" class="form-control form-control-sm" id="validationDefaultUsername" value="'.$column["nombre"].'" aria-describedby="inputGroupPrepend2" disabled>
                                <button type="button" eliminar_menu_id_menu="'.$column["id"].'" eliminar_menu_auditoria_usuario="'.$datos["formulario_eliminar_menu_auditoria_usuario"].'" class="btn-danger btn-sm borrar-menu" title="Eliminar menú"><i class="fas fa-minus-circle"></i></button>
                            </div>
                        </div>';
                }
            }else{
                echo'<div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">Menú</span>
                            </div>
                            <input type="text" class="form-control form-control-lg" id="nombre_menu" value="'.$columna["nombre"].'" aria-describedby="inputGroupPrepend2" disabled>
                            <button type="button" eliminar_menu_id_menu="'.$columna["id"].'" eliminar_menu_auditoria_usuario="'.$datos["formulario_eliminar_menu_auditoria_usuario"].'" class="btn-danger btn-sm borrar-menu" title="Eliminar menú"><i class="fas fa-minus-circle"></i></button>
                        </div>
                    </div>';
            }
        }
	}
    
	static public function eliminar_menu_controlador($datos){
        $respuesta = Core_Modelo::eliminar_menu_modelo("menu", $datos);
        return $respuesta;
	}

    public function formulario_eliminar_slider_controlador($datos){
        $respuesta = Core_Modelo::slider_modelo("slider");
        echo '<div class="alert alert-danger text-center">
                <i class="icon fa fa-ban"></i><strong>ATENCIÓN:</strong><br>
                <h5>Al eliminar cualquier elemento del slider ya no podrá acceder al mismo!</h5>
                <h6>Para recuperarlo deberá comunicarse con soporte técnico o crearlo nuevamente.</h6>
            </div>';
        if ($respuesta == NULL){
            echo '<div class="box-body">
                    <div class="alert alert-warning text-center"><i class="icon fa fa-warning"></i><strong>ATENCIÓN:</strong><br> No hay imagenes disponibles, porfavor ingresa una imagen.</div>
                </div>';
        }else {
            echo '<div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($respuesta as $fila => $item) {
                echo '<tr>
                            <td><img src="vista/img/slider/'.$item["slider"].'" width="120" height="50" class="img-circle" alt="Avatar"></td>
                            <td>'.$item["slider"].'</td>
                            <td>
                                <div class="btn-group">
                                <button type="button" eliminar_slider_id="'.$item["id"].'" eliminar_slider_auditoria_usuario="'.$datos["formulario_eliminar_slider_auditoria_usuario"].'" class="btn-danger btn-sm borrar-imagen-slider" title="Eliminar imagen"><i class="fa fa-trash-o"></i></button>
                                </div>
                            </td>
                        </tr>';
            }
            echo '</tbody>
                </table>
            </div>';
        }
    }

    static public function eliminar_slider_controlador($datos){
        $respuesta = Core_Modelo::eliminar_slider_modelo("slider", $datos);
        return $respuesta;
    }

    public function formulario_editar_slider_controlador($datos){
        $respuesta = Core_Modelo::slider_modelo("slider");
        echo '<div class="alert alert-success text-center">
                <strong>INSTRUCCIONES:</strong><br>
                <h6>Para cambiar una imagen del slider solo debes cargarla en el boton "seleccionar archivo" y luego escoge la imagen que va a ser remplazada por la que acabas de cargar.</h6>
                <i class="icon fa fa-ban"></i><strong>ATENCIÓN:</strong><br>
                <h5>Para volver al estado anterior deberá subir la imagen anterior nuevamente o en caso de no tenerla contactarse con soporte tecnico.</h5>
            </div>';
        if ($respuesta == NULL){
            echo '<div class="box-body">
                    <div class="alert alert-warning text-center"><i class="icon fa fa-warning"></i><strong>ATENCIÓN:</strong><br> No hay imagenes disponibles, porfavor ingresa una imagen.</div>
                </div>';
        }else {
            echo '<div class="table-responsive">
                    <div class="form-group has-feedback">
                        <label class="control-label"><b>Selecciona una imagen:</b></label>
                        <input type="file" id="editar_slider_imagen" class="form-control">
                        <p class="help-block">Tamaño optimo de la imagen: 1111 x 386 px
                            <br>
                            Peso máximo: 1MB
                        </p>
                    </div>
                    <table class="table no-margin">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>';
            foreach ($respuesta as $fila => $item) {
                echo '<tr>
                            <td><img src="vista/img/slider/'.$item["slider"].'" width="120" height="50" class="img-circle" alt="Avatar"></td>
                            <td>'.$item["slider"].'</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" editar_slider_id="'.$item["id"].'" editar_slider_auditoria_creado="'.$datos["formulario_editar_slider_auditoria_usuario"].'" editar_slider_auditoria_usuario="'.$datos["formulario_editar_slider_auditoria_creado"].'" class="btn-success btn-sm editar-imagen-slider" title="Editar imagen">Cambiar</button>
                                </div>
                            </td>
                        </tr>';
            }
            echo '</tbody>
                </table>
            </div>';
        }
    }

    static public function editar_slider_controlador($datos){
        $datos_slider_anterior = array ("eliminar_slider_id" => $datos["editar_slider_id"],
                            "auditoria_usuario" => $datos["editar_slider_auditoria_usuario"]);
        $respuesta = Core_Modelo::eliminar_slider_modelo("slider", $datos_slider_anterior);
        $identificador_slider = Core_Modelo::identificador_mayor_modelo("slider");
        $identificador_imagen = $identificador_slider["id"];
        $identificador_imagen ++;
        if(isset($_FILES["editar_slider_imagen"]["tmp_name"])){
            $tipo_archivo = $_FILES["editar_slider_imagen"]["type"];
            if ($tipo_archivo == "image/jpeg"){
                $imagen = 'slider-'.$identificador_imagen.'.jpg';
                move_uploaded_file($_FILES["editar_slider_imagen"]["tmp_name"],"../img/slider/".$imagen);
            } else if ($tipo_archivo == "image/png"){
                $imagen = 'slider-'.$identificador_imagen.'.png';
                move_uploaded_file($_FILES["editar_slider_imagen"]["tmp_name"],"../img/slider/".$imagen);
            }
        }
        $datos_slider = array ("auditoria_creado" => $datos["editar_slider_auditoria_creado"],
                            "auditoria_usuario" => $datos["editar_slider_auditoria_usuario"],
                            "slider" => $imagen);
        $respuesta = Core_Modelo::nuevo_slider_modelo("slider", $datos_slider);
        echo $respuesta;
    }

    public function formulario_agregar_slider_controlador($datos){
        echo '<div class="form-group has-feedback">
                <label class="control-label"><b>Selecciona una imagen:</b></label>
                <input type="file" id="agregar_slider_imagen" class="form-control">
                <input type="hidden" id="agregar_slider_auditoria_usuario" value="'.$datos["formulario_agregar_slider_auditoria_usuario"].'">
                <input type="hidden" id="agregar_slider_auditoria_creado" value="'.$datos["formulario_agregar_slider_auditoria_creado"].'">
                <p class="help-block">Tamaño optimo de la imagen: 1111 x 386 px
                    <br>
                    Peso máximo: 1MB
                </p>
            </div>';
        
    }

    static public function agregar_slider_controlador($datos){
        $identificador_slider = Core_Modelo::identificador_mayor_modelo("slider");
        $identificador_imagen = $identificador_slider["id"];
        $identificador_imagen ++;
        if(isset($_FILES["agregar_slider_imagen"]["tmp_name"])){
            $tipo_archivo = $_FILES["agregar_slider_imagen"]["type"];
            if ($tipo_archivo == "image/jpeg"){
                $imagen = 'slider-'.$identificador_imagen.'.jpg';
                move_uploaded_file($_FILES["agregar_slider_imagen"]["tmp_name"],"../img/slider/".$imagen);
            } else if ($tipo_archivo == "image/png"){
                $imagen = 'slider-'.$identificador_imagen.'.png';
                move_uploaded_file($_FILES["agregar_slider_imagen"]["tmp_name"],"../img/slider/".$imagen);
            }
        }
        $datos_slider = array ("auditoria_creado" => $datos["agregar_slider_auditoria_creado"],
                            "auditoria_usuario" => $datos["agregar_slider_auditoria_usuario"],
                            "slider" => $imagen);
        $respuesta = Core_Modelo::nuevo_slider_modelo("slider", $datos_slider);
        echo $respuesta;
    }

      public function contenido_controlador($seccion){
        if(isset($_SESSION["id"])){ 
            $permiso = $_SESSION["id"];
        }else{
            $permiso = "Null";
        }
        $consulta = Core_Modelo::contenido_modelo("contenido", $seccion);
        if($consulta == NULL){
             echo '<section>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 my-5">
                                <div class="col-xs-12 alert alert-warning text-center">
                                    <strong>ATENCIÓN:</strong><br>
                                    <h4>Aún no hay contenido en esta pagina</h4>
                                    <h5>Para crear un contenido en esta pagina utiliza este boton:</h5>
                                    <div class="col-xs-12 my-4">
                                        <button type="button" formulario_agregar_contenido_auditoria_usuario="'.$_SESSION["id"].'" formulario_agregar_contenido_auditoria_creado="'.$GLOBALS["fecha"].'" formulario_agregar_contenido_orden="1" formulario_agregar_contenido_seccion="'.$seccion.'" class="btn color-boton-testimonio agregar-contenido" title="Agregar contenido" data-toggle="modal" data-target="#modal_agregar_contenido">Agregar contenido</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>        
                </section>
                <div id="modal_agregar_contenido" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Añadir contenido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-agregar-contenido">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" id="agregar-nuevo-contenido" class="btn btn-success pull-right agregar-nuevo-contenido">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>';
        }else{
            echo '<section>
                    <div id="contenido">
                        <div class="container">
                            <div class="row">';
                            foreach ($consulta as $fila => $item){
                                if($item["disposicion"] == 1){
                                    echo'<div class="col-xs-12 col-md-12">';
                                }elseif($item["disposicion"] == 2){
                                    echo'<div class="col-xs-12 col-md-6">';
                                }elseif($item["disposicion"] == 3){
                                    echo'<div class="col-xs-12 col-md-12">';
                                }
                                elseif($item["disposicion"] == 4){
                                    echo'       </div>
                                            </div>
                                        </div>
                                    </section>';
                                }
                                if($item["tipo"] == 1){
                                    echo'<p class="color-parrafo">'.htmlspecialchars_decode($item["contenido"]).'</p>';
                                }elseif($item["tipo"] == 2){
                                    echo'<img class="img-fluid" src="vista/img/contenido/'.$item["contenido"].'" alt="">';
                                }elseif($item["tipo"] == 2 && $item["disposicion"] == 3){
                                    echo'<img class="img-responsive img-center" src="vista/img/contenido/'.$item["contenido"].'" alt="">';
                                }elseif($item["tipo"] == 3 || $item["tipo"] == 4){
                                    echo'<iframe class="embed-responsive-item" src="'.$item["contenido"].'" frameborder="0" allowfullscreen></iframe>';
                                }elseif($item["tipo"] == 5){
                                    $nombre_seccion = $_GET["url"];
                                    $nombre_seccion = str_replace("-", " ", $nombre_seccion);
                                    $nombre_seccion = ucwords($nombre_seccion); 
                                    echo '<section class="mb-4" style="background:url(vista/img/contenido/'.$item["contenido"].')no-repeat center; background-size:cover;">
                                                <div class="container-fluid color-imagen-principal">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3 class="banner-espacio"></h3>
                                                        </div>
                                                        <div class="col-12 mb-4 text-white">
                                                            <h1 class="font-weight-bold texto-imagen-principal">'.$nombre_seccion.'</h1>
                                                            <p class="mb-1 text-right"><a class="text-white" href="' .$GLOBALS["raiz"].'">Página principal</a> > '.$nombre_seccion.'</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>'; 
                                }else if($item["tipo"] == 6){
                                    $consulta_servicio = Core_Modelo::servicio_modelo("servicio");
                                    echo'<section>
                                            <div class="container my-3">
                                                <div class="row">';
                                        foreach ($consulta_servicio as $row => $elemento){
                                            echo' <div class="col-12 col-md-4">
                                                    <div class="card py-1 py-md-0">
                                                        <img class="card-img-top img-fluid" src="vista/img/servicio/'.$elemento["imagen"].'" alt="Card image cap">
                                                        <div class="color-caja-card rounded">
                                                            <h4 class="card-title">'.$elemento["titulo"].'</h4>
                                                        </div>
                                                    </div>';
                                                    if($permiso != "Null"){
                                                        if($row == (count($consulta_servicio) - 1)){
                                                            echo'<button type="button" formulario_agregar_servicio_auditoria_usuario="'.$_SESSION["id"].'" formulario_agregar_servicio_auditoria_creado="'.$GLOBALS["fecha"].'" class="pull-right btn btn-info btn-sm agregar-servicio" title="Agregar servicio" data-toggle="modal" data-target="#modal_agregar_servicio"><i class="fas fa-plus"></i></button>';
                                                        }
                                                        echo'<button type="button" formulario_editar_servicio_auditoria_usuario="'.$_SESSION["id"].'" formulario_editar_servicio_id="'.$elemento["id"].'" class="btn btn-success btn-sm pull-right editar-servicio" data-toggle="modal" data-target="#modal_editar_servicio"><i class="fa fa-edit"></i></button>
                                                        <button type="button" formulario_eliminar_servicio_auditoria_usuario="'.$_SESSION["id"].'" formulario_eliminar_servicio_id="'.$elemento["id"].'" class="btn btn-danger btn-sm pull-right eliminar-servicio" data-toggle="modal" data-target="#modal_eliminar_servicio"><i class="fa fa-trash-o"></i></button>';
                                                    }
                                            echo'</div>';
                                        }
                                        echo'</div>
                                        </div>
                                    </section>';
                                }elseif($item["tipo"] == 7){
                                    $consulta_texto_banner = Core_Modelo::consulta_texto_banner_modelo("contenido_banner_texto", $item["id"]);
                                    echo '<section class="my-4" style="background:url(vista/img/contenido/'.$item["contenido"].')no-repeat center; background-size:cover;">
                                                <div class="container-fluid color-imagen-principal">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <h3 class="banner-espacio"></h3>
                                                        </div>
                                                        <div class="col-12 text-white">
                                                            <h1 class="font-weight-bold texto-imagen-principal">'.$consulta_texto_banner["texto"].'</h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>'; 
                                }
                                echo '<div class="my-4">';
                                if($permiso != "Null" && $item["tipo"] != 7 && $item["tipo"] != 6){
                                    echo'<button type="button" formulario_editar_contenido_auditoria_usuario="'.$_SESSION["id"].'" formulario_editar_contenido_comparador="'.$item["contenido"].'" formulario_editar_contenido_id_contenido="'.$item["id"].'" formulario_editar_contenido_seccion="'.$seccion.'" formulario_editar_contenido_auditoria_creado="'.$GLOBALS["fecha"].'" class="btn btn-success pull-right editar-contenido" data-toggle="modal" data-target="#modal_editar_contenido"><i class="fa fa-edit"></i></button>';
                                    if($item["tipo"] != 5 && $item["tipo"] != 6 && $item["tipo"] != 7){
                                        echo '<button type="button" formulario_eliminar_contenido_auditoria_usuario="'.$_SESSION["id"].'" formulario_eliminar_contenido_id_contenido="'.$item["id"].'" class="btn btn-danger pull-right eliminar-contenido" data-toggle="modal" data-target="#modal_eliminar_contenido"><i class="fa fa-trash-o"></i></button>';
                                    }
                                }
                                if($item["tipo"] != 5 && $item["tipo"] != 6 && $item["tipo"] != 7){
                                    echo '</div>
                                    </div>';
                                }else{
                                    echo '</div>
                                       <section>
                                            <div id="contenido">
                                                <div class="container">
                                                    <div class="row">';
                                }
                                $nuevo_contenido_orden = $item["orden"];
                            }
                            $nuevo_contenido_orden ++;
                            if($permiso != "Null"){
                                echo '<div class="col-xs-12">
                                        <button type="button" formulario_agregar_contenido_auditoria_usuario="'.$_SESSION["id"].'" formulario_agregar_contenido_auditoria_creado="'.$GLOBALS["fecha"].'" formulario_agregar_contenido_orden="'.$nuevo_contenido_orden.'" formulario_agregar_contenido_seccion="'.$seccion.'" class="btn btn-info agregar-contenido pull-right mx-5" title="Agregar contenido" data-toggle="modal" data-target="#modal_agregar_contenido"><i class="fas fa-plus"></i></button>
                                    </div>';
                            }
                        echo'</div>
                        </div>
                    </div>        
                </section>
                <div id="modal_editar_contenido" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Editar contenido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-editar-contenido">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" id="modificar-contenido" class="btn btn-success pull-right modificar-contenido">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_eliminar_contenido" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Eliminar contenido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-eliminar-contenido">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" class="btn btn-success pull-right borrar-contenido">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_agregar_contenido" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Añadir contenido</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-agregar-contenido">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" id="agregar-nuevo-contenido" class="btn btn-success pull-right agregar-nuevo-contenido">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_editar_servicio" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Editar servicio</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-editar-servicio">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" id="modificar-servicio" class="btn btn-success pull-right modificar-servicio">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_eliminar_servicio" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Eliminar servicio</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body" id="formulario-modal-eliminar-servicio">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" class="btn btn-success pull-right borrar-servicio">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal_agregar_servicio" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header" style="background:var(--color-principal); color:white">
                                <h4 class="modal-title">Agregar servicio</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="modal-body">
                                    <div class="box-body">
                                        <form method="POST">
                                            <div class="form-group has-feedback">';
                                                if($permiso != "Null"){
                                                    echo'<input type="hidden" id="nuevo_servicio_auditoria_usuario" value="'.$_SESSION["id"].'">
                                                    <input type="hidden" id="nuevo_servicio_auditoria_creado" value="'.$GLOBALS["fecha"].'">';
                                                }
                                            echo'<label class="control-label"><b>Imagen</b></label>
                                                <input type="file" id="nuevo_servicio_imagen" class="form-control">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label class="control-label"><b>Titulo</b></label>
                                                <input type="text" class="form-control form-control-lg" id="nuevo_servicio_titulo" placeholder="Titulo">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                                <button type="submit" id="nuevo-servicio" class="btn btn-success pull-right nuevo-servicio">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }

     public function formulario_agregar_contenido_controlador($datos){
        echo '<div class="box-body">
            <form method="POST">
                <div class="form-group has-feedback">
                    <label class="control-label"><b>Tamaño:</b></label>
                    <input type="hidden" id="agregar_contenido_auditoria_usuario" value="'.$datos["formulario_agregar_contenido_auditoria_usuario"].'">
                    <input type="hidden" id="agregar_contenido_auditoria_creado" value="'.$datos["formulario_agregar_contenido_auditoria_creado"].'">
                    <input type="hidden" id="agregar_contenido_orden" value="'.$datos["formulario_agregar_contenido_orden"].'">
                    <input type="hidden" id="agregar_contenido_seccion" value="'.$datos["formulario_agregar_contenido_seccion"].'">
                    <select id="agregar_contenido_disposicion" class="form-control" required>
                        <option value="">Selecciona un tamaño</option>';
                        $disposicion = new Core_Controlador();
                        $disposicion -> mostrar_formulario_controlador('contenido_disposicion', 0);
                echo '</select>
                </div>
                <div class="form-group has-feedback">
                    <label class="control-label"><b>Tipo de contenido:</b></label> <br>
                    <label class="radio-inline"><input type="radio" id="agregar_contenido_tipo" name="agregar_contenido_tipo"> Texto </label>
                    <label class="radio-inline"><input type="radio" id="agregar_contenido_tipo" name="agregar_contenido_tipo"> Imagen </label>
                    <label class="radio-inline"><input type="radio" id="agregar_contenido_tipo" name="agregar_contenido_tipo"> Video </label>
                </div>
                <div class="box-body" id="agregar-contenido-tipo"></div>
            </form>
        </div>';
    }

    static public function agregar_contenido_controlador($datos){
        if($datos["agregar_contenido_tipo"] == 1 || $datos["agregar_contenido_tipo"] == 3){
            $agregar_contenido_el_contenido = htmlspecialchars($datos["agregar_contenido_el_contenido"]);
        }elseif($datos["agregar_contenido_tipo"] == 2){
            $identificador_contenido = Core_Modelo::identificador_mayor_modelo("contenido");
            $identificador_imagen = $identificador_contenido["id"];
            $identificador_imagen ++;
            if(isset($_FILES["agregar_contenido_el_contenido"]["tmp_name"])){
                $tipo_archivo = $_FILES["agregar_contenido_el_contenido"]["type"];
                if ($tipo_archivo == "image/jpeg"){
                    $agregar_contenido_el_contenido = 'contenido-'.$identificador_imagen.'.jpg';
                    move_uploaded_file($_FILES["agregar_contenido_el_contenido"]["tmp_name"],"../img/contenido/".$agregar_contenido_el_contenido);
                } else if ($tipo_archivo == "image/png"){
                    $agregar_contenido_el_contenido = 'contenido-'.$identificador_imagen.'.png';
                    move_uploaded_file($_FILES["agregar_contenido_el_contenido"]["tmp_name"],"../img/contenido/".$agregar_contenido_el_contenido);
                }
            }
        }
        $datos_contenido = array ("disposicion" => $datos["agregar_contenido_disposicion"],
                                  "auditoria_usuario" => $datos["agregar_contenido_auditoria_usuario"],
                                  "auditoria_creado" => $datos["agregar_contenido_auditoria_creado"],
                                  "contenido" => $agregar_contenido_el_contenido, 
                                  "tipo" => $datos["agregar_contenido_tipo"],
                                  "seccion" => $datos["agregar_contenido_seccion"],
                                  "orden" => $datos["agregar_contenido_orden"]);
        $respuesta = Core_Modelo::crear_nuevo_contenido_modelo("contenido", $datos_contenido);
        echo $respuesta;
    }

    
    public function formulario_editar_contenido_controlador($datos){
        $consulta = Core_Modelo::contenido_editar_modelo("contenido", $datos);
        echo '<div class="box-body">
				<form method="POST">';
            echo'<div class="form-group has-feedback">
                        <label class="control-label"><b>Tamaño:</b></label>
                        <select id="editar_contenido_disposicion" class="form-control" required>
                            <option value="'.$consulta["id_disposicion"].'">'.$consulta["disposicion"].'</option>';
                            $disposicion = new Core_Controlador();
                            $disposicion -> mostrar_formulario_controlador('contenido_disposicion', $consulta["id_disposicion"]);
                echo '</select>
                    </div>';
                    if($consulta["tipo"] == 1){
                        echo'<div class="form-group has-feedback">
                                <label class="control-label"><b>Contenido:</b></label>
                                <br>
                                <textarea name="editar_contenido_texto" id="editar_contenido_el_contenido" required>'.$consulta["contenido"].'</textarea>
                                <script>
                                        CKEDITOR.replace( "editar_contenido_texto" );
                                </script>';
                    }elseif($consulta["tipo"] == 2 || $consulta["tipo"] == 5){
                        echo '<div class="form-group has-feedback">
                                <label class="control-label"><b>Selecciona una imagen:</b></label>
                                <input type="file" id="editar_contenido_el_contenido" class="form-control">
                                <p class="help-block">Tamaño optimo de la imagen: 1111 x 386 px
                                    <br>
                                    Peso máximo: 1MB
                                </p>';
                    }elseif($consulta["tipo"] == 7){
                        $consulta_texto_banner = Core_Modelo::consulta_texto_banner_modelo("contenido_banner_texto", $datos["formulario_editar_contenido_id_contenido"]);
                        echo '<div class="form-group has-feedback">
                                <label class="control-label"><b>Titulo</b></label>
                                <input type="text" id="editar_contenido_titulo" class="form-control" value="'.$consulta_texto_banner["texto"].'">
                            </div>
                            <div class="form-group has-feedback">
                                <label class="control-label"><b>Selecciona una imagen:</b></label>
                                <input type="file" id="editar_contenido_el_contenido" class="form-control">
                                <p class="help-block">Tamaño optimo de la imagen: 1111 x 386 px
                                    <br>
                                    Peso máximo: 1MB
                                </p>';
                    } 
                    echo '<input type="hidden" id="editar_contenido_auditoria_usuario" value="'.$datos["formulario_editar_contenido_auditoria_usuario"].'">
                        <input type="hidden" id="editar_contenido_auditoria_creado" value="'.$datos["formulario_editar_contenido_auditoria_creado"].'">
                        <input type="hidden" id="editar_contenido_id_contenido" value="'.$datos["formulario_editar_contenido_id_contenido"].'">
                        <input type="hidden" id="editar_contenido_tipo" value="'.$consulta["tipo"].'">
                        <input type="hidden" id="editar_contenido_comparador" value="'.$datos["formulario_editar_contenido_comparador"].'">
                        <input type="hidden" id="editar_contenido_orden" value="'.$consulta["orden"].'">
                        <input type="hidden" id="editar_contenido_seccion" value="'.$datos["formulario_editar_contenido_seccion"].'">
                    </div>
                </form>
            </div>';
    }

    static public function editar_contenido_controlador($datos){
        if($datos["editar_contenido_tipo"] == "mismo contenido"){
            $respuesta = Core_Modelo::editar_contenido_modelo("contenido", $datos);
        }else{
            $datos_base = array ("id_contenido" => $datos["editar_contenido_id_contenido"],
                                "auditoria_usuario" => $datos["editar_contenido_auditoria_usuario"]);
            $ocultar_contenido_anterior = Core_Modelo::eliminar_contenido_modelo("contenido", $datos_base);
            if($datos["editar_contenido_tipo"] == 1){
                $editar_contenido_el_contenido = htmlspecialchars($datos["editar_contenido_el_contenido"]);
            }elseif($datos["editar_contenido_tipo"] == 2 || $datos["editar_contenido_tipo"] == 5 || $datos["editar_contenido_tipo"] == 8){
                $identificador_contenido = Core_Modelo::identificador_mayor_modelo("contenido");
                $identificador_imagen = $identificador_contenido["id"];
                $identificador_imagen ++;
                if(isset($_FILES["editar_contenido_el_contenido"]["tmp_name"])){
                    $tipo_archivo = $_FILES["editar_contenido_el_contenido"]["type"];
                    if ($tipo_archivo == "image/jpeg"){
                        $editar_contenido_el_contenido = 'contenido-'.$identificador_imagen.'.jpg';
                        move_uploaded_file($_FILES["editar_contenido_el_contenido"]["tmp_name"],"../img/contenido/".$editar_contenido_el_contenido);
                    } else if ($tipo_archivo == "image/png"){
                        $editar_contenido_el_contenido = 'contenido-'.$identificador_imagen.'.png';
                        move_uploaded_file($_FILES["editar_contenido_el_contenido"]["tmp_name"],"../img/contenido/".$editar_contenido_el_contenido);
                    }
                }
                
            }
            $datos_contenido = array ("disposicion" => $datos["editar_contenido_disposicion"],
                                    "auditoria_usuario" => $datos["editar_contenido_auditoria_usuario"],
                                    "auditoria_creado" => $datos["editar_contenido_auditoria_creado"],
                                    "contenido" => $editar_contenido_el_contenido,
                                    "tipo" => $datos["editar_contenido_tipo"],
                                    "seccion" => $datos["editar_contenido_seccion"],
                                    "orden" => $datos["editar_contenido_orden"]);
            $respuesta = Core_Modelo::crear_nuevo_contenido_modelo("contenido", $datos_contenido);
        }
        if($datos["editar_contenido_titulo"] != ""){
            $respuesta_banner = Core_Modelo::editar_contenido_banner_texto_modelo("contenido_banner_texto", $datos);
        }
        echo $respuesta;
    }

    public function formulario_eliminar_contenido_controlador($datos){
		echo '<div class="alert alert-danger text-center">
				<i class="icon fa fa-ban"></i><strong>ATENCIÓN:</strong><br>
				<h5>Al eliminar este contenido ya no tendra acceso al mismo.</h5>
				<h6>Para recuperarlo deberás comunicarte con soporte técnico.</h6>
				<form method="post" class="form-horizontal">
					<input type="hidden" id="eliminar_contenido_auditoria_usuario" value="'.$datos["formulario_eliminar_contenido_auditoria_usuario"].'">
					<input type="hidden" id="eliminar_contenido_id_contenido" value="'.$datos["formulario_eliminar_contenido_id_contenido"].'">
				</form>
			</div>';
    }

    static public function eliminar_contenido_controlador($datos){
        $datos_base = array ("id_contenido" => $datos["eliminar_contenido_id_contenido"],
                            "auditoria_usuario" => $datos["eliminar_contenido_auditoria_usuario"]);
        $respuesta = Core_Modelo::eliminar_contenido_modelo("contenido", $datos_base);
        echo $respuesta;
    }

    static public function nuevo_servicio_controlador($datos){
        $identificador_servicio = Core_Modelo::identificador_mayor_modelo("servicio");
        $identificador_imagen = $identificador_servicio["id"];
        $identificador_imagen ++;
        if(isset($_FILES["nuevo_servicio_imagen"]["tmp_name"])){
            $tipo_archivo = $_FILES["nuevo_servicio_imagen"]["type"];
            if ($tipo_archivo == "image/jpeg"){
                $nuevo_servicio_imagen = 'servicio-'.$identificador_imagen.'.jpg';
                move_uploaded_file($_FILES["nuevo_servicio_imagen"]["tmp_name"],"../img/servicio/".$nuevo_servicio_imagen);
            } else if ($tipo_archivo == "image/png"){
                $nuevo_servicio_imagen = 'servicio-'.$identificador_imagen.'.png';
                move_uploaded_file($_FILES["nuevo_servicio_imagen"]["tmp_name"],"../img/servicio/".$nuevo_servicio_imagen);
            }
        }
        $respuesta = Core_Modelo::nuevo_servicio_modelo("servicio", $datos, $nuevo_servicio_imagen);
        return $respuesta;
    }
    
    public function formulario_editar_servicio_controlador($datos){
        $consulta = Core_Modelo::consultar_servicio_modelo("servicio", $datos["formulario_editar_servicio_id"]);
        echo '<div class="box-body">
                <form method="POST">
                    <div class="form-group has-feedback">
                        <input type="hidden" id="editar_servicio_auditoria_usuario" value="'.$datos["formulario_editar_servicio_auditoria_usuario"].'">
                        <input type="hidden" id="editar_servicio_id" value="'.$datos["formulario_editar_servicio_id"].'">
                        <label class="control-label"><b>Imagen</b></label>
                        <input type="file" class="form-control form-control-lg" id="editar_servicio_imagen">
                    </div>
                    
                    <div class="form-group has-feedback">
                        <label class="control-label"><b>Titulo</b></label>
                        <input type="text" class="form-control form-control-lg" id="editar_servicio_titulo" value="'.$consulta["titulo"].'">
                    </div>
                </form>
            </div>';
    }

    static public function editar_servicio_controlador($datos){
        $identificador_servicio = Core_Modelo::identificador_mayor_modelo("servicio");
        $identificador_imagen = $identificador_servicio["id"];
        $identificador_imagen ++;
        if(isset($_FILES["editar_servicio_imagen"]["tmp_name"])){
            $tipo_archivo = $_FILES["editar_servicio_imagen"]["type"];
            if ($tipo_archivo == "image/jpeg"){
                $editar_servicio_imagen = 'servicio-'.$identificador_imagen.'.jpg';
                move_uploaded_file($_FILES["editar_servicio_imagen"]["tmp_name"],"../img/servicio/".$editar_servicio_imagen);
            } else if ($tipo_archivo == "image/png"){
                $editar_servicio_imagen = 'servicio-'.$identificador_imagen.'.png';
                move_uploaded_file($_FILES["editar_servicio_imagen"]["tmp_name"],"../img/servicio/".$editar_servicio_imagen);
            }
        }
        $respuesta = Core_Modelo::editar_servicio_modelo("servicio", $datos, $editar_servicio_imagen);
        return $respuesta;
    }

    static public function registro_contacto_controlador($datos){
        try {
            require_once '../librerias/PHPmailer/Exception.php';
            require_once '../librerias/PHPmailer/PHPMailer.php';
            require_once '../librerias/PHPmailer/SMTP.php';
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'bicytake@gmail.com';
            $mail->Password   = 'Julian1234/';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom('bicytake@gmail.com', 'DR. LUIS H. GONZÁLEZ');
            $mail->addAddress($datos["email"]);
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Solicitud de contacto';
            $mail->Body    = '<div style="width:100%; background:#003051; position:relative; font-family: Montserrat, sans-serif; padding-bottom:40px">
                                <div style="font-size:1.2em; position:relative; margin:auto; width:500px; background:white; padding:20px">
                                <center>
                                    <hr style="border:1px solid #FFE50B; width:80%">
                                    <img style="padding:20px;" width="140" height="140" src="">
                                    <h2 style="font-weight:700">Solicitud de contacto</h2>
                                    <h4 style="font-weight:100; padding:0 20px">Hola, acabas de recibir una nueva solicitud de contacto:</h4>
                                    <h4 style="font-weight:100; padding:0 20px">Nombre<br><b>'.$datos["nombre"].'</b></h4>
                                    <h4 style="font-weight:100; padding:0 20px">Correo<br><b>'.$datos["email"].'</b></h4>
                                    <h4 style="font-weight:100; padding:0 20px">Télefono<br><b>'.$datos["telefono"].'</b></h4>
                                    <h4 style="font-weight:100; padding:0 20px">Mensaje<br><b>'.$datos["mensaje"].'</b></h4>
                                    <h4 style="font-weight:100; padding:0 20px"><cite>DR. LUIS H. GONZÁLEZ</cite></h4>
                                </center>
                                </div>
                            </div>';
            $mail->send();
        }catch (Exception $e) {
            echo 'Ha ocurrido un error inesperado!';
        }
        $respuesta = "ok";
        return $respuesta;
    }
}