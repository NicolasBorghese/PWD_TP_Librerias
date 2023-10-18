<?php

$tituloPagina = "Login Agenda Personal";
$seccionActual = "login";

include_once('../estructura/encabezado.php');
include_once("../../configuracion.php");

?>

<div class="container">
    <div class="">
        <div class="col-md-5 offset-md-3">
            <div class="card mt-5 mb-5 shadow-lg">
                <div class="card-header text-center">
                    <h2 class="card-title">Inicio de sesión</h2>
                </div>
                <div class="card-body">
                    <form action="validacionLogin.php" method="post" id="formulario" name="formulario" class="needs-validation row g-3" novalidate>
                        <div class="col-md-12">
                            <label for="usuario" class="form-label-lg">Dirección de Mail</label>
                            <input type="text" class="form-control" id="usuario" required>
                        </div>
                        
                        <div class="col-md-12">
                            <label for="contrasenia" class="form-label-lg">Contraseña</label>
                            <input type="text" class="form-control" id="contrasenia" required>
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-primary" type="submit">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../estructura/js/validacionLogin.js"></script>