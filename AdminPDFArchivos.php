<?PHP 
include("bloqueSeguridad.php");

include("clases/setting.inc.php");
$sql = new mod_db();
include("comunes/LibreriaCarpetas.php");
include("comunes/libreriaNoticias.php");
include("comunes/libreriaFechas.php");
include("comunes/stdlib.php");	

$Accion =$_GET['Accion'];


switch ($Accion) {
	
	case "Guardar":
	$Accion = "Guardar";
	$id = 0;
	$Usuario = $Usuario;
	
	$documento ="";
	$fechaDocumento ="";
	$carpeta = 0;
	//echo $tipoNoticia;
	$activaPublicacion= 1; //Publicar: Sí	
	$AnioArchivo = 0;
	$AchivoUpload = "";
	$ruta = "";
	$timg1_4 = "";
	
	
	break;
	case "Modificar":
	$Accion = "Modificar";
		//echo "entro en la opción modificar<br>";
		$idArchivo = $_GET['id'];
		//echo "el id del idNoticia es: ".$idNoticia."<br>";
		
		$regTransparencia = $sql->objects("select * from adminarchivos  where id ='$idArchivo'");
		$consulta = "select * from adminarchivos  where id ='$idArchivo'";
		//echo $consulta."<br>";
		
		$id = $idArchivo;
		$Usuario = $Usuario;
		
	
	$documento =utf8_encode($regTransparencia->Nombre);
	$fechaDocumento = getfecha($regTransparencia->FechaSubida);
	$carpeta = $regTransparencia->Carpeta;
	
	//echo $tipoNoticia;
	$activaPublicacion=  $regTransparencia->Publicar;
	
	
	$ruta = $regTransparencia->Ruta;
	$AchivoUpload = $regTransparencia->Archivo;
	$timg1_4 = $regTransparencia->timg1_4;
	$AnioArchivo = $regTransparencia->Anio;	
	
	break;
	default: echo "Error en el Módulo de Archivos";
}
	

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Noticias</title>
	
    <!--Este es el CSS Del Calendario--> 
	<link rel="stylesheet" type="text/css" media="all"  href="calendario/skins/aqua/theme.css" title="Aqua" />
    
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
	
    
	<!--  Este css es para la validación del formulario -->
	<!-- <link rel="stylesheet" href="css/cmxform.css"       type="text/css" />
    <link rel="stylesheet" href="Estilos/Techmania.css" type="text/css" />-->
	<link rel="stylesheet" href="Estilos/general.css"   type="text/css">

	

    
    	<!--  editores de TextArea !-->
		<script language="javascript" src="WYSIWYG/source.js" type="text/javascript"></script> 

	<!-- Base JS -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/main.js"></script>
    	
	<!-- Revolution Slider -->
	<script src="js/jquery.themepunch.plugins.min.js"></script>
	<script src="js/jquery.themepunch.revolution.min.js"></script>
	<script src="js/revolution-slider-options.js"></script>
    
    

    <!-- Archivos del calendario que se encuentra en estudiante !-->
 	<script type="text/javascript" src="calendario/calendar.js"></script>
 	<script type="text/javascript" src="calendario/lang/calendar-en.js"></script>
	<script type="text/javascript" src="calendario/calendario.js"></script>
    
   <script type="text/javascript" src="js/bordes.js"></script>
	<!--Esto Archivos necesarios para validar los datos principales del formulario !-->
	<script src="jquery/jquery-latest.js"></script>
	<script type="text/javascript" src="jquery/jquery.validate.js"></script>
    
    
    	<!-- Archivo de Paginaci�n !-->
	<script type="text/javascript" src="js/paginacion_ajax_post.js"></script>


  	
  <script>
  
  $(document).ready(function(){
	 
    $("#formTransparencia").validate({
 		 rules: {
    		Documento: "required",
			'enlace': {required:true, digits: true, min: 1},
			'anio': {required:true, digits: true, min: 1},
			
    		date3: {
     			  required: true, 
				  //min: "05-04-2018",
				   // format: 'dd-mm-	YYYY',
				   // message: 'The date of birth is not valid'
     	 			date: true
    			},//fin de date3
				
		
		 }//fin de rules
	});//fin de validate	
 });
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

<div class="main boxed">

	<!-- TOP BAR 
	============================================= -->
	<?php include("compartidos/topBar.php"); ?>
	<!-- END TOP BAR 
	============================================= -->


	<!-- HEADER 
	============================================= -->
	<div class="header">
		<div class="layout clearfix">
			<div class="mob-layout wrap-left">
				<!-- Logo -->
				<a href="#" class="logo"><img src="img/logo.png" alt=""></a>
				<!-- Mobile Navigation Button -->
				<div class="btn-menu icon-reorder"></div>
				<!-- Navigation -->
				<?php // include("tabs.php"); ?>
			</div>
		
		</div>
		<!-- Mobile Navigation -->
		<?php include("menuNavegacionMovil.php"); ?>
        
		<!-- End Mobile Navigation -->
	</div>
	<!-- END HEADER 
	============================================= -->
	
	<!-- TITLE BAR
	============================================= -->
	<div class="b-titlebar">
		<div class="layout">
			<!-- Bread Crumbs -->
			<ul class="crumbs">
				<li>You are here:</li>
				<li><a href="UnloadArchivosPDFAdmin.php">Home</a></li>
				<li><a href="portalServicios.php">Aplicaciones</a></li>
			</ul>
			<!-- Title -->
			<h1>M&oacute;dulo de Noticias</h1>
		</div>
	</div>
	<!-- END TITLE BAR
	============================================= -->

	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			
			<!-- Promo Box -->
			<div class="b-promo">
				
				<h3>M&oacute;dulo para subir archivos a la Plataforma web</h3>
				 Este m&oacute;dulo le permitir&aacute; subir los archivos a la p&aacute;gina de transparencia. Son obligatorios los campos de Descripción de Documentos, Fecha y Tipo de Enlace.</div>
			<!-- End Promo Box -->
            
            
			<?php  include("AdminPDFArchivos_form.php"); ?>
			

		</div>
	</div>
	<!-- END CONTENT 
	============================================= -->

	<!-- FOOTER 
	============================================= -->
    
    <?php include("compartidos/footerNoticias.php");?>
    
	<!-- END FOOTER 
	============================================= -->
	
	<!-- STYLE SWITCHER 
	============================================= -->

	<!-- END STYLE SWITCHER 
	============================================= -->
	
</div>
<!-- END MAIN 
============================================= -->

</body>
</html>
