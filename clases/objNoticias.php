<?php 
ini_set('max_execution_time', '60'); //Raise to 512 MB
class Noticias{ 
    var $Titulo;
	var $Contenido;  
	var $Fecha;
	var $Tipo;
	
    var $Publicar;
	
	var $Anio;
	var $Mes;
	var $Dia;
	
	var $tabla;
	var $id;
	var $FechaSistema;
	var $Usuario;
	


	
	

function introduce_Noticia($objeto){
 
 
 	$this->tabla = "noticias";
    $this->Titulo = utf8_decode($objeto->titulo);
	//echo $this->Titulo."<br>";
	$this->Contenido =utf8_decode($objeto->contenido);
	
	
	$this->Fecha = orden2($objeto->date3);
	$objetoFecha = FechaObjetoInvert($objeto->date3);
	
	$this->Anio = $objetoFecha->anio;
	$this->Mes = $objetoFecha->mes;
	$this->Dia = $objetoFecha->dia;
	
	
	$this->Tipo = $objeto->tipo;
	$this->Publicar = $objeto->activo;
	
	
	
	$this->FechaSistema = date("y-m-d H:i:s");
	$this->Usuario = $objeto->Usuario;
	
	if (!empty($objeto->id))
	$this->id = $objeto->id;
	else $this->id = 0;	
	


} //fin de la función introduce datos

function Guardar_Noticia(){ 
    
	global $sql;

			//falta el usuario
			
			$cols= "titulo,
					contenido,
					fecha,
					tipo,
					activo,
					Anio,
					Mes,
					Dia,
					Usuario,
					FechaSistema";
					
			
				$val = "'$this->Titulo',
						'$this->Contenido',
						'$this->Fecha',
						'$this->Tipo',
						'$this->Publicar',
						'$this->Anio',
						'$this->Mes',
						'$this->Dia',
						'$this->Usuario',
						'$this->FechaSistema'";
						
			
				$sql->insert($this->tabla,$cols,$val,"");
	

			
			//ACCIONES($this->Usuario,"Guardar",$this->idRegistro,$tabla_Afectada);
	
} 
//esta función la llama el regisro personales_edicion.php

function Modifica_Noticia(){ 
global $sql;
    
		
			$string = "titulo='$this->Titulo',
			contenido='$this->Contenido',
			fecha='$this->Fecha',
			tipo='$this->Tipo',
			activo='$this->Publicar',
			Anio='$this->Anio',
			Mes='$this->Mes',
			Dia = '$this->Dia',
			Usuario='$this->Usuario',
			FechaSistema = '$this->FechaSistema'";
			

			$update_str = "id='$this->id'";
			$sql->update($this->tabla,"$string","$update_str");



	
} //fin de la función modificar candidato a oferta de la UMIP

}// fin de la clase 

?>		
?>
