<?php

// Define que la imagen va a hacer PNG
header ("Content-type: image/png");

// usos de funciones de GD

/* Indicar anchura y altura de la imagen a crear  */

$imagen = imagecreate(100, 70);
$font= "../Utiles/fuentes/Ransom.ttf";

/*Definir el color de fondo de la imagen */
/*$colorFondo = imagecolorallocate ($imagen, 0, 0, 0); color negro*/
$colorFondo = imagecolorallocate ($imagen, 0, 0, 0);
/*Definir el color del texto*/ 
$colorTexto = imagecolorallocate ($imagen, random_int(50,255),random_int(50,100),random_int(70,245) );

/*Generar un codigo aleatorio para que aparesca en la imagen creando la siguiente funcion*/ 
function generaCaptcha ($caracters, $length){
    $captcha = null;
    for ($x = 0; $x < $length; $x++ ){
        $rand = rand(0, count($caracters)-1);
        $captcha .= $caracters[$rand];
    }
    return $captcha;
}

/*Se crea el captcha utilizando la funcion, definir el arreglo y la cantidad de cara caracter*/ 
$captcha =  generaCaptcha (array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, "H", "m", "F", "q","r", "A", "u","b"), 4);

/*crear la cooki para almacenar el codigo captcha y enciptar con la funcion sha1() y endicarle un tiempo*/

 setcookie ('captcha', sha1($captcha), time()+60*1);
 /*ingresar el texto de la imagen */ 
 //imagestring($imagen, 5, 30, 25, $captcha, $colorTexto);
 imagettftext($imagen, 30,0,random_int(10,15),random_int(30,60), $colorTexto, $font, $captcha );
 /*Imprimir la imagen*/ 
 imagepng ($imagen);

 ?>
