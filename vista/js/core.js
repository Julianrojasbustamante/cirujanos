$(document).on("click", ".eliminar-slider", function () {
    var formulario_eliminar_slider_auditoria_usuario = $(this).attr('formulario_eliminar_slider_auditoria_usuario');
    var datos = new FormData();
    datos.append("formulario_eliminar_slider_auditoria_usuario", formulario_eliminar_slider_auditoria_usuario);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-eliminar-slider").html(respuesta);
        }
    })
});

$(document).on("click", ".borrar-imagen-slider", function () {
    var eliminar_slider_id = $(this).attr('eliminar_slider_id');
    var eliminar_slider_auditoria_usuario = $(this).attr('eliminar_slider_auditoria_usuario');
    var datos = new FormData();
    datos.append("eliminar_slider_id", eliminar_slider_id);
    datos.append("eliminar_slider_auditoria_usuario", eliminar_slider_auditoria_usuario);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Imagen eliminada!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_eliminar_slider").modal('hide');
                        location.reload();
                    });
                }, 250)
            }
        }
    });
});

$(document).on("click", ".editar-slider", function () {
    var formulario_editar_slider_auditoria_usuario = $(this).attr('formulario_editar_slider_auditoria_usuario');
    var formulario_editar_slider_auditoria_creado = $(this).attr('formulario_editar_slider_auditoria_creado');
    var datos = new FormData();
    datos.append("formulario_editar_slider_auditoria_usuario", formulario_editar_slider_auditoria_usuario);
    datos.append("formulario_editar_slider_auditoria_creado", formulario_editar_slider_auditoria_creado);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-editar-slider").html(respuesta);
        }
    })
});

$(document).on("change", "#editar_slider_imagen", function () {
    var editar_slider_imagen = this.files[0];
    if (editar_slider_imagen["type"] != "image/jpeg" && editar_slider_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_slider_imagen").val("");
    }
    else if (editar_slider_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_slider_imagen").val("");
    }
});

$(document).on("click", ".editar-imagen-slider", function () {
    var editar_slider_id = $(this).attr('editar_slider_id');
    var editar_slider_auditoria_creado = $(this).attr('editar_slider_auditoria_creado');
    var editar_slider_auditoria_usuario = $(this).attr('editar_slider_auditoria_usuario');
    var editar_slider_imagen = $("#editar_slider_imagen")[0].files[0];
    if (typeof editar_slider_imagen === "undefined") {
        swal({
            title: "Error al modificar la imagen",
            text: "Primero debes subir una imagen en el boton \"Eligir archivo\"!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_slider_imagen").val("");
        return false;
    }else{
        var datos = new FormData();
        datos.append("editar_slider_id", editar_slider_id);
        datos.append("editar_slider_auditoria_creado", editar_slider_auditoria_creado);
        datos.append("editar_slider_auditoria_usuario", editar_slider_auditoria_usuario);
        datos.append("editar_slider_imagen", editar_slider_imagen);
        $.ajax({
            url: "vista/ajax/core.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta == "Ok") {
                    setTimeout(function () {
                        swal({
                            title: "Registro exitoso",
                            text: "Imagen modificada!",
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                            function (isConfirm) {
                                alert("Ok");
                            });
                        $(".swal2-confirm").click(function () {
                            $("#modal_editar_slider").modal('hide');
                            location.reload();
                        });
                    }, 250)
                }
            }
        });
    }
});

$(document).on("click", ".agregar-slider", function () {
    var formulario_agregar_slider_auditoria_usuario = $(this).attr('formulario_agregar_slider_auditoria_usuario');
    var formulario_agregar_slider_auditoria_creado = $(this).attr('formulario_agregar_slider_auditoria_creado');
    var datos = new FormData();
    datos.append("formulario_agregar_slider_auditoria_usuario", formulario_agregar_slider_auditoria_usuario);
    datos.append("formulario_agregar_slider_auditoria_creado", formulario_agregar_slider_auditoria_creado);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-agregar-slider").html(respuesta);
        }
    })
});

