<!DOCTYPE html>

<html>

<head>
	<meta charset="iso-8859-1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Bajo construcci&oacute;n</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/klein-blue.css">
	
	<!-- Base JS -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/main.js"></script>
</head>

<body>

<div class="main boxed">

	<!-- TOP BAR 
	============================================= -->
	<div class="b-top-bar">
		<div class="layout">
			<!-- Some text -->
			<div class="wrap-left">
				<span class="top-bar-text">Email: comiteelectoral@umip.ac.pa</span>
			</div>
			<div class="wrap-right">
				<!-- Phone -->
				<span class="top-bar-phone"><span class="icon-phone">Para mayor informaci&oacute;n: </span> 520-0110</span>
				<!-- Social Icons -->
				<div class="top-bar-social">
				
					<!-- 
					<a class="yt" href="#"><i class="icon-youtube"></i></a>
					<a class="pt" href="#"><i class="icon-pinterest"></i></a>
					<a class="tl" href="#"><i class="icon-tumblr"></i></a>
					<a class="is" href="#"><i class="icon-instagram"></i></a>
					<a class="vk" href="#"><i class="icon-vk"></i></a>
					<a class="dx" href="#"><i class="icon-dropbox"></i></a>
					<a class="fs" href="#"><i class="icon-foursquare"></i></a>
					<a class="gh" href="#"><i class="icon-github-alt"></i></a>
					<a class="mx" href="#"><i class="icon-maxcdn"></i></a> 
					-->
				</div>
				<!-- End Social Icons -->
			</div>
		</div>
	</div>
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
				<?php include("menuPrincipal.php");?>
			</div>
			<!-- Search Form -->
			
			<!-- End Search Form -->
		</div>
		<!-- Mobile Navigation -->
		<?PHP include("mob-menu.php"); ?>
		<!-- End Mobile Navigation -->
	</div>
	<!-- END HEADER 
	============================================= -->

	<!-- TITLE BAR
	============================================= -->
	
	<!-- END TITLE BAR
	============================================= -->

	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
        	<div class="img-wrap margin-30">
				<a href="img/under.jpg" rel="prettyPhoto" class="work-image">
				<img src="img/under.jpg" alt="">
				
				</a>
			</div>
			<h1 style=" margin-bottom: 65px; margin-top: 35px " class="centered error-404">Bajo Construcci&oacute;n</h1>
			<p class="centered p-20" style="margin-bottom: 25px;">Disculpe, estamos trabajando para usted, regrese pronto.</p>
			<p class="centered"><a href="index.html" class="btn big colored"><i class="icon-circle-arrow-left"></i>Regresar</a></p>
		</div>
	</div>
	<!-- END CONTENT 
	============================================= -->

	<!-- FOOTER 
	============================================= -->
	<div class="footer">
		<!-- Widget Area 
		<div class="b-widgets">
			<div class="layout">
				<div class="row">
					<!-- Links 
					<div class="row-item col-1_4">
						<h3>DOCUMENTOS RECIENTE</h3>
						<ul class="b-list just-links m-dark">
							<li><a href="#">Voluptas Assumenda</a></li>
							<li><a href="#">Repudiandae Sint</a></li>
							<li><a href="#">Perferendis Doloribus</a></li>
							<li><a href="#">Maxime Placeat</a></li>
							<li><a href="#">Quidem Rerum</a></li>
							<li><a href="#">Occaecati Cupiditate</a></li>
						</ul>
					</div>
					<!-- End Links -->
					<!-- Latest Tweets -->
					
					<!-- End Latest Tweets -->
					<!-- Tag Cloud -->
					
					<!-- End Tag Cloud -->
					<!-- Contact Form 
					<div class="row-item col-1_4">
						<h3>Escríbenos</h3>
						<!-- Success Message 
						<div class="form-message"></div>
						<!-- Form 
						<form class="b-form b-contact-form" action="contact.php">
							<div class="input-wrap m-full-width">
								<i class="icon-user"></i>
								<input class="field-name" type="text" placeholder="Nombre (obligatorio)">
							</div>
							<div class="input-wrap m-full-width">
								<i class="icon-envelope"></i>
								<input class="field-email" type="text" placeholder="E-mail (obligatorio)">
							</div>
							<div class="textarea-wrap">
								<i class="icon-pencil"></i>
								<textarea class="field-comments" placeholder="Mensaje"></textarea>
							</div>
							<input class="btn-submit btn colored" type="submit" value="Enviar">
						</form>
						<!-- End Form 
					</div>
					<!-- End Contact Form 
				</div>
			</div>
		</div>>-->
		<!-- End Widget Area -->
		<!-- Copyright Area -->
		<div class="b-copyright">
					<?php include("footer.php");?>

		</div>
	</div>
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