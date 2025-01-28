<?PHP error_reporting(E_ALL);
ini_set('max_execution_time', 600); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php

	//MODIFICACIONES REALIZADAS EL VIERNES 23 DE ENERO DEL 2009 PARA LA GLORIA DEL SE�OR.
	include("clases/setting.inc.php");
		$sql = new mod_db();
	
	include("clases/objUsuarios.php");
	include("clases/objPermisos.php");
	
	$MyUsuario = new Usuario();	
	$MyPermiso = new Permisos();	
	
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaFicheros.php");
	include("comunes/libreriaFechas.php");
	include("comunes/libreriaNoticias.php");
	
	
	$objeto =  Objeto($_POST);
 
	
	if ($objeto->Accion != ""){
	
   		switch($objeto->Accion){
   			case "Guardar":
   					//echo "LA ACCI�N ES GUARDAR <br>";
					$MyUsuario->introduce_usuario($objeto);
					$MyUsuario->Guardar_Transparencia();
					
					
					$MyPermiso->introduce_Permiso($objeto);
					$MyPermiso->Guardar_Permiso();
					
					
				 
     			 break;
   			case "Modificar":
   					echo "LA OPCI&Oacute;N ES MODIFICAR <br>";
					$MyUsuario->introduce_usuario($objeto);
					$MyUsuario->Modifica_Usuario();
					
					
					$MyPermiso->introduce_Permiso($objeto);
					$MyPermiso->Modifica_Permiso();
				
				
     			 break;
  		   default:
     				print ("Error en el sistema M&oacute;dulo de Usuarios!!!");
     				break;
		} //FIN DEL SWITCH
		
		} else {
		echo "No entro en las opciones habituales de guardar y modificar del M&oacute;dulo de Usuarios <br>";
		
		}  
	



	redireccionar("Usuarios.php");
		
			
?>