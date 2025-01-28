<?php

//Funci�n que recorta una cadena de texto para los titulares de las noticias
function cut_cadena($cadena, $charlimit){


if(strlen($cadena) > $charlimit){

$cadena = substr($cadena,'0',$charlimit);
$array = explode(' ',$cadena);
array_pop($array);
$new_cadena = implode(' ',$array);

return $new_cadena.'...';

} else {

return $cadena;

}
}
?>