<?php

    class Supervisor {
        public $dni;
        public $apellidos;
        public $nombres;
        public $dcargo;
        public $correo;

        function __construct($dni,$apellidos,$nombres,$dcargo,$correo)  
                { 
                    $this->dni= $dni; 
                    $this->apellidos=$apellidos;
                    $this->nombres=$nombres;
                    $this->dcargo=$dcargo;
                    $this->correo=$correo;
                }
    }

    class Anexo5Model extends Model{
        public function __construct()
        {
            parent::__construct();
        }

      

        public function getListSupervisores(){

            $items=array();

            try{
            

                $query = $this->db->connectrrhh()->query("SELECT 
                                                            dni,apellidos,nombres,dcargo,correo
                                                        FROM tabla_aquarius WHERE DCARGO LIKE '%Supervisor%' ");

 

            while($row = $query->fetch()){
                    $obj_supervisor= new Supervisor(
                        $row['dni'],
                        $row['apellidos'],
                        $row['nombres'],
                        $row['dcargo'],
                        $row['correo']
                    );
                    
                    array_push($items,$obj_supervisor);
            }


            return $items;


            }catch(PDOException $e){
               print $e->getMessage();
               return   false;
            }
        }

        public function updateDocumento($url_pdf,$url_supervisor,$id_documento,$id_estado){


            try{



                $query = $this->db->connectanexo5()->prepare(' UPDATE documento SET 
                                                                                URL_PDF =:url_pdf,
                                                                                URL_FIRMA_SUPERVISOR =:url_firma_supervisor ,
                                                                                ID_ESTADO =:id_estado,
                                                                                FECHA_FIRMA_SUPERVISOR =:fecha_firma_supervisor
                                                                                 WHERE ID =:id ');
                
                $query->execute(['url_pdf' => $url_pdf,
                                'url_firma_supervisor'=>$url_supervisor,
                                'id_estado' =>$id_estado,
                                'id' =>$id_documento,
                                'fecha_firma_supervisor' =>date('Y-m-d H:i:s'.substr((string)microtime(), 1, 4))
                                ]);


                return true;

            }catch(PDOException $e){
                
               echo $e->getMessage();
               return false;
            }
        }

        function createPdfHere($id_trabajador,$nombre_trabajador, $url_firma,$cargo_trabajador
        ,$fecha_documento,$fecha_contrato,
        $dni_trabajador,
        $fecha_firma_trabajador,
        $dni_supervisor,
        $nombre_supervisor){
         
            


            require 'public/inc/WriteTag.php';

            $namefile= preg_replace('/\s+/', '-', $nombre_supervisor);

        
            $pdf=new PDF_WriteTag('P','mm',array(210,280));
            $pdf->SetMargins(25,10,20);
            $pdf->SetFont('courier','',12);
            $pdf->AddPage();
    
        
            // Feuille de style
            $pdf->SetStyle("p","Arial","N",10,"0,0,0",15);
            $pdf->SetStyle("vb","Arial","B",0,"0,0,0");
    
            $pdf->Ln(5);
           
           
            $pdf->SetFillColor(229, 229, 229);//Fondo gris de celdas
            $pdf->Image('public/img/logo.png',25,18,20);


            $pdf->Cell(20,20,'',1,0,'C');
            
            
            $pdf->SetFont('Helvetica','',10);
            $pdf->MultiCell(100,10,utf8_decode('Programa de capacitación específica en el
             área de trabajo - Anexo 5 '),1,'C',false);

            $pdf->SetXY(145,15);
            $pdf->SetFont('Helvetica','',7);
            $pdf->MultiCell(40,5,utf8_decode('PSPC-610-X-PR-005-FR-004
            Revisión: 0
            Emisión: 08-05-2019
            Página: 1 de 1'),1,'L',false);
    

            $pdf->Cell(80,5,'Titular : HUDBAY PERU S.A.C',1,0,'C');
            $pdf->Cell(80,5,'Trabajador :' .$nombre_trabajador,1,0,'C');
            //$pdf->SetLineWidth(0.1);
            $pdf->SetXY(25,40);
            $pdf->MultiCell(80,5,utf8_decode('ECM/CONEXAS :   SERVICIOS 
            PETROLEROS Y CONTRUCCIONES SEPCON S.A.C'),1,'C',false);
            $pdf->SetXY(105,40);
            $pdf->MultiCell(80,10,utf8_decode('Fecha de ingreso : ' .$fecha_contrato),1,'C',false);


             $pdf->SetXY(25,50);
            $pdf->Cell(80,5,'Unidad de produccion : UNIDAD MINERA CONSTANCIA',1,0,'C');
            $pdf->Cell(80,5,utf8_decode('Código del empleado:'.$id_trabajador),1,0,'C');


           $pdf->SetXY(25,55);
            $pdf->Cell(80,5,'Distrito : Chilloroya',1,0,'C');
            $pdf->Cell(80,5,'Ocupacion : ' . utf8_decode($cargo_trabajador),1,0,'C');

            $pdf->SetXY(25,60);
            $pdf->Cell(80,10,'Provincia : Chumbivilcas ',1,0,'C');
            $pdf->MultiCell(80,5,utf8_decode('Area de Trabajo:  Proyectos / 20PP03 
             Linea de Descarga de Relaves Este - TMF'),1,'C',false);

            $pdf->SetXY(25,70);
            $pdf->MultiCell(160,5,utf8_decode('
            1. Bienvenida y explicación del propósito de la orientación.
            2. Reconocimiento guiado a las áreas donde los trabajadores desempeñarán su trabajo.
            3. Explicación de las Estadísticas de Seguridad del departamento o sección.
            4. Incidentes, Incidentes Peligrosos, Accidentes de Trabajo y Enfermedades ocupacionales del área.
            5. Explicación de los peligros y riesgos existentes en el área a los trabajadores.
            6. Capacitación sobre los estándares que corresponden al área, con la evaluación correspondiente.
            7. Capacitación sobre los PETS que corresponden al área, con la evaluación correspondiente.
            8. Capacitación teórico-práctico sobre las actividades de alto riesgo que se realizan en el área.
            9. Capacitación en el control de los materiales peligrosos que se utilizan en el área.
            10. Capacitación sobre los agentes físicos, químicos, biológicos presentes en el área.
            11. Identificación y prevención ergonómica.
            12. Código de colores y señalización en el área.
            13. Uso de Equipo de Protección Personal (EPP) apropiado para el tipo de tarea asignada, con explicación de los estándares de uso.
            14. Uso del teléfono del área de trabajo y otras formas de comunicación con radio portatil o estacionario;  quienes,
                 cómo y cuándo se deben utilizar. 
            15. Capacitación en los protocolos de respuesta a emergencia, establecidos para el área donde se desempeñarán los trabajadores. 
            16. Práctica de ubicación (recorrido en campo) y uso de refugios mineros, equipos de respuesta a emergencias, sistema contra 
                incendio, sistemas de alarma,comunicación, extintores, botiquines, camillas, duchas, lava ojos y otros  dispositivos
                utilizados para casos de respuesta a emergencias.
            17. Cómo reportar Incidentes /Accidentes de personas, maquinarias o daños de la propiedad de la empresa.Enseñar a diferenciar 
                quién debe actuar en la reparación o retiro.
            18. Importancia del Orden y la limpieza en la zona de trabajo.
            19. Seguimiento, verificación y evaluación del desempeño del trabajador hasta que sea capaz de realizar la tarea asignada.
            '),1,'L',false);


            $pdf->SetXY(170,200);
            $pdf->Cell(20,6,utf8_decode($fecha_documento),0,0,'L');
         
            $pdf->SetXY(165,205);
            $pdf->Cell(20,6,utf8_decode('Fecha de emisión'),0,0,'C');

        
            
            $pdf->Image($url_firma,35,200,40,40);
            $pdf->Line(35,240,80,240);
            $pdf->SetXY(40,240);
            $pdf->Cell(50,6,utf8_decode( 'DNI:'.$dni_trabajador ));
            $pdf->SetXY(40,243);
            $pdf->Cell(50,6,utf8_decode( $nombre_trabajador ));
            $pdf->SetXY(40,245);
            $pdf->Cell(50,6,utf8_decode( "Fecha:".$fecha_firma_trabajador));
            $pdf->SetXY(40,248);
            $pdf->Cell(50,6,utf8_decode( "Firma del trabajador"));



            $name_super= preg_replace('/\s+/', '-', $nombre_supervisor);

            // Signature
            $pdf->Image("firmas/".$name_super.".png",125,200,40,40);
            $pdf->Line(120,240,170,240);
            $pdf->SetXY(135,240);
            $pdf->Cell(50,6,utf8_decode( 'DNI:'.$dni_supervisor ));
            $pdf->SetXY(135,243);
            $pdf->Cell(50,6,utf8_decode( $nombre_supervisor ));
            $pdf->SetXY(135,245);
            $pdf->Cell(50,6,utf8_decode( "Fecha:".date('Y-m-d H:i:s'.substr((string)microtime(), 1, 4))));
            $pdf->SetXY(135,248);
            $pdf->Cell(50,6,utf8_decode( "Firma del Supervisor"));
    
          
            $nombre_trabajador= preg_replace('/\s+/', '-', $nombre_trabajador);

            $filename = $nombre_trabajador."-".$namefile.".pdf";
            
            $dir = "public/carta/";
            if (file_exists($dir.$filename))
                unlink($dir.$filename);
            
            $pdf->Output($dir.$filename,'F');

            

            $filename="http://127.0.0.1/anexo5/anexo5_supervisors/public/carta/".$filename;


            return $filename;
        }
    }
?>