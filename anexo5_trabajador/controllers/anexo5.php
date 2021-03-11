<?php

class Anexo5 extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function render(){

        $this->view->render('anexo5/index');
    }

    function grabarDocumento(){
        $respuesta = false;
        
        $dni_trabajador                  = $_POST['dni_trabajador'];
        $fecha_documento               =$_POST['fecha_documento'];
        $url_firma_trabajador                         =$_POST['archivo'];
        $nombre_trabajador                  = $_POST['nombre_trabajador'];
        $cargo_trabajador              =$_POST['cargo_trabajador'];

        $respuesta =  $this->model->insert([
        'dni_trabajador'=>$dni_trabajador,
        'fecha_documento'=>$fecha_documento,
        'url_firma_trabajador'=>$url_firma_trabajador,
        'nombre_trabajador' => $nombre_trabajador,
        'cargo_trabajador' => $cargo_trabajador
        ]);


       echo $respuesta;
    }

    function getTrabajadorByDni(){

        $dni = $_POST['dni'];

        $getName=$this->model->getTrabajadorByDni($dni);
        
        if ($getName != null){

            $salidajson = array("dni"=>$getName['dni'],
            "apellidos"=>$getName['apellidos'],
            "nombres"=>$getName['nombres'],
            "dcargo"=>$getName['dcargo']);
            
            echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);

        }


    
 
    }


    }

?>