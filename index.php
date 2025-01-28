|<?php
session_start();
include("clases/setting.inc.php");
$sql = new mod_db();
include("validacionUsuario/libreriaVerificarUsuario.php");





$tolog = $_POST["tolog"];


if (!isset($_SESSION["web"]["username"])){
									  
	if (isset($tolog) && ($tolog ="true")){
	//echo "entro aca";
		$user_data = validateUser($_POST);
		 if ($user_data != NULL){
			 $_SESSION["web"]["username"] = $user_data;
			 $_SESSION["web"]["roles"] = getRoles($_SESSION["web"]["username"]["username"]);
			
			redireccionar("portalServicios.php");
		 }//USER DATA != NULL
		 else  {
			 $emsg = 1;
			
			redireccionar("login.php");
			 }
	}else{
		$_SESSION["emsg"] = 1;
		//variable de sesion temporal que guarda mensajes de errores
		redireccionar("login.php");
	
	}
}else if(isset($_SESSION["web"]["username"]) && !empty ($_SESSION["web"]["username"])){
	redireccionar("portalServicios.php"); 
	
}else redireccionar("login.php");

?>