$(document).on("change", "#agregar_slider_imagen", function () {
    var agregar_slider_imagen = this.files[0];
    if (agregar_slider_imagen["type"] != "image/jpeg" && agregar_slider_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#agregar_slider_imagen").val("");
    }
    else if (agregar_slider_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#agregar_slider_imagen").val("");
    }
});

$(document).on("click", ".agregar-imagen-slider", function () {
    var agregar_slider_auditoria_usuario = $(this).attr('agregar_slider_auditoria_usuario');
    var agregar_slider_auditoria_creado = $(this).attr('agregar_slider_auditoria_creado');
    var agregar_slider_imagen = $("#agregar_slider_imagen")[0].files[0];
    if (typeof agregar_slider_imagen === "undefined") {
        swal({
            title: "Error al agregar imagen",
            text: "Primero debes subir una imagen en el boton \"Eligir archivo\"!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#agregar_slider_imagen").val("");
        return false;
    } else {
        var datos = new FormData();
        datos.append("agregar_slider_auditoria_usuario", agregar_slider_auditoria_usuario);
        datos.append("agregar_slider_auditoria_creado", agregar_slider_auditoria_creado);
        datos.append("agregar_slider_imagen", agregar_slider_imagen);
        $.ajax({
            url: "vista/ajax/core.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta == "Ok") {
                    setTimeout(function () {
                        swal({
                            title: "Registro exitoso",
                            text: "Imagen agregada!",
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                            function (isConfirm) {
                                alert("Ok");
                            });
                        $(".swal2-confirm").click(function () {
                            $("#modal_agregar_slider").modal('hide');
                            location.reload();
                        });
                    }, 250)
                }
            }
        });
    }
});

$(document).on("click", ".editar-menu", function () {
    var formulario_editar_menu_auditoria_usuario = $(this).attr('formulario_editar_menu_auditoria_usuario');
    var formulario_editar_menu_raiz = $(this).attr('formulario_editar_menu_raiz');
    var formulario_editar_menu_auditoria_modificado = $(this).attr('formulario_editar_menu_auditoria_modificado');
    var datos = new FormData();
    datos.append("formulario_editar_menu_auditoria_usuario", formulario_editar_menu_auditoria_usuario);
    datos.append("formulario_editar_menu_raiz", formulario_editar_menu_raiz);
    datos.append("formulario_editar_menu_auditoria_modificado", formulario_editar_menu_auditoria_modificado);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-editar-menu").html(respuesta);
        }
    })
});

$(document).on("click", ".modificar-menu", function () {
    var editar_menu_auditoria_usuario = $(this).attr('editar_menu_auditoria_usuario');
    var editar_menu_auditoria_modificado = $(this).attr('editar_menu_auditoria_modificado');
    var editar_menu_id_menu = $(this).attr('editar_menu_id_menu');
    var editar_menu_ruta_menu = $(this).attr('editar_menu_ruta_menu');
    var editar_menu_nombre_menu = $("#editar_menu_nombre_" + editar_menu_id_menu).val();
    var editar_menu_ruta = $("#editar_menu_ruta").val();
    var datos = new FormData();
    datos.append("editar_menu_auditoria_usuario", editar_menu_auditoria_usuario);
    datos.append("editar_menu_auditoria_modificado", editar_menu_auditoria_modificado);
    datos.append("editar_menu_id_menu", editar_menu_id_menu);
    datos.append("editar_menu_ruta_menu", editar_menu_ruta_menu);
    datos.append("editar_menu_nombre_menu", editar_menu_nombre_menu);
    datos.append("editar_menu_ruta", editar_menu_ruta);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Menú modificado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_editar_menu").modal('hide');
                        location.reload();
                    });
                }, 250)
            }
        }
    });
});

$(document).on("click", ".eliminar-menu", function () {
    var formulario_eliminar_menu_auditoria_usuario = $(this).attr('formulario_eliminar_menu_auditoria_usuario');
    var datos = new FormData();
    datos.append("formulario_eliminar_menu_auditoria_usuario", formulario_eliminar_menu_auditoria_usuario);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-eliminar-menu").html(respuesta);
        }
    })
});

