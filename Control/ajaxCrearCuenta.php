<?php
if (isset ($_POST)){

  $email =$_POST["direccionMail"];
  $contrasenia =$_POST["contrasenia"];
  $contrasenia2 =$_POST["contrasenia2"];
  $captcha = sha1($_POST["captcha"]);
  $cookieCapcha = $_COOKIE["captcha"];
  $validaEmail= "/^(([^<>()\[\]\.,;:\s@\”]+(\.[^<>()\[\]\.,;: \s@\”]+)*)|(\”.+\”))@(([^<>()[\]\.,;:\s@\”]+\.)+[^ <>()[\]\.,;:\s@\”]{2,})$/";
  $validaContra= "/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/";

  if (!preg_match($validaEmail, $email)){
    echo "<p style='color: red'>Ingrese un email correcto</p>";
  }
  else if (!preg_match($validaContra, $contrasenia)){
    echo "<p style='color: red'>  La contraseña debe tener al entre 8 y 16 caracteres, </br>
    al menos un dígito, al menos una minúscula y al menos una mayúscula.</p>";
  }
  else if ($contrasenia != $contrasenia2){
    echo "<p style='color: red'>  Las contraseñas ingresadas deben ser iguales </p>";
  }
  else if ($captcha != $cookieCapcha ){
      echo "<p style='color: red'>Ingres un c&oacute;digo captcha correcto</p>";
  }

  else{

  echo "<p style= 'color: green'>Cuenta creada con éxito</p>"; 
  /*Destruir el captcha*/
  setcookie("captcha",'', time()-3600);
  ?>

  <script>document.getElementById("formCaptcha").reset();</script>

  <?php
    }
  }
  ?>
