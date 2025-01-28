<form id="formTransparencia"   name="formTransparencia" method="post" action="SUBIENDOPDF.php" enctype="multipart/form-data">
<!--<input type="hidden" name="MAX_FILE_SIZE" value="1000000" /-->
<div class="itemDatos">

  <input type="hidden" name="ruta"  id = "ruta" value=<?php echo $ruta;?> />
  <input type="hidden" name="Accion"  id = "Accion" value=<?php echo $Accion;?> />
  <input type="hidden" name="Usuario" value=<?php echo $Usuario;?> />
  <input type="hidden" name="id" value=<?php echo $id;?> />
  <input name="ArchivoSubido" id = "ArchivoSubido"  type="hidden" value= <?php echo $AchivoUpload;?> />	
  <input name="upload" type="hidden" value="1" />	


<fieldset>
<legend>Descripci&oacute;n del Documento:</legend>
<input  minlength="2"  placeholder="Descripci&oacute;n del Documento"  style="width:500px;height:30px" name="Documento" id="Documento" type="text"   onfocus="runInputs(this)" value="<?php echo ($documento); ?>" required></fieldset>

</br>


<fieldset>	
<legend>Fecha: </legend>
<input type="text"  name="date3" id="sel3" style="width: 200px; font-size:12px;"   value="<?php echo ($fechaDocumento); ?>" required/><img src="img/dhtmlxgrid_icon.gif" value="Fecha"onclick="return showCalendar('sel3', '%d-%m-%Y');" border="0"></fieldset>
<fieldset>
<legend>Carpeta:</legend>
<select name="carpeta" id="carpeta"><?php comoCarpetas("carpetaarchivospdf",$carpeta); ?></select>
</select></fieldset>

<fieldset>
<legend>A&ntilde;o del Documento:</legend>
<select name="anio" id="anio"><?php AniosBusquedaArchivos($AnioArchivo) ?></select>
</select></fieldset>
<fieldset>
<legend>Publicar el Documento:</legend>
<select name="publicar" id="publicar"><?php comboActivo("respuestas",$activaPublicacion);?>
</select></fieldset>
<br />
<fieldset>
<legend>Subir Archivo </legend>
<!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero-->
<input type="hidden" name="MAX_FILE_SIXE" value="5900000" />
<!-- El nombre del elemento de entrada determina el nombre en el array $_FILES -->
<input name="archivo" type="file"  id="archivo" /><label><div style="color:#900"><?php echo $AchivoUpload; ?></div></label>
</fieldset>
<br /><br />
 <p align="left"> <input type="submit" name="Submit" value="Enviar Fichero"/></p>

</div>
</form>