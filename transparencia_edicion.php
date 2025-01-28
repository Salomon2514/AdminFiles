<?PHP error_reporting(E_ALL);
ini_set('max_execution_time', 600); 
?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php

	//MODIFICACIONES REALIZADAS EL VIERNES 23 DE ENERO DEL 2009 PARA LA GLORIA DEL SE�OR.
	include("clases/setting.inc.php");
		$sql = new mod_db();
	include("clases/objTranparencia.php");
	$MyTransparencia = new Transparencia();	
	
	
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaFicheros.php");
	include("comunes/libreriaFechas.php");
	include("comunes/libreriaNoticias.php");
	
	
	$objeto =  Objeto($_POST);
 
	
	if ($objeto->Accion != ""){
	
   		switch($objeto->Accion){
   			case "Guardar":
   					//echo "LA ACCI�N ES GUARDAR <br>";
					$MyTransparencia->introduce_Transparencia($objeto);
					$MyTransparencia->Guardar_Transparencia();
					$idNoticias = $sql->insert_id();
				 
     			 break;
   			case "Modificar":
   					echo "LA OPCI�N ES MODIFICAR <br>";
					$MyTransparencia->introduce_Transparencia($objeto);
					$MyTransparencia->Modifica_Transparencia();
					$idTransparencia =  $objeto->id;
				
				
     			 break;
  		   default:
     				print ("Error en el sistema M&oacute;dulo de Transparencia!!!");
     				break;
		} //FIN DEL SWITCH
		
		} else {
		echo "No entro en las opciones habituales de guardar y modificar del M&oacute;dulo de Transparencia <br>";
		
		}  //
	








			redireccionar("noticias.php");
		
			
?>