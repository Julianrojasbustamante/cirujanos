<?php 
    session_start();
?>
<section class="color-seccion-encabezado">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-5 text-white align-self-center espacio-entre-parrafo mb-2 text-center">
          <h1 class="font-weight-bold">DR. LUIS H. GONZÁLEZ</h1>
          <p class="tamanio-texto-subparrafo-cirujano">Cirujano Plástico</p>
      </div>
      <div class="col-12 col-md-5 text-center d-md-flex align-items-md-center">
        <div>
          <a class="btn color-boton" href="#" role="button">AGENDE SU CITA AHORA</a>
        </div>
        <div class="espacio-entre-parrafo-boton text-white p-md-2 mt-md-2">
          <p><a href="https://wa.me/573155268925?text=Hola%20deseo%20mas%20informacion" target="_blank" rel="noopener noreferrer" class="text-white">3155268925</a> | <a href="tel:+573116352257" target="_blank" rel="noopener noreferrer" class="text-white">3116352257</a> <i class="fas fa-mobile-alt"></i></p>
          <p><a href="tel:+5725546481" target="_blank" rel="noopener noreferrer" class="text-white">(572)554 6481</a> | <a href="tel:+5725510862" target="_blank" rel="noopener noreferrer" class="text-white">551 0862</a> <i class="fas fa-phone"></i></p>
        </div>
      </div>
      <div class="col-12 col-md-2 text-white text-center">
        <div class="espacio-entre-parrafo mb-2 mt-4">
            <?php
            if(isset($_SESSION["id"]) || isset($_SESSION["identificador_cliente"])){
              // echo '<a href="'.$GLOBALS["raiz"].'salir" title="cerrar sesion" class="btn-xs text-white espaciado-elemento-menu"><i class="fas fa-power-off"></i></a>';
              $perfil_usuario = Core_Controlador::perfil_usuario_controlador();
              echo'<a title="cerrar sesion" class="btn btn-danger btn-sm" href="'.$GLOBALS["raiz"].'salir" role="button">Cerrar sesion</a>';
            }
            ?>
        </div>
        <div class="espacio-entre-parrafo mb-4">
          <!-- <p>Síguenos en:</p>
          <a href="https://es-la.facebook.com" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-square tamanio-icono-redes"></i></a>
          <a href="https://twitter.com/explore" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter-square tamanio-icono-redes"></i></a>
          <a href="https://www.google.es" target="_blank" rel="noopener noreferrer"><i class="fab fa-google-plus-square tamanio-icono-redes"></i></a> -->
          <p class="">Síguenos en: <a href="https://www.instagram.com/drluishgonzalez/" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram tamanio-icono-redes"></i></a></p>
        </div>
        <div class="espacio-entre-parrafo mb-4"> 
          <!-- <p>Idioma</p>
          <p>Español / Ingles</p> -->
          <div>
            <!-- <a href="#!"><img class="tamanio-svg-idioma img-fluid mx-3" src="vista/img/espanol.svg" alt="Idioma español"></a>
            <img class="tamanio-svg-idioma img-fluid mx-3" src="vista/img/ingles.svg" alt="Idioma ingles"> -->
            <i class="fa fa-language tamanio-icono-idioma" aria-hidden="true"></i> Español | Inglés
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
  include "vista/modulo/core/menu.php";
?>
