<?PHP
session_start();
session_destroy();

//Se destruye 
$url= "login.php";
echo "<meta http-equiv='refresh' content='0;url=$url'>";

?>
