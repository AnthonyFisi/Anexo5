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
  
<div class="wrap">

		<h1>Sistema anexo 5 - Supervisor </h1>
		<h3> 
		<?php 
		 $data1=  $_SESSION['nombres'];
		 print $data1;
		?>
		</h3>

		<ul class="tabs">
			<li><a href="#tab1"><span class="fa fa-home"></span><span class="tab-text">Documentos de capacitacion</span></a></li>
			
		</ul>

		<div class="secciones">
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

					</table>

				
	</div>
			</article>
			<article id="tab2">
            <div>
            <table id="table_espera" class="styled-table">
            <thead>
						<tr class="active-row">
							
							<th>id</th>
							<th>Nombre de trabajador</th>
                            <th>Cargo</th>
							
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




</body>
</html>