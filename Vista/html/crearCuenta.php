<?php

$tituloPagina = "Crear cuenta";
$seccionActual = "CrearCuenta";

include_once("../../configuracion.php");
include_once('../estructura/encabezado.php');

?>
<div class="fondoPagina colorGradiente">
  <div class="contenedor-formulario d-flex justify-content-center">
    <div class="container">

      <form name="formCuenta" id="formCuenta" method="POST">
        <div class="bg-light">
          <h5 class="bi bi-box-arrow-in-down-left bg-gray text-blue p-2">Crear cuenta</h5>
        </div>
        <div class="contenedor-dato">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="direccionMail" name="direccionMail" placeholder="name@example.com">
        </div>
        <div class="contenedor-dato">
          <label for="contrasenia" class="form-label">Contraseña</label>
          <input type="password" class="form-control" id="contrasenia" name="contrasenia">
        </div>
        <div class="contenedor-dato">
          <label for="contrasenia" class="form-label">Repita Contraseña</label>
          <input type="password" class="form-control" id="contrasenia2" name="contrasenia2">
        </div>
        <div class="contenedor-dato">
          <label for="captcha" class="form-label">Captcha</label>
          <input type="text" class="form-control" id="captcha" name="captcha">
        </div>
        <div id="respuesta"></div>
        <div class="mb-3">
          <img src="../../Control/captchaSimple.php" id="imgcaptcha" alt="Imagen de captcha">
          <button type="button" id="actualizarCaptcha" name="actualizarCaptcha" class="btn btn-secondary">Actualizar</button>
        </div>
        <div class="d-grid mb-3 gap-2">
          <button type="button" name="btn" id="btn" class="btn text-white bg-info">Registrarse</button>
        </div>

        <div class="d-grid gap-2 col-6 mx-auto">
          <a class="btn  btn-outline-info" href="../../index.php">Inicio</a>
        </div>

      </form>
    </div>
  </div>
</div>


<script>
  $(function() {

    $("#btn").on("click", function() {
      var formData = $("#formCuenta").serialize();
      var ruta = "../../Control/ajaxCrearCuenta.php";
      $.ajax({
        url: ruta,
        type: "POST",
        data: formData,

        success: function(datos) {
          $("#respuesta").html(datos);
        }
      });
    });

    $("#actualizarCaptcha").on("click", function() {
      $("#imgcaptcha").attr("src", "../../Control/captchaSimple.php?r=" + Math.random());
    });

  });
</script>

<?php
include_once('../estructura/pie.php');
?>