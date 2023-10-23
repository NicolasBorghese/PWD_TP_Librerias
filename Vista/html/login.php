<?php

$tituloPagina = "Login Agenda Personal";
$seccionActual = "login";

include_once("../../configuracion.php");
include_once('../estructura/encabezado.php');
?>

<div class="fondoPagina colorGradiente">
  <div class="contenedor-formulario d-flex justify-content-center">
    <div class="container">

      <form name="formularioLogin" id="formularioLogin" method="POST" class="needs-validation" novalidate>
        
        <div class="bg-light">
          <h5 class="bi bi-box-arrow-in-down-left bg-gray text-blue p-2">Ingrese a su cuenta</h5>
        </div>

        <div class="contenedor-dato">
          <label for="direccionMail" class="form-label">Usuario</label>
          <input type="text" class="form-control" id="direccionMail" name="direccionMail" placeholder="name@example.com">
        </div>

        <div class="contenedor-dato">
          <label for="contrasenia" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="contrasenia" name="contrasenia">
        </div>

        <div class="contenedor-dato">
          <label for="captcha" class="form-label">Captcha</label>
          <input type="text" class="form-control" id="captcha" name="captcha">
        </div>

        <div class="contenedor-dato">
          <img src="../../Control/captcha.php" id="imgcaptcha" alt="Imagen de captcha">
          <button type="button" id="actualizarCaptcha" name="actualizarCaptcha" class="btn btn-secondary">Actualizar</button>
        </div>

        <div class="d-grid mb-3 gap-2">
          <button type="submit" id="btn" class="btn btn-primary" name="btn">Login</button>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
          <a class="btn  btn-outline-info" href="../../index.php">Inicio</a>
        </div>

      </form>
    </div>
  </div>
</div>

<script src="../estructura/js/validacionLogin.js"></script>

<?php
include_once('../estructura/pie.php');
?>