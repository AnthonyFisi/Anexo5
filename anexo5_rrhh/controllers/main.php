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
                

                $this->view->render('panel/index');
            }
            else {
                $this->view->mensaje="Error en la clave o usuario";
                $this->view->render('errores/index');
            }
        }


        
    }
?>