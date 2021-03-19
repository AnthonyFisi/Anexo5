<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="<?php echo constant('URL')?>public/img/logo.png" />
	<link rel="stylesheet" href="<?php echo constant('URL')?>public/css/panel.css">
	<title>Control Documentario SSMA - Panel Principal</title>
</head>

<body>
	<div class="wrap center">

	

		<div class="center">
    
		<h1>Anexo5 - Supervisor</h1>
					<h3> 
					<?php 
					$data1=  $_SESSION['nombres'];
					print $data1;
					?> 
					</h3>
	
		</div>


		<div>
			<div class="column">
				<div class="bandeja">
				<h2  id="cantidad-documentos">Bandeja de documentos</h2>

				</div>
			</div>
			<div class="column">
				<button class="reload"> 
				<img class ="imagen-reload" src="../public/img/reload.png" alt=""> 
				</button>
		</div>

			
			
		</div>



		<div class="div-table">
					<table id="table_entrada" class="styled-table">
						<thead>
							<tr class="active-row">
								<th class="id">id</th>
								<th class="dni">DNI</th>
								<th class="nombre">Nombre de trabajador</th>
								<th class="cargo">Cargo</th>
								<th>PDF</th>
							</tr>
						</thead>
					</table>
		</div>
	</div>
	<script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
	<script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
	<script src="<?php echo constant('URL');?>public/js/panel.js"></script>
</body>

</html>