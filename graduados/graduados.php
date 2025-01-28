<?php


				
							include("../clases/setting.inc.php");
							$sql = new mod_db();
							include("../comunes/libreriabusquedas.php");
							
						
if (!empty($_REQUEST['nombre']))
$Nombre = $_REQUEST['nombre'];
else $Nombre = "";

if (!empty($_REQUEST['pagina']))
$pagina =$_REQUEST['pagina']; 


if (!empty($_REQUEST['apellido']))
$Apellido = $_REQUEST['apellido'];
else $Apellido = "";


if (!empty($_REQUEST['cedula']))
$Cedula = $_REQUEST['cedula'];
else $Cedula = "";

if (!empty($_REQUEST['promocion']))
$Promocion = $_REQUEST['promocion'];
else $Promocion = 0;

if ($Promocion == 0)
$PromocionVar = "";
else $PromocionVar = $Promocion;



if (!empty($_REQUEST['Buscar']))
$Buscar = true;
else  $Buscar = false;

if (!empty($_REQUEST['Limpiar']))
$Limpiar = true;
else  $Limpiar = false;



if ($Limpiar){
 $Promocion = 0;
 $Apellido = "";
 $Nombre = "";
 $Cedula = "";
 
}





function dibujar(){
	
	
	global $sql;
	global  $Buscar;
	global  $Nombre;
	global  $Apellido;
	global  $Cedula;
	global  $Promocion;
	global $pagina;
	
	
	
	
	$tipoValor_Cadena= 0;
		$tipoValor_Entero= 1;
		
		$tipoComparacion_Igual = 1;
		$TipoComparacion_Menor = 3;
		$tipoComparacion_MenorIgual = 5;
		$tipoComparacion_Mayor = 2;
		$tipoComparacion_MayorIgual = 4;
		$tipoComparacion_Like = 7;
		$valor12 = 0; 
		

		
		$condicionFinal = "";
		$condicionFinal = Comparacion($tipoValor_Cadena,$Cedula,0,"Cedula",$condicionFinal,8);
		$condicionFinal = Comparacion($tipoValor_Cadena,$Nombre,0,"PrimeNombre",$condicionFinal,7);
		$condicionFinal = Comparacion($tipoValor_Cadena,$Apellido,0,"PrimerApellido",$condicionFinal,7);
		
		
		
		
		
		
		if (($Buscar) and ($condicionFinal == "")) {
			
		$consultaPaginacion = "select * from  egresados    order by id desc";
		
		}elseif (($Buscar) and ($condicionFinal != "")){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consultaPaginacion = "select * from  egresados  $condicionFinal  order by id desc ";
		}elseif ($condicionFinal != ""){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consultaPaginacion = "select * from  egresados     $condicionFinal  order by id desc";
			
		}else { 
		$consultaPaginacion = "";
		}
	
	
	
	
			$registrospaginacion= 50;
			
			if (!$pagina){
				$inicio  = 0;
			}else {
				$inicio = ($pagina -1) * $registrospaginacion;
			}
		
				if ($consultaPaginacion != ""){
					$numb1 = $sql->nums($consultaPaginacion);
					$totalpaginas = ceil($numb1/$registrospaginacion);
				}
	
	
	
		if (($Buscar) and ($condicionFinal == "")) {
			
		$consulta= "select * from  egresados   order by id ASC   LIMIT  $inicio, $registrospaginacion";
		
		}elseif (($Buscar) and ($condicionFinal != "")){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consulta = "select * from  egresados $condicionFinal  order by id ASC  LIMIT  $inicio, $registrospaginacion";
		}elseif ($condicionFinal != ""){
		//echo "entro en la opcion buscar y condición distinta de vacío<br>";
		$consulta = "select * from  egresados    $condicionFinal  order by id ASC  LIMIT  $inicio, $registrospaginacion";
			
		}else { 
		$consulta = "";
		//$consulta = "select * from  egresados  order by id ASC  LIMIT  $inicio, $registrospaginacion ";
		}
		
		//echo $consulta."<br>";
	?>



				<div class="row mb-xlg mt-lg">
				<div class="col-md-10 col-md-offset-1">
				<div class="table-responsive">
				<table class="table table-bordered">
						<thead>
							<tr><th>Nombre</th><th>T&iacute;tulo</th> <th>Promoci&oacute;n</th></tr></thead>
							
                                            
                                            
	<?php
				
				
				//Cantidad de Colaboradores con Código de Marcación
				
		if ($consulta != ""){
					
				$Cantidad = $sql->nums($consulta); 
				$ad_query = $sql->query($consulta);
				
				$cont = 0;
				
				while($regEgresados = $sql->objects('',$ad_query)){
	
$Name= utf8_encode($regEgresados->PrimeNombre)." ".utf8_encode($regEgresados->SegundoNombre)." ".utf8_encode($regEgresados->PrimerApellido)." ".utf8_encode($regEgresados->SegundoApellido);
$Titulo = utf8_encode($regEgresados->Descripcion);
					
	?>
	
											<tbody>
												<tr>
                                                <td><?php echo $Name;?></td>
                                                <td><?php echo ($Titulo); ?></td>
                                                <td>&ensp;</td>
												</tr>
											
                
                <?php } //fin del mientras?>
                
                </tbody>
							
                            
                            
                           <?php } ?>
                            			</table>
									</div>
									</div>
								</div>
                                
                                

					
     <div class="pagination">
     					<div>
							 Page 1 of <?php echo $totalpaginas; ?>
						</div>
     

<ul class="pagination pagination-lg pull-right">
                                
						
						
			<?php if (($pagina -1) > 0) { ?>			
			<li><a href="graduados.php?pagina=<?php echo($pagina-1);?>&nombre=<?php echo $Nombre;?>&apellido=<?php echo $Apellido;?>&cedula=<?php echo $Cedula;?>">«</a></li>
			<?php } ?>
                    <?PHP 
			for ($i= 1; $i<=$totalpaginas; $i++){
				if ($pagina == $i){?>
            <li class="active"><a href="#"><?php echo $i;?></a></li>
            <?php  }else{ ?>
			<li><a href="graduados.php?pagina=<?php echo $i;?>&nombre=<?php echo $Nombre;?>&apellido=<?php echo $Apellido;?>&cedula=<?php echo $Cedula;?>"><?php echo $i;?></a></li>
            <?php }}//fin del for?>
			<?php if (($pagina + 1) <= $totalpaginas) ?>
			<li><a href="graduados.php?pagina=<?php echo ($pagina + 1);?>&nombre=<?php echo $Nombre;?>&apellido=<?php echo $Apellido;?>&cedula=<?php echo $Cedula;?>">»</a></li>
           
			</ul>

						
				
				
<?php } ?>
<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<title>Graduados UMIP</title>	

		<meta name="keywords" content="UMIP estudiantes Egresados" />
		<meta name="description" content="Estudiantes Egresados de la UMIP">
		<meta name="author" content="barretocorp.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/animate/animate.min.css">
		<link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="css/theme.css">
		<link rel="stylesheet" href="css/theme-elements.css">
		<link rel="stylesheet" href="css/theme-blog.css">
		<link rel="stylesheet" href="css/theme-shop.css">
        

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="vendor/rs-plugin/css/settings.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/layers.css">
		<link rel="stylesheet" href="vendor/rs-plugin/css/navigation.css">
        
        
        
      
		


		<!-- Skin CSS -->
		<link rel="stylesheet" href="css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="css/custom.css">

		<!-- Head Libs -->
		<script src="vendor/modernizr/modernizr.min.js"></script>

	</head>
	<body>
    <div class="body">
			<div role="main" class="main">
				<div class="slider-with-overlay">
						 

						<div class="slider-container rev_slider_wrapper" style="height: 560px;">
						<div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': 1170, 'gridheight': 560}">
							<ul>
								<li data-transition="fade">
									<img src="img/slides/slide-bg-5.jpg"  
										alt=""
										data-bgposition="center center" 
										data-bgfit="cover" 
										data-bgrepeat="no-repeat" 
										class="rev-slidebg">

									<div class="tp-caption large_bg_black"
										data-x="center"
										data-y="190"
										data-start="1000"
										data-whitespace="nowrap"						 
										data-transform_in="y:[100%];s:500;"
										data-transform_out="opacity:0;s:500;"
										data-mask_in="x:0px;y:0px;">ESTUDIANTES EGRESADOS</div>

									<!-- <div class="tp-caption bottom-label"
										data-x="center"
										data-y="280"
										data-start="1500"
										data-transform_in="y:[100%];opacity:0;s:500;">Universidad Marítima Internacional de Panamá.</div> -->
									
								</li>
							</ul>
						</div>
					</div>


					<div class="custom-position-1">
						<div class="container mb-xlg">
							
								<div class="row">
								
									<div class="col-md-10 col-md-offset-1">
									<div class="card">
										<div class="featured-boxes mt-none mb-none">
											<div class="featured-box featured-box-primary mt-xl">
												<div class="box-content">
													<!-- <h4 class="mb-none">Estudiantes Graduados</h4> -->
													<p>Para buscar a un graduado de la Universidad Marítima Internacional de Panamá, introduzca su número de cédula, su promoción ó el año de graduación. No hay necesidad de llenar todos los campos.</p>
													<form id="graduandos" action="graduados.php" method="POST">
														<div class="row">
															<div class="form-group">

																<div class="col-md-12 p-md">
																	<div class="col-md-2">
																		<label>C&eacute;dula /ID:</label>
																	</div>
																	<div class="col-md-10">
																		<input type="text" value="<?php echo $Cedula;?>" data-msg-required="Por favor introduzca su cédula." maxlength="100" class="form-control" name="cedula" id="cedula" placeholder="Ej. 9-999-999"	>
																	</div>
                                                                    
																</div>

																<div class="col-md-12 p-md">
																	<div class="col-md-2">
																		<label>Nombre:</label>
																	</div>
																	<div class="col-md-10">
																		<input type="text"  maxlength="100" class="form-control" name="nombre" id="nombre" value="<?php echo $Nombre;?>" >
																	</div>
																</div>
                                                                
                                                                <div class="col-md-12 p-md">
																	<div class="col-md-2">
																		<label>Apellido:</label>
																	</div>
																	<div class="col-md-10">
																		<input type="text"  data-msg-required="Por favor introduzca su Apellido." maxlength="100" class="form-control" name="apellido" id="apellido"  value="<?php echo $Apellido;?>">
																	</div>
																</div>

																<div class="col-md-12 p-md">
																	<div class="col-md-2">
																		<label>Promoción:</label>
																	</div>
																	<div class="col-md-10">
																		<input type="text" data-msg-required="Please enter the Promoci&oacute;n." maxlength="100" class="form-control" name="promocion" id="promocion"  value="<?php echo $PromocionVar;?>">
																	</div>
																</div>
															</div>
														</div>
														<div class="row">
															<div class="col-md-12">
																<input type="submit" value="Buscar" name="Buscar" class="btn btn-lg btn-primary mb-xl pl-xlg pr-xlg" data-loading-text="Loading...">
																<input type="submit" value="Limpiar" name="Limpiar" class="btn btn-lg btn-primary mb-xl pl-xlg pr-xlg" data-loading-text="Loading...">
															</div>

															<div class="col-md-12">
																<div class="alert alert-success hidden" id="contactSuccess">
																	Message has been sent to us.
																</div>

																<div class="alert alert-danger hidden" id="contactError">
																	Error sending your message.
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								</div>

								<?php dibujar();?>
						</div>
					</div>
				</div>

			</div>
		</div>



		<!-- Vendor -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/jquery.appear/jquery.appear.min.js"></script>
		<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
		<script src="vendor/jquery-cookie/jquery-cookie.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/common/common.min.js"></script>
		<script src="vendor/jquery.validation/jquery.validation.min.js"></script>
		<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
		<script src="vendor/isotope/jquery.isotope.min.js"></script>
		<script src="vendor/owl.carousel/owl.carousel.min.js"></script>
		<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script src="vendor/vide/vide.min.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="js/theme.js"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

		<!-- Current Page Vendor and Views -->
		<script src="js/views/view.contact.js"></script>
		
		<!-- Theme Custom -->
		<script src="js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="js/theme.init.js"></script>


		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		
			ga('create', 'UA-12345678-1', 'auto');
			ga('send', 'pageview');
		</script>
		 -->

	</body>
</html>
