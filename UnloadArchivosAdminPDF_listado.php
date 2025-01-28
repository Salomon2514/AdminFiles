<?PHP 


if (isset($_REQUEST['Documento'])){
$documento = $_REQUEST['Documento'];
}else $documento = "";


if (isset($_REQUEST['enlace'])){
$enlace = $_REQUEST['enlace'];
}else $enlace = 0;

if (isset($_REQUEST['anio'])){
$anio = $_REQUEST['anio'];
}else $anio = date("Y");


if (isset($_REQUEST['publicar'])){
$publicar = $_REQUEST['publicar'];
}else $publicar = 1;


if (isset($_REQUEST['Buscar'])){
$Buscar = $_REQUEST['Buscar'];
//echo "entro en la opción buscar";
}else $Buscar = false;
	


if (isset($_REQUEST['Borrar'])){
//echo "ENTRO EN LA OPCIÓN BORRAR ";
	$documento = "";
	$publicar = 1;
	$anio = date("Y");
	$enlace = 0;
	
}


//echo "el documento .... ".$documento."<br>";
//echo "el publicar .... ".$publicar."<br>";
//echo "el anio .... ".$anio."<br>";
//echo "el enlace .... ".$enlace."<br>";

function dibujar()
	{

		global $Buscar;

		global $sql;
		global $pagina;
		global $documento;
		
		global $documento;
		global $enlace;
		global $anio;
		global $publicar;
		global $Buscar;
		
		
		
		$condicionFinal = ""; //Inicializando Condici?n Final;
		$anio_actual = date('Y'); //cuatro cifras
		$mes_actual = date('m');
		$dia_actual = date('d');


	 	$tipoValor_Cadena= 0;
		$tipoValor_Entero= 1;
		$tipoValorFecha = 2;
		
		$tipoComparacion_Igual = 1;
		$TipoComparacion_Menor = 3;
		$tipoComparacion_MenorIgual = 5;
		$tipoComparacion_Mayor = 2;
		$tipoComparacion_MayorIgual = 4;
		$tipoComparacion_Like = 7;
		$valor12 = 0; 
		
		
		$condicionFinal = Comparacion($tipoValor_Cadena,$documento,$valor12,"Nombre",$condicionFinal,7);
		$condicionFinal = Comparacion($tipoValor_Entero,$enlace,$valor12,"Enlace",$condicionFinal,1);
		$condicionFinal = Comparacion($tipoValor_Entero,$publicar,$valor12,"Publicar",$condicionFinal,1);
		$condicionFinal = Comparacion($tipoValor_Entero,$anio,$valor12,"Anio",$condicionFinal,1);


		//echo "la condición fianal es: ".$condicionFinal."<br>";
			$RegistrosAMostrar = 25;
		//Estos valores los recibo por Get
		if (isset($_GET['pag'])){
			echo "la p?gina actual es: ".$_GET['pag']."<br>";
			$RegistrosAEmpezar = ($_GET['pag']-1)*$RegistrosAMostrar;
			echo $RegistrosAEmpezar."<br>";
			$PagAct = $_GET['pag'];
			
		//caso contrario a lo que hicimos
		}else{
			$RegistrosAEmpezar = 0;
			$PagAct = 1;
		}//fin del else
		
		
		
		
		$campos = "id, Nombre, Carpeta, Anio,
				   FechaSubida,Usuario,Publicar,
				   Archivo,Ruta";
				
		
		if ($condicionFinal == "") {
			$consultaPaginacion = "SELECT $campos  FROM adminarchivosPDF order by id ASC"; //where cg.Empleado_Activo ='1'  
			
	

		}elseif ($condicionFinal != "")   {
			$consultaPaginacion = "SELECT $campos  FROM adminarchivosPDF   $condicionFinal  order by id ASC"; //where cg.Empleado_Activo ='1'  

		}
		
		
		$NroRegistros = $sql->nums($consultaPaginacion);
		$PagAnt = $PagAct - 1;
		$PagSig = $PagAct + 1;
		
		$PagUlt = ($NroRegistros/$RegistrosAMostrar);
		//Verificamos residuo para ver si llevar? decimales
		
		$Res = $NroRegistros % $RegistrosAMostrar;
		if ($Res > 0) {
		$PagUlt = floor($PagUlt)+ 1;
		//$PagUlt = $PagUlt + 1;
		}
		



		
		 
		if (($Buscar) and ($condicionFinal == "")) {
		   //echo "entro en la opci?n buscar ";
			$consulta2 = "SELECT $campos  FROM adminarchivosPDF order by id ASC 
			LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; 
			//where cg.Empleado_Activo ='1'  
	

		}elseif ($condicionFinal != ""){
			//echo "entro en la opci?n buscar con ambas condiciones e ";
			$consulta2 = "SELECT $campos  FROM adminarchivosPDF  $condicionFinal  order by id ASC 
			LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; //where cg.Empleado_Activo ='1'  

		}else { 
			//echo "entro en la opción else solas "
			$consulta2 = "SELECT $campos  FROM adminarchivosPDF    order by id ASC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; 
			//where cg.Empleado_Activo ='1'  
	
		}
		
		
		
		//echo "la consulta es: ".$consulta2."<br>";
		
			$Cantidad = $sql->nums($consulta2);
			//Si devolvi? registros la consulta
			if($Cantidad >0) {
				echo"<br>";
				echo"<div align='center'>Total de Registros: ".$Cantidad."</div>";
				echo "<br>";
				$bandera = 1;//indica que si devolvi? registros
			}//fin del if 
			
			$Accion_Agregar_Registros = "Guardar";	
?>
<div align="center" style="color:#F00"><?php if (isset($_SESSION['statusArchivo'])) echo  $_SESSION['statusArchivo'];?></div>
<!--<div align="center"><a href="transparenciaWeb.php?Accion=<?PHP //echo $Accion_Agregar_Registros;?>"><div align="center" class="botonimagen"></div></a></div>-->


<div align="center"><a title="Agregar nuevos archivos al sitio" href="AdminPDFArchivos.php?Accion=<?PHP echo $Accion_Agregar_Registros;?>"><img src="img/edit_add.png" border="0"></a>

<br />




<form id="listado"  name="listado" method="post" action="listado.php">
  <input type="hidden" id= "condicionfinal" name="condicionfinal" value="<?php echo $condicionFinal; ?>"  />
  <div align="center">
<table width="59%"  align="center">
           <thead>
            
               <th width="3%" height="25"><strong>#</strong></th>
               <th width="15%"><strong>Documento</strong></th>
               <th width="15%"><strong>Carpeta </strong></th>
               <th width="13%"><strong>A&ntilde;o</strong></th>
               <th width="5%"><strong>Usuario</strong></th>
               <th width="5%"><strong>P&uacute;blico</strong></th>
               <th width="4%"><strong>Link</strong></th>
               <th width="4%"><strong>Modificar</strong></th>
               <th width="4%"><strong>Eliminar.</strong></th>

            
           </thead>
           <tbody>
             <?php
			//paginaci?n
			$cont = 1;
			$list_query = $sql->query($consulta2);
			while($row = $sql->objects('',$list_query)){
	  		
				$AccionMod = "Modificar";
			
			if ($cont % 2 == 0)
			$class = "row-a";
			else  $class = "row-b";
			
			
			
				 $href = $row->Ruta."/".$row->Archivo;

				 		
				 
				 	if ($row->Publicar  ==  1)
					    	 $imagen = "img/primary-ok.png"; 
					elseif ($row->Publicar  ==  2)
							 $imagen = "img/Doawnload.gif";
						
				$ruta = $row->Ruta."/".$row->Archivo;
			
				    
			?>
			   <tr id="fila-<?PHP echo $row->id; ?>" class="<?PHP echo $class;?>">       
		  	   <td><?PHP echo $row->id;?></td>
                <td><div align="center"><?PHP echo utf8_encode($row->Nombre);?></div></td>
   		   	   <td><div align="center"><?PHP echo eleccionCarpeta($row->Carpeta);?></div></td>
			   <td><div align="center"><?PHP echo $row->Anio;?></div></td>
               <td><div align="center"><?php echo $row->Usuario ;?></div></td>
			   <td><div align="center"><img src="<?PHP echo $imagen;?>"  border="0"/></div></td>
               
			  
               <td><div align="center"><a href="<?PHP echo $ruta;?>">imagen</a></div></td>
			   <td align="center"><a href="AdminPDFArchivos.php?id=<?PHP echo $row->id?>&Accion=<?PHP echo $AccionMod;?>"><img src="img/curso.gif" width="30" height="30" border="0" /></a></td>
               
                <td align="center"><span class = "dele"><a onClick="EliminarArchivo(<?php echo $row->id ?>); return false";  href="eliminarArchivosPDFUnload.php?id=<?php echo $row->id;?>" title="Eliminar" alt="Eliminar"><img src="img/close.png" width="30" height="30" border="0" /></a></span></td>

			  
              
			   </tr>
    
	       <?php $cont = $cont + 1;} //fin del mientras ?>
  <tbody></table>
    <p>&nbsp;</p>
</div><!--esta es el fin del div de alineaci?n-->
</form>
<h4>
	<?php
	
	
	$sql->disconnect();
	
			echo "<a onclick=\"Pagina('1')\">Primero </a>";	
		if($PagAct >1) 
			echo "<a onclick=\"Pagina('$PagAnt')\">Anterior </a>";
			echo "<strong>Pagina"." ".$PagAct."/".$PagUlt." "."</strong>";
		if ($PagAct < $PagUlt) 
			echo "<a onclick=\"Pagina('$PagSig')\">Siguiente  </a>";
			echo "<a onclick=\"Pagina('$PagUlt')\">Ultimo  </a>";
			
	

}//fin de la funci?n 	
	
