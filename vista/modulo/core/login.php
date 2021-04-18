<?php if(isset($_SESSION["id"])){ echo '<script>window.location = "inicio";</script>'; exit();};?>
<section>
    <div class="container my-3">
        <div class="row">
            <div class="col-12 col-md-6 my-5 offset-md-3">
                <h2 class="my-5 color-texto-contactanos">Ingrese sus datos para inicar sesion</h2>
                <form method="POST">
                    <?php
                        $ingreso = new Core_Controlador();
                        $ingreso -> administrador_ingreso_controlador();
                    ?>
                    <div class="form-group has-feedback">
                        <input type="email" name="ingreso_correo" class="form-control" placeholder="Correo electrónico" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="ingreso_contrasena" class="form-control" placeholder="Contraseña" required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="login-box-msg mx-4">
                            <a href="recuperar-contrasena">Recuperar contraseña</a>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <button type="submit" class="btn btn-success pull-right">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>