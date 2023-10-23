<?php
if (isset ($_POST)){

  $captcha = sha1($_POST["captcha"]);
  $cookieCapcha = $_COOKIE["captcha"];

  if ($captcha != $cookieCapcha ){
    $respuesta = array("validacion" => "captcha", "error" => "Captcha incorrecto");
  }
  else{

    $respuesta = array("validacion" => "exito");
    
  }

  echo json_encode($respuesta);

}
?>