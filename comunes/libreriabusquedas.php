<?php
function Declaracion_Entero($variable){
$varEntero = 0;

 if (is_numeric($variable) and ($variable >0) and isset($variable)){
	 return($variable);
 }else  return($varEntero);
 

}

function Declaracion_Variable($variable){
	$variable = trim($variable);
	if (isset($variable) and  ($variable != ""))
			$var_nombre = $variable;
				else
					$var_nombre= "";
					
	
	return($var_nombre);

	
}//fin de la funci�n Declaraci�n_Variable
 

function DependiendoDelTipoComparacion($campo,$valor,$valor2,$TipoComparacion){
	//DependiendoDelTipoComparaci�n:::--------::::::
	switch ($TipoComparacion){
		case 1: {
		//= mysql> SELECT * FROM tabla WHERE campo = 1;
		//Esta condici�n dentro de par�ntesis manda error al ejecutar la consulta
				$condicion = "$campo = $valor";
		break;
		}
		case 2: {
		//>mysql> SELECT * FROM tabla WHERE campo > 12;
				$condicion = "$campo > $valor";

		break;
		}
		case 3:  {
		//mysql> SELECT * FROM tabla WHERE campo < 27;
				$condicion = "$campo  < $valor";

		break;
		}
		case 4: {
		// mysql> SELECT * FROM tabla WHERE campo >= 'B';
				$condicion = "$campo >= $valor";

		break;
		}
		case 5: {
		//mysql> SELECT * FROM tabla WHERE campo <= 5;
				$condicion = "$campo <= $valor";
		break;
		}	
		case 7: {
				$condicion = "$campo Like '%$valor%'";

		break;
		}
		case 8: {
				$condicion = "$campo ='$valor'";
		break;
		}
		case 9:{
			//$campo_fecha
			$condicion = "$campo BETWEEN   '$valor2' AND '$valor'";
			
			
		break;
		}


		case 10:{ 
			//TIPO DE DATOS FECHA O CADENA
			//$campo_fecha
			$condicion = "$campo > '$valor'";
			
			
		break;
		}
		
		case 11:{ 
			//TIPO DE DATOS FECHA O CADENA
			//$campo_fecha
			$condicion = "$campo < '$valor'";
			
			
		break;
		}
		
		case 12:{ 
			//TIPO DE DATOS FECHA O CADENA
			//$campo_fecha
			$condicion = "$campo <= '$valor'";
			
			
		break;
		}
		
		case 13:{ 
			//TIPO DE DATOS FECHA O CADENA
			//$campo_fecha
			$condicion = "$campo >= '$valor'";
			
			
		break;
		}
			case 14:{ 
			//TIPO DE DATOS FECHA O CADENA
			//$campo_fecha
			$condicion = "$campo > $valor";
			
			
		break;
		}
		
		
		case 15:{ 
			//TIPO DE DATOS FECHA O CADENA
			//Formato de Fecha: 2014-04-31... con guiones
			$condicion = "'$valor' BETWEEN   vac.FechaDesde  AND vac.FechaHasta";
			
			
		break;
		}
		
		case 16:{ 
			//TIPO DE DATOS FECHA O CADENA
			//Formato de Fecha: 2014-04-31... con guiones
				$condicion = "$campo  =  $valor or  $campo  = $valor2 ";
			
			
		break;
		}
		
		
		
		
	}//fin del switch
	
	return($condicion);
	
}//Funci�n DependiendoDelTipoComparaci�n


