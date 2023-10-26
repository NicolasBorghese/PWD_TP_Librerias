<?php

$tituloPagina = "Home Agenda Personal";
$seccionActual = "home";

include_once("../../configuracion.php");
include_once('../estructura/encabezado.php');
?>

<div class="fondoPagina colorGradiente fondoExtendido">

<div class="card">
  <ul class="nav nav-underline">
    <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="formularioCV.php">Crear CV</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="calendario.php">Calendario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="../../index.php">Salir</a>
    </li>
  </ul>
</div>


<div class="contenedor-formulario d-flex justify-content-center">
  <div class="container">
    <p>
      Bienvenido/a a su agenda personal! Aquí puede crear y modificar su CV, además de utilizar
      el calendario para una mejor organización
    </p>
  </div>
</div>

</div>

<?php
  include_once('../estructura/pie.php');
?>