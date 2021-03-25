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
	<div class="wrap center">
		

		<div>
    
			<h1>Anexo5 - RRHH</h1>
				<h3> 
				<?php 
				$data1=  $_SESSION['nombres'];
				print $data1;
				?> 
				</h3>

	</div>
		<ul class="tabs">
			<li><a href="#tab2"><span class="fa fa-group"></span><span class="tab-text">Espera</span></a></li>
			<li><a href="#tab3"><span class="fa fa-briefcase"></span><span class="tab-text">Listo</span></a></li>
		</ul>


		<div class="secciones">
	

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
								<th>PDF</th>
							</tr>
						</thead>
					</table>
				</div>
			</article>

		</div>

		
	</div>

	
	<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
	<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
	<script src="<?php echo constant('URL');?>public/js/panel.js"></script>
	<script src="<?php echo constant('URL');?>public/js/supervisor.js"></script>
</body>

</html>