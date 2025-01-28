<?php include("bloqueSeguridad.php");?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Servicios Web</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
	
	<!-- Base JS -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>


<div class="main boxed">

	<!-- TOP BAR 
	============================================= -->
	<?php include("compartidos/topBarServicios.php"); ?>
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
				
			</div>
			
		</div>
		<!-- Mobile Navigation -->
		
		<!-- End Mobile Navigation -->
	</div>

	<!-- END HEADER 
	============================================= -->

	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			<h1 class="centered semibold uppercase">M&oacute;dulos de la P&aacute;gina Web</h1>
			<p class="centered p-20 margin-40" style="color: #6e6e73;">M&oacute;dulos para la p&aacute;gina web&nbsp;</p>
			
			<div class="row">
               
                
                <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-painting">
						</div>
						<h3 class="centered"><a href="Usuarios.php" class="dark-link">Usuarios</a></h3>
						<p class="centered">
							 M&oacute;dulo para Administradores del Sitio</p>
					</div>
					<!-- End Icon Box -->
				</div>
                
                <?PHP 
				
if ($_SESSION['web']['roles']['cnoticias']==1)
	$hrefNoticias = "noticias.php";
	else $hrefNoticias = "#";
				?>
				<div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-photography">
						</div>
                       
						<h3 class="centered"><a href=<?PHP echo $hrefNoticias;?> class="dark-link">M&oacute;dulo de Noticias</a></h3>
						<p class="centered"><a href="http://www.umip.ac.pa/vida_universitaria.php" target="_blank">Mensajer&iacute;a.</a></p>
					</div>
					<!-- End Icon Box -->
				</div>
				<div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-print">
						</div>
						<h3 class="centered"><a href="consultaLinea.php" class="dark-link">Mensajes de Aspirantes</a></h3>
						<p class="centered">
							 Solicitud de Informaci&oacute;n.
						</p>
					</div>
					<!-- End Icon Box -->
				</div>
                
                <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service"><a href="portalServicios.php">
						<div class="service-image m-programming">
						</div></a>
						<h3 class="centered"><a href="portalServicios.php" class="dark-link">Regresar al Panel</a></h3>
						<p class="centered">
							 Regresar al men&uacute; de opciones principales.
						</p>
					</div>
					<!-- End Icon Box -->
				</div>
                
				
		   </div>
		

			<div class="title">
			  <h3 class="lined">Administradores del Sitio</h3></div>
					
			<div class="row">
				<div class="row-item col-1_3">
					<div class="b-quote">
						<img class="quote-ava" src="img/team/team-5.jpg" alt="">
						<div class="quote-text">
							 <?PHP echo $arrayConsultas[$i]; ?>

							<div class="quote-author-name">Neil Barrera</div>
							<div class="quote-author-position">
								 Designer, <a href="#" class="link">umip.ac.pa</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row-item col-1_3">
					<div class="b-quote">
						<img class="quote-ava" src="img/team/team-6.jpg" alt="">
						<div class="quote-text">
							 <?PHP echo $arrayConsultas[$i]; ?>

							<div class="quote-author-name">Subia Stephanie</div>
							<div class="quote-author-position">
								 <?PHP echo $arrayDescripcionMeses[$arrayMes[$i]].", ".$arrayAnio[$i];?>, <a href="enviarCorreo.php?id=<?PHP echo  $arrayId[$i];?>" class="link"> <?PHP echo $arrayCorreo[$i]; ?></a>
							</div>
						</div>
					</div>
				</div>

				<div class="row-item col-1_3">
					<div class="b-quote">
						<img class="quote-ava" src="img/ava.jpg" alt="">
						<div class="quote-text">
							Autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat vel illum dolore.

							<div class="quote-author-name">Andrew</div>
							<div class="quote-author-position">
								 Developer, <a href="#" class="link">Themeforest.net</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END CONTENT 
	============================================= -->

	<!-- FOOTER 
	============================================= -->
	<?php include("compartidos/footerNoticias.php");?>
	<!-- END FOOTER 
	============================================= -->
	
	
</div>
<!-- END MAIN 
============================================= -->
</body>
</html>