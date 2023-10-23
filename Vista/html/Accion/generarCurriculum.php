<?php
require_once('../Librerias/tcpdf/tcpdf.php');
include_once "../../Utiles/funciones.php";
include_once "../../Control/Imagen.php";

if ($_FILES['imagen']["error"] <= 0) {

    //Encapsulo datos del formulario
    $datos = data_submitted();
    $verImagen = new Imagen(); //funcion que verifica el formato de la imagen

    $nombre = $datos['nombre'];
    $apellido = $datos['apellido'];
    $edad = $datos['edad'];
    $correo = $datos['correo'];
    $sobreMi = $datos['sobreMi'];
    $educacion = $datos['estudios'];
    $experiencia = $datos['exp'];
    $imagen = $_FILES['imagen']; //Recibe la imagen
    $nombreImagen = $_FILES['imagen']['name'];
    $esFormato = $verImagen->analizarArchivo($nombreImagen);
    if ($esFormato) {
        $directorio = "../foto/"; //Ubicación donde se guarda la imagen de manera local
        $nombreImagen = uniqid() . "_" . $imagen['name']; //Le da un único id a la imagen
        $ruta = $directorio . $nombreImagen; //Ruta del directorio
        move_uploaded_file($imagen['tmp_name'], $ruta); //Lo guarda en el directorio

        //Creo un nuevo objeto tcpdf
        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', true);
        $pdf->setPrintHeader(false); //Deshabilita el header
        $pdf->setPrintFooter(false); //Deshabilita el footer

        //Se crea una pagina
        $pdf->AddPage();

        //Setear la fuente en general
        $pdf->SetFont('helvetica', '', 18);

        //Genero código html como string dentro de la variable $html
        $html = '
        <h2>CURRÍCULUM VITAE</h2>
        <div class="contenedor-general">
        <div class="bloque-dato">
        <h4>DATOS PERSONALES</h4>
        Nombre y apellido: ' . $nombre . ' ' . $apellido . '<br>Edad: ' . $edad . '<br>Correo electrónico: ' . $correo . '
        </div>
        <div class="bloque-dato border">
        <h4>SOBRE MÍ</h4>' .
            $sobreMi . '
        </div>
        <div class="bloque-dato border">
        <h4>NIVEL DE ESTUDIOS</h4>' .
            $educacion . '
        </div>
        <div class="bloque-dato border">
        <h4>EXPERIENCIA LABORAL</h4> ' .
            $experiencia . '
        </div>
        </div>';

        //Agrega hojas de estilo al pdf
        $html .= '<style>' . file_get_contents('../estructura/css/estilos.css') . '</style>';

        //Mandamos el formato realizado arriba para que sea escrito dentro del pdf
        $pdf->writeHTML($html);

        //Coloca una imagen en el pdf. Este coloca una foto en el curriculum
        $pdf->Image($ruta, 158, 32.8, 35, 45, '', '', '', false, 300, '', false, false, 0);

        //Manda el documento a un destino dado
        $pdf->Output($nombre . '_CV.pdf', 'I');
    } else {
        echo "Formato de imagen inválido";
    }
} else {
    echo "No se ha podido generar el Currículum.";
}
