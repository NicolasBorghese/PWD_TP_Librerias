<?php
require_once('../Librerias/tcpdf/tcpdf.php');


if ($_FILES['imagen']["error"] <= 0) {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $date = $_POST['date'];
    $imagen = $_FILES['imagen'];
    $directorio = "../foto/";
    $nombreImagen = uniqid() . "_" . $imagen['name'];
    $ruta = $directorio . $nombreImagen;
    move_uploaded_file($imagen['tmp_name'], $ruta);



$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', true);
$pdf->setPrintHeader(false);
$pdf->SetHeaderData('',0,$name,$course);

// set header and footer fonts
$pdf->setHeaderFont(Array('helvetica', '', 20));
$pdf->SetTitle('Certificate of Completion');
// set margins
//setear los margenes de la hoja Y el Header
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);

$pdf->AddPage();


$pdf->SetFont('helvetica', '', 24);
$html=
" <h1> Certificate of Completion </h1>
<p> This certifies that </p>
<h2> $name </h2>
<p> has successfully completed the </p>
<h2> $course </h2>
<p> on $date </p>
<p> $ruta </p>";
$html .= '<style>'.file_get_contents('estilos.css').'</style>';
//$pdf->writeHTMLCell(0,0,10,10,$html,1,0,false,true,'',false);
$pdf->writeHTML($html);  
$pdf->Image($ruta,10, 10, 40,40, '', '', '', false, 300, '', false, false, 0);

$pdf->Output($name.'-'.$course.'-'.'certificate.pdf');
}else{
    echo "no se pudo subir el archivo";
}
?>