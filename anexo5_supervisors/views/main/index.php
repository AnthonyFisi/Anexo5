<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL')?>public/css/index.css">

    <title>Control Documentario SSMA</title>
</head>
<body>




    <div class="wrap">

    
       
    <div class="login">
            
        <h2 class="login-title">Sistema Anexo5 - Supervisores</h2>

            <form action="<?php echo constant('URL')?>main/loginUser" method="POST" class="login-form" autocomplete>
               
            <div class="form-group">
                
                <label for="usuario" class="form-label" ><i class="fas fa-user"></i> Usuario</label>
                    <input type="text" class="form-input" name="usuario" required>
                </div>

                <div class="form-group">
                    <label for="usuario" class="form-label" ><i class="fas fa-key"></i> Clave</label>
                    <input type="password" class="form-input"  name="clave" required>
                </div>

                    

                    <button class="login-submit">Ingresar</button>

              
            
            </form>


        </div>
    </div>


    

    <script src="<?php echo constant('URL');?>public/js/jquery.js"></script>
    <script src="<?php echo constant('URL');?>public/js/funciones.js"></script>
   
    <script src="<?php echo constant('URL');?>public/js/main.js"></script>



</body>
</html>