<?php
include("destruccion_Sessiones.php");

?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<meta name="Description" content="Pagina Web Admin la UMIP" />
<meta name="Keywords" content="your, keywords" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Distribution" content="Global" />
<meta name="Author" content="Irina Fong - irina@gmail.com" />
<meta name="Robots" content="index,follow" />

<script src="jquery/jquery-latest.js" type="text/javascript"></script> 
<script src="jquery/jquery.validate.js"  type="text/javascript"></script>
<link rel="shortcut icon"  href="img/b_2i10.ico">
<link rel="stylesheet" href="css/cmxform.css" type="text/css" />
<link rel="stylesheet" href="Estilos/Techmania.css" type="text/css" />
<link rel="stylesheet" href="Estilos/general.css"   type="text/css">
<title>Login WebAdmin - UMIP</title>


<script src="jquery/jquery-latest.js"></script>
<script type="text/javascript" src="jquery/jquery.validate.js"></script>

  <script>
 	 $(document).ready(function(){
 	   $("#iniciar").validate({
  		rules: {
  		  		 usuario: "required",
   				 contrasena: "required"
   		 	
 			 }//rules
		}); //validate form
 	 }); //fin del function
  </script>


  <style>
  		#field, label { float: left; font-family: Arial, Helvetica, sans-serif; font-size: small; }
  		label {  width: 10em; }
		br { clear: both; }
		input { margin-left: .5em; float: left; border: 1px solid black; margin-bottom: .5em;  }
		input.submit { float: none; }
		input.error { border: 1px solid red; width: auto; }
		label.error {
			background: url('img/unchecked.gif') no-repeat;
			padding-left: 16px;
			margin-left: .3em;
		} 
		
		label.valid {
			background: url('img/checked.gif') no-repeat;
			display: block;
			width: 16px;
			height: 16px;
		}
	</style>

  


  
</head>

<body>
<!-- wrap starts here -->	
<div id="wrap">
  <div id="headerlogin"></div>
  <p>
    <!-- content-wrap starts here -->
   <a href=""><img src="img/regresar.gif" alt="Atr&aacute;s" width="90" height="30" longdesc="login.php" /></a></p>
 
   <div align="center"><p><?php //if (isset($emsg)) echo getMsg($emsg);?></p>
    <form  class="cmxform" id="iniciar"  name="iniciar" method="post" action="index.php">
    <?php ?>
    <input type="hidden" name="tolog" id="" value="true" />
           <br />
          <table width="89%" border="0" align="center">
            <tr>
              <td height="19" colspan="2"  align="center">Sistema: WeAdmin </td></tr>
            <tr>
              <td width="25%">Usuario:</td>
              <td width="42%"><input  id="usuario" name="usuario" type="text" class="required" minlength="2" /></td>
              <label for="label"></label>
            </tr>
            <tr>
              <td>Contrase&ntilde;a:</td>
              <td><input  id="contrasena" name="contrasena" type="password" /></td>
              <label for="label"></label>
            </tr>
			      <tr>
                    <td colspan="2" align="center"> <!-- onclick="verificacion_login(); return false;"  -->                 
                        <div align="center"><input name="Submit" type="submit" class="clear" value="Buscar"  />
                        </div>
	        </tr>
      </table><br />
    </form></div>
    <br />



  
  <?php include("footerLogin.php");?>
        <!-- wrap ends here -->		
</div>	
</body>
</html>