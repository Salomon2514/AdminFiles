<?php 
/*session_start();
session_destroy();*/

// Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!
session_start();
// Destruir todas las variables de sesión.
$_SESSION = array();
//$_SESSION["emsg"] = 2;
if (!isset($_SESSION["emsg"]))
 $_SESSION["emsg"] = 2;

?>