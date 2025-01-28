<div class="b-blog-search">
						<form class="b-form" action="noticias.php">
							<div class="input-wrap">
								<i class="icon-search"></i>
								<input type="text" placeholder="Titulo.." name="titulo" value="<?php echo $var_titulo?>" id = "titulo">
                              
							</div>
                            <input type="text" name="date3" id="sel3" style="width: 200px; font-size:12px;" readonly="true" onFocus="runInputs(this)" value="<?=($fechaNoticia); ?>"><img src="img/dhtmlxgrid_icon.gif" value="Fecha"onclick="return showCalendar('sel3', '%d-%m-%Y');" border="0">
                            <br><br>
                            <?php getAnios($var_anio); ?>
                            <br><br>
                            <select name="mes">
                            <option  value="1">Ene</option>
                            <option  value="2">Feb</option>
                            <option  value="3">Mar</option>
                            <option  value="4">Abr</option>
                            <option  value="5">May</option>
                            <option  value="6">Jun</option>
                            <option  value="7">Jul</option>
                            <option  value="8">Ago</option>
                            <option  value="9">Sep</option>
                            <option  value="10">Oct</option>
                            <option  value="11">Nov</option>
                            <option  value="12">Dic</option>
                            </select>
                            <br><br>
                            <input  class="btn-submit btn colored" type="submit" name="Submit" value="Buscar" style="width:auto"/>
                             
                            <input  class="btn-submit btn colored" type="submit"  name="Reset" value="Limpiar" style="width:auto"/>
						</form>
					</div>