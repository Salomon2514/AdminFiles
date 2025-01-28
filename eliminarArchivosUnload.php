<?PHP
session_start();  
	
		include("clases/setting.inc.php");
		$sql = new mod_db();
		
		include("comunes/libreriaFicheros.php");

	
  		include("clases/objArchivosUnload.php");
  		$MyArchivo = new UnloadaArchivos ();
	
	
		$id=$_REQUEST['id'];
		
		
		$consulta = "select * from adminarchivos  where id ='$id'";	
		$numb = $sql->nums($consulta);
		
		if (!empty($numb)){
		
		$bu = $sql->objects($consulta);
		$ruta = $bu->Ruta."/".$bu->Archivo;
		$rutathumbnail = "thumbnail/".$bu->timg1_4;
				
				if (file_exists($ruta)){
				eliminarFichero($ruta);
				eliminarFichero($rutathumbnail);

				}	
		
		$MyArchivo->eliminar($id);
		
		}
		
		
		//echo "Se ha eliminado la especialidad  Satisfactoriamente";

	
	
?>