<?php
session_start();

$tituloPagina = "Login Agenda Personal";
$seccionActual = "login";

include_once("../../configuracion.php");
include_once('../estructura/encabezado.php');
?>

<?php
    $nombrePersona = $_SESSION['direccionMail'];
    $apellidoPersona = $_SESSION['apellidoPersona'];
    echo $nombrePersona." ".$apellidoPersona;
?>

<?php
  include_once('../estructura/pie.php');
?>