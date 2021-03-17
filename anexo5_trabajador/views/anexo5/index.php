<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Anexo 5</title>
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/global.css?v1.0.1">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/all.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/circle.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/anexo5.css"> </head>

<body>
	<div class="center" id="divDni">
		<div>
			<h2>DNI trabajador </h2> </div>
		<div class="w35">
			<input class="form-input w45p" type="text" id="dni_trabajador_entrada" name="dni_trabajador_entrada" autocomplete="empty"> </div>
		<div>
			<p id="message_trabajador">Dni trabajador incorrecto</p>
		</div>

		<div>
			<h2>DNI supervisor </h2> </div>
		<div class="w35">
			<input class="form-input w45p" type="text" id="dni_supervisor_entrada" name="dni_supervisor_entrada" autocomplete="empty"> </div>
		<div>
			<p id="message_supervisor">Dni supervisor incorrecto</p>
		</div>

		<div>
			<button id="btnBuscarDni">Buscar</button>
		</div>
	</div>

	<div class="loader"></div>


	<div class="center">
		<div class="envio_exitoso"> <img src="public/img/verificado.png">
			<p class="message_gracias">Gracias</p>
			<p class="message_exitoso">El formulario fue enviado con exito</p>
			<a class="inicio" href= <?php print URL ?> >Volver a inicio</a>
		</div>
		<div class="envio_fallo"> <img src="public/img/fallo.png">
			<p class="message_advertencia">Error</p>
			<p class="message_fallo">Presentamos problemas en este momento ,volver a intentar enviar</p>
			<a class="inicio" href= <?php print URL ?> >Volver a inicio</a>
		</div>
	</div>
	<div id="wrap">
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
				<input type="hidden" name="archivo" id="archivo">
				<input type="hidden" name="dni_trabajador" class="dni_trabajador">
				<input type="hidden" name="nombre_trabajador" class="nombre_trabajador">
				<input type="hidden" name="cargo_trabajador" id="cargo_trabajador">
				<input type="hidden" name="usuario" id="val_usuario">


				<input type="hidden" name="fecha_ingreso" id="val_fecha_ingreso">
				<input type="hidden" name="dni_supervisor" class="dni_supervisor">
				<input type="hidden" name="nombre_supervisor" class="nombre_supervisor">
				
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
										<p id="trabajador"> </p>
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
										<p name="fecha_ingreso" id="fecha_ingreso" >
											
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
										<label for="num_fotocheck" class="fondoblanco">Codigo del empleado :</label>
										<p name="usuario" id="usuario" >  </p>
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
										<p id="ocupacion"> </p>
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
						<label for="fecha_documento" class="derecha">Fecha:
							<input type="date" class="derecha" name="fecha_documento" id="fecha_documento" value="<?php echo date("Y-m-d");?>"> </label>
					</div>
					<div class="caja-firma">
						<table>
							<tbody>
								<tr class="center">
									<td class="w100p">
										<div class="tablaConBordes">
											<canvas id="firma" width="310" height="180"></canvas>
											<div>
											<div>DNI:<p class="dni_trabajador"></p></div>
											
											<p class="nombre_trabajador"></p>
											<p>Firma del trabajador</p> 

											</div>
											
											
											<span id="firmado" class="oculto">0</span>
											
											<button type="button" class="button-blue" id="draw-clearBtn"> Limpiar firma </button>
										</div>
									</td>
									<td class="w100p">
										<div class="tablaConBordes">
											<canvas id="firma2"></canvas>
											<div>DNI:<p class="dni_supervisor"></p></div>
											<p class="nombre_supervisor"></p> 
											<p>V° B° del Supervisor</p> <span id="firmado2" class="oculto">0</span> </div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="manyInput"> </div>
					<div class="center">

					<div class="buttonsPage btnRegister">
						<button type="submit"  id="btnRegister"> <i class="far fa-calendar-check"></i> Registrar Documento </button>
					</div>
					<div class="buttonsPage btnCancelar">
						<button type="submit"  id="btnCancelar"> <i class="far fa-calendar-check"></i> Cancelar </button>
					</div>

					
					</div>
					
			</form>
			</div>
			</div>
			
			
			<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
			<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
			<script src="<?php echo constant('URL');?>public/js/anexo5.js"></script>
			<script src="<?php echo constant('URL');?>public/js/firma.js"></script>
			<script src="<?php echo constant('URL');?>public/js/firmaMovil.js"></script>
</body>

</html>