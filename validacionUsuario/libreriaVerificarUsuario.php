<?php

/**
 utils.php
 Autor: Irina Fong 
 Fecha: 10/11/05
 Funciones de utilidad para diversas aplicaciones
**/

function redireccionar($url){

echo "<meta http-equiv='refresh' content='0;url=$url'>";
}//redireccionar

function EliminandoCaracteresdeInyeccion($cad2){
	

//$cad2 = " OR 1 '=' 1";
//$cad2 = " samuelaaron";
//echo "la cadena de inicio es: ".$cad2."<br>";
//$cad2 = trim(" samuelaaron"); //Antess de empeza el proceso se limpia la cadena;

$cad2 = trim($cad2); //Antess de empeza el proceso se limpia la cadena;

$cantCaracteres = strlen($cad2);

//echo "La cantidad de car�cteres es: ".$cant."<br>";

 $cont = 1;
 $caracter = "";
 $posicion_cadena = 0;
 $CaracterSustitudo = "G";//car�cter que cubrir�..los guiones y los ''' para cubrir inyecci�n de sql
 $cadenaResultante = "";

            

   while ($cont <= $cantCaracteres) { 
    //echo "la cadena analizar es: ".$cad2."<br>";
    //echo "el contador $cont esta en ".$cont."<br>";
    //echo "la bandera esta en ".$bandera."<br>";

   	 $caracter = substr($cad2,$posicion_cadena,1); //posici�n cero un car�cter. Un c�racter (1)


   			if ($caracter == "=" or $caracter == " " or $caracter == "'") {
          		//echo  "Entro en el If <br>";
          		//echo "EL car�cter en la posici�n 0 es : ".$caracter."<br>";
      			 $cadenaResultante = $cadenaResultante.$CaracterSustitudo;
        		// ereg_replace ("parque","circo",$cadena);parque se sustituye por circo

    		}else{
       			 $cadenaResultante = $cadenaResultante.$caracter;
			}
        $cont = $cont + 1;
        $posicion_cadena = $posicion_cadena + 1;
		
 	 }//fin del mientras
                                                               
// echo "la cadena resultantes es: ".$cadenaResultante."<br>";
                                                               
return($cadenaResultante);

}//fin de la funci�n

//Funci�n que redirecciona de una p�gina a otra


//Funci�n que obtiene el nombre y password del usuario y los valida en la bd
function validateUser($formLogin){
global $sql;
  $username = $formLogin["usuario"];
  $password = md5($formLogin["contrasena"]);
  //echo "password:_".$password."<br>";
  $username = EliminandoCaracteresdeInyeccion($username);
 
  // $password = md5(trim($formLogin["password"]));

  $query = "SELECT * FROM usuarios  WHERE username = '$username' and password = '$password' and Activo = 1";
  echo "<br>";
  //echo $query;
  echo "<br>";
  ///$query= sprintf("select * from usuarios where username='$username' and password='$password'");
  $result = $sql->objects($query);
  if($result!=FALSE){
  //$resp = mysql_fetch_array($result);
  $_SESSION['autenticado']= "SI";
  $_SESSION['Usuario']= $username;
  
  $resp = array();
  		foreach($result as $key => $value) {
  		 $resp[$key]=$value;
  		}
  		return $resp;
  }
  else
   return $result;
}

//Funci�n que obtiene mensajes de errores generales
function getMsg($num){
  $msg = "";
  switch($num){
    case 1:
	     $msg="El username o password son incorrectos";
		 break;
	case 2: $msg="";  break;
  }
  return $msg;
}

//Funcion que transforma un array en un objeto
function arrayToObject($array){

  foreach($array as $key => $value){
   // echo "key: ".$key. " value:" . $value."<br>";
    $obj->$key=$value;
  }
  return $obj;
}
/***Funci�n encargada de crear variables no declaradas e inicializarlas con vac�o
Par�metros:
 $var: variable que ser� evaluada para ser creada e inicializada con vac�o en caso de no existir
 
Retorna: nada 
***/
function init_var(&$var){
   if(!isset($var)){
      $var = "";
  }
}

/**
Funci�n que redirecciona la p�gina actual al url indicado
Par�metros:
 $url: almacena el url a direccionar...
**/
function refresh($url){
  echo "<meta http-equiv='refresh' content='0; URL=$url'>";
}


function my_exists($file){

   $ind=false;   //cambiar a false cuando este file este en el servidor
   if(file_exists($file) && !is_dir($file))
     $ind=true;//cambiar a true cuando este file este en el servidor
   
    clearstatcache () ;
	return $ind;
}


//Funci�n que obtiene los roles de un usuario
function getRoles($username){
  global $sql;
  $sql_id = $sql->query("select * from roles where username='$username'");
  $roles = array();
  while($resp = $sql->objects('',$sql_id)){
    $roles["cadmin"] = $resp->cadmin;
	$roles["cnoticias"] = $resp->cnoticias;
	$roles["cconsulta_linea"] = $resp->cconsulta_linea;
	$roles["cnotas_files"] = $resp->cnotas_files;
	$roles["comite_electoral"] = $resp->comite_electoral;
	$roles["compras"] = $resp->compras;
	


  }
  return $roles;
}
	



?>