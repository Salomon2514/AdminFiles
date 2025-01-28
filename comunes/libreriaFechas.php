<?php


function AniosBusquedaArchivos($anio)
{
	

	//$tabla = "anios";	
	$marca= ""; //dibujando
	$marca = "selected = 'selected'";
	

		
		if ($anio > 0)
			 echo "<option  value='$anio'>".$anio."</option>";
		
		for ($i=date("Y"); $i>= 2016; $i--){					
			 echo "<option  value='$i'>".$i."</option>";
		}//fin del for
		



}// fin de la funci�n generaSelect()----->>>--->>>--->>>--->>

function Conversion_mes_enteros($mes){ 

   switch($mes) { 
       case "01": return 1;   break; 
       case "02": return 2;   break; 
       case "03": return 3;   break; 
       case "04": return 4;   break; 
       case "05": return 5;   break; 
       case "06": return 6;   break; 
       case "07": return 7;   break; 
       case "08": return 8;   break; 
       case "09": return 9;   break; 
       case "10": return 10;  break; 
       case "11": return 11;  break; 
       case "12": return 12;  break; 
   } 
} //fin de la funci�n  cantidad de dias conversion_mes

function ConversionDias_Enteros($dia){ 
//Revisar esta funci�n aqu� manda un error....... con el d�a 32
   switch($dia) { 
 //  echo "entro en la funci�n reconversi�n";
       case "01": 	return 1;  break; 
       case "02": 	return 2;  break; 
       case "03": 	return 3;  break; 
       case "04": 	return 4;  break; 
       case "05": 	return 5;  break; 
       case "06":	return 6;  break; 
       case "07": 	return 7;  break; 
       case "08": 	return 8;  break; 
       case "09": 	return 9;  break; 
	   
       case "10": return  10;  break; 
       case "11": return  11;  break; 
       case "12": return  12;  break; 
	   case "13": return  13;  break; 
       case "14": return  14;  break; 
       case "15": return  15;  break; 
	   case "13": return  13;  break; 
       case "14": return  14;  break; 
       case "15": return  15;  break; 
       case "16": return  16;  break; 
       case "17": return  17;  break; 
	   case "18": return  18;  break; 
       case "19": return  19;  break; 
	   
       case "20": return  20;  break; 
	   case "21": return  21;  break; 
       case "22": return  22;  break; 
	   case "23": return  23;  break; 
       case "24": return  24;  break; 
       case "25": return  25;  break;
	   case "26": return  26;  break; 
       case "27": return  27;  break; 
	   case "28": return  28;  break; 
       case "29": return  29;  break; 
       case "30": return  30;  break;  
	   case "31": return  31;  break;  
	  
	//  default:	 echo "Error en ConversionDias_Enteros�n de d�as Calendarios ".$dia;
   } 
} //fin de la funci�n  cantidad de dias


function orden($fecha)
{

		//list( $year, $month, $day, ) =  explode('-', $fecha );
		//echo "Month: $month; Day: $day; Year: $year<br>\n";
		$vacio = "0000-00-00";


	if (!empty($fecha) && ($fecha!= "0000-00-00")){

	
		$pos = false;
		$pos1 = false;


		$pos = strpos($fecha,'/'); //para saber que símbolo está separando la fecha
		$pos1 = strpos($fecha,'-');
		
		
		if ($pos != false) {
			list( $year, $month,$day ) = explode('/', $fecha );
		} elseif ($pos1 != false) {
			list( $year, $month,$day ) = explode('-', $fecha );
		}
		
	
		$dia = $day;
		$mes=  $month;
		$anio = $year;

		
		$fecha =$dia."-".$mes."-".$anio;
		$fecha = date($fecha);
		return $fecha;
		
		
	}else return $vacio;
	
	 	

}//fin de orden

