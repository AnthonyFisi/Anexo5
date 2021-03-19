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

             /**
             *  DATOS DEL TRABAJADOR
            */

            $id_trabajador=$_POST['usuario'];

            $nombre_trabajador = $_POST['nombre_trabajador'];
            $cargo_trabajador = $_POST['cargo_trabajador'];
            $url_firma = $_POST['url_firma'];
            $fecha_contrato = $_POST['fecha_contrato'];
            $fecha_documento = $_POST['fecha_documento'];
            $dni_trabajador = $_POST['dni_trabajador'];
            $fecha_firma_trabajador = $_POST['fecha_firma_trabajador'];


            session_start();

            $url_pdf=$this->model->createPdfHere(
                $id_trabajador,
                $nombre_trabajador,
                $url_firma,
                $cargo_trabajador,
                $fecha_documento,
                $fecha_contrato,

                $dni_trabajador,
                $fecha_firma_trabajador,

                $_SESSION['dni'],
                $_SESSION['nombres']);

            
             /**
             *  DATOS DEL SUPERVISOR
             */

            $url_supervisor = $_POST['url_supervisor'];
            $id_documento = $_POST['id_documento'];
            $id_estado=3;
           
          
            $respuesta=$this->model->updateDocumento($url_pdf,$url_supervisor,$id_documento,$id_estado);

           
            echo $respuesta;
        }

        function getData(){
           
            $id   = $_GET['id'];
            $nombre   = $_GET['nombre'];
            $cargo   = $_GET['cargo'];
            $url_firma = $_GET['url_firma'];
            
            $this->view->id   =  $id;
            $this->view->nombre   =  preg_replace('/99/', ' ', $nombre) ;
            $this->view->cargo  =  preg_replace('/99/', ' ', $cargo) ;
            $this->view->url_firma   =  $url_firma;

          $this->view->render('anexo5/index');
        }

        function pdf(){
           // $nombre= 'JAVIER_DE_SANTOS';

        
            $id_trabajador='123';
            $nombre_trabajador='                    JHON99ANTHONY99CURI99SARAVIA';
            $url_firma='';
            $cargo_trabajador='Practicante99de99Tecnología99e99Informática';
            $fecha_documento='2021-03-13T11:17:42';
            $fecha_contrato='2021-03-13T11:17:42';

            $url_firma= preg_replace('/99/', '-', $nombre_trabajador);
          /*  print '_________';
            print $url_firma;
            print '_________';
            print trim($url_firma," ");

            print 'URL ';
            $url ="C:/xampp/htdocs/anexo5/anexo5_trabajador/firmas/".$url_firma.".png";
            print $url;
            print '_______________________________';
*/
            print 'URL TRIM';
            $url_firma ="C:/xampp/htdocs/anexo5/anexo5_trabajador/firmas/".trim($url_firma," ").".png";
            print $url_firma;
            print '_______________________________';


            $data=$this->model->createPdfHere(
                $id_trabajador,
                $nombre_trabajador,
                $url_firma,
                $cargo_trabajador,
                $fecha_documento,
                $fecha_contrato,
               'JUAN-LUIS-AGUIRRE-BARRANZUELA');
            echo $data;
        }
    }
         
         

?>
