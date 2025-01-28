<?php
/* This script is setting all vars */
##### Setting SQL Type #####
$sql_type = "1"; // 1 --> MySQL ; 2 --> MSSQL
##### Setting SQL Vars #####
#$sql_host = "localhost";
#$sql_name = "expedientes";
#$sql_user = "adminCapital"; //adminRRHH	
#$sql_pass = "ShaAdo4033"; ///umiprrhh30 //excluye "delete"



##### Setting SQL Vars #####
$sql_host = "10.252.110.14";//168.77.212.43
$sql_name = "webpage";//webpage
$sql_user = "prensaumip";//root
$sql_pass = "shalom30umip"; //matr13adtr08

//$sql_host = "localhost";
//$sql_name = "webpage"; //'adminseting2'
//$sql_user = "root"; //adminRRHH	 **'NeylanNicolle2514'
//$sql_pass = "demo"; ///umiprrhh30 //excluye "delete"

##### Setting Other Vars #####
$per_page = "10";

 if($sql_type == "1"){
  include ("mysql.inc.php");		
 }elseif($sql_type == "2"){
  include ("mssql.inc.php");
 }//FIN DEL IF

?>