
<?php

$id   = $_GET['id'];
$nombre   = $_GET['nombre'];
$dni  = $_GET['dni'];
$cargo   = $_GET['cargo'];
$url_firma = $_GET['url_firma'];

?>

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

 

	
     <!-- CODIGO DEL DOCUMENTO-->
		
	 <div id="wrap1">
			<div class="page">
				
			<div class="cabeceraDoc">
					<div class="logo"> <img src="
									<?php echo constant('URL')?>public/img/logo.png" alt=""> </div>
					<div class="titulo">
						<p>Programa de capacitacion especifica en el area de trabajo </p>
						<p>Anexo 5</p>
					</div>
					<div class="formato">
						<p>PSPC-610-X-PR-005-FR-004</p>
						<p>Revisión: 0</p>
						<!--
                        Generar fecha de forma automatica
                        -->
						<p id="date_now"> </p>
						<p>Página: 1 de 1</p>
					</div>
				</div>



				
				<form method="POST" id="formAnexo5">
					

					<input type="hidden" name="id_documento" id="id_documento" value="<?php $id= $_GET['id'];
					print $id;?>">

					<input type="hidden" name="dni_trabajador" id="dni_trabajador" value="
					<?php 
					$dni  = $_GET['dni'];
					print $dni;
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
											<p id="trabajador" >
											<?php 
											$nombre   = $_GET['nombre'];
											$data =preg_replace('/99/', ' ', $nombre);
											print $data;
											?> </p>
											
									
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
									
											<p name="fecha_ingreso" id="fecha_ingreso" value="<?php echo date("Y-m-d");?>"> 
											<?php print date("Y-m-d");?>
										</p>
										
										</div>


									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Unidad de produccion :  UNIDAD MINERA CONSTANCIA </p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<label for="num_fotocheck" class="fondoblanco">Registro N° de Fotocheck: </label>
											<p> - </p>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Distrito : Llave </p>
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
											?> </p>
											</p>
									</td>
								</tr>
								<tr>
									<td>
										<div class="flex1 divGray">
											<p>Provincia :  Chumbivilcas</p>
										</div>
									</td>
									<td>
										<div class="flex2 divGray">
											<p>Area de Trabajo:  Proyectos / 20PP03 Linea de Descarga de Relaves Este - TMF</p>
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

											<label for="fecha_documento"  class="derecha">Fecha:
											
												<input type="date" class="derecha" name="fecha_documento" id="fecha_documento" value="<?php echo date("Y-m-d");?>">
											
											</label>
											 
											
										</div>
								

					
					<div class="caja-firma">
											<table>
												<tbody>
													<tr class="center">

														<td class="w100p">
															
														<!--
															<div class="tablaConBordes">
																<canvas id="firma" width="310" height="180"></canvas>
																<p>Firma del trabajador</p> <span id="firmado" class="oculto">0</span>
																<button type="button" class="button-blue" id="draw-clearBtn" > Limpiar firma </button>
															</div>
											-->

											<div class="tablaConBordes">
											<img src="<?php print $this->url_firma;?>"  width="310" height="180"/>
																
															</div>

														
														</td>

														
														<td class="w100p">


															
															<div class="tablaConBordes">
																<canvas id="firma" width="310" height="180"></canvas>
																<p>Firma del trabajador</p> <span id="firmado" class="oculto">0</span>
																<button type="button" class="button-blue" id="draw-clearBtn" > Limpiar firma </button>
															</div>
											
															
														</td>


													</tr>
												</tbody>
											</table>
					</div>
					<div class="manyInput">
					
					</div>

					
					<div class="center">
						
					<button  type="submit" class="btnUpdateDocumento login-submit size-width">Asignar Supervisor</button>

					</div>



				</form>




			</div>
		</div>




        


    
		<div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>


	<div class="center">
	
		<div class="envio_exitoso">
			<img src="public/img/verificado.png" >
			<p class="message_gracias">Gracias</p>
			<p class="message_exitoso">El formulario fue enviado con exito</p>
		</div>

	
	
	<div class="envio_fallo">
		<img src="public/img/fallo.png" >
		<p class="message_advertencia">Error</p>
		<p class="message_fallo">Presentamos problemas en este momento ,volver a intentar enviar</p>
	</div>


	<div class="floatingActionButton">
        <a href="<?php echo constant('URL')?>panel"><i class="fas fa-home"></i></a>
    </div>


	</div>

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
    <script src="<?php echo constant('URL');?>public/js/anexo5.js"></script>

    <script src="<?php echo constant('URL');?>public/js/firma.js"></script>
	<script src="<?php echo constant('URL');?>public/js/firmaMovil.js"></script>

</body>
</html>