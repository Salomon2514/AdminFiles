<?php

function redireccionar($url){

echo "<meta http-equiv='refresh' content='0;url=$url'>";
}//redireccionar


function Objeto($array)
{
	
	// $genericObject = new stdClass(); 
	$obj = new stdClass();
 	foreach ($array as $clave=>$valor){
 	$obj->$clave=$valor;
}//fin del forech
return $obj;
} //fin de la funci�n Objeto



?>