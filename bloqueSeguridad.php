<?php
session_start();  
//comprueba que el usuario esta autenticado
if ($_SESSION['autenticado'] != "SI"){
	// si no existe va a la p�gina de autenticado
	//Para Eliminar una sesi�n en particular. 
    unset($_SESSION['Usuario']);//libera la variable de sesi�n registrada
	
	
	session_destroy();//elimina la sesi�n actual, elimina cualquier dato de la sesi�n
	header("location:login.php");
	//salimos de este script
	exit();
}else{
    $Usuario = $_SESSION['Usuario'];	
}

?>