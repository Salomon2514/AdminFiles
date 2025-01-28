<?php 
ini_set('max_execution_time', '60'); //Raise to 512 MB
class Usuario{ 
  
  
  	var $username;
	var $pass;  
	var $nombre;
	var $apellido;
	var $email;
	var $tipo;
	var $activo;
	var $fechaingreso;
	
	
    var $tabla = "usuarios";

	
	

function introduce_usuario($objeto){
 
 
 //si es modificar el username va a ser la clave
 	
    $this->username = ($objeto->usuario);
	$this->pass = ($objeto->clave);
	$this->pass  = md5($this->pass); //cambiohechopara impedir el acceso hasta el lunes

	$this->nombre = ($objeto->nombre);
	$this->apellido = $objeto->apellido;
	$this->email = $objeto->email;
	
	
	
	if ($objeto->administrador == 1)
	$UserTipo = "admin";
	else $UserTipo = "user";
	
	$this->tipo =  $UserTipo;
	$this->activo = $objeto->activar;
	
	
	$this->FechaSistema = date("y-m-d H:i:s");
	$this->Usuario = $objeto->User;

	//echo "el id es:".$this->id."<br>";
	//echo "el Usuario es:".$this->Usuario."<br>";
	//echo "el FechaSistema es:".$this->FechaSistema."<br>";
	//echo "el Publicar es:".$this->Publicar."<br>";
	//echo "el FechaSubida es:".$this->FechaSubida."<br>";
	//echo "el Nombre es:".$this->Nombre."<br>";
	//echo "el Enlace es:".$this->Enlace."<br>";
	//echo "el Anio es:".$this->Anio."<br>";

} //fin de la función introduce datos


function Guardar_Transparencia(){ 
    
	global $sql;
			
			
			$cols= "username,
					password,
					nombre,
					apellido,
					email,
					tipo,
					activo,
					Usuario";
					
				
					
			
				$val = "'$this->username',
						'$this->pass',
						'$this->nombre',
						'$this->apellido',
						'$this->email',
						'$this->tipo',
						'$this->activo',
						'$this->Usuario'";
						
				
			echo "username:_".$this->username."<br>";
			echo "password:_".$this->pass."<br>";
			echo "nombre:_".$this->nombre."<br>";
			echo "apellido:_".$this->apellido."<br>";
			echo "email:_".$this->email."<br>";

			echo "tipo:_ ".$this->tipo."<br>";
			echo "activo:_".$this->activo."<br>";
			echo "Usuario:_ ".$this->Usuario."<br>";

			
			$sql->insert($this->tabla,$cols,$val,"");
	

	
} 

function Modifica_Usuario(){
	global $sql;
	
			$string = "nombre='$this->nombre',
			apellido='$this->apellido',
			email='$this->email',
			tipo='$this->tipo',
			activo='$this->activo',
			Usuario = '$this->Usuario'";
		
			

			$update_str = "username='$this->username'";
			$sql->update($this->tabla,"$string","$update_str");
}


function ModificarPass($pass,$username){
	global $sql;
	
	
		$pass  = md5($pass); //cambiohechopara impedir el acceso hasta el lunes

	
		$string = "password='$pass'";
		
		$update_str = "username='$username'";
		$sql->update("usuarios","$string","$update_str");
}

//esta función la llama el regisro personales_edicion.php


	/*function eliminar($id){
			global $sql;
	
				$tb_name="trasnparencia";
				$astriction = "id=$id";
				$sql->del($tb_name,$astriction);
				
   }//Función Eliminar*/

}// fin de la clase 

?>		
?>
