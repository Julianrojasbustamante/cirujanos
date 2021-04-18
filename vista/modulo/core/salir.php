<?php

session_destroy();

echo '<script type="text/javascript">
var pagina = "inicio";
var segundos = 0;
function redireccion() {
    document.location.href=pagina;
}
setTimeout("redireccion()",segundos);
</script>';
