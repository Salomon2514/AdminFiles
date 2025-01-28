<?PHP
include("bloqueSeguridad.php");

if (!empty($_GET['id']))
$idNoti = ($_GET['id']);
else $idNoti =0;

if (!empty($_GET['date3']))
$fechaNoticia = ($_GET['date3']);
else $fechaNoticia ="";
//echo "la fecha es:".$fechaNoticia."<br>";
if (!empty($_GET['titulo']))
$var_titulo = $_GET['titulo'];
else $var_titulo ="";

if (!empty($_GET['Submit']))
$Buscar = true;
else $Buscar = false;

if (!empty($_GET['Reset']))
$Reset = true;
else $Reset = false;



if (!empty($_GET['Anio']))
$var_anio = $_GET['Anio'];
else $var_anio = 0;



if ($Reset){
 $fechaNoticia ="";	
 $var_titulo ="";
 $var_anio = 0;// date("Y");
 $idNoti =0;
}




function dibujar(){
	
	global $sql;
	global $var_titulo;
	global $fechaNoticia;
	global $idNoti;

	global $Buscar;
	$fechaNoticia = getfecha($fechaNoticia);
	
	
	   
	 
	

	 	$tipoValor_Cadena= 0;
		$tipoValor_Entero= 1;
		
		$tipoComparacion_Igual = 1;
		$TipoComparacion_Menor = 3;
		$tipoComparacion_MenorIgual = 5;
		$tipoComparacion_Mayor = 2;
		$tipoComparacion_MayorIgual = 4;
		$tipoComparacion_Like = 7;
		$valor12 = 0; 
		

		
		
	$arrMes = array();
	$arrMes[1] = "Ene";
	$arrMes[2] = "Feb";
	$arrMes[3] = "Mar";
	$arrMes[4] = "Abr";
	$arrMes[5] = "May";
	$arrMes[6] = "Jun";
	$arrMes[7] = "Jul";
	$arrMes[8] = "Ago";
	$arrMes[9] = "Sep";
	$arrMes[10] = "Oct";
	$arrMes[11] = "Nov";
	$arrMes[12] = "Dic";
	

		
		$condicionFinal = "";
		$condicionFinal = Comparacion($tipoValor_Cadena,$var_titulo,0,"titulo",$condicionFinal,7);
		$condicionFinal = Comparacion($tipoValor_Cadena,$fechaNoticia,0,"fecha",$condicionFinal,8);
		$condicionFinal = Comparacion($tipoValor_Entero,$idNoti,0,"id",$condicionFinal,1);
		
		
		//echo "la condición fianal es: ".$condicionFinal."<br>";
		$RegistrosAMostrar = 20;
		//Estos valores los recibo por Get
		if (isset($_GET['pag'])){
			//echo "la p�gina actual es: ".$_GET['pag']."<br>";
			$RegistrosAEmpezar = ($_GET['pag']-1)*$RegistrosAMostrar;
			$PagAct = $_GET['pag'];
		//caso contrario a lo que hicimos
		}else{
			$RegistrosAEmpezar = 0;
			$PagAct = 1;
		}//fin del else
		
		
		
		
		
		if (($Buscar) and ($condicionFinal == "")) {
			
		$consultaPaginacion = "select * from  noticias   order by id desc";
		
		}elseif (($Buscar) and ($condicionFinal != "")){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consultaPaginacion = "select * from  noticias $condicionFinal  order by id desc ";
		}elseif ($condicionFinal != ""){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consultaPaginacion = "select * from  noticias    $condicionFinal  order by id desc";
			
		}else { 
		$consultaPaginacion = "select * from  noticias  order by id desc ";
		}
	
	
	
		$NroRegistros = $sql->nums($consultaPaginacion);
		$PagAnt = $PagAct - 1;
		$PagSig = $PagAct + 1;
		
		$PagUlt = ($NroRegistros/$RegistrosAMostrar);
		//Verificamos residuo para ver si llevar� decimales
		
		$Res = $NroRegistros % $RegistrosAMostrar;
		if ($Res > 0) {
		$PagUlt = floor($PagUlt)+ 1;
		//$PagUlt = $PagUlt + 1;
		}
	
	
	
		if (($Buscar) and ($condicionFinal == "")) {
			
		$consulta= "select * from  noticias   order by id desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
		
		}elseif (($Buscar) and ($condicionFinal != "")){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consulta = "select * from  noticias $condicionFinal  order by id desc  LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
		}elseif ($condicionFinal != ""){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consulta = "select * from  noticias    $condicionFinal  order by id desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar";
			
		}else { 
		$consulta = "select * from  noticias  order by id desc LIMIT $RegistrosAEmpezar, $RegistrosAMostrar ";
		}
		
		//echo $consulta."<br>";

	
				$Cantidad = $sql->nums($consulta); //Cantidad de Colaboradores con Código de Marcación
				$ad_query = $sql->query($consulta);
				 $cont = 0;
				 $dir="prensa/thumbnails/";
				while($regNoti = $sql->objects('',$ad_query)){
					$Accion = "Modificar";
					$img = $dir.$regNoti->timg1_3;
					echo "la dirección es: ".$img."<br>";
	?>
		
					<!-- Post 1 -->
					<div class="post-preview preview-medium">
						<!-- Post Title & Meta -->
						<h2><a href="#" class="dark-link"><?php echo utf8_encode($regNoti->titulo)?></a></h2>
						<div class="post-meta">
							 Posted by <span class="meta-author"><a href="#"><?php echo utf8_encode($regNoti->Usuario)?></a></span>
							<span class="meta-date">on <?php echo  $arrMes[$regNoti->Mes]." $regNoti->Dia".", ".$regNoti->Anio?></span>
							<span class="meta-tags"><a href="#">Web Design.</a></span>
							<span class="meta-comment"><a href="#">4 comments</a></span>
						</div>
						<!-- End Post Title & Meta -->
						<!-- Post Image -->
						<div class="post-image-wrap">
							<a href="portfolio-single-half-slider.php?id=<?php echo $regNoti->id;?>" class="post-image">
								<img src=<?php echo $img?> alt="">
								<div class="link-overlay icon-chevron-right"></div>
							</a>
						</div>
						<!-- End Post Image -->
						<div>
							<p>
								<?PHP  echo cut_cadena(utf8_encode(strip_tags(nvl($regNoti->contenido))), 450);?>
							</p>
							<a class="btn colored" href="noticiasWeb.php?id=<?php echo $regNoti->id?>&tipo=<?php echo $regNoti->tipo?>&Accion=<?php echo $Accion;?>">More<i class="icon-chevron-sign-right" style="margin: 0 0 0 7px;"></i></a>
						</div>
					</div>
					<!-- End Post 1 -->
                    <!-- Pagination -->
					<?php }// fin del mientras  
					
					
					
					
						echo "<a onclick=\"Pagina('1')\">Primero </a>";	
						if($PagAct >1) 
							echo "<a onclick=\"Pagina('$PagAnt')\">Anterior </a>";
							echo "<strong>Pagina"." ".$PagAct."/".$PagUlt." "."</strong>";
						if ($PagAct < $PagUlt) 
							echo "<a onclick=\"Pagina('$PagSig')\">Siguiente  </a>";
							echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo  </a>";
					?><!-- End Pagination -->
					<!-- Pagination
					<div class="pagination">
						<div>
							 Page 1 of 4
						</div>
						<a href="#" class="active">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a> 
					</div> -->
					<!-- End Pagination -->
				


<?php 

				
}

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Web Admin</title>
	
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
    <link rel="stylesheet" href="Estilos/general.css"   type="text/css">

	
	<!-- Base JS -->
    <!--Este es el CSS Del Calendario--> 
	<link rel="stylesheet" type="text/css" media="all"  href="calendario/skins/aqua/theme.css" title="Aqua" />

        <!-- Archivos del calendario que se encuentra en estudiante !-->
 	<script type="text/javascript" src="calendario/calendar.js"></script>
 	<script type="text/javascript" src="calendario/lang/calendar-en.js"></script>
	<script type="text/javascript" src="calendario/calendario.js"></script>

    
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
    
    <!-- Archivo de Paginación !-->
	<script type="text/javascript" src="js/paginacion_ajax_post_noticias.js"></script>

