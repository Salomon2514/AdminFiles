<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<?php

	//MODIFICACIONES REALIZADAS EL VIERNES 23 DE ENERO DEL 2009 PARA LA GLORIA DEL SE�OR.
	include("clases/setting.inc.php");
		$sql = new mod_db();
	include("clases/objNoticias.php");
	$MyNoticia = new Noticias();	
	
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaFechas.php");
	include("comunes/libreriaFicheros.php");
	include("comunes/libreriaNoticias.php");
	
	
	echo "titulo ".$_POST['titulo'];
	$objeto =  Objeto($_POST);
   echo "accion se:".$objeto->titulo."<br>";
    echo "accion se:".$objeto->titulo."<br>";
	
	if ($objeto->Accion != ""){
	
   		switch($objeto->Accion){
   			case "Guardar":
   					//echo "LA ACCI�N ES GUARDAR <br>";
					$MyNoticia->introduce_Noticia($objeto);
					$MyNoticia->Guardar_Noticia();
					$idNoticias = $sql->insert_id();
				 
     			 break;
   			case "Modificar":
   					echo "LA OPCI�N ES MODIFICAR <br>";
					$MyNoticia->introduce_Noticia($objeto);
					$MyNoticia->Modifica_Noticia();
					$idNoticias =  $objeto->id;
					$numb = $sql->nums("select * from noticias where id = $objeto->id");
					//if ($numb >0)
					//$regNotiImg = $sql->objects("select * from noticias where  id = $objeto->id");

					/*
					for ($i = 1; $i<= 4; ++$i){
						if(is_uploaded_file($_FILES["imagen"]["tmp_name"][$i]))  { 
						//hay que borrar las imágenes anteriores
								
							switch ($i){
								case 1:
								$img1 =$regNotiImg->img1;
								if (!empty($img1)){
									$ruta_timg1 = "prensa/thumbnails/".$regNotiImg->timg1;
									eliminarFichero($ruta_timg1);
									$ruta_timg1_2= "prensa/thumbnails/".$regNotiImg->timg1_2;
									eliminarFichero($ruta_timg1_2);
									$ruta_timg1_3= "prensa/thumbnails/".$regNotiImg->timg1_3;
									eliminarFichero($ruta_timg1_3);
									$ruta_timg1_4= "prensa/thumbnails/".$regNotiImg->timg1_4;
									eliminarFichero($ruta_timg1_4);
									$ruta_img1= "prensa/thumbnails/".$regNotiImg->img1;
									eliminarFichero($ruta_img1);
								}
								break;
								case 2:
								$img2 =$regNotiImg->img2;
								if (!empty($img2)){
									$ruta_timg2 = "prensa/thumbnails/".$regNotiImg->timg2;
									eliminarFichero($ruta_timg2);
									$ruta_img2= "prensa/thumbnails/".$regNotiImg->img2;
									eliminarFichero($ruta_img2);
									
								}
								break;
								case 3:
								$img3 =$regNotiImg->img3;
								if (!empty($img3)){
									$ruta_timg3 = "prensa/thumbnails/".$regNotiImg->timg3;
									eliminarFichero($ruta_timg3);
									$ruta_img3= "prensa/thumbnails/".$regNotiImg->img3;
									eliminarFichero($ruta_img3);
									
								}
								break;
								case 4:
								$img4 =$regNotiImg->img4;
								if (!empty($img4)){
									$ruta_timg4 = "prensa/thumbnails/".$regNotiImg->timg4;
									eliminarFichero($ruta_timg4);
									$ruta_img4= "prensa/thumbnails/".$regNotiImg->img4;
									eliminarFichero($ruta_img4);
									
								}
								break;
								
							}//fin del case
								
						}//end if(is_uploaded_file($_FILES["imagen"]["tmp_name"][$i]))  {
					}//fin del for
					
					*/
     			 break;
  		   default:
     				print ("Error en el sistema!!!");
     				break;
		} //FIN DEL SWITCH
		
		} else {
		echo "No entro en las opciones habituales de guardar y modificar del M&oacute;dulo de Noticias <br>";
		
		}  //
		
	
	
	
	include("objthumbnail.php");	
	$Mythumbnail = new thumImagenes();	


	
	chmod("prensa/thumbnails",0777);
	
	$arrayImagenes = array();

		//Aqui eligo el tipo de archivo (bien) 
		$tipos = array("image/gif","image/jpeg","image/jpg","image/png"); 
		$maximo = 5500000; //4.8 Mb esto es para probar 
		
		
		$cont = 1; //imágenes que se han subido
		for ($i = 1; $i<= 4; ++$i){
	

	
				//echo $_FILES["imagen"]["tmp_name"][$i]."<br>";
				
				/*if(!is_uploaded_file($_FILES["imagen"]["tmp_name"][$i]))	{ 
					echo "Error al subir archivo".$i; 
					//elimino el tercer elemento del array y muestro el array
						//unset($array1[2]);
				} */
				
				//is_uploaded_file � Indica si el archivo fue subido mediante HTTP POST
				if(is_uploaded_file($_FILES["imagen"]["tmp_name"][$i]))  { 
					if (in_array($_FILES["imagen"]["type"][$i],$tipos) && $_FILES["imagen"]["size"][$i] <= $maximo){
						//Funciona a las mil maravillas 
						if( $_FILES["imagen"]['error'][$i]== UPLOAD_ERR_OK ) {
						//Valor: 0; No hay error, fichero subido con éxito.
						// Hacer algo con Foto
					
							chmod("prensa/img",0777);
							$destino = 'prensa/img';
							$name_archivo = $_FILES["imagen"]["name"][$i];
							#tmp_name
							#bool move_uploaded_file (string $ nombre_archivo, string $ destino)
							#move_uploaded_file - Mueve un archivo cargado a una nueva ubicación
							//*en este punto hay que validar que no exista una im�gen con este nombre ya en el directorio
							
							$imgPates = explode(".", $_FILES["imagen"]["name"][$i]);
							$ImgName = $imgPates[0];
							
							
								switch ($_FILES["imagen"]["type"]){
									case "image/gif": 
										$ImgExt = ".gif"; break;
									case "image/jpeg": 
										$ImgExt = ".jpg"; break;
									case "image/png": 
										$ImgExt = ".png"; break;
									default: $ImgExt = ".jpg"; break;
								}//fin del swith
								
								
							
							if (file_exists($destino.'/'.$name_archivo)) {
								//hay que cambiarle el nombre
								$prefijo = substr(md5(uniqid(rand())),0,5);
								//$name_archivo =  $prefijo."_".$name_archivo;
								$name_archivo =  $ImgName."_".$prefijo.$ImgExt;
							}//file_exists
							
							
							
							move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $destino.'/'.$name_archivo);
								$arrayImagenes[$cont]['nombre']= $_FILES["imagen"]["name"][$i];
								$arrayImagenes[$cont]['tipo']= $_FILES["imagen"]["type"][$i];
								$arrayImagenes[$cont]['destino']= $destino.'/'.$name_archivo;
								$cont = $cont + 1;
								
								if ($i == 1){
									$ruta = $destino.'/'.$name_archivo;
									$nombre = $name_archivo;
									$tipo = $_FILES["imagen"]["type"][$i];
									
									//$imgRuta, $imgNombre,$imgTipo,$escalaThumb,$numImagen
									//echo "el nombre de la imagen es:".$nombre."<br>";
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,1,1,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,2,1,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,3,1,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,4,1,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,5,1,$idNoticias);
									$Mythumbnail->crear_thumbnail();

								}
								if (($i==2)  || ($i==3) || ($i==4)){
									$ruta = $destino.'/'.$name_archivo;
									$nombre = $name_archivo;
									$tipo = $_FILES["imagen"]["type"][$i];
									
									//$imgRuta, $imgNombre,$imgTipo,$escalaThumb,$numImagen
									//echo "el nombre de la imagen es:".$nombre."<br>";
									//La grande y el Thumbnails
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,3,$i,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									
									$Mythumbnail->introduce_imagen($ruta, $nombre,$tipo,1,$i,$idNoticias);
									$Mythumbnail->crear_thumbnail();
									
								}
						}//Error UPLOAD_ERR_OK end if
						
					}
				}//else
	
		}//fin del for $i

			redireccionar("noticias.php");
		
			
?>