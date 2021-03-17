<?php
    require_once 'models/usuario.php';

    class MainModel extends Model{
        
        public function __construct()
        {
            parent::__construct();
        }

        public function getByUserPass($user, $clave){
           $item = new Usuario;

           $query = $this->db->connectrrhh()->prepare('SELECT apellidos,nombres,correo,usuario,ssma,dni,dcargo
                                                    FROM tabla_aquarius
                                                    WHERE USUARIO = :usuario AND CLAVE = :clave ');

           try{
                $query->execute(['usuario'  => $user, 'clave' => SHA1($clave)]);

                while($row = $query->fetch()){

                    $item->apellidos = $row['apellidos'];
                    $item->nombres   = $row['nombres'];
                    $item->correo    = $row['correo'];
                    $item->usuario   = $row['usuario'];
                    $item->ssma      = $row['ssma'];
                    $item->dni      = $row['dni'];
                    $item->dcargo      = $row['dcargo'];

                    $item->iniciales = substr( $row['nombres'],0,1).substr($row['apellidos'],0,1 );
                }



                session_start();
                $_SESSION['iniciales']  = $item->iniciales;
                $_SESSION['nivel']      = $item->ssma;
                $_SESSION['nombres']    = $item->nombres." ".$item->apellidos;
                $_SESSION['usuario']    = $item->usuario;
                $_SESSION['dni'] =$item->dni;

                return $item;

            }catch(PDOException $e){
                return [];
            }
        }


       
    }
?>