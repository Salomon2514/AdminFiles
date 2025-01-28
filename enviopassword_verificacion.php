<?PHP 
error_reporting(E_ALL|E_STRICT);
header("Content-type: text/html; charset=utf8");
 // include("libs/config.php");
 //chmod("/directorio/archivo", 0777);  

 chmod("enviopassword_verificacion.php",0777);

 function ArrayObjetos($array){
 	
		foreach ($array as $clave=>$valor){
		 $obj->$clave=$valor;
		}//fin del forech
	return $obj;
	
 }//fin de ArrayObjetos ($array)


  
  
  include("bloqueSeguridad.php");

  include("clases/setting.inc.php");
  $sql = new mod_db();

	

	//$objetoForm   = ArrayObjetos($_POST);
    
	$CuentaCorreo = $_POST["Correo"];
	$Nombre = $_POST["Nombre"];
	$Asunto = $_POST["Asunto"];
	$Cuerpo = $_POST["Cuerpo"];
	$idConsulta = $_POST["id"];
	
	
	 				
	 
				 include_once("phpmailer/class.phpmailer.php");
				 include_once("phpmailer/phpmailer.lang-en.php");
	  
	
					$mail = new PHPMailer();
					$mail->PluginDir = "phpmailer/";  //includes/";
		
					
					//$mail->SetLanguage("en", $syspath.'/common/');
					
					$mail->IsSMTP(); // telling the class to use SMTP / send via SMTP 
					//permite modo debug para ver mensajes de las cosas que van ocurriendo
				
					$mail->SMTPAuth   = true;  
					$mail->SMTPSecure    = 'ssl'; //tls 587
					
					
					//indico el servidor de Gmail para SMTP
					$mail->Host = "smtp.gmail.com";//smtp.office365.com
					$mail->Username   = "umipsie.info@gmail.com";  // GMAIL username //jbatista@umip.ac.pa aplicaciones@umip.ac.pa
					$mail->Password   = "jesucristo33";     //javasun  //cambiarlo  por aplicaciones  
					
					//Error: Language string failed to load: data_not_accepted con mi correo
					//$mail->Username   = "ifong@umip.ac.pa";  // GMAIL username //jbatista@umip.ac.pa
					//$mail->Password   = "fongumip";     //javasun  //cambiarlo  por aplicaciones  
					
					//PORT
					//SMTP Server - Host : smtp.gmail.com - Secure (SSL) - Port 465
					//SMTP Server - Host : smtp.gmail.com - Secure (TLS) - Port 587
					//indico el puerto que usa Gmail
					$mail->Port       = 465;  // 465           // GMAIL password 5253 //25
					$mail->Timeout = 30; //establece el timeout del servidor SMTP en 10 segundos
					
					/*$mail->From       = nvl($objeto->email);
					/*$mail->FromName   = nvl($objeto->nombre)." ".nvl($objeto->apellido);*/
					
					$mail->From       = "aplicaciones@umip.ac.pa"; //El from tiene que ser igualito con el password y el Username
					$mail->FromName   = "Aplicaciones UMIP ";
					
					//$mail->Subject    = "Le Remitimos el Password del Sistema de Estudiantes SIE-UMIP";
					$mail->Subject    = $Asunto;
					 
					
					//$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
					
					//$area_data=getSiafaData("areas_tematicas", "id='".nvl($objeto->area)."'" ,"nombre");
					//$asistente_data=getSiafaData("tipo_asistentes", "id='".nvl($objeto->tipo_asistente)."'" ,"nombre");
					//$participante_data=getSiafaData("tipo_participante", "id='".nvl($objeto->tipo_participante)."'" ,"nombre");
					
					
					
					//$Tema = "<div align='left'><img src='../images/direccion.gif' border ='0' ></div>";
					//$mail->AddEmbeddedImage('images/direccion.gif', 'Sitio web','images/direccion.gif','base64','image/gif');
					
					
					
					
					
					$Tema = "Estimado (a). ".$Nombre."<br><br>";
					$Tema .= $Cuerpo."<br><br>";
					$Tema .= "Hemos recibido su solicitud del portal web, de la  Universidad Mar&iacute;tima Internacional de Panam&aacute;.";
					$Tema .= "<br>";
					$Tema .= "<br>";
					
					
					//$Tema = "El Password de su cuenta de estudiante es :".$Password."<br>";
					$Despedida = "Saludos cordiales y &eacute;xitos en su carrera profesional. <br>";
					$Despedida .= "<br><br>";
					$Despedida .= "Atentamente, <br><br>";
					//$Despedida .= "Direcci&oacute;n de Inform&aacute;tica <br>";
					$Despedida .= "Universidad Mar&iacute;tima Internacional de Panam&aacute; - UMIP <br><br>";
					
					
					$Nota = "Este correo ha sido enviado a usted por la Direcci&oacute;n de Inform&aacute;tica  a la direcci&oacute;n electr&oacute;nica <br>"; 
					$Nota .= "que mantenemos en nuestra  base de datos. Si quiere darnos su opini&oacute;n del contenido de este <br>";  
					$Nota .= "correo, le agradecemos se comunique con nosotros a trav&eacute;s del correo aplicaciones@umip.ac.pa <br>";
					
					$mail->MsgHTML($Tema.$Despedida.$Nota);
					
					
					$mail->AddAddress($CuentaCorreo);
					//$mail->AddAddress("ifong@umip.ac.pa");
					$mail->AddAddress("aplicaciones@umip.ac.pa");
					//funciona pero o de abajo no se!!!!
					//$mail->ConfirmReadingTo("ifong@umip.ac.pa");  //con esto no funciona
					//$mail->AddReplyTo("Aplicaciones","ifong@umip.ac.pa");
			
	
					//$mail->AddReplyTo(nvl("ifong@umip.ac.pa")); este si estaba decomentados
					//$mail->AddAttachment("images/phpmailer.gif");             // attachment
					$intentos = 1;
					$exito = false;
						
					while ((!$exito) && ($intentos <5)){
							sleep(5);
								$exito = $mail->Send();
									$intentos = $intentos + 1;						
					} //fin del mientras
			
			 $FechaSistema = date("y-m-d H:i:s");
			
					  if(!$exito) {
						$Mensaje =  "Problemas enviando correo electrónico  a: ".$CuentaCorreo."<br>";
						$Mensaje .=  "Mailer Error: " .$mail->ErrorInfo;
						
						
						
						
						$url = "enviopassword_mensaje.php?Mensaje=".$Mensaje;
						echo "<meta http-equiv='refresh' content='0; URL=$url'>";
					  } else {
						  //echo 
						   $Mensaje  = "Se ha enviado correctamente la respuesta a la solicitud de informaci&oacute;n (***) a la cuenta de correo $CuentaCorreo.  ";
						   $Mensaje   = ($Mensaje);
						   
						    $string = "RespuestaEnviada = 1, FechaRespuesta='$FechaSistema'";
							$update_str = "id='$idConsulta'";
							$sql->update("consulta_linea","$string","$update_str");
						
						$url = "enviopassword_mensaje.php?Mensaje=".$Mensaje;
						echo "<meta http-equiv='refresh' content='0; URL=$url'>";
					  }
			
	

       

			
	$sql->disconnect();

				
			   //$Mensaje = "En la Base de información no existe este número de cédula ";
			   //$url = "enviopassword_mensaje.php?Mensaje=".$Mensaje;
			   //echo "<meta http-equiv='refresh' content='0; URL=$url'>";
		
		

  ?>