?>



<form id="formnoticias"   name="formnoticias" method="post" action="UnloadArchivosPDFAdmin.php" enctype="multipart/form-data">
<!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /-->
<div class="itemDatos">


<fieldset>
<legend>Descripci&oacute;n del Documento:</legend>
<input  minlength="2"  placeholder="Descripci&oacute;n del Documento"  style="width:500px;height:30px" name="Documento" id="Documento" type="text"   onfocus="runInputs(this)" value="<?php echo ($documento); ?>" ></fieldset>

</br>


<fieldset>
<legend>Tipo de Enlace:</legend>
<select name="carpeta" id="carpeta"><?php comoCarpetas("carpetaarchivos",$enlace); ?></select>
</select></fieldset>

<fieldset>
<legend>A&ntilde;o del Documento:</legend>
<select name="anio" id="anio"><?php AniosBusquedaArchivos() ?></select>
</select></fieldset>
<fieldset>
<legend>Publicar el Documento:</legend>
<select name="publicar" id="publicar"><?php comboActivo("respuestas",$publicar);?>
</select></fieldset>
<br /><br />
<fieldset><input type="submit" name="Buscar" value="Buscar"/></fieldset>
<fieldset><input type="submit" name="Borrar" value="Borrar"/></fieldset>
</div>
</form>


<br /><br /><br />
<?php
		dibujar();
		
?> 