$(document).on("click", ".borrar-menu", function () {
    var eliminar_menu_auditoria_usuario = $(this).attr('eliminar_menu_auditoria_usuario');
    var eliminar_menu_id_menu = $(this).attr('eliminar_menu_id_menu');
    var datos = new FormData();
    datos.append("eliminar_menu_auditoria_usuario", eliminar_menu_auditoria_usuario);
    datos.append("eliminar_menu_id_menu", eliminar_menu_id_menu);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Menú eliminado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_eliminar_menu").modal('hide');
                        location.reload();
                    });
                }, 250)
            }
        }
    });
});

$(document).on("click", ".agregar-contenido", function () {
    var formulario_agregar_contenido_auditoria_usuario = $(this).attr('formulario_agregar_contenido_auditoria_usuario');
    var formulario_agregar_contenido_auditoria_creado = $(this).attr('formulario_agregar_contenido_auditoria_creado');
    var formulario_agregar_contenido_orden = $(this).attr('formulario_agregar_contenido_orden');
    var formulario_agregar_contenido_seccion = $(this).attr('formulario_agregar_contenido_seccion');
    var datos = new FormData();
    datos.append("formulario_agregar_contenido_auditoria_usuario", formulario_agregar_contenido_auditoria_usuario);
    datos.append("formulario_agregar_contenido_auditoria_creado", formulario_agregar_contenido_auditoria_creado);
    datos.append("formulario_agregar_contenido_orden", formulario_agregar_contenido_orden);
    datos.append("formulario_agregar_contenido_seccion", formulario_agregar_contenido_seccion);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-agregar-contenido").html(respuesta);
        }
    })
});

$(document).on("change", "#agregar_contenido_tipo", function () {
    var agregar_contenido_tipo = document.getElementsByName('agregar_contenido_tipo');
    if (agregar_contenido_tipo[0].checked) {
        var agregar_contenido_tipo_texto = '<textarea name="editar_contenido_texto" id="agregar_contenido_tipo_texto" required></textarea>';
        $("#agregar-contenido-tipo").html('<div class="form-group has-feedback"> <label class="control-label"><b> Texto: <b></label>' + agregar_contenido_tipo_texto + '</div>');
        CKEDITOR.replace("agregar_contenido_tipo_texto");
    } else if (agregar_contenido_tipo[1].checked) {
        var agregar_contenido_tipo_imagen = '<input type="file" id="agregar_contenido_tipo_imagen" class="form-control" required>';
        $("#agregar-contenido-tipo").html('<div class="form-group has-feedback"> <label class="control-label"><b> Imagen: <b></label>' + agregar_contenido_tipo_imagen + '</div>');
    } else if (agregar_contenido_tipo[2].checked) {
        var agregar_contenido_tipo_video = '<input type="text" id="agregar_contenido_tipo_video" class="form-control" placeholder="http://www.youtube.com/mi-video" required>';
        $("#agregar-contenido-tipo").html('<div class="form-group has-feedback"> <label class="control-label"><b> Link del video: <b></label>' + agregar_contenido_tipo_video + '</div>');
    }
});

$(document).on("change", "#agregar_contenido_tipo_imagen", function () {
    var agregar_contenido_tipo_imagen = this.files[0];
    if (agregar_contenido_tipo_imagen["type"] != "image/jpeg" && agregar_contenido_tipo_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#agregar_contenido_tipo_imagen").val("");
    } else if (agregar_contenido_tipo_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#agregar_contenido_tipo_imagen").val("");
    }
});

