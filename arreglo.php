<?php 
	include("clases/objetoDefinicion.php");
	include("comunes/libreriaNoticias.php");
	
	
	 $arr = array('foo' => 'bar', 'property' => 'value');
	$objeto = Objeto($arr);
	
	echo "<br>".$objeto->foo;
?>