<?php
require_once "modelo/ruta.php";
require_once "modelo/core.php";

require_once "controlador/ruta.php";
require_once "controlador/core.php";
require_once "controlador/plantilla.php";

$GLOBALS["raiz"] = Ruta_Controlador::raiz_controlador();
$GLOBALS["fecha"] = Ruta_Controlador::fecha_controlador();

$plantilla = new Plantilla_Controlador();
$plantilla -> plantilla();