$(document).on("click", ".agregar-nuevo-contenido", function () {
    var agregar_contenido_auditoria_usuario = $("#agregar_contenido_auditoria_usuario").val();
    var agregar_contenido_auditoria_creado = $("#agregar_contenido_auditoria_creado").val();
    var agregar_contenido_orden = $("#agregar_contenido_orden").val();
    var agregar_contenido_tipo = document.getElementsByName('agregar_contenido_tipo');
    if (agregar_contenido_tipo[0].checked) {
        var agregar_contenido_el_contenido = CKEDITOR.instances['agregar_contenido_tipo_texto'].getData();
        agregar_contenido_tipo = 1;
    } else if (agregar_contenido_tipo[1].checked) {
        var agregar_contenido_el_contenido = $("#agregar_contenido_tipo_imagen")[0].files[0];
        agregar_contenido_tipo = 2;
    } else if (agregar_contenido_tipo[2].checked) {
        var agregar_contenido_el_contenido = $("#agregar_contenido_tipo_video").val();
        agregar_contenido_tipo = 3;
    }
    var agregar_contenido_seccion = $("#agregar_contenido_seccion").val();
    var agregar_contenido_disposicion = $("#agregar_contenido_disposicion").val();
    if (typeof agregar_contenido_el_contenido === 'undefined' || agregar_contenido_el_contenido == "" || agregar_contenido_disposicion == "") {
        swal({
            title: "Error al crear contenido",
            text: "Revisa que hayas diligenciado todos los campos!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
    } else {
        var datos = new FormData();
        datos.append("agregar_contenido_auditoria_usuario", agregar_contenido_auditoria_usuario);
        datos.append("agregar_contenido_auditoria_creado", agregar_contenido_auditoria_creado);
        datos.append("agregar_contenido_orden", agregar_contenido_orden);
        datos.append("agregar_contenido_el_contenido", agregar_contenido_el_contenido);
        datos.append("agregar_contenido_tipo", agregar_contenido_tipo);
        datos.append("agregar_contenido_seccion", agregar_contenido_seccion);
        datos.append("agregar_contenido_disposicion", agregar_contenido_disposicion);
        document.getElementById('agregar-nuevo-contenido').disabled = true;
        $.ajax({
            url: "vista/ajax/core.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta == "Ok") {
                    setTimeout(function () {
                        swal({
                            title: "Registro exitoso",
                            text: "Contenido creado!",
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                            function (isConfirm) {
                                alert("Ok");
                            });
                        $(".swal2-confirm").click(function () {
                            $("#modal_agregar_contenido").modal('hide');
                            location.reload();
                        });
                    }, 250)
                    document.getElementById('agregar-nuevo-contenido').disabled = false;
                }
            }
        });
    }
});

$(document).on("click", ".editar-contenido", function () {
    var formulario_editar_contenido_auditoria_usuario = $(this).attr('formulario_editar_contenido_auditoria_usuario');
    var formulario_editar_contenido_comparador = $(this).attr('formulario_editar_contenido_comparador');
    var formulario_editar_contenido_id_contenido = $(this).attr('formulario_editar_contenido_id_contenido');
    var formulario_editar_contenido_seccion = $(this).attr('formulario_editar_contenido_seccion');
    var formulario_editar_contenido_auditoria_creado = $(this).attr('formulario_editar_contenido_auditoria_creado');
    var datos = new FormData();
    datos.append("formulario_editar_contenido_auditoria_usuario", formulario_editar_contenido_auditoria_usuario);
    datos.append("formulario_editar_contenido_comparador", formulario_editar_contenido_comparador);
    datos.append("formulario_editar_contenido_id_contenido", formulario_editar_contenido_id_contenido);
    datos.append("formulario_editar_contenido_seccion", formulario_editar_contenido_seccion);
    datos.append("formulario_editar_contenido_auditoria_creado", formulario_editar_contenido_auditoria_creado);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-editar-contenido").html(respuesta);
        }
    })
});

$(document).on("change", "#editar_contenido_imagen", function () {
    var editar_contenido_imagen = this.files[0];
    if (editar_contenido_imagen["type"] != "image/jpeg" && editar_contenido_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_contenido_imagen").val("");
    }
    else if (editar_contenido_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_contenido_imagen").val("");
    }
});

