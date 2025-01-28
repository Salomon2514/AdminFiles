<?PHP
session_start();  
	
		include("clases/setting.inc.php");
		$sql = new mod_db();
		
		include("comunes/libreriaFicheros.php");

	
  		include("clases/objArchivosPDFUnload.php"); 
  		$MyArchivo = new UnloadaArchivos ();
	
	
		$id=$_REQUEST['id'];
		
		
		$consulta = "select * from adminarchivospdf  where id ='$id'";	
		$numb = $sql->nums($consulta);
		
		if (!empty($numb)){
		
		$bu = $sql->objects($consulta);
		$ruta = $bu->Ruta."/".$bu->Archivo;
				
				if (file_exists($ruta)){
				eliminarFichero($ruta);

				}	
		
		$MyArchivo->eliminar($id);
		
		}
		
		
		//echo "Se ha eliminado la especialidad  Satisfactoriamente";

	
	
?>