<?php


function meses_Entero($mes){
	
	switch($mes) {
	
	case  "01":   $mes_ret = 1; break;
	case  "02":   $mes_ret = 2; break;
    case  "03":   $mes_ret = 3;  break;
	case  "04":   $mes_ret = 4; break;
	case  "05":   $mes_ret = 5; break;
	case  "06":   $mes_ret = 6; break;
	case  "07":   $mes_ret = 7; break;
	case  "08":   $mes_ret = 8; break;
	case  "09":   $mes_ret = 9; break;
	case  "10":   $mes_ret = 10; break;
	case  "11":   $mes_ret = 11; break;
	case  "12":   $mes_ret = 12; break;
	
	default: $mes_ret = "0"; 

}//fin del case

return $mes_ret;
	
}///end meses_retorno

function meses_retorno($mes){
	
	switch($mes) {
	
	case  "ene":   $mes_ret = "01"; break;
	case  "feb":   $mes_ret = "02"; break;
    case  "mar":   $mes_ret = "03";  break;
	case  "abr":   $mes_ret = "04"; break;
	case  "may":   $mes_ret = "05"; break;
	case  "jun":   $mes_ret = "06"; break;
	case  "jul":   $mes_ret = "07"; break;
	case  "ago":   $mes_ret = "08"; break;
	case  "sep":   $mes_ret = "09"; break;
	case  "oct":   $mes_ret = "10"; break;
	case  "nov":   $mes_ret = "11"; break;
	case  "dic":   $mes_ret = "12"; break;
	
	default: $mes_ret = "0"; 

}//fin del case

return $mes_ret;
	
}///end meses_retorno


function cadEntero($variable){

switch($variable) {

	case  "01":   $entero = 1; break;
	case  "02":   $entero = 2; break;
	case  "03":   $entero = 3; break;
	case  "04":   $entero = 4; break;
	case  "05":   $entero = 5; break;
	case  "06":   $entero = 6; break;
	case  "07":   $entero = 7; break;
	case  "08":   $entero = 8; break;
	case  "09":   $entero = 9; break;
	case  "10":   $entero = 10; break;
	case  "11":   $entero = 11; break;
    case  "12":   $entero = 12;  break;
	case  "13":   $entero = 13; break;
	case  "14":   $entero = 14; break;
	case  "15":   $entero = 15; break;
    case  "16":   $entero = 16;  break;
	case  "17":   $entero = 17; break;
	case  "18":   $entero = 18; break;
	case  "19":   $entero = 19; break;
	case  "20":   $entero = 20; break;
	case  "21":   $entero = 21; break;
	case  "22":   $entero = 22; break;
	case  "23":   $entero = 23; break;
	case  "24":   $entero = 24; break;
	case  "25":   $entero = 25; break;
	case  "26":   $entero = 26; break;
	case  "27":   $entero = 27; break;
	case  "28":   $entero = 28; break;
	case  "29":   $entero = 29; break;
	case  "30":   $entero = 30; break;
	case  "31":   $entero = 31; break;
	case  "32":   $entero = 32; break;
	case  "33":   $entero = 33; break;
	case  "34":   $entero = 34; break;
	case  "35":   $entero = 35; break;
	case  "36":   $entero = 36; break;
	case  "37":   $entero = 37; break;
	case  "38":   $entero = 38; break;
	case  "39":   $entero = 39; break;
	case  "40":   $entero = 40; break;
	case  "41":   $entero = 41; break;
	case  "42":   $entero = 42; break;
	case  "43":   $entero = 43; break;
	case  "44":   $entero = 44; break;
	case  "45":   $entero = 45; break;
	case  "46":   $entero = 46; break;
	case  "47":   $entero = 47; break;
	case  "48":   $entero = 48; break;
	case  "49":   $entero = 49; break;
	case  "50":   $entero = 50; break;
	case  "51":   $entero = 51; break;
	case  "52":   $entero = 52; break;
	case  "53":   $entero = 53; break;
	case  "54":   $entero = 54; break;
	case  "55":   $entero = 55; break;
	case  "56":   $entero = 56; break;
	case  "57":   $entero = 57; break;
	case  "58":   $entero = 58; break;
	case  "59":   $entero = 59; break;
	case  "60":   $entero = 60; break;
	default: $entero = 0;

}//fin del case

return $entero;

}//fin anios_retorno($anio);



## ESTE PROCEDIMIENTO ES PARA LA NOCTURNA: ESTOS CAMPOS VIENEN DE LA BASE DE DATOS DEL ING. MARCELINO TU��N.
include("../clases/setting.inc.php");
$sql = new mod_db();



$meses = array();





$row = 1;
//RECORDAR ORDENAR EN EXCEL POR ORDEN REG.
//al momento de subir los archivos que me de un número de archivo subido al año con me fecha de subida para saber la última subida..
//ubidar el día y el mes inicial y el día y el mes final ... de los archivos subidos.


$fp = fopen("graduados.csv","r");


			 

//BASE DE DATOS : personalrevision

//$fp = fopen ("20100503.txt","r");
//EL SEPARADOR EN ESTE CASO ES PUNTO Y COMA 2013
while ($data = fgetcsv ($fp, 1000, ";"))  
{ 
$num = count ($data); 
print " <br>"; 
$row++; 


//data[0]: CODIGO
//data[1]: ENTRADA
//data[2]: REGISTRO1 HORA DE ENTRADA
//data[3]: REGISTRO2 HORA DE SALIDA



echo "". $data[0]." -- ".$data[1]."--".$data[2]."--".$data[3]."<br>"; 

echo "<br>";


						$cols= "Cedula,
								PrimeNombre,
								SegundoNombre,
								PrimerApellido,
								SegundoApellido,
								Descripcion,
								Codigo";
							
							
						$val = "'$data[1]',
								'$data[2]',
								'$data[3]',
								'$data[4]',
								'$data[5]',
								'$data[6]',
								'$data[0]'";
								
						$sql->insert("egresados ",$cols,$val,"");

	
			
			

}//fin del mientras
fclose ($fp);

?>