$(document).on("click", ".modificar-contenido", function () {
    var editar_contenido_disposicion = $("#editar_contenido_disposicion").val();
    var editar_contenido_auditoria_usuario = $("#editar_contenido_auditoria_usuario").val();
    var editar_contenido_auditoria_creado = $("#editar_contenido_auditoria_creado").val();
    var editar_contenido_comparador_anterior = $("#editar_contenido_comparador").val();
    var editar_contenido_orden = $("#editar_contenido_orden").val();
    var editar_contenido_tipo = $("#editar_contenido_tipo").val();
    var editar_contenido_titulo = "";
    if (editar_contenido_tipo == 8) {
        var editar_contenido_titulo = $("#editar_contenido_titulo").val();
    }
    if (editar_contenido_tipo == 1) {
        var editar_contenido_el_contenido = CKEDITOR.instances['editar_contenido_el_contenido'].getData();
        var editar_contenido_comparador_nuevo = $("#editar_contenido_el_contenido").val();
        if (editar_contenido_comparador_anterior == editar_contenido_comparador_nuevo) {
            editar_contenido_el_contenido = "";
            editar_contenido_tipo = "mismo contenido";
        }
    } else if (editar_contenido_tipo == 2 || editar_contenido_tipo == 5 || editar_contenido_tipo == 8) {
        var editar_contenido_el_contenido = $("#editar_contenido_el_contenido")[0].files[0];
        if (typeof editar_contenido_el_contenido === "undefined") {
            editar_contenido_el_contenido = "";
            editar_contenido_tipo = "mismo contenido";
        }
    }
    var editar_contenido_id_contenido = $("#editar_contenido_id_contenido").val();
    var editar_contenido_seccion = $("#editar_contenido_seccion").val();
    var datos = new FormData();
    datos.append("editar_contenido_disposicion", editar_contenido_disposicion);
    datos.append("editar_contenido_el_contenido", editar_contenido_el_contenido);
    datos.append("editar_contenido_auditoria_usuario", editar_contenido_auditoria_usuario);
    datos.append("editar_contenido_auditoria_creado", editar_contenido_auditoria_creado);
    datos.append("editar_contenido_id_contenido", editar_contenido_id_contenido);
    datos.append("editar_contenido_tipo", editar_contenido_tipo);
    datos.append("editar_contenido_orden", editar_contenido_orden);
    datos.append("editar_contenido_seccion", editar_contenido_seccion);
    datos.append("editar_contenido_titulo", editar_contenido_titulo);
    document.getElementById('modificar-contenido').disabled = true;
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Contenido editado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_editar_contenido").modal('hide');
                        location.reload();
                    });
                }, 250)
                document.getElementById('modificar-contenido').disabled = false;
            }
        }
    });
});

$(document).on("click", ".eliminar-contenido", function () {
    var formulario_eliminar_contenido_auditoria_usuario = $(this).attr('formulario_eliminar_contenido_auditoria_usuario');
    var formulario_eliminar_contenido_id_contenido = $(this).attr('formulario_eliminar_contenido_id_contenido');
    var datos = new FormData();
    datos.append("formulario_eliminar_contenido_auditoria_usuario", formulario_eliminar_contenido_auditoria_usuario);
    datos.append("formulario_eliminar_contenido_id_contenido", formulario_eliminar_contenido_id_contenido);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-eliminar-contenido").html(respuesta);
        }
    })
});

$(document).on("click", ".borrar-contenido", function () {
    var eliminar_contenido_auditoria_usuario = $("#eliminar_contenido_auditoria_usuario").val();
    var eliminar_contenido_id_contenido = $("#eliminar_contenido_id_contenido").val();
    var datos = new FormData();
    datos.append("eliminar_contenido_auditoria_usuario", eliminar_contenido_auditoria_usuario);
    datos.append("eliminar_contenido_id_contenido", eliminar_contenido_id_contenido);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Contenido eliminado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_eliminar_contenido").modal('hide');
                        location.reload();
                    });
                }, 250)
            }
        }
    });
});

$(document).on("change", "#nuevo_servicio_imagen", function () {
    var nuevo_servicio_imagen = this.files[0];
    if (nuevo_servicio_imagen["type"] != "image/jpeg" && nuevo_servicio_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#nuevo_servicio_imagen").val("");
    }
    else if (nuevo_servicio_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#nuevo_servicio_imagen").val("");
    }
});


