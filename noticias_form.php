<form id="formnoticias"   name="formnoticias" method="post" action="noticias_edicion.php" enctype="multipart/form-data">
<!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /-->
<div class="itemDatos">
<?php 

$cont1 = 1; //principal
$cont2 = 2;
$cont3 = 3;
$cont4 = 4;
?>

  <input type="hidden" name="Accion"  id = "Accion" value=<?php echo $Accion;?> />
  <input type="hidden" name="Usuario" value=<?php echo $Usuario;?> />
  <input type="hidden" name="id" value=<?php echo $id;?> />
  
  <input name="upload" type="hidden" value="1" />	




<fieldset>
<legend>T&iacute;tulo:</legend>
<input  minlength="2"  placeholder="Titulo de la Noticia"  style="width:500px;height:15px" name="titulo" id="titulo" type="text"   onfocus="runInputs(this)" value="<?php echo ($tituloNoticia); ?>" required></fieldset>
<fieldset>
<legend>Contenido: </legend>
<textarea rows="30" cols="40" style="width:700px; height:500px"  style="width:500px" name="contenido" id="contenido" type="text" 
onfocus="runInputs(this)"><?php echo ($contenido); ?></textarea></fieldset>

</br>

<fieldset>	
<legend>Fecha: </legend>
<input type="text"  name="date3" id="sel3" style="width: 200px; font-size:12px;"   value="<?php echo ($fechaNoticia); ?>" required/><img src="img/dhtmlxgrid_icon.gif" value="Fecha"onclick="return showCalendar('sel3', '%d-%m-%Y');" border="0"></fieldset>
<fieldset>
<legend>Tipo:</legend>
<select name="tipo" id="tipo"><?php combotipoNoticia("noticiastipo",$tipoNoticia); ?></select>
</select></fieldset>
<fieldset>
<legend>Publicar Noticia:</legend>
<select name="activo" id="activo"><?php comboActivo("respuestas",$activoNoticia);?>
</select></fieldset>

<fieldset>
<legend>Imagen 1:</legend>
  <input name="imagen[<?php echo $cont1?>]" type="file"  id="imagen[<?php echo $cont1?>]"  /><legend><?php echo $imagen1; ?></legend></fieldset>
</br>
<fieldset>
<legend>Imagen 2:</legend>
  <input name="imagen[<?php echo $cont2?>]" type="file"  id="imagen[<?php echo $cont2?>]" /><legend><?php echo $imagen2; ?></legend></fieldset>
</br>
<fieldset>
<legend>Imagen 3:</legend>
  <input name="imagen[<?php echo $cont3?>]" type="file" id="imagen[<?php echo $cont3?>]"  /><legend><?php echo $imagen3; ?></legend></fieldset>
</br>
<fieldset>
<legend>Imagen 4:</legend>
  <input name="imagen[<?php echo $cont4?>]" type="file"  id="imagen[<?php echo $cont4?>]" /><legend><?php echo $imagen4; ?></legend></fieldset>

</div>
 <p align="center"> <input type="submit" name="Submit" value="Guardar"/></p>
</form>