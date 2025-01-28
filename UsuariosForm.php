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
	
	$username = "";
	$pass = "";
	$nombre = "";
	$apellido = "";
	$email = "";
	$tipo = "user";
	$activo = 1;

		$rolNoticias = 0;
		$rolTransparencia = 0;
		$rolConfiguracion = 0;
		$rolComiteElectoral = 0;
	
	break;
	case "Modificar":
	$Accion = "Modificar";
		//echo "entro en la opción modificar<br>";
		$username = $_GET['id'];
		//echo "el id del idNoticia es: ".$idNoticia."<br>";
		
		$regUsuarios = $sql->objects("select * from usuarios  where username ='$username'");
		$regPermisos = $sql->objects("select cnoticias, cnotas_files, cadmin,comite_electoral,username from roles  where username ='$username'");


		
		$Usuario = $Usuario;
		
	
		$username = ($regUsuarios->username);
		$pass = ($regUsuarios->password);
		$nombre = $regUsuarios->nombre;
		$apellido = $regUsuarios->apellido;
		$email = $regUsuarios->email;
		$tipo = $regUsuarios->tipo;
		
		$activo = $regUsuarios->activo;
	
		$rolConfiguracion = $regPermisos->cadmin;
		$rolNoticias = $regPermisos->cnoticias;
		$rolTransparencia = $regPermisos->cnotas_files;
		$rolComiteElectoral = $regPermisos->comite_electoral;
		//echo "el rol de comité electoral es: ".$rolComiteElectoral."<br>";
	
	break;
	default: echo "Error en el M&oacute;dulo  de Usuarios Web";
}
	

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

	<title>Perfil de Usuarios</title>
	
    <!--Este es el CSS Del Calendario--> 
	<link rel="stylesheet" type="text/css" media="all"  href="calendario/skins/aqua/theme.css" title="Aqua" />
    
	<!-- Styles -->
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/prettyPhoto.css">
	<link rel="stylesheet" type="text/css" href="css/settings.css" media="screen"/>
	<link rel="stylesheet" href="css/color-scheme/turquoise.css">
	
    
	<link rel="stylesheet" href="Estilos/general.css"   type="text/css">
	<link rel="stylesheet" href="Estilos/CustomCheckbox.css"   type="text/css">
	
    
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

  	
  	<script type="text/javascript">
		jQuery.validator.setDefaults({
		debug: true,
		success: "valid"
	});;
	</script>

  	<script>
  
 	 $.validator.setDefaults({
		submitHandler: function(permisos) { 
 			username = $("#usuario").val();
				//window.alert(username);
				
				$.ajax({
					type: "POST",
					url:  "ValidacionDuplicadoUsuario.php",
					data: "username="+username, //daba error porque le faltaba el ampersan
					dataType: "html",
					//Content-Type: "text/html; charset=iso-8859-1", //Esti impide la modificaciï¿½n del sistema

					//beforeSend: function(datos){
	     			//		$('#main').html("<img src='anim.gif' alt='Espere unos momentos...'/><br><br>"); 
        			//	},
					     
					success: function(datos){
						window.alert(datos);
						datos = jQuery.trim(datos);
						// $("#main").html(datos);

						if (datos == "libre")
						permisos.submit();
						else return false;
			        },
						  
					 error: function(data){
            		 alert("El proceso ha fallado Permisos!!! ups");
        			 }
						
					});
		
		
		}
		
	 });
  
  
  
  	$(function(){
		marcar = function(elemento){
		elemento = $(elemento);
		elemento.prop("checked", true);
	}		
	desmarcar = function(elemento){
	elemento = $(elemento);
	elemento.prop("checked", false);
	}
	});
	
	
  $(document).ready(function(){
	
	
    $("#permisos").validate({
 		 rules: {
    		usuario: "required",
			clave: "required",
			nombre: "required",
			apellido: "required",
			email:{
			 required: true,
    		 email: true	
			}
			
		
		 }//fin de rules
	});//fin de validate	
 });
  </script>

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
				<li><a href="Usuarios.php">Home</a></li>
				<li><a href="configPage.php">Aplicaciones</a></li>
			</ul>
			<!-- Title -->
			<h1>M&oacute;dulo de Usuarios</h1>
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
				
				<h3>M&oacute;dulo de Usuarios </h3>
				 Este m&oacute;dulo le permitir&aacute; agregar nuevos ususarios con privilegios.</div>
			<!-- End Promo Box -->
            
            
			<?php  include("usuarios_formulario.php"); ?>
			

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