$(document).on("click", ".nuevo-servicio", function () {
    var nuevo_servicio_auditoria_usuario = $("#nuevo_servicio_auditoria_usuario").val();
    var nuevo_servicio_auditoria_creado = $("#nuevo_servicio_auditoria_creado").val();
    var nuevo_servicio_imagen = $("#nuevo_servicio_imagen")[0].files[0];
    var nuevo_servicio_titulo = $("#nuevo_servicio_titulo").val();
    if (typeof nuevo_servicio_imagen === "undefined") {
        swal({
            title: "Error al agregar servicio",
            text: "Primero debes subir una imagen en el boton \"Eligir archivo\"!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#nuevo_servicio_imagen").val("");
        return false;
    }else{
        var datos = new FormData();
        datos.append("nuevo_servicio_auditoria_usuario", nuevo_servicio_auditoria_usuario);
        datos.append("nuevo_servicio_auditoria_creado", nuevo_servicio_auditoria_creado);
        datos.append("nuevo_servicio_imagen", nuevo_servicio_imagen);
        datos.append("nuevo_servicio_titulo", nuevo_servicio_titulo);
        // datos.forEach(function(dato) {
        //     console.log(dato);
        // });
        $.ajax({
            url: "vista/ajax/core.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                console.log(respuesta);
                if (respuesta == "Ok") {
                    setTimeout(function () {
                        swal({
                            title: "Registro exitoso",
                            text: "Servicio creado!",
                            type: "success",
                            closeOnConfirm: false,
                            confirmButtonText: "Ok"
                        },
                            function (isConfirm) {
                                alert("Ok");
                            });
                        $(".swal2-confirm").click(function () {
                            $("#modal_eliminar_servicio").modal('hide');
                            location.reload();
                        });
                    }, 250)
                }
            }
        });
    }
});

$(document).on("click", ".editar-servicio", function () {
    var formulario_editar_servicio_auditoria_usuario = $(this).attr('formulario_editar_servicio_auditoria_usuario');
    var formulario_editar_servicio_id = $(this).attr('formulario_editar_servicio_id');
    var datos = new FormData();
    datos.append("formulario_editar_servicio_auditoria_usuario", formulario_editar_servicio_auditoria_usuario);
    datos.append("formulario_editar_servicio_id", formulario_editar_servicio_id);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            $("#formulario-modal-editar-servicio").html(respuesta);
        }
    })
});

$(document).on("change", "#editar_servicio_imagen", function () {
    var editar_servicio_imagen = this.files[0];
    if (editar_servicio_imagen["type"] != "image/jpeg" && editar_servicio_imagen["type"] != "image/png") {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_servicio_imagen").val("");
    }
    else if (editar_servicio_imagen["size"] > 1000000) {
        swal({
            title: "Error al subir la imagen",
            text: "La imagen no debe pesar más de 1MB!",
            type: "error",
            closeOnConfirm: false,
            confirmButtonText: "Ok"
        });
        $("#editar_servicio_imagen").val("");
    }
});


$(document).on("click", ".modificar-servicio", function () {
    var editar_servicio_auditoria_usuario = $("#editar_servicio_auditoria_usuario").val();
    var editar_servicio_id = $("#editar_servicio_id").val();
    var editar_servicio_imagen = $("#editar_servicio_imagen")[0].files[0];
    var editar_servicio_titulo = $("#editar_servicio_titulo").val();
    var datos = new FormData();
    datos.append("editar_servicio_auditoria_usuario", editar_servicio_auditoria_usuario);
    datos.append("editar_servicio_id", editar_servicio_id);
    datos.append("editar_servicio_imagen", editar_servicio_imagen);
    datos.append("editar_servicio_titulo", editar_servicio_titulo);
    $.ajax({
        url: "vista/ajax/core.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log(respuesta);
            if (respuesta == "Ok") {
                setTimeout(function () {
                    swal({
                        title: "Registro exitoso",
                        text: "Servicio modificado!",
                        type: "success",
                        closeOnConfirm: false,
                        confirmButtonText: "Ok"
                    },
                        function (isConfirm) {
                            alert("Ok");
                        });
                    $(".swal2-confirm").click(function () {
                        $("#modal_eliminar_servicio").modal('hide');
                        location.reload();
                    });
                }, 250)
            }
        }
    });
});
