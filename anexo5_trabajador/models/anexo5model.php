<?php
    class Anexo5Model extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
            $estado=2;
           try{ 
                $query = $this->db->connectanexo5()->prepare('INSERT INTO documento (
                                                dni_trabajador,
                                                nombre_trabajador,
                                                cod_usuario,
                                                cargo_trabajador ,
                                                dni_supervisor,
                                                nombre_supervisor,
                                                url_firma_trabajador,
                                                url_firma_supervisor,
                                                fecha_documento,
                                                fecha_contrato,
                                                url_pdf,
                                                id_estado,
                                                fecha_firma_trabajador,
                                                fecha_firma_supervisor
                                                )
                                                
                                                VALUES (
                                                :dni_trabajador,
                                                :nombre_trabajador,
                                                :cod_usuario,
                                                :cargo_trabajador ,
                                                :dni_supervisor,
                                                :nombre_supervisor,
                                                :url_firma_trabajador,
                                                :url_firma_supervisor,
                                                :fecha_documento,
                                                :fecha_contrato,
                                                :url_pdf,
                                                :id_estado,
                                                :fecha_firma_trabajador,
                                                :fecha_firma_supervisor
                                                )' );



                $query->execute([
                                    'dni_trabajador'=> $datos['dni_trabajador'],
                                    'nombre_trabajador'=> $datos['nombre_trabajador'],
                                    'cod_usuario'=> $datos['usuario'],
                                    'cargo_trabajador'=> $datos['cargo_trabajador'],
                                    'dni_supervisor' =>  $datos['dni_supervisor'],
                                    'nombre_supervisor'=>  $datos['nombre_supervisor'],
                                    'url_firma_trabajador' => $datos['url_firma_trabajador'],
                                    'url_firma_supervisor' =>  '',
                                    'fecha_documento' =>  $datos['fecha_documento'],
                                    'fecha_contrato' => $datos['fecha_ingreso'],
                                    'url_pdf' => '',
                                    'id_estado' =>  $estado,
                                    'fecha_firma_trabajador' =>date('Y-m-d H:i:s'.substr((string)microtime(), 1, 4)),
                                    'fecha_firma_supervisor' => null

                                ]);
                return true;
            }catch(PDOException $e){
               print $e->getMessage();
               return false;
            }
        }

        public function getTrabajadorByDni($dni){

            $items =[];


            try{ 
                 
                 $query = $this->db->connectrrhh()->prepare(" SELECT
                                                                perfil, 
                                                                dni,
                                                                apellidos,
                                                                nombres,
                                                                dcargo,
                                                                fecha_ingreso
                                                        FROM 
                                                                tabla_aquarius 
                                                        WHERE 
                                                        DNI = :dni ");
                  $query->execute(['dni'  => $dni]);

                while($row = $query->fetch()){
                    $items = $row;
                }

                return $items;
                
             }catch(PDOException $e){
                echo $e->getMessage();
                return false;
             }
         }

    }
?>