<?php

	include("clases/setting.inc.php");
		$sql = new mod_db();
	
	include("objthumbnail.php");
		$Mythumbnail = new thumImagenes();	



		$FechaSistema= date("y-m-d H:i:s"); //Esta fecha refleja el instante en que se ejecutaron descuentos
	
								
				$consulta = "select * from  noticias  order by id desc";
				$Cantidad = $sql->nums($consulta); //Cantidad de Colaboradores con Código de Marcación
				$ad_query = $sql->query($consulta);
				 $cont = 0;
				while($regNoti = $sql->objects('',$ad_query)){
				
				  if ($regNoti->img1!=""){
						  
									$ruta = "prensapopup/".$regNoti->img1;
									$nombre = $regNoti->img1;
									
									list( $nom, $ext ) = explode( '.', $nombre);
									$tipo = $ext;
									
									
									echo "nombre de la imagen: ".$nombre."<br>";
									echo "ruta de la imagen: ".$ruta."<br>";
									echo "tipo de la imagen: ".$tipo."<br>";
									//$imgRuta, $imgNombre,$imgTipo,$escalaThumb,$numImagen
									//echo "el nombre de la imagen es:".$nombre."<br>";
									//Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,1,1,$regNoti->id);
									if (file_exists($ruta)){
											if ($cont <=3){
														$ruta_timg1 = "prensapoppup/".$regNoti->timg1;
														if (file_exists($ruta_timg1)){
															unlink($ruta_timg1); //borra un fichero
														}
												$Mythumbnail->crear_thumbnail();
												$Mythumbnail->introduce_imagen($ruta, $nombre,"image/jpeg",2,1,$regNoti->id);
												$cont = $cont + 1;
											}//fin del $cont
									
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,"image/jpeg",3,1,$regNoti->id);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,"image/jpeg",4,1,$regNoti->id);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,"image/jpeg",5,1,$regNoti->id);
									$Mythumbnail->crear_thumbnail();
									}else "no extiste la ruta <b>";
						
						 		
						  
				  }
				  if ($regNoti->img2!=""){
									$ruta_img2 = "prensapopup/".$regNoti->img2;
									$nombre = $regNoti->img2;
									
									list( $nom, $ext ) = explode( '.', $nombre);
									$tipo = $ext;	
					
					
									echo "<br><br><br>";
																		
									echo "nombre de la imagen: ".$nombre."<br>";
									echo "ruta 2 de la imagen: ".$ruta_img2."<br>";
									echo "tipo de la imagen: ".$tipo."<br>";
									
									if (file_exists($ruta_img2)){
										
														$ruta_timg2 = "prensapoppup/".$regNoti->timg2;
														if (file_exists($ruta_timg2)){
															unlink($ruta_timg2); //borra un fichero
														}
												$Mythumbnail->crear_thumbnail();
												//escala 3: // imágen #2
												$Mythumbnail->introduce_imagen($ruta_img2, $nombre,"image/jpeg",3,2,$regNoti->id);
											
									}else "no extiste la ruta <b>";
				  }//fin de $regNoti->img2!="")
				   
						   

					
				
			 }//fin while($Colaboradores = $sql->objects('',$ad_query)){ 


?>