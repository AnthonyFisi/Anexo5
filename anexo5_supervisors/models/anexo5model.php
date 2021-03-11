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

        public function updateDocumento($url_supervisor,$id_documento,$id_estado){


            try{
                $query = $this->db->connectanexo5()->prepare(' UPDATE documento SET 
                                                                                URL_FIRMA_SUPERVISOR =:url_firma_supervisor ,
                                                                                ID_ESTADO =:id_estado
                                                                                 WHERE ID =:id ');
                
                $query->execute(['url_firma_supervisor'=>$url_supervisor,
                                'id_estado' =>$id_estado,
                                'id' =>$id_documento]);


                return true;

            }catch(PDOException $e){
               echo $e->getMessage();
               return false;
            }
        }

        function createPdfHere($nombre){
            require('WriteTag.php');
    
            $arraySede = ['','Sede Lima','Sede Pucallpa','WHCP21 - CASHIRIARI WELLHEAD COMPRESSION','SERVICIO DE CONSTRUCCION PROYECTO 20PP03','Sede Arequipa'];
    
            $pdf=new PDF_WriteTag('P','mm',array(210,280));
            $pdf->SetMargins(25,10,20);
            $pdf->SetFont('courier','',12);
            $pdf->AddPage();
    
        
            // Feuille de style
            $pdf->SetStyle("p","Arial","N",10,"0,0,0",15);
            $pdf->SetStyle("vb","Arial","B",0,"0,0,0");
    
            $pdf->Ln(5);
           
           // $txt=utf8_decode('<p>Yo, <vb>'.$nombre.'</vb> declaro haber asistido en fecha <vb>'.$nombre.'</vb> a la CHARLA DE INDUCCIÓN DE SEGURIDAD,SALUD Y MEDIO AMBIENTE dirigida por <vb>'.$no.'</vb> , en el Proyecto / Sede <vb>'.$arraySede[(int)$sede].'</vb>. Uno de los temas tratados fue la difusión del procedimiento de "PREVENCION DE  ACCIDENTES". Declaro que la explicación fue clara en su contenido, el cual comprendo y me obligo a cumplir. Entiendo y acepto que el incumplimiento de las instrucciones recibidas durante la charla, así como la contravención de las normas contenidas en el documento PSPC-110-X-PR-021, supondrá una FALTA GRAVE, por lo que me someto a las sanciones que establezca la empresa en caso se produzca dicho incumplimiento o contravención.</p>');
    
            $pdf->SetFillColor(229, 229, 229);//Fondo gris de celdas
            $pdf->Image('../img/logosp.png',25,18,20);
            $pdf->Cell(20,20,'',1,0,'C');
            $pdf->Cell(100,20,'CARTA DE COMPROMISO',1,0,'C');
            $pdf->SetFont('Helvetica','',7);
            $pdf->MultiCell(35,5,utf8_decode('PSPC-610-X-PR-005-FR-001
            Revisión: 2
            Emisión: 07/10/2019
            Página: 1 de 01'),1,'L',false);
    
            //$pdf->SetLineWidth(0.1);
            $pdf->SetFillColor(0,0,0);
            $pdf->SetDrawColor(0,0,0);
            $pdf->setY(40);
            $pdf->WriteTag(0,10,$nombre,0,"J",0,7);
    
            $pdf->Ln(5);
    
            $pdf->Line(70,144,150,144);
            $pdf->Line(70,150,150,150);
            $pdf->Line(70,156,150,156);
    
            $pdf->SetXY(40,138);
            $pdf->Cell(30,6,'Nombre :',0,0,'L');
            $pdf->Cell(20,6,utf8_decode($nombre),0,1,'L');
            $pdf->SetXY(40,145);
            $pdf->Cell(30,6,utf8_decode('D.N.I. / C.E. Nº :'),0,0,'L');
            $pdf->Cell(20,6,utf8_decode($nombre),0,0,'L');
            $pdf->SetXY(40,151);
            $pdf->Cell(30,6,'Cargo :',0,0,'L');
            $pdf->Cell(20,6,utf8_decode($nombre),0,0,'L');
    
            // Signature
            $pdf->SetXY(40,230);
            $pdf->Image("../firmas/".$nombre.".png",12,180,100);
            $pdf->Cell(50,6,utf8_decode("FIRMA DEL TRABAJADOR"));
    
            $pdf->SetXY(140,225);
            $pdf->Cell(20,6,utf8_decode($nombre),0,0,'L');
            $pdf->SetXY(130,230);
            $pdf->Cell(40,6,'Fecha',0,0,'C');
                    
            $pdf->SetXY(12,240);
            $pdf->SetFillColor(229, 229, 229);//Fondo gris de celdas
            $pdf->MultiCell(185,5,utf8_decode('NOTA: Ningún trabajador podrá empezar sus labores en el proyecto, sin haber recibido su CHARLA DE INDUCCION INICIAL y firmado esta Carta de Compromiso. El presente documento se incluirá dentro del file personal del trabajador.'),1,'J',true);
            
            $filename = $nombre.".pdf";
            
            $dir = "C:/xampp/htdocs/anexo5_supervisors/public/carta/";
            if (file_exists($dir.$filename))
                unlink($dir.$filename);
            
            $pdf->Output($dir.$filename,'F');
        }
    }
?>