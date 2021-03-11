<?php


class Documento{
    public            $id;
    public      $dni_trabajador;
    public      $nombre_trabajador;
    public      $cargo_trabajador;
    public           $dni_supervisor;
    public           $nombre_supervisor;

    public            $url_firma_trabajador;
    public            $url_firma_supervisor;
    public            $fecha_documento;
    public           $fecha_contrato;
    public            $url_pdf;
    public           $id_estado;

       function __construct( $id,$dni_trabajador,$nombre_trabajador,$cargo_trabajador,$dni_supervisor,$nombre_supervisor,$url_firma_trabajador,$url_firma_supervisor,$fecha_documento,$fecha_contrato,$url_pdf,$id_estado)  
           { 
               $this->id= $id; 
               $this->dni_trabajador=$dni_trabajador;
               $this->nombre_trabajador=$nombre_trabajador;
               $this->cargo_trabajador=$cargo_trabajador;
               $this->dni_supervisor=$dni_supervisor;
               $this->nombre_supervisor=$nombre_supervisor;
               $this->url_firma_trabajador=$url_firma_trabajador;
               $this->url_firma_supervisor=$url_firma_supervisor;
               $this->fecha_documento=$fecha_documento;
               $this->fecha_contrato=$fecha_contrato;
               $this->url_pdf=$url_pdf;
               $this->id_estado=$id_estado; 
           }
}

    class PanelModel extends Model {
        public function __construct()
        {
            parent::__construct();
        }



        public function getListEntrada($id_estado){

            $items =array();
            try {
                $query = $this->db->connectanexo5()->query(" SELECT 
                                                            id,
                                                            dni_trabajador,
                                                            nombre_trabajador,
                                                            cargo_trabajador,
                                                            dni_supervisor,
                                                            nombre_supervisor,
                                                            url_firma_trabajador,
                                                            url_firma_supervisor,
                                                            fecha_documento,
                                                            fecha_contrato,
                                                            url_pdf,
                                                            id_estado 
                                                        FROM documento  
                                                        WHERE documento.id_estado = '$id_estado' "); 
  
                while($row = $query->fetch()){

                    $obj_documento=new Documento(
                        $row['id'],
                        $row['dni_trabajador'],
                        $row['nombre_trabajador'],
                        $row['cargo_trabajador'],
                        $row['dni_supervisor'],
                        $row['nombre_supervisor'],
                        $row['url_firma_trabajador'],
                        $row['url_firma_supervisor'],
                        $row['fecha_documento'],
                        $row['fecha_contrato'],
                        $row['url_pdf'],
                        $row['id_estado']
                    );

        

                    array_push($items,$obj_documento);
                   
                }

               
                return $items;

            } catch (PDOException $e) {
                print  $e->getMessage();
                return [];
            }
        }


        
        public function updateDocumento($dni_supervisor,$nombre_supervisor,$fecha_contrato,$id){

            $id_estado = 2 ;

            try{
                $query = $this->db->connectanexo5()->prepare(' UPDATE documento SET 
                                                                                DNI_SUPERVISOR =:dni_supervisor ,
                                                                                NOMBRE_SUPERVISOR =:nombre_supervisor,
                                                                                FECHA_CONTRATO =:fecha_contrato,
                                                                                ID_ESTADO =:id_estado
                                                                                
                                                                                 WHERE ID =:id ');
                
                $query->execute(['dni_supervisor'=>$dni_supervisor,
                                'nombre_supervisor'=>$nombre_supervisor,
                                'fecha_contrato' =>$fecha_contrato,
                                'id_estado' =>$id_estado,'id' =>$id]);


                return true;

            }catch(PDOException $e){
               echo $e->getMessage();
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
                                                                dcargo,
                                                                correo 
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