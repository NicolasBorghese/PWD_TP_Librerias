<?php
include_once("../../configuracion.php");

$datos = data_submitted();
$usuario = $datos['usuario'];
$contrasenia = $datos['contrasenia'];

session_start();
$_SESSION['usuario'] = $usuario;




?>