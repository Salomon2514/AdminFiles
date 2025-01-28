<?php 
include("bloqueSeguridad.php");

include("clases/setting.inc.php");
$sql = new mod_db();
include("comunes/libreriaTransparencia.php");
include("comunes/libreriaNoticias.php");
include("comunes/libreriaFechas.php");
include("comunes/libreriabusquedas.php");
include("comunes/stdlib.php");	





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
	<link rel="stylesheet" href="Estilos/tabla.css"   type="text/css">
	<link rel="stylesheet" href="Estilos/cssBotones.css"  type="text/css">
	

    
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
    
    <script type="application/javascript" src="js/jquery-1.6.2.js"></script>
    <script type="application/javascript" src="js/jquery-1.6.2.min.js"></script>
    <script type="application/javascript" src="js/jquery.functions.js"></script>
     <script type="application/javascript" src="js/paginacion_ajax_post.js"></script> 
    
   <script type="text/javascript" src="js/bordes.js"></script>



</head>

<body>

<div class="main boxed"  id="wrap">

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
				<?php //include("tabs.php"); ?>
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
				<li><a href="portalServicios.php">Home</a></li> 
				<li><a href="noticias.php">Noticias</a></li>
			</ul>
			<!-- Title -->
			<h1>M&oacute;dulo de Transparencia</h1>
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
				 Este m&oacute;dulo le permitir&aacute; subir los archivos a la p&aacute;gina de transparencia.
                 </div>
			<!-- End Promo Box -->
            
            
			<?php  include("buscadorTransparencia.php"); ?>
			

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
