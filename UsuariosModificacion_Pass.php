<?PHP error_reporting(E_ALL);
ini_set('max_execution_time', 600); 
?>

<meta charset="UTF-8">
<?php

	//MODIFICACIONES REALIZADAS EL VIERNES 23 DE ENERO DEL 2009 PARA LA GLORIA DEL SE�OR.
	include("clases/setting.inc.php");
		$sql = new mod_db();
	
	include("clases/objUsuarios.php");
	
	$MyUsuario = new Usuario();	
	
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaNoticias.php");
	
	
	$objeto =  Objeto($_POST);

	$MyUsuario->ModificarPass($objeto->clave,$objeto->username);
	redireccionar("Usuarios.php");
		
			
?>