function getfecha($fecha)
{
	//$date = "04/30/1973";  // Los delimitadores pueden ser barras, puntos o guiones
	//list( $day, $month, $year ) = explode('/', $fecha );
	
	
	$vacio = "";


	if (isset($fecha) && ($fecha != "") && $fecha!= "00-00-0000"){

		$pos = false;
		$pos1 = false;
		
		$pos = strpos($fecha,'/'); //para saber que símbolo está separando la fecha
		$pos1 = strpos($fecha,'-');
		
		
		if ($pos != false) {  //si encontró el carácter /
			list( $day, $month,$year ) = explode('/', $fecha );
		} elseif ($pos1 != false) { //si encontró el carácter -
			list( $day, $month,$year ) = explode('-', $fecha );
		}
	
		$dia = $day;
		$mes=  $month;
		$anio = $year;

			$fecha =$anio."-".$mes."-".$dia;
			$fecha = date($fecha);
		
		return $fecha;
		
	}else return $vacio;
	
}//getfecha

function orden2($fecha)
{

	
	$vacio = "00-00-0000";


	if (!empty($fecha) && ($fecha!= "00-00-0000")){

		$pos = false;
		$pos1 = false;
		
		
		$pos = strpos($fecha,'/'); //para saber que símbolo está separando la fecha
		$pos1 = strpos($fecha,'-');
		
		
		if ($pos != false) {  //si encontró el carácter /
			list( $day, $month,$year ) = explode('/', $fecha );
		} elseif ($pos1 != false) { //si encontró el carácter -
			list( $day, $month,$year ) = explode('-', $fecha );
		}



		
		
		$dia = $day;
		$mes=  $month;
		$anio = $year;

		
		$fecha =$anio."-".$mes."-".$dia;
		$fecha = ($fecha);	
		
		return $fecha;
				
	}else return $vacio;

	 	

}//fin de orden

function devolverFechaObjeto($fecha)
{
	
			
			//$obj = new StdClass;
			$vacio = "00-00-0000";


	if ($fecha!= "00-00-0000"){

		//list( $day, $month, $year ) = explode('/', $fecha );
		$pos = false;
		$pos1 = false;
		
		$pos = strpos($fecha,'/'); //para saber que símbolo está separando la fecha
		$pos1 = strpos($fecha,'-');
		
		
		if ($pos != false) {  //si encontró el carácter /
			list( $day, $month,$year ) = explode('/', $fecha );
		} elseif ($pos1 != false) { //si encontró el carácter -
			list( $day, $month,$year ) = explode('-', $fecha );
		}
	
	
	
			//Proceso de conversión de char a enteros
			$day = ConversionDias_Enteros($day);
			$month = Conversion_mes_enteros($month);
			$year = $year;
			
			
			$array = array(
			"dia" => $day,
			"mes" => $month,
			"anio" =>$year,
			);
			
			$obj = new stdObject($array);
					/* foreach ($array as $clave=>$valor){
						$obj->$clave=$valor;
						}//fin del forech
					*/
					return $obj;
					
	}else return  $vacio;
			
} //devolverFechaObjeto($fecha) función de devolver el objeto fecha...!!!

function FechaObjetoInvert($fecha)
{
	
			//$obj = new StdClass;
			$vacio = "";


	if (!empty($fecha) && ($fecha != "") && ($fecha!= "0000-00-00" )){

		//list( $day, $month, $year ) = explode('/', $fecha );
		$pos = false;
		$pos1 = false;
		
		$pos = strpos($fecha,'/'); //para saber que símbolo está separando la fecha
		$pos1 = strpos($fecha,'-');
		
		
		if ($pos != false) {  //si encontró el carácter /
			list( $year, $month,$day ) = explode('/', $fecha );
		} elseif ($pos1 != false) { //si encontró el carácter -
			list( $year, $month,$day ) = explode('-', $fecha );
		}
	
	
	
			//Proceso de conversión de char a enteros
			$day = ConversionDias_Enteros($day);
			$month = Conversion_mes_enteros($month);
			$year = $year;
			
			
			$array = array(
			"dia" => $day,
			"mes" => $month,
			"anio" =>$year,
			);
			
					   /* foreach ($array as $clave=>$valor){
						$obj->$clave=$valor;
					   }//fin del forech */
						
					$obj = new stdObject($array);
					return $obj;
					
	}else return  $vacio;
			
} //devolverFechaObjeto($fecha) función de devolver el objeto fecha...!!!
?>