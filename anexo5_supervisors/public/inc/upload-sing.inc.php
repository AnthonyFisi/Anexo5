<?php
    session_start();

    if (array_key_exists('img',$_REQUEST) ) {
        //echo $_REQUEST['img'];
    
        // convierte la imagen recibida en base64
        // Eliminamos los 22 primeros caracteres, que 
        // contienen el substring "data:image/png;base64,"

        $imgData = base64_decode(substr($_REQUEST['img'],22));
    
   
        
        $namefile =$_SESSION['nombres'];
        $namefile= preg_replace('/\s+/', '-', $namefile);
        //C:\xampp\htdocs\ssma\firmas
        $file = '../../firmas/'.$namefile.'.png';
         $url_bbdd = 'http://127.0.0.1/anexo5/anexo5_supervisors/firmas/'.$namefile.'.png';
      //  $url_bbdd = constant('URL').'firmas/'.$namefile.'.png';


        // borrar primero la imagen si existía previamente
        if (file_exists($file)) { unlink($file); }

        // guarda en el fichero la imagen contenida en $imgData
        $fp = fopen($file, 'w');
        fwrite($fp, $imgData);
        fclose($fp);

        echo  $url_bbdd;
    }
?>