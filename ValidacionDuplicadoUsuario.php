<?php

include("clases/setting.inc.php");
$sql = new mod_db();

//consulta la tabla de usuarios,, y valida que el usuario que viene
//por GET, 

			$username = $_GET['username'];

			$consulta = "select * from usuarios where username = '$username'";
			$ad_query = $sql->query($consulta);
			$numb = $sql->nums($consulta);
			
			if ($numb > 0){
			 echo "ocupada";
			}else  echo "libre";



?>