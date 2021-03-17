<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/panel.css">
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/popup.css">
	<title>Control Documentario SSMA - Panel Principal</title>
</head>

<body>
	<div class="wrap">
		<h1>Sistema anexo 5 - RRHH</h1>
		<h3> 
		<?php 
		 $data1=  $_SESSION['nombres'];
		 print $data1;
		?>
		</h3>
		<ul class="tabs">
	<!--		<li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Mensaje de Entrada</span></a></li>-->
			<li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Espera</span></a></li>
			<li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Listos</span></a></li>
		</ul>
		<div class="secciones">
	<!--		
			<article id="tab1">
				<div>
					<table id="table_entrada" class="styled-table">
						<thead>
							<tr class="active-row">
								<th>id</th>
								<th>DNI</th>
								<th>Nombre de trabajador</th>
								<th>Cargo</th>
								<th>Detalles</th>
							</tr>
						
						</thead>
						<tbody>
						<?php

require_once 'models/panelmodel.php';
	
$panel=new PanelModel();
	$lista = $panel->getListEntrada(1);
	foreach ($lista as &$valor) {
		
		echo  '<tr>
		<td class="id">' . $valor->id . '</td>
	   <td class="dni"> '. $valor->dni_trabajador . '</td>
		<td class="nombre">' . $valor->nombre_trabajador .' </td>
		<td class="cargo">' . $valor->cargo_trabajador .' </td>

		<td><button class="clickPopup" > Asignar</button></td>

		<tr>';

	}

	
?>
						</tbody>
					</table>
				</div>
			</article>
-->

			<article id="tab2">
				<div>
					<table id="table_espera" class="styled-table">
						<thead>
							<tr class="active-row">
								<th>id</th>
								<th>Nombre de trabajador</th>
								<th>Cargo</th>
								<th>Fecha</th>
								<th>Nombre supervisor</th>
							</tr>
						</thead>
					</table>
				</div>
			</article>
			<article id="tab3">
				<div>
					<table id="table_listo" class="styled-table">
						<thead>
							<tr class="active-row">
								<th>id</th>
								<th>Nombre de trabajador</th>
								<th>Cargo</th>
								<th>Nombre supervisor</th>
								<th>url_pdf</th>
							</tr>
						</thead>
					</table>
				</div>
			</article>
		</div>
	</div>
	<!-- ESTE ES EL POPUP  -->
	<div class="popup" id="popup-1">
		<div class="overlay"></div>
		<div class="content">
			<div class="content">
				<div class="close-btn clickPopup-close" onclick="togglePopup()">&times;</div>
				<div class="center">
					<div class="envio_exitoso"> <img src="public/img/verificado.png">
						<p class="message_gracias">Gracias</p>
						<p class="message_exitoso">El formulario fue enviado con exito</p>
					</div>
					<div class="envio_fallo"> <img src="public/img/fallo.png">
						<p class="message_advertencia">Error</p>
						<p class="message_fallo">Presentamos problemas en este momento ,volver a intentar enviar</p>
					</div>
				</div>
				<div id="conten-data">
					<input type="hidden" id="nombre_supervisor">
					<input type="hidden" id="dni_supervisor">
					<input type="hidden" id="id_documento">
					<div>
						<!-- DATOS GENERALES DEL TRABAJADOR  -->
						<div>
							<h2 id="id_documento">
                	</h2> </div>
						<div>
							<h4>Asignar supervisor</h4>
							<!-- REALIZAMOS LA BUSQUEDA POR DNI DEL SUPERVISOR -->
							<div>
								<input class="form-input width-input" type="text" placeholder="Ingresar dni" id="dni_entrada" name="dni_entrada" autocomplete="empty">
								<button id="btnBuscarDni"> Buscar</button>
							</div>
							<div>
								<p id="message">Usuario no identificado</p>
							</div>
						</div>
						<!-- DATOS DEL SUPERVISOR QUE VA SER ASIGNADO A ESTA CAPACITACION-->
						<div id="div-supervisor">
							<table id="supervisor_table" class="styled-table">
								<thead>
									<tr class="active-row">
										<th>dni</th>
										<th>Nombre</th>
										<th>Cargo</th>
										<th>Correo</th>
									</tr>
								</thead>
							</table>
						</div>
						<!-- DATOS DEL TRABAJADOR  -->
						<div>
							<h4>Trabajador</h4>
							<table id="trabajador_table" class="styled-table">
								<thead>
									<tr class="active-row">
										<th>Nombre</th>
										<th>Cargo</th>
										<th>Correo</th>
										<th>Fecha de contrato</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th>
											<p id="dni_trabajador">
										</th>
										<th>
											<p id="nombre_trabajador"></p>
										</th>
										<th>
											<p id="cargo_trabajador">
										</th>
										<th>
											<input type="date" name="fecha" id="fecha" value="<?php echo date("Y-m-d");?>" class="w50p"> </th>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- ACTUALIZAMOS EL DOCUMENTO CON EL SUPERVISOR ASIGNADO Y FECHA DE CONTRATO-->
						<div class="center">
							<button class="btnUpdateDocumento login-submit size-width">Asignar Supervisor</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
	<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
	<script src="<?php echo constant('URL');?>public/js/panel.js"></script>
	<script src="<?php echo constant('URL');?>public/js/supervisor.js"></script>
</body>

</html>