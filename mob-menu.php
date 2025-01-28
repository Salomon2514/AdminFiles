<?php $href = "bajo-construccion.php";  ?>
<ul class="mob-menu">
			<!-- Item 1 -->
			<li>
				<div>
					<a href="index.php" class="active">Inicio</a>
				</div>

				
			</li>
			<!-- End Item 1 -->
			<!-- Item 2 -->
			<li>
				<div>
					<a href="junta.php">Junta Directiva</a>
				</div>

				
			</li>
			<!-- End Item 2 -->
			<!-- Item 3 -->
			<li>
				<div>
					<a href="bajo-construccion.php">Documentaci&oacute;n</a>
					<span class="btn-submenu"></span>
				</div>
			
                <ul class="mob-submenu">
                    <?php include("includes/documentacion.php");?>
                    <!-- End Item 3 -->
                    <!-- Item 4 -->
                </ul>
                
            </li>
            <li>
				<div>
					<a href="<?php echo $href;?>">Listados</a>
					<span class="btn-submenu"></span>
				</div>

				<ul class="mob-submenu">
					<li><div> <a href="<?php echo $href;?>">Explicaci&oacute;n</a> </div></li>
                    <li><div> <a href="PatronPreliminar/Lista-Candidatos.pdf">Lista Oficial de Candidatos</a> </div></li>
					
                    <li>
						<div> 
						<a href="#">Estudiantes</a> 
						<span class="btn-submenu"></span>
						</div>
					
						<ul class="mob-submenu">
							<?PHP include("includes/estudiantes.php"); ?>
						</ul>
					</li>
                    
                       <li>
						<div> 
						<a href="#">Docentes</a> 
						<span class="btn-submenu"></span>
						</div>
					
						<ul class="mob-submenu">
							<?PHP	include("includes/docentes.php"); ?>
						</ul>
					</li>
                    <li>
						<div> 
						<a href="#">Administrativos</a> 
						<span class="btn-submenu"></span>
						</div>
					
						<ul class="mob-submenu">
							<?PHP include("includes/administrativos.php"); ?>
						</ul>
					</li>
					
				</ul>
			</li>
			<!-- End Item 4 -->
			<!-- Item 5 -->
			<li>
				<div>
					<a href="<?php echo $href;?>">Representantes de mesa</a>
				</div>
			</li>
			<!-- End Item 5 -->
			<!-- Item 6 -->
			<li>
				<div>
					<a href="<?php echo $href;?>">Resultados</a>
				</div>
			</li>
			<!-- End Item 6 -->
		</ul>