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

          //  $this->view->render('preguntas/index');
        }


        function getListEntrada(){
            session_start();
    
            $data=  $_POST['id'];
            $data1=  $_SESSION['dni'];
    
        
        
            $lista = $this->model->getListEntrada($data,$data1);
            
        
            echo json_encode($lista,JSON_UNESCAPED_UNICODE);
    
        }


    }
?>