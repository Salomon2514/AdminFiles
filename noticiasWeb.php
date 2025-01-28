<?php 
include("bloqueSeguridad.php");

include("clases/setting.inc.php");
$sql = new mod_db();
include("comunes/libreriaNoticias.php");
include("comunes/libreriaFechas.php");
include("comunes/stdlib.php");	

$Accion =$_GET['Accion'];

switch ($Accion) {
	case "Guardar":
	$Accion = "Guardar";
	$id = 0;
	$Usuario = $Usuario;
	$tituloNoticia ="";
	$contenido = "";
	$contenido =trim($contenido);
	$fechaNoticia ="";
	$tipoNoticia = $_GET['tipo']; //Noticia
	//echo $tipoNoticia;
	$activoNotica= 1; //Publicar: Sí	

	$imagen1 ="";
	$imagen2 ="";
	$imagen3 ="";
	$imagen4 ="";

	
	
	break;
	case "Modificar":
	$Accion = "Modificar";
		//echo "entro en la opción modificar<br>";
		$idNoticia = $_GET['id'];
		//echo "el id del idNoticia es: ".$idNoticia."<br>";
		$regNoti = $sql->objects("select * from noticias where id ='$idNoticia'");
	
	$id = $idNoticia;
	$Usuario = $Usuario;
	$tituloNoticia = utf8_encode($regNoti->titulo);
	$contenido = utf8_encode($regNoti->contenido);
	$fechaNoticia = getfecha($regNoti->fecha);
	$tipoNoticia =  $regNoti->tipo;
	$activoNoticia=  $regNoti->activo;

	$imagen1 = $regNoti->img1;
	$imagen2 = $regNoti->img2;
	$imagen3 = $regNoti->img3;
	$imagen4 = $regNoti->img4;
	
	break;
	default: echo "Error en el Módulo de Noticias Web";
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
    
    
	
	<!-- Prety photo -->
	<script src="js/jquery.prettyPhoto.js"></script>
	<script>
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>
    
    <!-- Archivos del calendario que se encuentra en estudiante !-->
 	<script type="text/javascript" src="calendario/calendar.js"></script>
 	<script type="text/javascript" src="calendario/lang/calendar-en.js"></script>
	<script type="text/javascript" src="calendario/calendario.js"></script>
    
   <script type="text/javascript" src="js/bordes.js"></script>


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
				<a href="index.html" class="logo"><img src="img/logo.png" alt=""></a>
				<!-- Mobile Navigation Button -->
				<div class="btn-menu icon-reorder"></div>
				<!-- Navigation -->
				<?php include("tabs.php"); ?>
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
				<li><a href="noticias.php">Home</a></li>
				<li><a href="#">Noticias Formulario</a></li>
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
				
				<h3>M&oacute;dulo de noticias web</h3>
				 Este m&oacute;dulo le permitir&aacute; subir las noticias con 4 im&aacute;genes.
                 </div>
			<!-- End Promo Box -->
            
            
			<?php  include("noticias_form.php"); ?>
			

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
