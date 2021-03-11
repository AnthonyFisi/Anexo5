<?php
    require_once 'models/usuario.php';

    class MainModel extends Model{
        public function __construct()
        {
            parent::__construct();
        }

        public function getByUserPass($user, $clave){
           $item = new Usuario;

           $query = $this->db->connectrrhh()->prepare('SELECT apellidos,nombres,correo,usuario,ssma
                                                    FROM tabla_aquarius
                                                    WHERE USUARIO = :usuario AND CLAVE = :clave');

           try{
                $query->execute(['usuario'  => $user, 'clave' => SHA1($clave)]);

                while($row = $query->fetch()){
                    $item->apellidos = $row['apellidos'];
                    $item->nombres   = $row['nombres'];
                    $item->correo    = $row['correo'];
                    $item->usuario   = $row['usuario'];
                    $item->ssma      = $row['ssma'];

                    $item->iniciales = substr( $row['nombres'],0,1).substr($row['apellidos'],0,1 );
                }

                session_start();
                $_SESSION['iniciales']  = $item->iniciales;
                $_SESSION['nivel']      = $item->ssma;
                $_SESSION['nombres']    = $item->nombres." ".$item->apellidos;
                $_SESSION['usuario']    = $item->usuario;

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

        public function getValuesTops()
        {
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                Count(vwtops.sede) AS tops,
                general.nombre AS sede
                FROM
                vwtops
                INNER JOIN general ON vwtops.sede = general.cod
                WHERE
                general.clase = '00'
                GROUP BY
                vwtops.sede
                ORDER BY
                general.nombre
                 ");
                while($row = $query->fetch()){
                    $item = $row['tops'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getSedesTops(){
            $items = [];

            try {
                $query = $this->db->connect()->query("SELECT
                Count(vwtops.sede) AS tops,
                general.nombre AS sede
                FROM
                vwtops
                INNER JOIN general ON vwtops.sede = general.cod
                WHERE
                general.clase = '00'
                GROUP BY
                vwtops.sede
                ORDER BY
                general.nombre
                 ");
                while($row = $query->fetch()){
                    $item = $row['sede'];

                    array_push($items,$item);
                }

                return $items;
            } catch (PDOException $e) {
                return [];
            }
        }

        public function getMonth(){
            $mes = ["ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SETIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"];

            return $mes[date('n')-1];
        }
    }
?>