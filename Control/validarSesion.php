<?php

if(!empty($_POST['btn'])) {
    if (!empty($_POST['direccionMail']) && !empty($_POST['contrasenia'])){
        //$usuario = $_POST['direccionMail'];
        //$contra = $_POST['contrasenia'];
        $objCuenta = new AbmCuentaUsuario();
        $logueoValido = $objCuenta->validarLogueo($_POST);
        if($logueoValido){
            $array = [];
            $array['direccionMail'] = $_POST['direccionMail'];
            $resultado = $objCuenta ->buscar($array);
            $_SESSION['nombrePersona'] = $resultado[0]->getNombrePersona();
            $_SESSION['apellidoApellido'] = $resultado[0]->getApellidoPersona();
            header("location: ../Vista/html/home.php");
        }
    } else {
        echo "<div class=alert alert-danger>Acceso Denegado</div>";
    }
}

?>