<?php
    class Anexo5 extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            session_start();

            $this->view->usuario = $_SESSION['usuario'];
            $this->view->codpreg = uniqid();
            $this->view->render('anexo5/index');
        }

       

        function getListSupervisores(){
            

            $lista=$this->model->getListSupervisores();
            
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);

        }

        function updateDocumento(){

            $url_supervisor = $_POST['url_supervisor'];
            $id_documento = $_POST['id_documento'];
            $id_estado=3;
           

            $respuesta=$this->model->updateDocumento($url_supervisor,$id_documento,$id_estado);
       
            echo $respuesta;
        }

        function getData(){
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

          $this->view->render('anexo5/index');
        }
    }
?>