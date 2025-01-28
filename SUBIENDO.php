<?PHP
include("bloqueSeguridad.php");
header('Content-Type: text/html; charset=UTF-8');
include("clases/setting.inc.php");
$sql = new mod_db();
include("clases/objArchivosUnload.php");
$MyArchivo = new UnloadaArchivos();	
						
							
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaFicheros.php");
	include("comunes/libreriaFechas.php");
	include("comunes/libreriaNoticias.php");
	
	include("comunes/libreriaSubirArchivos.php");
	/*Thumbnail de la imagen*/
	include("objthumbnailImagenes.php"); 	
	$Mythumbnail = new thumImagenes();

	if (isset($_FILES["archivo"]['size'])){
		$tamano = $_FILES["archivo"]['size'];						 
	 } else $tamano = 0;

	
	
	
	if (isset($_FILES["archivo"]['type'])){
		$tipo = $_FILES["archivo"]['type'];					 
	 } else $tipo = "";

	//echo $tipo."<br>";
	
	
	
	if (isset($_FILES["archivo"]['name'])){
		$archivo = $_FILES["archivo"]['name'];
		$archivo = quitar_tildes($archivo);
		$archivo = EliminandoCaracteresdeInyeccion($archivo);
		
		//echo "cad result:::::._".$archivo."<br>";
	 } else $archivo = "";
	
	//$enlace = $_POST['enlace'];
	if (isset($_POST['carpeta'])){
		$enlace = $_POST['carpeta'];					 
	 } else $enlace = "";
	
	
		//$enlace = $_POST['enlace'];

	
	$mCarpeta = "";

	
	//if (($tipo == "application/pdf") || ($tipo == "image/jpeg") ||  ($tipo == "image/gif"))
	if (($tipo == "image/jpeg") ||  ($tipo == "image/gif") || ($tipo == "image/png"))
		$tipoArchivo = 1;
	else $tipoArchivo = 0;

	//echo "la acción es: ".$_POST["Accion"]."<br>"; 

	if (isset($_POST["Accion"]))
		if (($_POST["Accion"] == "Guardar") and ($enlace > 0) and (($archivo != "") and ($tipoArchivo == 1))) {
			
		//echo "ENTRÓ A LA OPCIÓN GUARDAR <br>";
			
			//	$anio = $_POST["anio"];
			if (isset($_POST['anio']))
				$anio = $_POST['anio'];
			else $anio = 0;
			
			$mCarpeta = AsignarCarpeta($enlace, $anio);	
			
			
			
			chmod("AdminArchivos/".$mCarpeta."/",0777);
			$ruta = "";
			//echo "el archivo trae ".$archivo."<br>";
			$destino =  "AdminArchivos/".$mCarpeta."/".$archivo;
			//echo "mcarpeta ".$mCarpeta."<br>";
			$ruta = "AdminArchivos/".$mCarpeta;
			
			//echo "rutas: ".$ruta."<br>";
			
			
			if ($_FILES["archivo"]["error"] == UPLOAD_ERR_OK ){
			
					if (copy($_FILES['archivo']['tmp_name'],$destino)) {
						$status = "Archivo subido exitosamente: ".$archivo."<br /><br /><br />";
							
							$objeto =  Objeto($_POST);
							
							
							$MyArchivo->introduce_Archivos($objeto,$archivo,$ruta);
							$MyArchivo->Guardar_Archivos();
							$idImagen =  $sql->insert_id();
							//traer el id de la imagen
							
							//////////////////////////////////////////////////////
							
							/////////////////////////////////////////////////////
							$imgPates = explode(".", $_FILES["archivo"]["name"]);
							$ImgName = $imgPates[0];
							
							$ImgExt = tipoImagen($_FILES["archivo"]["type"]);
							
							//echo "la extensión es:".$ImgExt."<br>";
							if (file_exists($destino)) {
								//hay que cambiarle el nombre
								$prefijo = substr(md5(uniqid(rand())),0,5);
								//$name_archivo =  $prefijo."_".$name_archivo;
								$archivo =  $ImgName."_".$prefijo.$ImgExt;
							}//file_exists
							
							echo "el archivo que se esta subiendo es: ".$archivo."<br>";
							$tipo = $_FILES["archivo"]["type"];
							$Mythumbnail->introduce_imagen($destino,$archivo,$tipo,5,0,$idImagen);
							$Mythumbnail->crear_thumbnail();
							
							$FechaSistema = date("y-m-d H:i:s");
					}//fin de copy files archivo
			}else{
				 $status = tipoError($_FILES['archivo']['error']);

			}//end $_FILES['archivo]['error '] == UPLOAD_ERR_OK)
					
					
	}elseif (($_POST["Accion"] == "Modificar") && ($_FILES['archivo']['error'] == UPLOAD_ERR_OK ) && ($_FILES['archivo']['tmp_name'] != "")){


			if (isset($_POST['id'])){
			$id = $_POST['id'];					 
	 		} else $id = 0;

			
			//echo "entro acá en modifica con subir archivos.<br>";
			if (isset($_POST['anio']))
				$anio = $_POST['anio'];
			else $anio = 0;
			
			$mCarpeta = AsignarCarpeta($enlace, $anio);
			
			chmod("AdminArchivos"."/".$mCarpeta."/",0777);
			$ruta = "";
			
			$destino =  "AdminArchivos/".$mCarpeta."/".$archivo;
			$ruta = "AdminArchivos/".$mCarpeta;
			
				
			if (copy($_FILES['archivo']['tmp_name'],$destino)) {
				$status = "Archivo subido exitosamente: ".$archivo."<br /><br /><br />";
							
				$objeto =  Objeto($_POST);
				
				eliminarFichero($objeto->ruta."/".$objeto->ArchivoSubido);
				eliminarFichero("thumbnail/".$objeto->timg1_4);
				//echo "el archivo es: ".$archivo."<br>";
				//echo "La ruta es: ".$ruta."<br>";
				$MyArchivo->introduce_Archivos($objeto,$archivo,$ruta);
				$MyArchivo->Modifica_UnloadArchivos();
				
				
							$imgPates = explode(".", $_FILES["archivo"]["name"]);
							$ImgName = $imgPates[0];
							
							$ImgExt = tipoImagen($_FILES["archivo"]["type"]);
							
							
							if (file_exists($destino)) {
								//hay que cambiarle el nombre
								$prefijo = substr(md5(uniqid(rand())),0,5);
								//$name_archivo =  $prefijo."_".$name_archivo;
								$archivo =  $ImgName."_".$prefijo.$ImgExt;
							}//file_exists
							
							//echo "el archivo es: ".$archivo."<br>";
							$tipo = $_FILES["archivo"]["type"];
							$Mythumbnail->introduce_imagen($destino,$archivo,$tipo,5,0,$id);
							$Mythumbnail->crear_thumbnail();
							
				
			}//fin de copy files archivo
		
	}elseif (($_POST["Accion"] == "Modificar") && ($_FILES['archivo']['tmp_name'] == "")){
		
							
				$objeto =  Objeto($_POST);
							
							
				$MyArchivo->AjustesModificacion_sinRuta($objeto);
				$MyArchivo->Modifica_Archivos__sinRuta();
							
				$status = "Se han Modificado los datos del formulario, o se ha movido  a otra carpeta el archivo. <br />"; 
	
	}else {
	
					$status = "No es un archivo PDF, Revise la extensión del documento.";
					//echo $status."<br>";
	}//archivo!="" text/plain
	
	
$_SESSION['statusArchivo']  = $status;


redireccionar("UnloadArchivosAdmin.php");
			
?>