function Comparacion($tipoValor,$valor,$valor2,$campo,$condicionFinal,$tipoComparacion){
	
	global $sql;
	
	switch($tipoValor){
		
		case 0: //cadena
		{
			 if (isset($valor) && ($valor !="")){
				$valor = trim($valor);
				//dependiendo del Tipo de Comparaci�n
				//$condicion= "$campo Like '%$valor%'";
				
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);
			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		break;
		
		} //fin del tipo de dato cadena
		case 1: //entero
		{
		//Aqu� el entero 0 no funciona
		 	if (isset($valor) && ($valor != 0) && (is_numeric($valor))){
				$valor = trim($valor);
				//$condicion= "$campo Like '$valor%'";
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);

			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		
		break;
		} //fin del tipo de dato entero
	
	}//fin del switch
	
	
	if (($condicion == "") and  ($condicionFinal =="")){
		$condicionFinal  = "";
	}elseif (($condicion == "") and  ($condicionFinal !="")){
		$condicionFinal = $condicionFinal;
	}elseif (($condicion != "") and  ($condicionFinal == "")){
		$condicionFinal = "Where $condicion"; //EL PRINCIPIO
	
	}elseif (($condicion != "") and  ($condicionFinal != "")){
		$condicionFinal = $condicionFinal."  and  ".$condicion;
		
	}
	return($condicionFinal);		
}//fin de la funci�n Comparacion


function Comparacion2($tipoValor,$valor,$valor2,$campo,$condicionFinal,$tipoComparacion){
	
	global $sql;
	
	switch($tipoValor){
		
		case 0: //cadena
		{
			 if (isset($valor) && ($valor !="") && (is_numeric($valor))){
				$valor = trim($valor);
				//dependiendo del Tipo de Comparaci�n
				//$condicion= "$campo Like '%$valor%'";
				
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);
			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		break;
		
		} //fin del tipo de dato cadena
		case 1: //entero
		{
		//Aqu� el entero 0 no funciona
		 	if (isset($valor) && ($valor != 0)){
				$valor = trim($valor);
				//$condicion= "$campo Like '$valor%'";
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);

			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		
		break;
		} //fin del tipo de dato entero
	
	}//fin del switch
	
	
	if (($condicion == "") and  ($condicionFinal =="")){
		$condicionFinal  = "";
	}elseif (($condicion == "") and  ($condicionFinal !="")){
		$condicionFinal = $condicionFinal;
	}elseif (($condicion != "") and  ($condicionFinal == "")){
		$condicionFinal = "AND  $condicion";
	
	}elseif (($condicion != "") and  ($condicionFinal != "")){
		$condicionFinal = $condicionFinal."  and  ".$condicion;
		
	}
	return($condicionFinal);		
}//fin de la función Comparacion

function Comparacion3($tipoValor,$valor,$valor2,$campo,$condicionFinal,$tipoComparacion,$operador){
	
	global $sql;
	
	switch($tipoValor){
		
		case 0: //cadena
		{
			 if (isset($valor) && ($valor !="")){
				$valor = trim($valor);
				//dependiendo del Tipo de Comparaci�n
				//$condicion= "$campo Like '%$valor%'";
				
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);
			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		break;
		
		} //fin del tipo de dato cadena
		case 1: //entero
		{
		//Aqu� el entero 0 no funciona
		 	if (isset($valor) && ($valor != 0)){
				$valor = trim($valor);
				//$condicion= "$campo Like '$valor%'";
				$condicion= DependiendoDelTipoComparacion($campo,$valor,$valor2,$tipoComparacion);

			 }//
			 else
			 {
				$condicion = "";
			 }//fin del else
			 
		
		break;
		} //fin del tipo de dato entero
	
	}//fin del switch
	
	
	if (($condicion == "") and  ($condicionFinal =="")){
		$condicionFinal  = "";
	}elseif (($condicion == "") and  ($condicionFinal !="")){
		$condicionFinal = $condicionFinal;
	}elseif (($condicion != "") and  ($condicionFinal == "")){
		$condicionFinal = "Where $condicion"; //EL PRINCIPIO
	
	}elseif (($condicion != "") and  ($condicionFinal != "")){
		$condicionFinal = $condicionFinal." ".$operador." ".$condicion;
		
	}
	return($condicionFinal);		
}//fin de la funci�n Comparacion
?>