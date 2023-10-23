<?php

// Define que la imagen va a hacer PNG
header ("Content-type: image/png");

// usos de funciones de GD 
$imagen = imagecreate(1500, 1200);

$colorFondo = imagecolorallocate ($imagen, 255, 255, 255);

// Asignar colores
$rosa = imagecolorallocate($imagen, 255, 105, 180);
$negro = imagecolorallocate($imagen, 0, 0, 0);
$verde = imagecolorallocate($imagen, 132, 135, 28);


// Dibujar tres rectángulos, cada uno con su color
imagerectangle($imagen, 200, 30, random_int(100,700), random_int(200,1000), $rosa);
imagerectangle($imagen, 10, 60, random_int(300,900), random_int(200,800), $negro);
imagerectangle($imagen, 90, 120, random_int(200,1000), random_int(100,800), $verde);


imagepng ($imagen);

?>