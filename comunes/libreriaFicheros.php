<?PHP
function tipoImagen($archivotype){
	
	
	
							switch ($archivotype){
									case "image/gif": 
										$ImgExt = ".gif"; break;
									case "image/jpeg": 
										$ImgExt = ".jpg"; break;
									case "image/png": 
										$ImgExt = ".png"; break;
									default: $ImgExt = ".jpg"; break;
								}//fin del swith	
								
								return($ImgExt);
}

function eliminarFichero($ruta){
	if (file_exists($ruta)){
		unlink($ruta); //borra un fichero
	}
}//eliminarFichero

function AsignarCarpetaPDF($enlace, $anio){
	$mCarpeta = "";
	
	switch ($enlace) {
			 case 1:
				$mCarpeta = "Documentos";
				break;
				
			 case 2:
			   //$mCarpeta = "EjecucionPresupuestaria/".$anio;
			   $mCarpeta = "Otros";
				break;
				

				
			 default: $mCarpeta = ""; break;
	 }//end del case	
			
			return $mCarpeta;
	
}// fin de la funciÛn AsignarCarpeta


function AsignarCarpeta($enlace, $anio){
	$mCarpeta = "";
	
	switch ($enlace) {
			 case 1:
				$mCarpeta = "Logos";
				break;
				
			 case 2:
			   //$mCarpeta = "EjecucionPresupuestaria/".$anio;
			   $mCarpeta = "Fotos";
				break;
				
			 case 3:
			   //$mCarpeta = "EjecucionPresupuestaria/".$anio;
			   $mCarpeta = "Imagenes";
				break;
				
			 default: $mCarpeta = ""; break;
	 }//end del case	
			
			return $mCarpeta;
	
}// fin de la funciÛn AsignarCarpeta
 
function quitar_tildes($cadena) {
	
	$cadena = utf8_decode($cadena);
	//echo "la cadena resultante ac· en la funci¥n quitar tildes es: ".$cadena."<br>";
$no_permitidas= array ("·","È","Ì","Û","˙","¡","…","Õ","”","⁄","Ò","¿","√","Ã","“","Ÿ","√ô","√ ","√®","√¨","√≤","√π","Á","«","√¢","Í","√Æ","√¥","√ª","√Ç","√ä","√é","√î","√õ","¸","√∂","√ñ","√Ø","√§","´","“","√è","√Ñ","√ã");
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

//echo "La cantidad de car?cteres es: ".$cant."<br>";

 $cont = 1;
 $caracter = "";
 $posicion_cadena = 0;
 $CaracterSustitudo = "_";//car?cter que cubrir?..los guiones y los ''' para cubrir inyecci?n de sql
 $cadenaResultante = "";

            

   while ($cont <= $cantCaracteres) { 
    //echo "la cadena analizar es: ".$cad2."<br>";
    //echo "el contador $cont esta en ".$cont."<br>";
    //echo "la bandera esta en ".$bandera."<br>";

   	 $caracter = substr($cad2,$posicion_cadena,1); //posici?n cero un car?cter. Un c?racter (1)


   			if ($caracter == "=" or $caracter == " " or $caracter == "'") {
          		//echo  "Entro en el If <br>";
          		//echo "EL car?cter en la posici?n 0 es : ".$caracter."<br>";
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

}//fin de la funci?n


?>