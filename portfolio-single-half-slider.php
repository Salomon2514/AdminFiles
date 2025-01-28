<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Boson</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
	
	<!-- Base JS -->
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/main.js"></script>
	
	<!-- Prety photo -->
	<script src="js/jquery.prettyPhoto.js"></script>
	<script>
		$(document).ready(function(){
			$("a[rel^='prettyPhoto']").prettyPhoto();
		});
	</script>
</head>

<body>

 <div id="wrap">
<div class="main boxed">

	<!-- TOP BAR 
	============================================= -->
	<?php include("compartidos/topBar.php"); ?>
	<!-- END TOP BAR 
	============================================= -->

	<!-- END TOP BAR 
	============================================= -->

	<!-- HEADER 
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

    <?php 
	include("clases/setting.inc.php");
	$sql = new mod_db();

	$id = $_REQUEST['id'];
	include("comunes/libreriaNoticias.php");
	include("comunes/funcionesCadenas.php");
	$titulo = imagen("noticias","id = $id","titulo");
	$user  = imagen("noticias","id = $id","Usuario");
	$date   = imagen("noticias","id = $id","fecha");
	$contenido = imagen("noticias","id = $id","contenido");
	
	
		$partFecha = explode("-", $date);
				$anio =  $partFecha[0]; // piece1
				$mes = intval($partFecha[1]); // piece2
				$dia = $partFecha[2]; // piece2
				
				$mes_arr = array();
				$mes_arr[1]= "Ene";
				$mes_arr[2]= "Feb";
				$mes_arr[3]= "Mar";
				$mes_arr[4]= "Abr";
				$mes_arr[5]= "May";
				$mes_arr[6]= "Jun";
				$mes_arr[7]= "Jul";
				$mes_arr[8]= "Ago";
				$mes_arr[9]= "Sep";
				$mes_arr[10]= "Oct";
				$mes_arr[11]= "Nov";
				$mes_arr[12]= "Dic";
	
	
	?>

	<!-- TITLE BAR
	============================================= -->
	<div class="b-titlebar">
		<div class="layout">
			<!-- Bread Crumbs -->
			<ul class="crumbs">
				<li>You are here:</li>
				<li><a href="noticias.php">Home</a></li>
				<li><a href="#">Galleria de Fotos </a></li>
			</ul>
			<!-- Title -->
			<h1><?php echo utf8_encode($titulo);?></h1>
		</div>
	</div>
	<!-- END TITLE BAR
	============================================= -->
	
	<!-- CONTENT 
	============================================= -->

	<div class="content">
		<div class="layout">
			<div class="row">
				<div class="row-item col-2_3">
					<!-- Slider -->
					<div class="b-carousel">
						<div class="carousel-content">
                        
                           <?php 
						   
						   $arrayimagen = array();
						   $arrayimagen[1]="img1";
						   $arrayimagen[2]="img2";
						   $arrayimagen[3]="img3";
						   $arrayimagen[4]="img4";
						   
						   $img1= imagen("noticias","id = $id","img1");
						   $img1  = "prensa/thumbnails/".$img1; 
						   $img2= imagen("noticias","id = $id","img2");
						   $img2  = "prensa/thumbnails/".$img2; 
						   $img3= imagen("noticias","id = $id","img3");
						   $img3  = "prensa/thumbnails/".$img3;
						   $img4= imagen("noticias","id = $id","img4");
						   $img4  = "prensa/thumbnails/".$img4;
						   ?>
                           <? if ($img1 != "") ?>
						   <img class="carousel-item" src="<?php echo $img1;?>" alt="">
                           <? if ($img2 != "") ?> 
                           <img class="carousel-item" src="<?php echo $img2;?>" alt=""> 
                           <? if ($img3 != "") ?> 
						   <img class="carousel-item" src="<?php echo $img3;?>" alt=""> 
                           <? if ($img4 != "") ?> 
                           <img class="carousel-item" src="<?php echo $img4;?>" alt=""> 
                    
						   
						   
                            
						</div>
					</div>
					<!-- End Slider -->
				</div>
				<div class="row-item col-1_3">
					<!-- Project Description -->
					<div class="title">
						<h4 class="lined">Noticias Descripci&oacute;n</h4>
					</div>
					<p>
					<?php echo utf8_encode(cut_cadena(strip_tags($contenido), 400)); ?>
					</p>
					<!-- Social Buttons
					<ul class="b-social m-varicolored">
						<li><a class="fb" href="#"><i class="icon-facebook"></i></a></li>
						<li><a class="tw" href="#"><i class="icon-twitter"></i></a></li>
						<li><a class="pt" href="#"><i class="icon-pinterest"></i></a></li>
						<li><a class="lin" href="#"><i class="icon-linkedin"></i></a></li>
						<li><a class="gl" href="#"><i class="icon-google-plus"></i></a></li>
					</ul>
                    
                     -->
					<!-- End Social Buttons -->
					<div class="gap" style="height: 10px;">
					</div>
					<!-- End Project Description -->
					<!-- Project Details -->
					<div class="title">
						<h4 class="lined">Noticias Detalles</h4>
					</div>
					<ul class="b-list">
						<li><strong>Posted by: </strong><?php echo $user;  ?></li>
						<li><strong>Date: </strong><?php echo  $mes_arr[$mes]." $dia".", ".$anio?></li>
						<!--<li><strong>Tags: </strong>Logo, Web Design</li>-->
					</ul>
					<!-- Live Preview Button -->
				  <p>
						<a href="noticias.php" class="btn colored">Noticias<i class="icon-chevron-sign-right" style="margin: 0 0 0 7px;"></i></a>
					</p>
					<!-- End Live Preview Button -->
					<div class="gap" style="height: 10px;">
					</div>
					<!-- End Project Details -->
				</div>
			</div>
			<div class="gap" style="height: 20px;">
			</div>
			<!-- Related Projects -->
			<div class="title">
				<h4 class="lined">Related Projects</h4>
			</div>
			<div class="row port b-works">
            <?PHP 
            			   $timg1= imagen("noticias","id = $id","timg1_2");
						   $timg1  = "prensa/thumbnails/".$timg1; 
						   $timg2= imagen("noticias","id = $id","timg2");
						   $timg2  = "prensa/thumbnails/".$timg2; 
						   $timg3= imagen("noticias","id = $id","timg3");
						   $timg3  = "prensa/thumbnails/".$timg3;
						   $timg4= imagen("noticias","id = $id","timg4");
						   $timg4  = "prensa/thumbnails/".$timg4;
			?>
				<!-- Project 1 -->
				<div class="row-item col-1_4">
					<div class="work">
						<a href="#" class="work-image">
							<img src="<?php echo $timg1;?>" alt="">
							<div class="link-overlay icon-chevron-right">
							</div>
						</a>
						<a href="#" class="work-name">Smiling</a>
						<div class="tags">
							 Photography
						</div>
					</div>
				</div>
				<!-- End Project 1 -->
				<!-- Project 2 -->
				<div class="row-item col-1_4">
					<div class="work">
						<a href="img/port/surfer-big.jpg" rel="prettyPhoto" class="work-image">
							<img src="<?php echo $timg2;?>" alt="">
							<div class="link-overlay icon-search">
							</div>
						</a>
						<a href="#" class="work-name">Surfer</a>
						<div class="tags">
							 Web Design
						</div>
					</div>
				</div>
				<!-- End Project 2 -->
				<!-- Project 3 -->
				<div class="row-item col-1_4">
					<div class="work">
						<a href="../../player.vimeo.com/video/67500403@badge=0" rel="prettyPhoto" class="work-image">
							<img src="<?php echo $timg3;?>" alt="">
							<div class="link-overlay icon-play">
							</div>
						</a>
						<a href="#" class="work-name">Architecture</a>
						<div class="tags">
							 Identity
						</div>
					</div>
				</div>
				<!-- End Project 3 -->
				<!-- Project 4 -->
				<div class="row-item col-1_4">
					<div class="work">
						<a href="img/port/yacht-sailing-big.jpg" rel="prettyPhoto" class="work-image">
							<img src="<?php echo $timg4;?>" alt="">
							<div class="link-overlay icon-search">
							</div>
						</a>
						<a href="#" class="work-name">Yacht Sailing</a>
						<div class="tags">
							 Tehnology
						</div>
					</div>
				</div>
				<!-- End Project 4 -->
			</div>
			<!-- End Related Projects -->
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