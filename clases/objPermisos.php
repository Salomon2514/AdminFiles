<?php 
ini_set('max_execution_time', '60'); //Raise to 512 MB
class Permisos{ 
  
  
  	var $cadmin;
	var $cnoticias;  
  	var $cnotas_files;
	var $comite_electoral;  
	var $username;  
	
	var $FechaSistema;
	var $Usuario;
	
    var $tabla = "roles";

	
	

function introduce_Permiso($objeto){
 
 	
    $this->cadmin = $objeto->modConfig;
	$this->cnoticias = $objeto->modNoticias;	
	$this->cnotas_files = $objeto->modTransparencia;
	$this->comite_electoral = $objeto->modComite;
	
	$this->username = $objeto->usuario;
	
	$this->Usuario =  $objeto->User;
	$this->FechaSistema = date("y-m-d H:i:s");


} //fin de la función introduce permisos




function Guardar_Permiso(){ 
    
	global $sql;
			
			
			$cols= "username,
					cadmin,
					cnoticias,
					cnotas_files,
					comite_electoral,
					Usuario,
					FechaSistema";
					
			
				$val = "'$this->username', 
						'$this->cadmin',
						'$this->cnoticias',
						'$this->cnotas_files',
						'$this->comite_electoral',
						'$this->Usuario',
						'$this->FechaSistema'";
						
				
			echo "username:_".$this->username."<br>";
			echo "cadmin:_".$this->cadmin."<br>";
			echo "cnoticias:_".$this->cnoticias."<br>";
			echo "cnotas_files:_".$this->cnotas_files."<br>";
			echo "comite_electoral:_".$this->comite_electoral."<br>";
			
			echo "Usuario:_".$this->Usuario."<br>";
			echo "FechaSistema:_".$this->FechaSistema."<br>";

			

			
			$sql->insert($this->tabla,$cols,$val,"");
	

	
} 
//esta función la llama el regisro personales_edicion.php

function Modifica_Permiso(){ 
global $sql;
    
		
			$string = "cadmin='$this->cadmin', 
			cnoticias='$this->cnoticias',
			cnotas_files='$this->cnotas_files',
			comite_electoral='$this->comite_electoral',
			Usuario='$this->Usuario',
			FechaSistema='$this->FechaSistema'";
			

			$update_str = "username='$this->username'";
			$sql->update($this->tabla,"$string","$update_str");



	
} //fin de la función modificar candidato a oferta de la UMIP



	/*function eliminar($id){
			global $sql;
	
				$tb_name="trasnparencia";
				$astriction = "id=$id";
				$sql->del($tb_name,$astriction);
				
   }//Función Eliminar*/

}// fin de la clase 

?>		
?>
