INDX( 	 G�|�           (   �  �                            ��    h X     ��    �]cϫx� �Χ�]��]cϫx��]cϫx�8       3               b t h . i n f _ l o c Ҽ    p `     ��    �!hϫx� �Χ�]��!hϫx��!hϫx��       �               b t h e n u m . s y s . m u i Ҽ    p Z     ��    �!hϫx� �Χ�]��!hϫx��!hϫx��       �               B T H E N U ~ 1 . M U I       A�    p `     ��    �Fpϫx� �Χ�]��Fpϫx��Fpϫx�       !              b t h p o r t . s y s . m u i A�    p Z     ��    �Fpϫx� �Χ�]��Fpϫx��Fpϫx�       !              B T H P O R ~ 1 . M U I       ��    p ^     ��    �ϫx� �Χ�]��ϫx��ϫx��       �               b t h u s b . s y s . m u i   ��    p Z     ��    �ϫx� �Χ�]��ϫx��ϫx��       �               B T H U S B ~ 1 . M U I       ��    h T     ��    �]cϫx� �Χ�]��]cϫx��]cϫx�8       3               	B T H ~ 1 . I N F                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            dRegistro'");
							
								
								$tabla = "vacacionessaldocolaboradores";
			
								$cols= "idRegistro,
										CEDULA,
										CEDULA_MEF,
										Fecha_Ini,
										Fecha_Fin,
										DiasPermitidos,
										DiasUsados,
										Saldo,
										Anio,
										Mes,
										ORDEN_REG,
										idLicencia,
										TipoDocumento,
										No_Document";
										
								
								$val = "'$ColVacaBackup->idRegistro',
										'$CEDULA',
										'$ColVacaBackup->CEDULA',
										'$ColVacaBackup->FechIniVac',
										'$ColVacaBackup->FechFinlVac',
										'$ColVacaBackup->DIASPERMITIDOS',
										'$ColVacaBackup->DIASUSUADOS',
										'$ColVacaBackup->SALDOVACACIONES',
										'$ColVacaBackup->PunteroAnio',
										'$ColVacaBackup->PunteroMes',
										'$ColVacaBackup->ORDEN_REG',
										'$idLicencia',
										'$ColVacaBackup->TipoDocumento',
										'$ColVacaBackup->No_DOCUMENT'";
											   
										
								
								$sql->insert("vacacionessaldocolaboradores",$cols,$val,"");
								
										
							}elseif ($TipoDocumento  == "PV"){
								
								
							   //QUIERE DECIR QUE NO ES UNA FILA DE NOTIFICACIÓN
					
									$tabla = "vacacionessolicitud";
									
									$cols=   "FechaDesde,
											  FechaHasta,
											  DiasSolicitados,
											  idRegistro,
											  ORDEN_REG,
											  Mes,
											  Anio,
											  No_Document";
											 
										   
									  $val = "'$ColVacaBackup->FechIniVac',
											  '$ColVacaBackup->FechFinlVac',
											   $ColVacaBackup->DIASUSUADOS,
											   $ColVacaBackup->idRegistro,
											   $ColVacaBackup->ORDEN_REG,
											   $ColVacaBackup->PunteroMes_F,
											   $ColVacaBackup->PunteroAnio_F,
											  '$ColVacaBackup->No_DOCUMENT'";
											   
											   echo "Fecha inicial es: ".$ColVacaBackup->FechIniVac."<br>";
											   echo "Fecha inicial es: ".$ColVacaBackup->FechFinlVac."<br>";
											   echo "DIASUSUADOS es: ".$ColVacaBackup->DIASUSUADOS."<br>";
											   echo "idRegistro es: ".$ColVacaBackup->idRegistro."<br>";
											   echo "ORDEN_REG es: ".$ColVacaBackup->ORDEN_REG."<br>";
											   echo "Mes es: ".$ColVacaBackup->PunteroMes."<br>";
											   echo "Anio es: ".$ColVacaBackup->PunteroAnio."<br>";
											   
											   
										
										$sql->insert($tabla,$cols,$val,"");
							
							    $idVacacionesSolicitud = ultimo_registroidRegistro("vacacionessolicitud","id","idRegistro='$ColVacaBackup->idRegistro'");
							
								
									$tabla = "vacacionessaldocolaboradores";
				
									$cols= "idRegistro,
											CEDULA,
											CEDULA_MEF,
											Fecha_Ini,
											Fecha_Fin,
											DiasPermitidos,
											DiasUsados,
											Saldo,
											Anio,
											Mes,
											ORDEN_REG,
											idLicencia,
											TipoDocumento,
											No_Document";
											
									
									$val = "'$ColVacaBackup->idRegistro',
											'$CEDULA',
											'$ColVacaBackup->CEDULA',
											'$ColVacaBackup->FechIniVac',
											'$ColVacaBackup->FechFinlVac',
											'$ColVacaBackup->DIASPERMITIDOS',
											'$ColVacaBackup->DIASUSUADOS',
											'$ColVacaBackup->SALDOVACACIONES',
											'$ColVacaBackup->PunteroAnio',
											'$ColVacaBackup->PunteroMes',
											'$ColVacaBackup->ORDEN_REG',
											'$idVacacionesSolicitud',
											'$ColVacaBackup->TipoDocumento',
											'$ColVacaBackup->No_DOCUMENT'";
											   
										
								
								$sql->insert("vacacionessaldocolaboradores",$cols,$val,"");
								
							
								
							} elseif ($TipoDocumento  == "RV") { //entonces es una notificación
							//SE ACTUALIZA EL SALDO DE VACACIONES 
								$numRegistros = NumeroRegistros("vacacionesnotificacion"," idRegistro = '$ColVacaBackup->idRegistro' and Rango_FechaIniNotificacion = '$ColVacaBackup->FechIniVac' and  Rango_FechaFinNotificacion = '$ColVacaBackup->FechFinlVac'");
								$regNotificacion  = getSiafaData("vacacionesnotificacion"," idRegistro = $ColVacaBackup->idRegistro and Rango_FechaIniNotificacion = '$ColVacaBackup->FechIniVac' and  Rango_FechaFinNotificacion = '$ColVacaBackup->FechFinlVac'","id");

										if ($numRegistros == 1){
								
											
											$string = "Notificado=1";
											$update_str = "id='$regNotificacion->id'";
											$sql->update("vacacionesnotificacion","$string","$update_str");
										
								
								
										
						$idVacacionesSolicitud = ultimo_registroidRegistro("vacacionessolicitud","id","idRegistro='$ColVacaBackup->idRegistro'");
							
								
											$tabla = "vacacionessaldocolaboradores";
				
											$cols= "idRegistro,
													CEDULA,
													CEDULA_MEF,
													Fecha_Ini,
													Fecha_Fin,
													DiasPermitidos,
													DiasUsados,
													Saldo,
													Anio,
													Mes,
													ORDEN_REG,
													idNotificacion,
													TipoDocumento,
													No_Document";
											
									
												$val = "'$ColVacaBackup->idRegistro',
														'$CEDULA',
														'$ColVacaBackup->CEDULA',
														'$ColVacaBackup->FechIniVac',
														'$ColVacaBackup->FechFinlVac',
														'$ColVacaBackup->DIASPERMITIDOS',
														'$ColVacaBackup->DIASUSUADOS',
														'$ColVacaBackup->SALDOVACACIONES',
														'$ColVacaBackup->PunteroAnio',
														'$ColVacaBackup->PunteroMes',
														'$ColVacaBackup->ORDEN_REG',
														'$regNotificacion->id',
														'$ColVacaBackup->TipoDocumento',
														'$ColVacaBackup->No_DOCUMENT'";
											   
										
								
											$sql->insert("vacacionessaldocolaboradores",$cols,$val,"");
								
										
								
								
										}else {
										
								
											$idNotificacion = 0;
											
											$tabla = "vacacionessaldocolaboradores";
											$cols= "idRegistro,
													CEDULA_MEF,
													CEDULA,
													Saldo,
													idNotificacion,
													ORDEN_REG,
													Anio,
													Mes";
											
											$val = "'$ColVacaBackup->idRegistro',
													'$ColVacaBackup->CEDULA',
													'$CEDULA',
													'$ColVacaBackup->SALDOVACACIONES',
													 $idNotificacion,
													'$ColVacaBackup->ORDEN_REG',
													 $ColVacaBackup->PunteroAnio_F,
													 $ColVacaBackup->PunteroMes_F";
								
								
								
												$sql->insert("vacacionessaldocolaboradores",$cols,$val,"");
								
												$cols= "idRegistro,
														Cedula,
														FechaIniVac,
														FechaFinVac,
														ORDEN_REG,
														TipoDocumento,
														PunteroAnio,
														PunteroMes,
														No_DOCUMENT,
														Nombre,
														Apellido";
														
														echo "idRegistro: ".$ColVacaBackup->idRegistro."<br>";
														echo "Cedula: ".$CEDULA."<br>";
														echo "FechIniVac: ".$ColVacaBackup->FechIniVac."<br>";
														echo "FechFinlVac: ".$ColVacaBackup->FechFinlVac."<br>";
														echo "ORDEN_REG: ".$ColVacaBackup->ORDEN_REG."<br>";
														echo "TipoDocumento: ".$TipoDocumento."<br>";
														echo "PunteroAnio_F: ".$ColVacaBackup->PunteroAnio_F."<br>";
														echo "PunteroMes_F: ".$ColVacaBackup->PunteroMes_F."<br>";
														echo "No_DOCUMENT: ".$ColVacaBackup->No_DOCUMENT."<br>";
												
												$val = "'$ColVacaBackup->idRegistro',
														'$CEDULA',
														'$ColVacaBackup->FechIniVac',
														'$ColVacaBackup->FechFinlVac',
														'$ColVacaBackup->ORDEN_REG',
														'$TipoDocumento',
														'$ColVacaBackup->PunteroAnio_F',
														'$ColVacaBackup->PunteroMes_F',
														'$ColVacaBackup->No_DOCUMENT',
														'$Nombre',
														'$Apellido'";
														
					
												
												$tabla_inconsistencias = "vacaciones_inconsistencias_RV";
												$sql->insert($tabla_inconsistencias,$cols,$val,"");
		
												
										} 
							}//
							
							
							
				$i = $i + 1;
							
						
				 }//fin while($Colaboradores = $sql->objects('',$ad_query)){ 
				echo "el total de registro impresos es:".$i."<br>";

?>