<?php 
    class Panel extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->mensaje    = $_SESSION['iniciales'] ;
            $this->view->nivel      = $_SESSION['nivel'] ;
            $this->view->nombres    = $_SESSION['nombres'] ;
          

            $this->view->render('panel/index');
        }


        function newView(){
            
            $id   = $_GET['id'];
            $nombre   = $_GET['nombre'];
            $dni  = $_GET['dni'];
            $cargo   = $_GET['cargo'];
            $url_firma = $_GET['url_firma'];
            
            $this->view->id   =  $id;
            $this->view->nombre   =  preg_replace('/99/', ' ', $nombre) ;
            $this->view->dni   =  $dni ;
            $this->view->cargo  =  preg_replace('/99/', ' ', $cargo) ;
            $this->view->url_firma   =  $url_firma;

            $this->view->render('preguntas/index');
        }



        function getLisaDocumentoByIdEstado(){
       
            $data=  $_POST['id'];
        
            $lista = $this->model->getListEntrada($data);
            
        
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);
    
        }


        function updateDocumento(){

            $dni_supervisor = $_POST['dni_supervisor'];
            $nombre = $_POST['nombre'];
            $fecha =$_POST['fecha_contrato'];
            $id_documento = $_POST['id_documento'];

            $respuesta=$this->model->updateDocumento($dni_supervisor,$nombre,$fecha,$id_documento);
       
            echo $respuesta;
        }


            
    function getTrabajadorByDni(){

        $dni = $_POST['dni'];

        $getName=$this->model->getTrabajadorByDni($dni);
        
        if ($getName != null){

            $salidajson = array("dni"=>$getName['dni'],
            "apellidos"=>$getName['apellidos'],
            "nombres"=>$getName['nombres'],
            "dcargo"=>$getName['dcargo'],
            "correo"=>$getName['correo']
        );
            
            echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);

        }
    }

    


    }
?>