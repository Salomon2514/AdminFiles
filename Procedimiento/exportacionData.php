<?php
## ESTE PROCEDIMIENTO EXCLUSIVO PARA EXPORTAR LA DATA DE vacaciones_backup a vacacionessolicitud
## FECHA: JUEVES 05 DE MARZO DE 2015
## EXPORTACIÓN. SALVAGUARDAR LA INFORMACIÓN

ini_set('max_execution_time', '60'); //Raise to 512 MB
include("../clases/setting.inc.php");

$sql = new mod_db();
include("../comunes/libreriaFechas.php");




		$FechaSistema= date("y-m-d H:i:s"); //Esta fecha refleja el instante en que se ejecutaron descuentos
		//$AnioVacaciones = date("Y");
								
				$i = 0; //Contador de Colaboradores
			//si tiene las fechas de notificación con respecto al año 2014 entonces el colaborador está notificado.
				$consulta = "select * from  noticias  order by id desc";
				// MesNoticacion = 1: le quitamos esto porque el se notifica una vez en año
				$Cantidad = $sql->nums($consulta); //Cantidad de Colaboradores con Código de Marcación
				$ad_query = $sql->query($consulta);
				 
				
				echo "la cantidad de registros ".$Cantidad."<br>";
				
				while($ColNoticias = $sql->objects('',$ad_query)){

				
				
					$objetoFecha = FechaObjetoInvert($ColNoticias->fecha);
					$Dia = $objetoFecha->dia;
		
					
					//$this->FechaSistema = date("y-m-d H:i:s");
						
							
							
												$cols= "id,
														titulo,
														contenido,
														fecha,
														tipo,
														activo,
														Anio,
														Mes,
														Dia,
														img1,
														timg1,timg1_2,timg1_3,timg1_4,
														img2,
														timg2,
														img3,
														timg3,
														img4,
														timg4,
														Usuario,
														FechaSistema";
														
											
												
												$val = "'$ColNoticias->id',
														'$ColNoticias->titulo',
														'$ColNoticias->contenido',
														'$ColNoticias->fecha',
														'$ColNoticias->tipo',
														'$ColNoticias->activo',
														'$ColNoticias->Anio',
														'$ColNoticias->Mes',
														'$Dia',
														'$ColNoticias->img1',
														'$ColNoticias->timg1',
														'$ColNoticias->timg1_2',
														'$ColNoticias->timg1_3',
														'$ColNoticias->timg1_4',
														'$ColNoticias->img2',
														'$ColNoticias->timg2',
														'$ColNoticias->img3',
														'$ColNoticias->timg3',
														'$ColNoticias->img4',
														'$ColNoticias->timg4',
														'$ColNoticias->Usuario',
														'$ColNoticias->FechaSistema'";
													
												
												$sql->insert("noticiasnuevas",$cols,$val,"");
							
								
								
						
				 }//fin while($Colaboradores = $sql->objects('',$ad_query)){ 
				

?>