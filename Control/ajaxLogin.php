<?php
if (isset ($_POST)){

  $email = $_POST["direccionMail"];
  $contrasenia = $_POST["contrasenia"];
  $captcha = sha1($_POST["captcha"]);
  $cookieCapcha = $_COOKIE["captcha"];

  /*if (!preg_match($validaEmail, $email)){
    $respuesta = array("validacion" => "Error al validar en servidor");
  }*/
  /*else if (!preg_match( $validaContra, $contrasenia)){
    $respuesta = array("validacion" => "Error al validar en servidor");
  }*/

  if ($captcha != $cookieCapcha ){
    $respuesta = array("validacion" => "captcha", "error" => "Captcha incorrecto");
  }
  else{
    /*Destruir el captcha*/
    setcookie("captcha",'', time()-3600);

    $respuesta = array("validacion" => "exito");
  }

  echo json_encode($respuesta);

}
?>
