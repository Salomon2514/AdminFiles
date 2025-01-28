  <form  class="cmxform" id="permisos"  name="permisos" method="post" action="Usuarios_edicion.php">

         
            <input type="hidden" name="User" id="User" value="<?php echo $Usuario;?>" />
            <input type="hidden" name="Accion" id="Accion" value="<?php echo $Accion;?>" />
            <input type="hidden" name="username" id="username"  value= "<?php echo $username;?>" />
              
     		 <div class="itemDatos">
			  <fieldset>
			 <legend>Usuario:</legend>
             <input  id="usuario" name="usuario" type="text" class="required" minlength="2" value="<?php echo $username; ?>" />
         	</fieldset>
             <fieldset>
			 <legend>Clave:</legend>
             <input  id="clave" name="clave" type="password" class="required" minlength="2" value="<?php echo $pass; ?>" />
             </fieldset>
             <fieldset>
			 <legend>Nombre:</legend>
             <input  id="nombre" name="nombre" type="text" class="required" minlength="2" value="<?php echo $nombre; ?>" />
             </fieldset>
             <fieldset>
			 <legend>Apellido del Usuario:</legend>
             <input  id="apellido" name="apellido" type="text" class="required" minlength="2" value="<?php echo $apellido; ?>" />
             </fieldset>  
          	
             <fieldset>
			 <legend>Email del Usuario:</legend>
             <input id="email" name="email" type="email"  class="required email" value="<?php echo $email; ?>" ></td>
             </fieldset> 
            <fieldset>
			<legend>Tipo de Usuario:</legend>
            <strong> Administrador del Sistema:</strong>
            <input type="radio" name="administrador" id="administrador"  value="1"  onclick="marcar(':checkbox')"  
			<?php echo inputChecked($tipo,"admin"); ?> />
            </fieldset>
              
         
            <fieldset>
			<legend>Usuarios del Sistema:</legend>
              <strong>Usuarios del Sistema:</strong></td>
              <input type="radio" name="administrador" id="administrador"  value="0"    onclick="desmarcar(':checkbox')"   
			  <?php echo inputChecked($tipo,"user"); ?>/></fieldset>
      			<br />
                <br />
                
                
 	
            
    <fieldset>
	<legend>Permisos:</legend></fieldset>
    <div id="Permisos">   
           
            
    <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&oacute;dulo de Noticias:
    <input type="checkbox"  name="modNoticias" id="modNoticias" value="1" <?php echo inputChecked($rolNoticias,1); ?> >
    <span class="checkmark"></span>
    </label>
            
            
    <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&oacute;dulo de Transparencia:
    <input type="checkbox"  name="modTransparencia" id="modTransparencia" value="1" <?php echo inputChecked($rolTransparencia,1); ?> >
    <span class="checkmark"></span>
    </label>
            
       
           
             
             
    <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&oacute;M&oacute;dulo de Configuraci&oacute;n:
    <input type="checkbox"  name="modConfig" id="modConfig" value="1" <?php echo inputChecked($rolConfiguracion,1); ?> >
    <span class="checkmark"></span>
    </label>
    
    
           
             
    <label class="container">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;M&oacute;dulo de Comit&eacute;
    <input type="checkbox"  name="modComite" id="modComite" value="1" <?php echo inputChecked($rolComiteElectoral,1); ?> >
    <span class="checkmark"></span>
    </label>       
    
 
     <br />
     </div><!--DIV DE PERMISOS-->
     <br />
     <fieldset>
<legend>Activar Usuario:</legend>
<select name="activar" id="activar"><?php comboActivo("respuestas",$activaPublicacion);?>
</select></fieldset>
                                
    <input name="Submit" type="submit" class="clear" value="Guardar" />
	</div>
    </form>