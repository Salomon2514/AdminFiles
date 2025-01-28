<?php 


if (isset($_REQUEST['nombre'])){
$nombre = $_REQUEST['nombre'];
}else $nombre = "";


if (isset($_REQUEST['apellido'])){
$apellido = $_REQUEST['apellido'];
}else $apellido = "";

/*if (isset($_REQUEST['anio'])){
$anio = $_REQUEST['anio'];
}else $anio = date("Y");*/


/*if (isset($_REQUEST['publicar'])){
$publicar = $_REQUEST['publicar'];
}else $publicar = 1;*/


if (isset($_REQUEST['Buscar'])){
$Buscar = $_REQUEST['Buscar'];
//echo "entro en la opción buscar";
}else $Buscar = false;
	


if (isset($_REQUEST['Borrar'])){
//echo "ENTRO EN LA OPCIÓN BORRAR ";
	$apellido = "";
	$nombre = "";
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
		
		global $nombre;
		global $apellido;
		
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
		
		
		$condicionFinal = Comparacion($tipoValor_Cadena,$nombre,$valor12,"nombre",$condicionFinal,$tipoComparacion_Like);
		$condicionFinal = Comparacion($tipoValor_Entero,$apellido,$valor12,"apellido",$condicionFinal,$tipoComparacion_Like);


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
		
		
		
		
		$campos = "username, password, nombre,
				   apellido,email,tipo,
				   activo";
				
		
		if ($condicionFinal == "") {
			$consultaPaginacion = "SELECT $campos  FROM usuarios order by username ASC"; //where cg.Empleado_Activo ='1'  
			
	

		}elseif ($condicionFinal != "")   {
			$consultaPaginacion = "SELECT $campos  FROM usuarios $condicionFinal  order by username ASC"; //where cg.Empleado_Activo ='1'  

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
			$consulta2 = "SELECT $campos  FROM usuarios order by username ASC 
			LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; 
			//where cg.Empleado_Activo ='1'  
	

		}elseif ($condicionFinal != ""){
			//echo "entro en la opci?n buscar con ambas condiciones e ";
			$consulta2 = "SELECT $campos  FROM usuarios  $condicionFinal  order by username ASC 
			LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; //where cg.Empleado_Activo ='1'  

		}else { 
			//echo "entro en la opción else solas "
			$consulta2 = "SELECT $campos  FROM usuarios    order by username ASC LIMIT $RegistrosAEmpezar, $RegistrosAMostrar"; 
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


<div align="center"><a title="Agregar nuevos archivos al sitio de transparencia" href="UsuariosForm.php?Accion=<?PHP echo $Accion_Agregar_Registros;?>"><img src="img/edit_add.png" border="0"></a>

<br />




<form id="listado"  name="listado" method="post" action="listado.php">
  <input type="hidden" id= "condicionfinal" name="condicionfinal" value="<?php echo $condicionFinal; ?>"  />
  <div align="center">
<table width="59%"  align="center">
           <thead>
            
               <th width="3%" height="25"><strong>Username</strong></th>
               <th width="15%"><strong>Nombre</strong></th>
               <th width="15%"><strong>Apellido </strong></th>
               <th width="13%"><strong>Tipo</strong></th>
               <th width="5%"><strong>email</strong></th>
               <th width="5%"><strong>Activo</strong></th>
               <th width="4%"><strong>Modificar</strong></th>
               <th width="4%"><strong>Pass</strong></th>

            
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
			

				 		
				 
				 	if ($row->activo  ==  1)
					    	 $imagen = "img/primary-ok.png"; 
					elseif ($row->activo  ==  0)
							 $imagen = "img/Doawnload.gif";
						
				
			
				    
			?>
			   <tr id="fila-<?php echo $row->username; ?>" class="<?PHP echo $class;?>">       
		  	   <td><?PHP echo $row->username;?></td>
                <td><div align="center"><?PHP echo utf8_encode($row->nombre);?></div></td>
   		   	   <td><div align="center"><?PHP  echo ($row->apellido );?></div></td>
			   <td><div align="center"><?PHP echo $row->tipo;?></div></td>
               <td><div align="center"><?php echo $row->email ;?></div></td>
			   <td><div align="center"><img src="<?PHP echo $imagen;?>"  border="0"/></div></td>
              
			   <td align="center"><a href="UsuariosForm.php?id=<?PHP echo $row->username?>&Accion=<?=$AccionMod;?>"><img src="img/curso.gif" width="30" height="30" border="0" /></a></td>
               
               	<td><div align="center"><a href="UsuariosModPass.php?username=<?PHP echo $row->username;?>"><img src="img/permisos.png"  border="0"/></div></a></td>

               
               <!-- <td align="center"><span class = "dele"><a onClick="EliminarDato(<?php echo $row->id ?>); return false";  href="eliminarArchivosTransparencia.php?id=<?php  //echo $row->id;?>" title="Eliminar" alt="Eliminar"><img src="img/close.png" width="30" height="30" border="0" /></a></span></td> -->

			  
              
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



<form id="formnoticias"   name="formnoticias" method="post" action="Usuarios.php" enctype="multipart/form-data">
<!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /-->
<div class="itemDatos">


<fieldset>
<legend>Nombre:</legend>
<input  minlength="2"  placeholder="Nombre del Usuario"  style="width:500px;height:30px" name="nombre" id="nombre" type="text"   onfocus="runInputs(this)" value="<?php echo ($nombre); ?>" ></fieldset>

</br>

<fieldset>
<legend>Apellido:</legend>
<input  minlength="2"  placeholder="Apellido del Usuario"  style="width:500px;height:30px" name="apellido" id="apellido" type="text"   onfocus="runInputs(this)" value="<?php echo ($apellido); ?>" >
</fieldset>

</br>

<br /><br />
<fieldset><input type="submit" name="Buscar" value="Buscar"/></fieldset>
<fieldset><input type="submit" name="Borrar" value="Borrar"/></fieldset>
</div>
</form>


<br /><br /><br />
<?php
		dibujar();
		
?> 