<?PHP

function quitar_tildes($cadena) {
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
$texto = str_replace($no_permitidas, $permitidas ,$cadena);
return $texto;
}
 

function EliminandoCaracteresdeInyeccion($cad2){
	

//$cad2 = " OR 1 '=' 1";
//$cad2 = " samuelaaron";
//echo "la cadena de inicio es: ".$cad2."<br>";
//$cad2 = trim(" samuelaaron"); //Antess de empeza el proceso se limpia la cadena;

$cad2 = trim($cad2); //Antess de empeza el proceso se limpia la cadena;

$cantCaracteres = strlen($cad2);

//echo "La cantidad de car�cteres es: ".$cant."<br>";

 $cont = 1;
 $caracter = "";
 $posicion_cadena = 0;
 $CaracterSustitudo = "_";//car�cter que cubrir�..los guiones y los ''' para cubrir inyecci�n de sql
 $cadenaResultante = "";

            

   while ($cont <= $cantCaracteres) { 
    //echo "la cadena analizar es: ".$cad2."<br>";
    //echo "el contador $cont esta en ".$cont."<br>";
    //echo "la bandera esta en ".$bandera."<br>";

   	 $caracter = substr($cad2,$posicion_cadena,1); //posici�n cero un car�cter. Un c�racter (1)


   			if ($caracter == "=" or $caracter == " " or $caracter == "'") {
          		//echo  "Entro en el If <br>";
          		//echo "EL car�cter en la posici�n 0 es : ".$caracter."<br>";
      			 $cadenaResultante = $cadenaResultante.$CaracterSustitudo;
        		// ereg_replace ("parque","circo",$cadena);parque se sustituye por circo

    		}else{
       			 $cadenaResultante = $cadenaResultante.$caracter;
			}
        $cont = $cont + 1;
        $posicion_cadena = $posicion_cadena + 1;
		
 	 }//fin del mientras
                                                               
// echo "la cadena resultantes es: ".$cadenaResultante."<br>";
                                                               
return($cadenaResultante);

}//fin de la funci�n

 $cadena = "Archivóáéíóús de agosto 2018.pdf";
 //$variable=utf8_decode($cadena);
 echo "la variable es:".$variable."<br>";

 

$cadenaResultante = quitar_tildes($cadena);
$cadResultante = EliminandoCaracteresdeInyeccion($cadenaResultante);
 echo "cad result:_".$cadResultante."<br>";

?>