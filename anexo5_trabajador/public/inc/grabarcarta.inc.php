<?php
    header("Content-Type: text/html;charset=utf-8");
    date_default_timezone_set('Etc/UTC');

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once("connect.inc.php");

    $respuestaOK = false;
    $mensajeError = "";
    $contenidoOK = "";

    if (!$errorDbConexion) {
        if (isset($_POST) && !empty($_POST)) {
            $id = uniqid("hr");

            $nombre = $_POST['nombre'];
            $fecha = $_POST['fecha'];
            $dirigido = $_POST['dirigido'];
            $sede = $_POST['sede'];
            $nombre_firma = $_POST['nombre_firma'];
            $nrodoc = $_POST['nrodoc'];
            $cargo = $_POST['cargo'];
            $fecha_firma = $_POST['fecha_firma'];
            $archivo = $_POST['archivo']; 

            $insert = "INSERT INTO cartacompromiso SET iddoc=?,nombre=?,fecha=?,dirigido=?,sede=?,
                                                        nombre_firma=?,documento=?,cargo=?,firma=?,fecha_firma=?";

            $stament = $pdo->prepare($insert);
            $stament -> execute(array($id,$nombre,$fecha,$dirigido,$sede,$nombre_firma,$nrodoc,$cargo,$archivo,$fecha_firma));

            $rowaffect = $stament->rowCount($insert);
            $errorinfo = $stament->errorInfo();

            if ($rowaffect > 0) {
				$respuestaOK = true;
                $contenidoOk = "Documento registrado";

                createPdf($nombre,$fecha,$dirigido,$sede,$nombre_firma,$nrodoc,$cargo,$archivo,$fecha_firma);

                if (file_exists("../cartas/".$nombre.".pdf")){
                    //sendMail($nombre);
                }else{
                    echo "No se encontro el archivo";
                }
    		}
			else {
                $contenidoOk = "error en registro";
                var_dump($errorinfo);
            }
        }
    }

    function createPdf($nombre,$fecha,$dirigido,$sede,$nombre_firma,$nrodoc,$cargo,$archivo,$fecha_firma){
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
        $txt=utf8_decode('<p>Yo, <vb>'.$nombre.'</vb> declaro haber asistido en fecha <vb>'.$fecha.'</vb> a la CHARLA DE INDUCCIÓN DE SEGURIDAD,SALUD Y MEDIO AMBIENTE dirigida por <vb>'.$dirigido.'</vb> , en el Proyecto / Sede <vb>'.$arraySede[(int)$sede].'</vb>. Uno de los temas tratados fue la difusión del procedimiento de "PREVENCION DE  ACCIDENTES". Declaro que la explicación fue clara en su contenido, el cual comprendo y me obligo a cumplir. Entiendo y acepto que el incumplimiento de las instrucciones recibidas durante la charla, así como la contravención de las normas contenidas en el documento PSPC-110-X-PR-021, supondrá una FALTA GRAVE, por lo que me someto a las sanciones que establezca la empresa en caso se produzca dicho incumplimiento o contravención.</p>');

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
        $pdf->WriteTag(0,10,$txt,0,"J",0,7);

        $pdf->Ln(5);

        $pdf->Line(70,144,150,144);
        $pdf->Line(70,150,150,150);
        $pdf->Line(70,156,150,156);

        $pdf->SetXY(40,138);
        $pdf->Cell(30,6,'Nombre :',0,0,'L');
        $pdf->Cell(20,6,utf8_decode($nombre),0,1,'L');
        $pdf->SetXY(40,145);
        $pdf->Cell(30,6,utf8_decode('D.N.I. / C.E. Nº :'),0,0,'L');
        $pdf->Cell(20,6,utf8_decode($nrodoc),0,0,'L');
        $pdf->SetXY(40,151);
        $pdf->Cell(30,6,'Cargo :',0,0,'L');
        $pdf->Cell(20,6,utf8_decode($cargo),0,0,'L');

        // Signature
        $pdf->SetXY(40,230);
        $pdf->Image("../firmas/".$archivo.".png",12,180,100);
        $pdf->Cell(50,6,utf8_decode("FIRMA DEL TRABAJADOR"));

        $pdf->SetXY(140,225);
        $pdf->Cell(20,6,utf8_decode($fecha_firma),0,0,'L');
        $pdf->SetXY(130,230);
        $pdf->Cell(40,6,'Fecha',0,0,'C');
                
        $pdf->SetXY(12,240);
        $pdf->SetFillColor(229, 229, 229);//Fondo gris de celdas
        $pdf->MultiCell(185,5,utf8_decode('NOTA: Ningún trabajador podrá empezar sus labores en el proyecto, sin haber recibido su CHARLA DE INDUCCION INICIAL y firmado esta Carta de Compromiso. El presente documento se incluirá dentro del file personal del trabajador.'),1,'J',true);
        
        $filename = $nombre.".pdf";
        $dir = "../cartas/";
        
        if (file_exists($dir.$filename))
            unlink($dir.$filename);
        
        $pdf->Output($dir.$filename,'F');
    }

    function sendMail($nombre){
      /*  require_once "../PHPMailer/PHPMailerAutoload.php";

        $destino = "hminaya@sepcon.net";
        $origen = "notificaciones_rrhh@sepcon.net";

        $remitente = "notificaciones_rrhh@sepcon.net";

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'mail.sepcon.net';
        $mail->Port = 587;
        $mail->SMTPOptions = array (
            'ssl' => array(
                'verify_peer'  => true,
                'verify_depth' => 3,
                'allow_self_signed' => true,
                'peer_name' => 'mail.sepcon.net',
            )
        );
        $mail->SMTPAuth = true;
        $mail->Username = "documentos_sistema@sepcon.net";
        $mail->Password = "c9Hz8Nz4Zj5Or7Q";
        $mail->setFrom($origen,$remitente);
        $mail->addAddress($destino,$destino);
        //$mail->addCC('rchavez@sepcon.net', 'Carta de Compromiso');
        //$mail->addCC('smonteza@sepcon.net', 'Carta de Compromiso');
        $mail->addCC('lcatacora@sepcon.net', 'Carta de Compromiso');
        $mail->addCC('llujan@sepcon.net', 'Hoja de Recorrido');
        $mail->addCC('zlopez@sepcon.net', 'Hoja de Recorrido');
        $mail->addCC('rrhh_malvinas@sepcon.net', 'Hoja de Recorrido');

        $adjunto = "../cartas/".$nombre.".pdf";

        if ( file_exists($adjunto) ) {
            $mail->AddAttachment($adjunto);
            echo $adjunto;	
		}else {
            echo "no se encontro el adjunto";
        }

        $mail->Subject = 'Carta de Compromiso';
        $message  = "<html><body>";
        $message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
        $message .= "<tr><td>";
        $message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
        $message .= "<thead>
            <tr height='80'>
            <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:blue; font-size:34px;' >Carta de Compromiso</th>
            </tr></thead>";
        $message .= "<tbody><tr>
                <td colspan='4' style='padding:15px;'>
                    <p style='font-size:20px;'>Estimados:</p>
                    <hr />
                    <p style='font-size:25px;'>Se hace llegar la carta de compromiso, debidamente llenada y firmada por el trabajador.</p>
                    <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif; text-align: left; '>Departamento de RRHH</p>
                </td>
                </tr></tbody>";
        $message .= "</table>";
        $message .= "</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";

        $mail->msgHTML(utf8_decode($message));
        $mail->SMTPDebug = 0;

        if($mail->send()){
            $salidajson = array("respuesta"=>true);
            echo "correo enviado";
        }else{
            $salidajson = array("respuesta"=>false);
            echo "correo no enviado";
        }
        echo json_encode($salidajson);
        $mail->ClearAddresses();*/
    }
?>