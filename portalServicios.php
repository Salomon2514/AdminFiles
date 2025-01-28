<?php include("bloqueSeguridad.php");
include("clases/setting.inc.php");
$sql = new mod_db();

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

	<!-- CONTENT 
	============================================= -->
    <?php 
	
	if ($_SESSION['web']['roles']['cnotas_files']==1)
	$hrefUnloadArchivos = "UnloadArchivosAdmin.php";
	else $hrefUnloadArchivos = "#";
	
	?>
	<div class="content shortcodes">
		<div class="layout">
			<h1 class="centered semibold uppercase">M&oacute;dulos de la P&aacute;gina Web</h1>
			<p class="centered p-20 margin-40" style="color: #6e6e73;">M&oacute;dulos para la p&aacute;gina web&nbsp;</p>
			
			<div class="row">
                    <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
                    <div class="service-image m-photo-manipulation"></div>
						
						<h3 class="centered"><a href=<?PHP echo $hrefUnloadArchivos;?>> Unload Imagenes</a></h3>
						<p class="centered">Secci&oacute;n para subir imagenes (peg, gif, png)</a>
                        </p>
					</div>
					<!-- End Icon Box -->
                    
			  </div>
           <?php 
	if ($_SESSION['web']['roles']['cadmin']==1)
	$hrefConfig = "configPage.php";
	else $hrefConfig = "#";
	?>	
                <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-programming">
						</div>
						<h3 class="centered"><a href=<?PHP echo $hrefConfig;?> class="dark-link">Config</a></h3>
						<p class="centered">
							 M&oacute;dulo de Configuraci&oacute;n
						</p>
					</div>
					<!-- End Icon Box -->
				</div>
                
	<?php 
	//echo "sesion ".$_SESSION['web']['roles']['cnotas_files'];
	if ($_SESSION['web']['roles']['cnotas_files']==1)
	$hrefMensajes = "UnloadArchivosPDFAdmin.php";
	else $hrefMensajes = "#";
	?>	
		  <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-creative-writing">
						</div>
                        
                     <h3 class="centered"><a href=<?PHP echo $hrefMensajes;?> class="dark-link">Unload PDF</a>.</h3>
					 <p class="centered">Guardar PDF	</p>
							 
					
			</div>
					<!-- End Icon Box -->
		</div>
        
        
				<div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="service-image m-web-design"></div>
						<h3 class="centered"><a href="salir.php" class="dark-link">Salir</a></h3>
						<p class="centered">
							Salir del portal web admin.
						</p>
					</div>
					<!-- End Icon Box -->
                    
                    
				
			</div>

	<!----------------------------------------------------------------------------------------------------------->		
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
                       
						<h3 class="centered"><a href="#" class="dark-link">Por Asignar</a></h3>
						<p class="centered"> Solicitud de Informaci&oacute;n. </p>
					</div>
					<!-- End Icon Box -->
				</div>
				<div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-literature"></div>
						</div>
						<h3 class="centered"><a href="consultaLinea.php" class="dark-link">Administraci&oacute;n de Resueltos de Comit&eacute;</a></h3>
						<p class="centered">
							 Solicitud de Informaci&oacute;n.
						</p>
					</div>
					<!-- End Icon Box -->
				
                 
                <div class="row-item col-1_4">
					<!-- Icon Box -->
					<div class="b-service">
						<div class="service-image m-animation">
						</div>
						<h3 class="centered"><a href="#" class="dark-link">Por Asignar</a></h3>
						<p class="centered">
							 Solicitud de Informaci&oacute;n.
						</p>
					</div>
					<!-- End Icon Box -->
			
            </div>
		
           
           <!------------------------------------------------------------------------------------------------------------------>




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
				  $consulta2 = "SELECT $campos  FROM consulta_linea where  RespuestaEnviada = 0 order by id DESC  LIMIT 1, 4";
				  
				   
						
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