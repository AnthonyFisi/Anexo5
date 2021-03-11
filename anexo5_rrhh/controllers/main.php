<?php

class Main extends Controller{
        function __construct()
        {
            parent::__construct();
        }

        function render(){
            $this->view->render('main/index');
        }

        function loginUser(){
            $user   = $_POST['usuario'];
            $clave  = $_POST['clave'];

            $getUser = $this->model->getByUserPass($user, $clave);
            
            if ( $getUser->usuario ) {
                $this->view->mensaje   = $getUser->iniciales ;
                $this->view->nivel     = $getUser->ssma ;
                $this->view->sedes     = $this->model->getSedesTops();
                $this->view->valores   = $this->model->getValuesTops();
                $this->view->mes       = $this->model->getMonth();

                $this->view->render('panel/index');
            }
            else {
                $this->view->mensaje="Error en la clave o usuario";
                $this->view->render('errores/index');
            }
        }


        function getUserMovil(){
            $user  = $_POST['user'];
            $pass  = $_POST['pass'];

            $getUser = $this->model->getUserMovil($user,$pass);

            if ( $getUser->internal ) {
                $salidajson = array("id"=>$getUser->internal,
                                    "nombre"=>$getUser->nombres,
                                    "nivel"=>$getUser->ssma,
                                    "usuario"=>$getUser->usuario,
                                    "resultado"=>"true");
                echo json_encode($salidajson,JSON_UNESCAPED_UNICODE);
            }
            else {
                $salidajson = array("id"=>$getUser->internal,
                                    "nombre"=>$getUser->nombres,
                                    "nivel"=>$getUser->ssma,
                                    "usuario"=>$getUser->usuario,
                                    "resultado"=>"false");
                echo json_encode($salidajson);
            }
        }
    }
?>