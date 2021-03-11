<?php
    class Anexo5Model extends Model {
        public function __construct()
        {
            parent::__construct();
        }

        public function insert($datos){
            $estado=1;
           try{ 
                $query = $this->db->connectanexo5()->prepare('INSERT INTO documento (
                                                dni_trabajador,
                                                nombre_trabajador,
                                                cargo_trabajador ,
                                                dni_supervisor,
                                                nombre_supervisor,
                                                url_firma_trabajador,
                                                url_firma_supervisor,
                                                fecha_documento,
                                                fecha_contrato,
                                                url_pdf,
                                                id_estado)
                                                
                                                VALUES (
                                                :dni_trabajador,
                                                :nombre_trabajador,
                                                :cargo_trabajador ,
                                                :dni_supervisor,
                                                :nombre_supervisor,
                                                :url_firma_trabajador,
                                                :url_firma_supervisor,
                                                :fecha_documento,
                                                :fecha_contrato,
                                                :url_pdf,
                                                :id_estado)' );



                $query->execute([
                                    'dni_trabajador'=> $datos['dni_trabajador'],
                                    'nombre_trabajador'=> $datos['nombre_trabajador'],
                                    'cargo_trabajador'=> $datos['cargo_trabajador'],
                                    'dni_supervisor' =>  '',
                                    'nombre_supervisor'=> '',
                                    'url_firma_trabajador' => $datos['url_firma_trabajador'],
                                    'url_firma_supervisor' =>  '',
                                    'fecha_documento' =>  $datos['fecha_documento'],
                                    'fecha_contrato' =>  null,
                                    'url_pdf' => '',
                                    'id_estado' =>  $estado,

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
                                                                dni,
                                                                apellidos,
                                                                nombres,
                                                                dcargo 
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