</head>
<?php

include("clases/setting.inc.php");
$sql = new mod_db();
include("comunes/libreriaNoticias.php");
include("comunes/libreriaFechas.php");
include("comunes/libreriabusquedas.php");
include("comunes/stdlib.php");
include("comunes/funcionesCadenas.php");

	
	
	
$totalNoticias = totales("noticias", "tipo = 1","id");
$totalEventos = totales("noticias", "tipo = 2","id");
$totalDeportiva = totales("noticias", "tipo = 3","id");
//$numb = $sql->nums($consulta);
?>
<body>
<div id="wrap">
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
				<li><a href="#">Blog: Medium Images</a></li>
			</ul>
			<!-- Title -->
			<h1> M&oacute;dulo de Noticias: </h1>
		
		</div>
	</div>
   
	<!-- END TITLE BAR
	============================================= -->



	<!-- CONTENT 
	============================================= -->
	
    <div class="content shortcodes">
		<div class="layout">
			<div class="row">
           		 <div class="row-item col-3_4">	
           		  <div  id="wrap"><?php dibujar(); ?></div>
          		</div>   
                
                
					<!-- Sidebar -->
				<div class="row-item col-1_4 sidebar">
					<!-- Search Widget -->
						<div class="b-blog-search">
						<form class="b-form" action="noticias.php">
							<div class="input-wrap">
								<i class="icon-search"></i>
								<input type="text" placeholder="Titulo.."  id="titulo" name="titulo" value="<?php echo $var_titulo; ?>" id = "titulo">
							</div>
                            
                            <br><br>
                             <input type="text" name="date3" id="sel3" style="width: 200px; font-size:12px;" readonly="true" onFocus="runInputs(this)" value="<?=($fechaNoticia); ?>"><img src="img/dhtmlxgrid_icon.gif" value="Fecha"onclick="return showCalendar('sel3', '%d-%m-%Y');" border="0">
                            <br><br>
                            <input  class="btn-submit btn colored" type="submit" name="Submit"  id="Submit" value="Buscar" style="width:auto"/>
                             
                            <input  class="btn-submit btn colored" type="submit"  name="Reset" id=""  value="Limpiar" style="width:auto"/>
						</form>
					</div>
					<!-- End Search Widget -->
                    	<!-- Tag Cloud -->
					<h3 style="margin-bottom: 20px;">Tag Cloud</h3>
					<div class="b-tag-cloud">
					<?php $AccionGuardar ="Guardar"?>
						<a href="noticiasWeb.php?tipo=1&Accion=<?php echo $AccionGuardar ?>">Agregar una Noticia</a>
                        <a href="noticiasWeb.php?tipo=2&Accion=<?php echo $AccionGuardar ?>">Agregar una Evento</a>
                        <a href="noticiasWeb.php?tipo=3&Accion=<?php echo $AccionGuardar ?>">Agregar una Noticia Deportiva</a>
					
					</div>
					<!-- End Tag Cloud -->
					<!-- Categories List -->
					<h3>Categories</h3>
					<ul class="b-list b-categories">
						<li><a href="#">Noticias <b class="count">(<?php echo $totalNoticias?>)</b></a></li>
						<li><a href="#">Eventos <b class="count">(<?php echo $totalEventos?>)</b></a></li>
						<li><a href="#">Deportivas <b class="count">(<?php echo $totalDeportiva?>)</b></a></li>
					</ul>
					<!-- End Categories List -->
					<!-- Recent Posts -->
					<h3>Recent Posts</h3>
					<ul class="b-list recent-post">
						<li><a href="#">At vero eos et accusamus</a></li>
						<li><a href="#">Et harum quidem rerum</a></li>
						<li><a href="#">Necessitatibus saepe eveniet</a></li>
					</ul>
					<!-- End Recent Posts -->
                    
                    
                    <?php 
					$consultaDeportivas= "select id, timg1_4 from noticias where tipo = 3  and activo = 1 ORDER BY id DESC  LIMIT 6";
					//$consultaEventos=    "select id, timg1_3 from noticias where tipo = 2  and activo = 1 ORDER BY id DESC  LIMIT 1";
					$consultaNoticias=   "select id, timg1_4 from noticias where tipo = 1  and activo = 1 ORDER BY id DESC  LIMIT 2";
					$regEvento = $sql->objects("select id, timg1_4 from noticias where tipo = 2  and activo = 1 ORDER BY id DESC  LIMIT 1");
					 $dir="prensa/thumbnails/";
					 $imagenEvento = "$dir".$regEvento->timg1_4;
					?>
					
					<!-- Latest Projects -->
					<h3 style="margin-bottom: 20px;">Latest Projects</h3>
					<div class="latest-project">
                    	<div class="latest-project-item">
							<a href="noticias.php?id=<?php echo $regEvento->id;?>"><img  src="<?php echo $imagenEvento;?>" alt=""></a>
						</div>
						    <?php 
							 $Cantidad = $sql->nums($consultaNoticias); //Cantidad de Colaboradores con Código de Marcación
							 $ad_query = $sql->query($consultaNoticias);
							 $cont = 0;
							 $dir="prensa/thumbnails/";
							while($regNoticias = $sql->objects('',$ad_query)){
								$srcNoticias="$dir".$regNoticias->timg1_4;
							?>
								<div class="latest-project-item">
									<a href="noticias.php?id=<?php echo $regNoticias->id;?>"><img src="<?php echo $srcNoticias;?>" alt=""></a>
								</div>
						 <?php } ?>
						
						<!--<div class="latest-project-item">
							<a href="#"><img src="img/port/rp-5.jpg" alt=""></a>
						</div>!-->
                        <?php 
							 $Cantidad = $sql->nums($consultaDeportivas); //Cantidad de Colaboradores con Código de Marcación
							 $ad_queryDeportivas = $sql->query($consultaDeportivas);
							 $cont = 0;
							
							while($regNotiDeportivas = $sql->objects('',$ad_queryDeportivas)){
								$src="$dir".$regNotiDeportivas->timg1_4;
							?>
								<div class="latest-project-item">
									<a href="noticias.php?id=<?php echo $regNotiDeportivas->id;?>"><img src="<?php echo $src;?>" alt=""></a>
								</div>
						 <?php } ?>
						
					</div>
					<!-- End Latest Project -->
					<!-- Twitter Widget -->
					<h3>Twitter Widget</h3>
					<div class="b-twitter">
						<ul>
							<li>
								<span>Et harum quidem rerum facilis est et expedita distinctio <a href="#" class="link">http://twitter.com</a></span>
								<span class="twit-date">Jan 7, 2013</span>
							</li>
							<li>
								<span>Nam libero tempore, cum soluta nobis est eligendi :) <a href="#" class="link">http://twitter.com</a></span>
								<span class="twit-date">Jan 7, 2013</span>
							</li>
						</ul>
					</div>
					<!-- End Twitter Widget -->
				
				</div>
				<!-- End Sidebar -->
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
	

  </div><!-- END WRAP 
============================================= -->
</div>
<!-- END MAIN 
============================================= -->
</body>
</html>