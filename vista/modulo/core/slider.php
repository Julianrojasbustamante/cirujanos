<section>
    <div class="container-fluid">
<?php 
    
    $slider = new Core_Controlador();
    $slider -> slider_controlador();
    if(isset($_SESSION["id"])){ 
        echo '<div class="content mx-4">
            <div class="row">
                <button type="button" formulario_agregar_slider_auditoria_usuario="'.$_SESSION["id"].'" formulario_agregar_slider_auditoria_creado="'.$GLOBALS["fecha"].'" class="btn btn-info agregar-slider" data-toggle="modal" data-target="#modal_agregar_slider"><i class="fas fa-plus"></i></button>
                <button type="button" formulario_editar_slider_auditoria_usuario="'.$_SESSION["id"].'" formulario_editar_slider_auditoria_creado="'.$GLOBALS["fecha"].'" class="btn btn-success editar-slider" data-toggle="modal" data-target="#modal_editar_slider"><i class="fa fa-edit"></i></button>
                <button type="button" formulario_eliminar_slider_auditoria_usuario="'.$_SESSION["id"].'" class="btn btn-danger eliminar-slider" data-toggle="modal" data-target="#modal_eliminar_slider"><i class="fa fa-trash-o"></i></button>
            </div>
        </div>';
    }
?>
    </div>
</section>
<div id="modal_editar_slider" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--color-principal); color:white">
                <h4 class="modal-title">Editar slider</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body">
                    <div class="box-body" id="formulario-modal-editar-slider">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<div id="modal_eliminar_slider" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--color-principal); color:white">
                <h4 class="modal-title">Eliminar slider</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body">
                    <div class="box-body" id="formulario-modal-eliminar-slider">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<div id="modal_agregar_slider" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--color-principal); color:white">
                <h4 class="modal-title">Añadir imagen al slider</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body">
                    <div class="box-body" id="formulario-modal-agregar-slider">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
                <button type="submit" class="btn btn-success pull-right agregar-imagen-slider">Enviar</button>
            </div>
        </div>
    </div>
</div>