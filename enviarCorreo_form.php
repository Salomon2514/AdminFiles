       <form id="mail" name="mail" method="post" action="enviopassword_verificacion.php">
   	  <div align="center">
	  <p>&nbsp;</p>
	  <table width="332" border = "0" cellpadding="0" cellspacing="1"  bordercolor="#990000" >
	    <tr> <td width="366">

  <table width="34%" height="181" border="0">

      <td height="43"><img src="img/Asunto2.png" alt="Asunto:" width="80" height="40" onfocus="runInputs(this)" /></td>
      <td>
        <label>
        <input name="Asunto" type="text" id="Asunto" size="40" onFocus="runInputs(this)" />
      </label>      </td>
    </tr>
    <tr>
      <td colspan="2"><label>


	    <input type="hidden" name="To" id="To"  value="info@umip.ac.pa"/> <!--- rrhh@umip.ac.pa !-->
         <input type="hidden" name="CC" id="CC"  value=""/>
         
        <input type="hidden" name="id" id="id"  value= "<?PHP echo $id; ?>"/>
        <input type="hidden" name="Nombre" id="Nombre"  value= "<?PHP echo $Nombre; ?>"/>
        <input type="hidden" name="Correo"  id= "Correo" value= "<?PHP echo $Correo;?>"/>
         <input type="hidden" name="Mensaje"  id= "Mensaje" value= "<?PHP echo $Mensaje;?>"/>
        <div align="center">
        <textarea name="Cuerpo" cols="50" rows="7" id="Cuerpo" onFocus="runInputs(this)"></textarea>
          </label>
        </div></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
       &nbsp;&nbsp;&nbsp;
       <input type="submit" name="Submit" value="Enviar" />
      </div></td>
    </tr>
    <tr>
      <td height="20" colspan="2">&nbsp;</td>
    </tr>
  </table> 
  </td>
  </tr>
  </table>
  
  <p>&nbsp;</p>
</div>    
</form></p>