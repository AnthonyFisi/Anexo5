<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/global.css?v1.0.1">
		<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/all.css">
		<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/circle.css">
		<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/index.css">
		<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/anexo5.css">
		<title>Control Documentario SSMA - Trivia</title>
	</head>

	<body>
		<div class="loader"></div>
		<!-- CODIGO DEL DOCUMENTO-->
		<div id="wrap1">
			<div class="page">
				<div class="cabeceraDoc">
					<div class="logo"> <img src="
									<?php echo constant('URL')?>public/img/logo.png" alt=""> </div>
					<div class="titulo">
						<p>Programa de capacitación específica en el área de trabajo </p>
						<p>Anexo 5</p>
					</div>
					<div class="formato">
						<p>PSPC-610-X-PR-005-FR-004</p>
						<p>Revisión: 0</p>
						<!--
                        Generar fecha de forma automatica
                        -->
						<p>Emisión :08-05-2019 </p>
						<p>Página: 1 de 1</p>
					</div>
				</div>
				<form method="POST" id="formAnexo5">
					<input type="hidden" name="id_documento" id="id_documento" value="<?php $id= $_GET['id'];
					print $id;?>">
					<input type="hidden" name="nombre_trabajador" id="nombre_trabajador" value="
					<?php 
					$nombre_trabajador  = $_GET['nombre'];
					print $nombre_trabajador;
					?>">
					<input type="hidden" name="cargo_trabajador" id="cargo_trabajador" value="
					<?php 
					$cargo  = $_GET['cargo'];
					print $cargo;
					?>">
					<input type="hidden" name="url_firma" id="url_firma" value="
					<?php 
					$url_firma  = $_GET['url_firma'];
					print $url_firma;
					?>">
					<input type="hidden" name="fecha_contrato" id="fecha_contrato" value="
					<?php 
					$fecha_contrato  = $_GET['fecha_contrato'];
					print $fecha_contrato;
					?>">
					<input type="hidden" name="fecha_documento" id="fecha_documento" value="
					<?php 
					$fecha_documento  = $_GET['fecha_documento'];
					print $fecha_documento;
					?>">
					<input type="hidden" name="usuario" id="usuario" value="
					<?php 
					$usuario = $_GET['usuario'];
					print $usuario;
					?>">
					<input type="hidden" name="dni_trabajador" id="dni_trabajador" value="
					<?php 
					$dni = $_GET['dni'];
					print $dni;
					?>">
					<input type="hidden" name="fecha_firma_trabajador" id="fecha_traba" value="
					<?php 
					$fecha_traba = $_GET['fecha_traba'];
					print $fecha_traba;
					?>">
					<input type="hidden" name="archivo" id="archivo">
					<div class="center">
						<table class="tablaConBordes w100p">
							<tbody>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Titular : HUDBAY PERU S.A.C </p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<label for="trabajador" class="fondoblanco">Trabajador: </label>
											<p id="trabajador">
												<?php 
											$nombre   = $_GET['nombre'];
											$data =preg_replace('/99/', ' ', $nombre);
											print $data;
											?>
											</p>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>ECM/CONEXAS : SERVICIOS PETROLEROS Y CONTRUCCIONES SEPCON SAC</p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<label for="fecha_ingreso" class="fondoblanco">Fecha de ingreso: </label>
											<p>
												<?php 
											$fecha_contrato  =explode("T", $_GET['fecha_contrato']);
											print $fecha_contrato[0];
											?>
											</p>
										</div>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Unidad de produccion : UNIDAD MINERA CONSTANCIA </p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<label for="num_fotocheck" class="fondoblanco">Codigo de empleado: </label>
											<p>
												<?php 
											$usuario  =$_GET['usuario'];
											print $usuario;
											?>
											</p>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Distrito : Chilloroya </p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<label for="ocupacion" class="fondoblanco">Ocupacion : </label>
											<p id="ocupacion">
												<?php 
											$cargo   = $_GET['cargo'];
											$data =preg_replace('/99/', ' ', $cargo) ;
											print $data;
											?>
											</p>
											</p>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Provincia : Chumbivilcas</p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<p>Area de Trabajo: Proyectos / 20PP03 Linea de Descarga de Relaves Este - TMF</p>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						</div>
						<div>
							<table class="tablaConBordes w100p">
								<tbody>
									<tr>
										<td>
											<p> 1. Bienvenida y explicación del propósito de la orientación.</p>
											<p> 2. Reconocimiento guiado a las áreas donde los trabajadores desempeñarán su trabajo. </p>
											<p> 3. Explicación de las Estadísticas de Seguridad del departamento o sección.</p>
											<p> 4. Incidentes, Incidentes Peligrosos, Accidentes de Trabajo y Enfermedades ocupacionales del área</p>
											<p> 5. Explicación de los peligros y riesgos existentes en el área a los trabajadores. </p>
											<p> 6. Capacitación sobre los estándares que corresponden al área, con la evaluación correspondiente.</p>
											<p> 7. Capacitación sobre los PETS que corresponden al área, con la evaluación correspondiente.</p>
											<p> 8. Capacitación teórico-práctico sobre las actividades de alto riesgo que se realizan en el área.</p>
											<p> 9. Capacitación en el control de los materiales peligrosos que se utilizan en el área.</p>
											<p> 10. Capacitación sobre los agentes físicos, químicos, biológicos presentes en el área.</p>
											<p> 11. Identificación y prevención ergonómica</p>
											<p> 12. Código de colores y señalización en el área</p>
											<p> 13. Uso de Equipo de Protección Personal (EPP) apropiado para el tipo de tarea asignada, con explicación de los estándares de uso.</p>
											<p> 14. Uso del teléfono del área de trabajo y otras formas de comunicación con radio portatil o estacionario; quienes, cómo y cuándo se deben utilizar.</p>
											<p> 15. Capacitación en los protocolos de respuesta a emergencia, establecidos para el área donde se desempeñarán los trabajadores.</p>
											<p> 16. Práctica de ubicación (recorrido en campo) y uso de refugios mineros, equipos de respuesta a emergencias, sistema contra incendio, sistemas de alarma, comunicación, extintores, botiquines, camillas, duchas, lava ojos y otros dispositivos utilizados para casos de respuesta a emergencias.</p>
											<p> 17. Cómo reportar Incidentes /Accidentes de personas, maquinarias o daños de la propiedad de la empresa. Enseñar a diferenciar quién debe actuar en la reparación o retiro.</p>
											<p> 18. Importancia del Orden y la limpieza en la zona de trabajo.</p>
											<p> 19. Seguimiento, verificación y evaluación del desempeño del trabajador hasta que sea capaz de realizar la tarea asignada.</p>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="fecha_documento">
							<label for="fecha_documento" class="derecha">Fecha de emisión:
								<p>
									<?php 
												$fecha_documento  = explode("T",$_GET['fecha_documento']);
												print $fecha_documento[0];
												?>
								</p>
							</label>
						</div>
						<div class="caja-firma center row">
							<div class="column">
								<div class=".tablaConBordesTrabajador"> <img class="firma-digital" src="
																		<?php 
																		
																			  print  $_GET['url_firma'];
																		?>"/> </div>
								<p>
									<?php 
																		$nombre  = preg_replace("/99/"," ",$_GET['nombre']);
																		print $nombre;
																		?>
								</p>
								<p>
									<?php 
																		$dni  =$_GET['dni'];
																		print "DNI:".$dni;
																		?>
								</p>
								<p>
									<?php 
																	
																		$fecha_traba  = preg_replace("/T/"," ",$_GET['fecha_traba']);
																		print "Fecha:".$fecha_traba;
																		?>
								</p>
								<p>Firma del Trabajador </p> <span id="firmado" class="oculto">0</span> </div>
							<div class="column">
								<div class="tablaConBordes">
									<canvas id="firma" width="300" height="250"></canvas>
									<p>
										<?php print "DNI:".$_SESSION['dni'] ?>
									</p>
									<p>
										<?php print preg_replace('/-/',' ',$_SESSION['nombres']);?>
									</p>
									<p>Firma del Supervisor</p> <span id="firmado" class="oculto">0</span>
									<button type="button" class="button-blue" id="draw-clearBtn"> Limpiar firma </button>
								</div>
							</div>
						</div>
						
						
						<div class="manyInput"> </div>
	<!--					<button type="submit" class="btnUpdateDocumento login-submit size-width">Confirmar capacitacion</button>
						</div>
							-->

						<div class="center">

							<div class="buttonsPage btnRegister">
								<button type="submit"  id="btnRegister">  Registrar Documento </button>
							</div>
							<div class="buttonsPage btnCancelar">
							<!--	<button type="submit"  id="btnCancelar"> Cancelar </button> -->
								<a class="btnCancelar" href=<?php echo constant( 'URL'). 'panel' ?> >Volver a inicio</a>
							</div>


						</div>
				</form>
				</div>
				</div>
				<div class="center">
					<div class="envio_exitoso"> <img src="public/img/verificado.png">
						<p class="message_gracias">Gracias</p>
						<p class="message_exitoso">El formulario fue enviado con exito</p> <a class="inicio" href=<?php echo constant( 'URL'). 'panel' ?> >Volver a inicio</a> </div>
					<div class="envio_fallo"> <img src="public/img/fallo.png">
						<p class="message_advertencia">Error</p>
						<p class="message_fallo">Presentamos problemas en este momento ,volver a intentar enviar</p> <a class="inicio" href=<?php echo constant( 'URL'). 'panel' ?> >Volver a inicio</a> </div>
				</div>
				<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
				<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
				<script src="<?php echo constant('URL');?>public/js/anexo5.js"></script>
				<script src="<?php echo constant('URL');?>public/js/firma.js"></script>
				<script src="<?php echo constant('URL');?>public/js/firmaMovil.js"></script>
	</body>

	</html>