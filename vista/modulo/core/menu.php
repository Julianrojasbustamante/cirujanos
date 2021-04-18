<section class="color-seccion-menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg d-flex justify-content-end">
                    <button class="navbar-toggler navbar-light color-boton-borde-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <?php
                                $listado_menu = Core_Controlador::menu_controldor();
                                if(isset($_SESSION["id"])){
                                    echo '<li class="nav-item">
                                        <a class="nav-link"  href="#"><button type="button" formulario_editar_menu_auditoria_usuario="'.$_SESSION["id"].'" formulario_editar_menu_auditoria_modificado="'.$GLOBALS["fecha"].'" formulario_editar_menu_raiz="'.$GLOBALS["raiz"].'" class="btn btn-success editar-menu" data-toggle="modal" data-target="#modal_editar_menu"><i class="fa fa-edit"></i></button><button type="button" formulario_eliminar_menu_auditoria_usuario="'.$_SESSION["id"].'" class="btn btn-danger eliminar-menu" data-toggle="modal" data-target="#modal_eliminar_menu"><i class="fa fa-trash-o"></i></button></a>
                                    </li>';
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>
<div id="modal_editar_menu" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--color-principal); color:white">
                <h4 class="modal-title">Editar menù</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <div class="box-body" id="formulario-modal-editar-menu">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<div id="modal_eliminar_menu" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background:var(--color-principal); color:white">
                <h4 class="modal-title">Eliminar menù</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body">
                    <div class="box-body" id="formulario-modal-eliminar-menu">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>