<?php
require_once "../Librerias/tcpdf/tcpdf.php";
require_once "../../Control/MyPdf.php";




//$page_format = array ('MediaBox'=>array('llx'=>0, 'lly'=>0, 'urx'=>21, 'ury'=>29.7));
$pdf= new TCPDF('P','mm','A4',true,'UTF-8',false);
$pdf->setPrintHeader();
$pdf->setPrintFooter(false);
$pdf->setMargins(10,50,0,false);
$pdf->setAutoPageBreak(true,0);
$pdf->setFont('Aefurat','',15);
//$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);//setea los margenes de la hoja
$pdf->SetHeaderMargin(30);//seta los margenes del Header
// set default header data
$image_file = 'C:\xampp\htdocs\PWD\Demo-TCPDF\Vista\foto\photo_2019-07-01_08-35-35.jpg';

//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->AddPage();
$pdf->Image($image_file, 10, 10, 40,40, '', '', '', false, 300, '', false, false, 0);
$texto= 'Test para ver si escribe';
$html=<<<EOD
$texto <br>
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
/* $pdf->StartTransform();
$pdf->Text(30,20,$html,0,false,true,1,0,'C',false,'',0,false,'T','T',false);
$pdf->StopTransform(); */
//$pdf->Write(10,$html,'',false,'',false,0,false,false,0,0);

$pdf->writeHTML($html,true,0,false,0);
$pdf->lastPage();
//ob_start();
$pdf->Output();
//ob_end_flush();
?>