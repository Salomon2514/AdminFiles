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
			<h1>M&oacute;dulo de Mensajer&iacute;a</h1>
		</div>
	</div>
	<!-- END TITLE BAR
	============================================= -->




	<!-- CONTENT 
	============================================= -->
	<div class="content shortcodes">
		<div class="layout">
			<h1 class="centered semibold uppercase">M&oacute;dulos de mensajes</h1>
			<p class="centered p-20 margin-40" style="color: #6e6e73;">SOLICITUD DE INFORMACI&Oacute;N</p>
			
			
			<div class="title">
			  <h3 class="lined">Mensajes</h3></div>
					
                  <?PHP 
				  
				  $arrayDescripcionMeses = array();
				  
				  $arrayDescripcionMeses[1] = "Ene";
				  $arrayDescripcionMeses[2] = "Feb";
				  $arrayDescripcionMeses[3] = "Mar";
				  $arrayDescripcionMeses[4] = "Abr";
				  $arrayDescripcionMeses[5] = "May";
				  $arrayDescripcionMeses[6] = "Jun";
				  $arrayDescripcionMeses[7] = "Jul";
				  $arrayDescripcionMeses[8] = "Ago";
				  $arrayDescripcionMeses[9] = "Sep";
				  $arrayDescripcionMeses[10] = "Oct";
				  $arrayDescripcionMeses[11] = "Nov";
				  $arrayDescripcionMeses[12] = "Dic";
				  
				  
				  $arrayNombre = array();
				  $arrayConsultas = array();
				  $arrayCorreo = array();
				  $arrayMes = array();
				  $arrayAnio = array();
				  $arrayFecha = array();
				  
				  $campos = "id, nombre, telefono, email,Mes,Anio, fecha, consultas";
				  $consulta2 = "SELECT $campos  FROM consulta_linea where  RespuestaEnviada = 0 order by id DESC  LIMIT 1, 60";
				  
				   
						
				  $cont = 0;
				  $list_query = $sql->query($consulta2);
					while($row = $sql->objects('',$list_query)){
	  		 			
						$cont = $cont  + 1;
				 		
							$arrayId[$cont] = $row->id;
							$arrayNombre[$cont] = $row->nombre;
							//echo "la consulta es: ".$arrayNombre[$cont]."<br>";
							$arrayConsultas[$cont] = $row->consultas;
							//echo "la consulta es: ".$arrayConsultas[$cont]."<br>";
							$arrayCorreo[$cont] = $row->email;
							$arrayMes[$cont] = $row->Mes;
							$arrayAnio[$cont] = $row->Anio;
							$arrayFecha[$cont] = $row->fecha;
							
			 
					} //fin del mientras
					
					$i = 1;
					 while($i <= $cont){
						 ?>
						<div class="row">
                        <div class="row-item col-1_3">
                            <div class="b-quote">
                                <img class="quote-ava" src="img/ava.jpg" alt="">
                                <div class="quote-text">
                                   <?PHP echo $arrayConsultas[$i]; ?>
        
                                    <div class="quote-author-name"><?PHP echo  $arrayNombre[$i];?></div>
                                    <div class="quote-author-position">
                                         <?PHP echo $arrayDescripcionMeses[$arrayMes[$i]].", ".$arrayAnio[$i];?>, <a href="enviarCorreo.php?id=<?PHP echo  $arrayId[$i];?>" class="link"> <?PHP echo $arrayCorreo[$i]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?PHP $i = $i + 1;?>
                        <div class="row-item col-1_3">
                            <div class="b-quote">
                                <img class="quote-ava" src="img/ava.jpg" alt="">
                                <div class="quote-text">
                                   <?PHP echo $arrayConsultas[$i]; ?>
        
                                    <div class="quote-author-name"><?PHP echo  $arrayNombre[$i];?></div>
                                    <div class="quote-author-position">
                                         <?PHP echo $arrayDescripcionMeses[$arrayMes[$i]].", ".$arrayAnio[$i];?>, <a href="enviarCorreo.php?id=<?PHP echo  $arrayId[$i];?>" class="link"><?PHP echo $arrayCorreo[$i]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
                         <?PHP $i = $i + 2;?>
                        <div class="row-item col-1_3">
                            <div class="b-quote">
                                <img class="quote-ava" src="img/ava.jpg" alt="">
                                <div class="quote-text">
                                   <?PHP echo $arrayConsultas[$i]; ?>
        
                                    <div class="quote-author-name"><?PHP echo  $arrayNombre[$i];?></div>
                                    <div class="quote-author-position">
                                        <?PHP echo $arrayDescripcionMeses[$arrayMes[$i]].", ".$arrayAnio[$i];?>,<a href="enviarCorreo.php?id=<?PHP echo  $arrayId[$i];?>" class="link"><?PHP echo $arrayCorreo[$i]; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div> 
						 
						  
					<?PHP
						
					 $i++;
					 
					?> </DIV>
					<?PHP }//fin del mientras
					
					
					$sql->disconnect();
					 ?>	  
							  
		
            
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