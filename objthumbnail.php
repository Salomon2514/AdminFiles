<?PHP 
ini_set("memory_limit","256M");
ini_set('max_execution_time', '60'); //Raise to 512 MB

class thumImagenes{ 
    var $dir_Thumb;
	
	
    var $ImgRuta; 
    var $ImgNombre; 
    var $EscalaThumb;
	var $ImgTipo;
	var $numImagen;
	var $id;

	
	

function introduce_imagen($imgRuta, $imgNombre,$imgTipo,$escalaThumb,$numImagen,$id){
 	//chmod("prensa/thumbnails",0777);
    $this->dir_Thumb ="prensa/thumbnails/";
	
							
	$this->ImgRuta = $imgRuta;
	$this->ImgNombre = $imgNombre;
	$this->EscalaThumb = $escalaThumb;
	$this->ImgTipo = $imgTipo;
	$this->numImagen = $numImagen;
	$this->id = $id;
	


} //fin de la función introduce datos

function crear_thumbnail(){ 
    
	global $sql;
			
			
		switch ($this->ImgTipo){
				case "image/jpeg": 
				 $img = imagecreatefromjpeg($this->ImgRuta);
				 break;
				case "image/gif":  
				 $img = imagecreatefromgif($this->ImgRuta);
				 break;
				case "image/png":  
				 $img = imagecreatefrompng($this->ImgRuta);
				 break;
				 default: echo "error"; break;
			}//fin del swith
			
			
			//list($ancho,$alto) = getimagesize($this->ImgRuta);
			list($width, $height, $type, $attr) = getimagesize($this->ImgRuta);
 
			
			//echo "la ruta es:".$this->ImgRuta."<br\>";
			echo "el ancho es de la imagen es.".$width."<br>";
 			echo "el alto  de la imagen es.".$height."<br>";

			$ancho = $width;
			$alto = $height;
			
			//echo "<br>";
			//echo "<br>";
			$imgPates = explode(".", $this->ImgNombre);
			$ImgName = $imgPates[0];
			$ImgExt = $imgPates[1];
			
			switch ($this->ImgTipo){
				case "image/gif": 
				$ImgExt = ".gif"; break;
				case "image/jpeg": 
				$ImgExt = ".jpg"; break;
				case "image/png": 
				$ImgExt = ".png"; break;
				default: $ImgExt = ".jpg"; break;
			}//fin del swith

			//echo "el nombre de la imagen es.".$ImgName."<br>";
			//echo "la extensión  de la imagen es.".$ImgExt."<br>";
			//echo "<br>";
			//echo "<br>";

			switch ($this->EscalaThumb){
				case 1: 
					//echo "<br>";
					//echo "escala número 1";
					
					$thumAncho = 848;
					$thumAlto = 331;
					
					
					if ($ancho >= $alto){
						$thumAncho = 848;
						$thumAlto = 331;
						
					}elseif ($alto >= $ancho){
						
						$thumAncho = 331;
						$thumAlto = 848;
					}
					
					$imgNombreThumb = $this->ImgNombre;	
					//echo "el nombre del thum es:".$imgNombreThumb."<br>";
					//echo "la escala en ancho es:".$thumAncho."<br>";
					//echo "la escala en alto es:".$thumAlto."<br>";
					
					switch ($this->numImagen){
								case 1:
									$campo = "img1";
									break;
								
								case 2:
									$campo = "img2";
									break;
							
								case 3:
									$campo = "img3";
									break;
								case 4:
									$campo = "img4";
									break;
						}//end del switcha ($this->numImagen)
					
					
					
				 break;
				 
				case 2: 
					//echo "<br>";
					//echo "escala número 2";
					$thumAncho = 525;
					$thumAlto = 394;
					
					if ($ancho >= $alto){
						$thumAncho = 525;
						$thumAlto = 394;
						echo "ancho mayor que alto <br>";
					}elseif ($alto > $ancho){
						
						$thumAlto = 525;
						$thumAncho = 394;
						echo "alto  mayor que ancho <br>";
					}
					
					
					$imgNombreThumb = $ImgName."-1".$ImgExt;	
					$campo = "timg1";
					
					//echo "el nombre del thum es:".$imgNombreThumb."<br>";
					//echo "la escala en ancho es:".$thumAncho."<br>";
					//echo "la escala en alto es:".$thumAlto."<br>";
				 break;
				case 3: 
					//echo "<br>";
					//echo "escala número 3";
				 	$thumAncho = 340;
					$thumAlto = 226;
					
					if ($ancho >= $alto){
						$thumAncho = 340;
						$thumAlto = 226;
						echo "ancho mayor que alto <br>";
					}elseif ($alto >= $ancho){
						$thumAlto = 340;
						$thumAncho = 226;
						echo "alto  mayor que ancho <br>";
					}
					
					
					$imgNombreThumb = $ImgName."-2".$ImgExt;	
					///PARA CASOS DE LA IMAGEN 1
					
					switch ($this->numImagen){
						case 1:
							$campo = "timg1_2";
							break;
						
						case 2:
							$campo = "timg2";
							break;
					
						case 3:
							$campo = "timg3";
							break;
						case 4:
							$campo = "timg4";
							break;
					}//end del switcha ($this->numImagen)
				 break; //case 3
				 
				case 4: 
					//echo "<br>";
					//echo "escala número 3";
				 	$thumAncho = 420;
					$thumAlto = 296;
					
					if ($ancho >= $alto){
						$thumAncho = 420;
						$thumAlto = 296;
						
					}elseif ($alto >= $ancho){
						
						$thumAlto = 420;
						$thumAncho = 296;
						
					}
					
					
					$imgNombreThumb = $ImgName."-3".$ImgExt;	//MóduloNoticias
					$campo = "timg1_3";		
				 break;
				
				case 5: 
					//echo "<br>";
					//echo "escala número 3";
				 	$thumAncho = 150;
					$thumAlto = 150;
					
					
					
					
					$imgNombreThumb = $ImgName."-4".$ImgExt;	////MóduloNoticias 		
					$campo = "timg1_4";	
				 break;
				 default: echo "error"; break;
			}//fin del swith
			
			
				//Las imágenes pueden se Verticales o Horizontales
				//$x_radio = $alto/$ancho;
				//$y_radio = $ancho/$alto;
			
			    $max_ancho = $thumAncho;
				$max_alto = $thumAlto;
				
				$x_radio = $max_ancho/$ancho;
				$y_radio = $max_alto/$alto;
				
			
				if ($ancho >= $alto){
					//se ajusta al nuevo tamaño es una imágen horizontal
					//HORIZONTAL: se modifica el alto.
					//$thumAlto = 	abs($thumAncho*$x_radio);
					$thumAlto = 	abs($x_radio*$alto);
					
				}else { 
				//VERTICAL: se modifica el AnchoSSS.
				//SI EL ALTO ES MAYOR QUE EL ANCHO
				//ENTONCES MODIFICO EL ANCHO
					//$thumAncho = 	abs($thumAlto*$y_radio);
					$thumAncho = 	abs($y_radio*$ancho);
				}
			
			
				//CREAR UNA NUEVA IMÁGEN: thumb lienzo
				$thumb = imagecreatetruecolor($thumAncho,$thumAlto);
				//REDIMENSIONAR:
				//imagen original copiandola en la imagen. La imágen se reajustará
				//al nuevo tamaño.
				imagecopyresampled($thumb, $img, 0,0,0,0,$thumAncho,$thumAlto,$ancho,$alto);
				//Definimos la calidad de la imagen final
				//se destruye la variable $img para liberar la memoria
				
				$calidad = 95;
				
				
			switch ($this->ImgTipo){
				case "image/jpeg": 
					imagejpeg($thumb,$this->dir_Thumb.$imgNombreThumb,$calidad);
					 break;
				case "image/gif":  
					imagegif($thumb,$this->dir_Thumb.$imgNombreThumb,$calidad);
				 	break;
				case "image/png":  
					//Last argument in imagepng($image_p, null, 100) should be between 0 and 9.
				 	imagepng($thumb,$this->dir_Thumb.$imgNombreThumb,9);
					 break;
			}//fin del swith
			
			
			
			
			$string = "$campo='$imgNombreThumb'";
			$update_str = "id='$this->id'";
			$sql->update("noticias","$string","$update_str");

} 

//esta función la llama el regisro personales_edicion.php

			

}// fin de la clase 

?>
