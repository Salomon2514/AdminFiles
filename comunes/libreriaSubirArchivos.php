<?php 
function tipoError($error){
$status = "";

		switch ($error){
			case 1: //
			$status = "El archivo sobrepasa el límite autorizado por el servidor, consulte a ifong@umip.ac.pa";
			break;
			case 2: //UPLOAD_ERR_FORM_SIZE
			$status = "El archivo sobrepasa  el límite autorizado en el formulario HTML!";
			break;
			
			case 3: //UPLOAD_ERR_PARTIAL
			$status = "EL envío del archivo ha sido detenido durante la transferencia!";
			break;
			
			case 4: //UPLOAD_ERR_NO_FILE
			$status = "El archivo que ha enviado tiene un tamaño nulo!!!!";
			break;
		}//$ERROR fin del case

return ($status);

}
?>