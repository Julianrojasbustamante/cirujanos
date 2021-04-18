<?php
require_once "conexion.php";
class Core_Modelo{
    static public function mostrar_formulario_modelo($tabla, $id_distinto) {
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla
                                                WHERE id != $id_distinto");
        $consulta ->  execute();
        return $consulta -> fetchAll();
        $consulta -> close();
        $consulta = null;
    }

    static public function administrador_ingreso_modelo($tabla, $datos_ingreso){
        $consulta = Conexion::conectar()->prepare("SELECT id, rol FROM $tabla WHERE email = :correo AND contrasena = :contrasena AND estado = 2");
        $consulta->bindParam(":correo", $datos_ingreso["correo"], PDO::PARAM_STR);
        $consulta->bindParam(":contrasena", $datos_ingreso["contrasena"], PDO::PARAM_STR);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function administrador_registro_ingreso_modelo($tabla, $datos_registro_ingreso){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET ingreso = :ingreso WHERE id = :id");
        $consulta->bindParam(":id", $datos_registro_ingreso["id_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":ingreso", $datos_registro_ingreso["fecha"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    
    static public function perfil_usuario_modelo($tabla, $perfil){
        $consulta = Conexion::conectar()->prepare("SELECT nombres, rol
        FROM $tabla
        WHERE id = :id");
        $consulta->bindParam(":id", $perfil, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_editar_avatar_distribuidor_modelo($tabla, $datos, $avatar_base){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                avatar = :avatar,
                modificado = :usuario
                WHERE id = :usuario");
        $consulta->bindParam(":usuario", $datos["perfil_editar_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":avatar", $avatar_base, PDO::PARAM_STR);
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function nueva_contrasena_distribuidor_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                contrasena = :contrasena,
                modificado = :auditoria_usuario
                WHERE id = :id");
        $consulta->bindParam(":id", $datos["auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":contrasena", $datos["contrasena"], PDO::PARAM_STR);
        $consulta->bindParam(":auditoria_usuario", $datos["auditoria_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function perfil_distribuidor_modelo($tabla, $idUsuario){
        $consulta = Conexion::conectar()->prepare("SELECT cliente_contacto.nombres,
            cliente_contacto.email,
            cliente_contacto.cargo AS rol,
            cliente_contacto.avatar,
            cliente_contacto.estado AS idEstado,
            estado.estado
            FROM $tabla, estado
            WHERE cliente_contacto.id = :idUsuario
            AND cliente_contacto.estado = estado.id
            ORDER BY cliente_contacto.id ASC");
        $consulta->bindParam(":idUsuario", $idUsuario, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta->fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function editar_perfil_distribuidor_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                email = :email,
                nombres = :nombres,
                modificado = :auditoria_usuario
                WHERE id = :id");
        $consulta->bindParam(":id", $datos["perfil_distribuidor_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["perfil_distribuidor_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":nombres", $datos["perfil_distribuidor_editar_nombres"], PDO::PARAM_STR);
        $consulta->bindParam(":email", $datos["perfil_distribuidor_editar_email"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
		    return "ok";
		}else{
			return "error";
		}
        $consulta->close();
        $consulta = null;
    }

    static public function menu_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT id, nombre, nivel, ruta
                FROM menu
                WHERE nivel = 1 
                AND estado = 2");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function sub_menu_modelo($tabla, $padre){
        $consulta = Conexion::conectar()->prepare("SELECT id, nombre, nivel, ruta
                FROM menu
                WHERE padre = $padre
                AND estado = 2");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function slider_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT id, slider
                                                    FROM $tabla
                                                    WHERE estado = 2");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function eliminar_slider_modelo($tabla, $datos){
        $estado = 3;
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                estado = :estado,
                auditoria_usuario = :auditoria_usuario
                WHERE id = :slider");
        $consulta->bindParam(":slider", $datos["eliminar_slider_id"], PDO::PARAM_INT);
        $consulta->bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["auditoria_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function identificador_mayor_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT max(id) AS id FROM $tabla");
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

     static public function nuevo_slider_modelo($tabla, $datos){
        $estado = 2;
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (slider, estado, auditoria_usuario, auditoria_creado) 
        VALUES (:slider, :estado, :auditoria_usuario, :auditoria_creado)");
        $consulta -> bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta -> bindParam(":auditoria_usuario", $datos["auditoria_creado"], PDO::PARAM_INT);
        $consulta -> bindParam(":auditoria_creado", $datos["auditoria_usuario"], PDO::PARAM_STR);
        $consulta -> bindParam(":slider", $datos["slider"], PDO::PARAM_STR);
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function editar_menu_modelo($tabla, $datos, $ruta_menu){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                nombre = :nombre,
                auditoria_usuario = :auditoria_usuario
                WHERE id = :id_menu");
        $consulta->bindParam(":id_menu", $datos["editar_menu_id_menu"], PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["editar_menu_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":nombre", $datos["editar_menu_nombre_menu"], PDO::PARAM_STR);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function eliminar_menu_modelo($tabla, $datos){
        $estado = 3;
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                estado = :estado,
                auditoria_usuario = :auditoria_usuario
                WHERE id = :id_menu");
        $consulta->bindParam(":id_menu", $datos["eliminar_menu_id_menu"], PDO::PARAM_INT);
        $consulta->bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["eliminar_menu_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function contenido_modelo($tabla, $seccion){
        $consulta = Conexion::conectar()->prepare("SELECT id, contenido, disposicion, tipo, orden
                                                    FROM $tabla 
                                                    WHERE seccion = $seccion
                                                    AND estado = 2
                                                    ORDER BY orden");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function servicio_modelo($tabla){
        $consulta = Conexion::conectar()->prepare("SELECT id, imagen, titulo
                                                    FROM $tabla
                                                    WHERE estado = 2");
        $consulta->execute();
        return $consulta-> fetchAll();
        $consulta->close();
        $consulta = null;
    }

    static public function crear_nuevo_contenido_modelo($tabla, $datos){
        $estado = 2;
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (contenido, disposicion, tipo, seccion, estado, orden, auditoria_usuario, auditoria_creado) 
        VALUES (:contenido, :disposicion, :tipo, :seccion, :estado, :orden, :auditoria_usuario, :auditoria_creado)");
        $consulta -> bindParam(":contenido", $datos["contenido"], PDO::PARAM_STR);
        $consulta -> bindParam(":disposicion", $datos["disposicion"], PDO::PARAM_INT);
        $consulta -> bindParam(":tipo", $datos["tipo"], PDO::PARAM_INT);
        $consulta -> bindParam(":seccion", $datos["seccion"], PDO::PARAM_STR);
        $consulta -> bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta -> bindParam(":orden", $datos["orden"], PDO::PARAM_INT);
        $consulta -> bindParam(":auditoria_usuario", $datos["auditoria_usuario"], PDO::PARAM_INT);
        $consulta -> bindParam(":auditoria_creado", $datos["auditoria_creado"], PDO::PARAM_STR);
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function contenido_editar_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("SELECT contenido.id, contenido.contenido, contenido.disposicion AS id_disposicion, contenido_disposicion.nombre AS disposicion, contenido.tipo, contenido.orden
                                                    FROM $tabla, contenido_disposicion
                                                    WHERE contenido.seccion = :seccion
                                                    AND contenido.estado = 2
                                                    AND contenido.id = :id_contenido
                                                    AND contenido_disposicion.id = contenido.disposicion");
        $consulta->bindParam(":seccion", $datos["formulario_editar_contenido_seccion"], PDO::PARAM_INT);
        $consulta->bindParam(":id_contenido", $datos["formulario_editar_contenido_id_contenido"], PDO::PARAM_INT);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function consulta_texto_banner_modelo($tabla, $banner){
        $consulta = Conexion::conectar()->prepare("SELECT texto
                                                    FROM $tabla
                                                    WHERE contenido = :banner");
        $consulta->bindParam(":banner", $banner, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

    static public function editar_contenido_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                disposicion = :disposicion,
                auditoria_usuario = :auditoria_usuario
                WHERE id = :contenido");
        $consulta->bindParam(":disposicion", $datos["editar_contenido_disposicion"], PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["editar_contenido_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":contenido", $datos["editar_contenido_id_contenido"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function eliminar_contenido_modelo($tabla, $datos_base){
        $estado = 3;
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                estado = :estado,
                auditoria_usuario = :auditoria_usuario
                WHERE id = :id_contenido");
        $consulta->bindParam(":id_contenido", $datos_base["id_contenido"], PDO::PARAM_INT);
        $consulta->bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos_base["auditoria_usuario"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function editar_contenido_banner_texto_modelo($tabla, $datos){
        $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET
                texto = :texto,
                auditoria_usuario = :auditoria_usuario
                WHERE contenido = :contenido");
        $consulta->bindParam(":texto", $datos["editar_contenido_titulo"], PDO::PARAM_STR);
        $consulta->bindParam(":auditoria_usuario", $datos["editar_contenido_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":contenido", $datos["editar_contenido_id_contenido"], PDO::PARAM_INT);
        $consulta->execute();
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

    static public function nuevo_servicio_modelo($tabla, $datos, $imagen){
        $estado = 2;
        $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (imagen, titulo, estado, auditoria_usuario, auditoria_creado) 
        VALUES (:imagen, :titulo, :estado, :auditoria_usuario, :auditoria_creado)");
        $consulta->bindParam(":imagen", $imagen, PDO::PARAM_STR);
        $consulta->bindParam(":titulo", $datos["nuevo_servicio_titulo"], PDO::PARAM_STR);
        $consulta->bindParam(":estado", $estado, PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_usuario", $datos["nuevo_servicio_auditoria_usuario"], PDO::PARAM_INT);
        $consulta->bindParam(":auditoria_creado", $datos["nuevo_servicio_auditoria_creado"], PDO::PARAM_STR);
        if($consulta -> execute()){
            return "Ok";
        }else{
            return "Error";
        }
        $consulta->close();
        $consulta = null;
    }

     static public function consultar_servicio_modelo($tabla, $servicio){
        $consulta = Conexion::conectar()->prepare("SELECT imagen, titulo
                                                    FROM $tabla
                                                    WHERE id = :servicio");
        $consulta->bindParam(":servicio", $servicio, PDO::PARAM_INT);
        $consulta->execute();
        return $consulta-> fetch();
        $consulta->close();
        $consulta = null;
    }

}
