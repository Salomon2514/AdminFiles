<?PHP 
ini_set('max_execution_time', '60'); //Raise to 512 MB

class UnloadaArchivos{ 
  
  
  	var $Nombre;
	var $Carpeta;  
	var $FechaSubida;

	var $id;
	
	var $FechaSistema;
	var $Usuario;
	
	var $Publicar;
	
	var $Anio;
	var $Archivo;
	var $Ruta;
	
    var $tabla = "adminarchivospdf";

	
	

function introduce_Archivos($objeto,$archivo,$ruta){
 
 
 	
    $this->Nombre = utf8_decode($objeto->Documento);
	$this->Carpeta = ($objeto->carpeta);
	
	
	$this->FechaSubida = orden2($objeto->date3);
	$this->Anio = $objeto->anio;
	$this->Publicar = $objeto->publicar;
	
	
	
	$this->FechaSistema = date("y-m-d H:i:s");
	$this->Usuario = $objeto->Usuario;
	
	$this->Archivo = utf8_decode($archivo);
	//echo "el archivo esddd clase según: ".$this->Archivo."<br>";
	$this->Ruta = ($ruta);
	$this->id = $objeto->id;
	//echo "hola la ruta es: ".$ruta."<br>";

} //fin de la función introduce datos

function AustesModificacion($objeto,$ruta){
	
	
	$this->Nombre = utf8_decode($objeto->Documento);
	$this->Carpeta = ($objeto->carpeta);
	$this->FechaSubida = orden2($objeto->date3);
	$this->Anio = $objeto->anio;
	$this->Publicar = $objeto->publicar;
	$this->FechaSistema = date("y-m-d H:i:s");
	$this->Usuario = $objeto->Usuario;
	$this->id = $objeto->id;
	
	$this->Ruta = ($ruta);


	//echo "el id es:".$this->id."<br>";
	//echo "el Usuario es:".$this->Usuario."<br>";
	//echo "el FechaSistema es:".$this->FechaSistema."<br>";
	//echo "el Publicar es:".$this->Publicar."<br>";
	//echo "el FechaSubida es:".$this->FechaSubida."<br>";
	//echo "el Nombre es:".$this->Nombre."<br>";
	//echo "el Enlace es:".$this->Enlace."<br>";
	//echo "el Anio es:".$this->Anio."<br>";
}

function AjustesModificacion_sinRuta($objeto){
	
	
	$this->Nombre = utf8_decode($objeto->Documento);
	//$this->Enlace = ($objeto->enlace);
	$this->FechaSubida = orden2($objeto->date3);
	$this->Anio = $objeto->anio;
	$this->Publicar = $objeto->publicar;
	$this->FechaSistema = date("y-m-d H:i:s");
	$this->Usuario = $objeto->Usuario;
	$this->id = $objeto->id;
	


	//echo "el id es:".$this->id."<br>";
	//echo "el Usuario es:".$this->Usuario."<br>";
	//echo "el FechaSistema es:".$this->FechaSistema."<br>";
	//echo "el Publicar es:".$this->Publicar."<br>";
	//echo "el FechaSubida es:".$this->FechaSubida."<br>";
	//echo "el Nombre es:".$this->Nombre."<br>";
	//echo "el Enlace es:".$this->Enlace."<br>";
	//echo "el Anio es:".$this->Anio."<br>";
}


function Guardar_Archivos(){ 
    
	global $sql;
			
			
			$cols= "Nombre,
					Carpeta,
					FechaSubida,
					Usuario,
					FechaSistema,
					Anio,
					Ruta,
					Archivo,
					Publicar";
				
					
			
				$val = "'$this->Nombre',
						'$this->Carpeta',
						'$this->FechaSubida',
						'$this->Usuario',
						'$this->FechaSistema',
						'$this->Anio',
						'$this->Ruta',
						'$this->Archivo',
						'$this->Publicar'";
				
			//echo "nombre:_".$this->Nombre."<br>";
			//echo "Enlace:_".$this->Enlace."<br>";
			//echo "FechaSubida:_".$this->FechaSubida."<br>";
			//echo "Usuario:_".$this->Usuario."<br>";
			//echo "Anio:_".$this->Anio."<br>";

			//echo "Ruta:_ ".$this->Ruta."<br>";
			//echo "Archivo:_".$this->Archivo."<br>";
			//echo "Publicar:_ ".$this->Publicar."<br>";

			
			$sql->insert($this->tabla,$cols,$val,"");
	

	
} 
//esta función la llama el regisro personales_edicion.php

function Modifica_Archivos(){ 
global $sql;
    
		
			$string = "Nombre='$this->Nombre',
			Carpeta='$this->Carpeta',
			FechaSubida='$this->FechaSubida',
			Usuario='$this->Usuario',
			FechaSistema='$this->FechaSistema',
			Anio='$this->Anio',
			Ruta = '$this->Ruta',
			Publicar = '$this->Publicar'";
		
			

			$update_str = "id='$this->id'";
			$sql->update($this->tabla,"$string","$update_str");



	
} //fin de la función modificar candidato a oferta de la UMIP


function Modifica_Archivos__sinRuta(){ 
global $sql;
    
		
			$string = "Nombre='$this->Nombre',
			FechaSubida='$this->FechaSubida',
			Usuario='$this->Usuario',
			FechaSistema='$this->FechaSistema',
			Anio='$this->Anio',
			Publicar = '$this->Publicar'";
		
			

			$update_str = "id='$this->id'";
			$sql->update($this->tabla,"$string","$update_str");



	
} //fin de la función modificar candidato a oferta de la UMIP

function Modifica_UnloadArchivos(){ 
global $sql;
    
		
			$string = "Nombre='$this->Nombre',
			Carpeta='$this->Carpeta',
			FechaSubida='$this->FechaSubida',
			Usuario='$this->Usuario',
			FechaSistema='$this->FechaSistema',
			Anio = '$this->Anio',
			Ruta = '$this->Ruta',
			Archivo = '$this->Archivo',
			Publicar = '$this->Publicar'";
		
			

			$update_str = "id='$this->id'";
			$sql->update($this->tabla,"$string","$update_str");

	
} //fin de la función modificar candidato a oferta de la UMIP
	function eliminar($id){
			global $sql;
	
				$tb_name="adminarchivospdf";
				$astriction = "id=$id";
				$sql->del($tb_name,$astriction);
				
   }//Función Eliminar

}// fin de la clase 

?>		
