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
                $query->execute(['usuario'  => $user, 'clave' => $clave]);

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

        public function getUserMovil($user,$pass) {
            $item = new Usuario;

            $query = $this->db->connect()->prepare('SELECT internal,apellidos,nombres,correo,usuario,ssma
                                                    FROM tabla_aquarius
                                                    WHERE USUARIO = :usuario AND CLAVE = :clave');
            try {
                $query->execute(['usuario'  => $user, 'clave' => SHA1($pass)]);

                while ($row = $query->fetch()) {
                    $item->internal     = $row['internal'];
                    $item->nombres      = $row['nombres'].' '.$row['apellidos'];
                    $item->ssma         = $row['ssma'];
                    $item->usuario      = $row['usuario'];
                }

                if ( !$item->internal )
                {
                    $item->internal = null;
                    $item->nombres  = null;
                    $item->ssma     = null;
                    $item->usuario  = null;
                }
                
                return $item;

            } catch (PDOException $e) {
                return [];
            }
        }

       
    }
?>