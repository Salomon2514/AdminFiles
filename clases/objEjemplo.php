<?php 

class thumImagenes{ 
    var $thumDir;
	var $ThumPrefijo;  
	
	
    var $ImgRuta; 
    var $ImgNombre; 
    var $EscalaThumb;
	var $ImgTipo;

	
	

function introduce_imagen($imgRuta, $imgNombre,$imgTipo,$escalaThumb){
 
    $this->thumDir =Mayuscula($objeto->cedula);
	$this->ThumPrefijo =Mayuscula($objeto->nombre);
	
	
	$this->ImgRuta = $imgRuta;
	$this->ImgNombre = $imgNombre;
	$this->EscalaThumb = $escalaThumb;
	$this->ImgTipo = $imgTipo;
	
	


} //fin de la función introduce datos

function crear_thumbnail(){ 
    
	global $sql;
			
			
			
			
			//falta el usuario
			$tabla = "datospersonales";
			$cols= "Cedula,Nombre,Apellido,Nacionalidad,
					Sexo,EstadoCivil,Direccion,
					DirecionResidencial,Email1,Email2,
					Telefono1,Telefono2,Celular,
					ssocial,FechaNacimiento";
			
			$val = "'$this->Cedula',
			'$this->Nombre',
			'$this->Apellido',
			'$this->Nacionalidad',
			'$this->Sexo',
			'$this->EstadoCivil',
			'$this->Direccion',
			'$this->DirecionResidencial',
			'$this->Email1',
			'$this->Email2',
			'$this->Telefono1',
			'$this->Telefono2',
			'$this->Celular',
			'$this->ssocial',
			'$this->FechaNacimiento'";
			$sql->insert("datospersonales",$cols,$val,"");
	

			$tabla_Afectada = "datospersonales";
			//ACCIONES($this->Usuario,"Guardar",$this->idRegistro,$tabla_Afectada);
	
} 
//esta función la llama el regisro personales_edicion.php

function modificar_candidato(){ 
global $sql;
    
	//MODIFICA EL CONTENIDO DE LA VARIABLE USUARIOS DE LOGÍSICA:
		$fecha = fecha_invertida_sinNomenclatura();
		
			$string = "Cedula='$this->Cedula',
			Nombre='$this->Nombre',
			Apellido='$this->Apellido',
			Edad='$this->Edad',
			Nacionalidad='$this->Nacionalidad',
			Sexo='$this->Sexo',
			EstadoCivil='$this->EstadoCivil',
			Direccion='$this->Direccion',
			DirecionResidencial = '$this->DirecionResidencial',
			Email1='$this->Email1',
			Email2='$this->Email2',
			Telefono1='$this->Telefono1',
			Telefono2='$this->Telefono2',
			Celular='$this->Celular',
			FechaNacimiento ='$this->FechaNacimiento',
			ssocial ='$this->ssocial',
			idRegistroMoficador	='$this->idRegistroMoficador',
			FechaModificacion ='$fecha'";
	

			$update_str = "id='$this->id'";
			$sql->update("datospersonales","$string","$update_str");


			$tabla_Afectada = "datospersonales";
			ACCIONES($this->Usuario,"Modificar",$this->idRegistro,$tabla_Afectada);

	
} //fin de la función modificar candidato a oferta de la UMIP

}// fin de la clase 

?>		
?>
