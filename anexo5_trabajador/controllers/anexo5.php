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

        $dni_supervisor = $_POST['dni_supervisor'];
        $nombre_supervisor=$_POST['nombre_supervisor'];
        $usuario=$_POST['usuario'];
        $fecha_ingreso=$_POST['fecha_ingreso'];



        $respuesta =  $this->model->insert([
        'dni_trabajador'=>$dni_trabajador,
        'fecha_documento'=>$fecha_documento,
        'url_firma_trabajador'=>$url_firma_trabajador,
        'nombre_trabajador' => $nombre_trabajador,
        'cargo_trabajador' => $cargo_trabajador,
        
        'dni_supervisor'=>$dni_supervisor,
        'nombre_supervisor'=>$nombre_supervisor,
        'usuario'=>$usuario,
        'fecha_ingreso'=>$fecha_ingreso

        ]);


       echo $respuesta;
    }

    function getTrabajadorByDni(){

        $dni_trabajador = $_POST['dni_trabajador'];
        $dni_supervisor=$_POST['dni_supervisor'];



        $usuario_trabajador=$this->model->getTrabajadorByDni($dni_trabajador);

        if($usuario_trabajador != null){

            $usuario_supervisor=$this->model->getTrabajadorByDni($dni_supervisor);
            
            if($usuario_supervisor!=null){

                    $salidajson = array(
                    "usuario"=>$usuario_trabajador['perfil'],
                    "dni"=>$usuario_trabajador['dni'],
                    "apellidos"=>$usuario_trabajador['apellidos'],
                    "nombres"=>$usuario_trabajador['nombres'],
                    "dcargo"=>$usuario_trabajador['dcargo'],
                    "fecha_ingreso"=>$usuario_trabajador['fecha_ingreso'],
        
                    //DATOS DE SUPERVISOR
        
        
                    //"usuario_supervisor"=>$usuario_supervisor['usuario'],
                    "dni_supervisor"=>$usuario_supervisor['dni'],
                    "apellidos_supervisor"=>$usuario_supervisor['apellidos'],
                    "nombres_supervisor"=>$usuario_supervisor['nombres'],
                  //  "dcargo_supervisor"=>$usuario_supervisor['dcargo'],
                 //   "fecha_ingreso_supervisor"=>$usuario_supervisor['fecha_ingreso'],
                );
                    
                    echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
        
                
            }else{
                //error de supervisor dni
                echo "0";
            }

        }else{
                //error de trabajador dni
            echo "1";
        }
        

        
      


    
 
    }


    }

?>