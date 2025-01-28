<?php

function diaSemana($ano,$mes,$dia)
{
	// 0->domingo	 | 6->sabados
	$dia= date("w",mktime(0, 0, 0, $mes, $dia, $ano));
		return $dia;
} //end  diaSemana($ano,$mes,$dia)

function N_Mes($mes){
 
   switch($mes) { 
       case "1": return ("Enero"); break; 
       case "2": return ("Febrero"); break; 
       case "3": return ("Marzo"); break; 
       case "4": return ("Abril"); break; 
       case "5": return ("Mayo"); break; 
       case "6": return ("Junio"); break; 
       case "7": return ("Julio");; break; 
       case "8": return ("Agosto");; break; 
       case "9": return ("Septiembre"); break; 
       case "10": return ("Octubre"); break; 
       case "11": return ("Noviembre"); break; 
       case "12": return ("Diciembre"); break; 
   } //fin del case
}//fin de la funci�n Cantidad_Dias_Mes
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


function reconversion_dias_variable($dia){ 
//Revisar esta funci�n aqu� manda un error....... con el d�a 32
   switch($dia) { 
 //  echo "entro en la funci�n reconversi�n";
       case 1: 	return "01";  break; 
       case 2: 	return "02";  break; 
       case 3: 	return "03";  break; 
       case 4: 	return "04";  break; 
       case 5: 	return "05";  break; 
       case 6:	return "06";  break; 
       case 7: 	return "07";  break; 
       case 8: 	return "08";  break; 
       case 9: 	return "09";  break; 
	   
       case 10: return  "10";  break; 
       case 11: return  "11";  break; 
       case 12: return  "12";  break; 
	   case 13: return  "13";  break; 
       case 14: return  "14";  break; 
       case 15: return  "15";  break;
       case 16: return  "16";  break; 
       case 17: return  "17";  break; 
	   case 18: return  "18";  break; 
       case 19: return  "19";  break; 
	   
       case 20: return  "20";  break; 
	   case 21: return  "21";  break; 
       case 22: return  "22";  break; 
	   case 23: return  "23";  break; 
       case 24: return  "24";  break; 
       case 25: return  "25";  break;
	   case 26: return  "26";  break; 
       case 27: return  "27";  break; 
	   case 28: return  "28";  break; 
       case 29: return  "29";  break; 
       case 30: return  "30";  break;  
	   case 31: return  "31";  break;  
   
   		 default:	 echo "error en la función reconversion_dias_variable <br>";
	//  default:	 echo "Error en Reconversi�n de d�as Calendarios ".$dia;
   } 
} //fin de la funci�n  cantidad de dias

function reconversion_mes_variable($mes){ 

   switch($mes) { 
       case 1: 	return "01";  break; 
       case 2: 	return "02";  break; 
       case 3: 	return "03";  break; 
       case 4: 	return "04";  break; 
       case 5: 	return "05";  break; 
       case 6:	return "06";  break; 
       case 7: 	return "07";  break; 
       case 8: 	return "08";  break; 
       case 9: 	return "09";  break; 
       case 10: return "10";  break; 
       case 11: return "11";  break; 
       case 12: return "12";  break; 
	  default:	 echo "error en la función reconversión_mes_variable <br>";
   } 
} //fin de la funci�n  cantidad de dias


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

?>