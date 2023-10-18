
/**
 * Lee elementos que corresponden al ejercicio en el que se está actualmente y los remarca en el navegador
 * 
 */
function actualizarCurrent(seccionActual) {

    seccionActual.classList.add("botonActual");
}

/*/=======================================================================================\*\
||                                    Actualizar Página                                    ||
\*\=======================================================================================/*/

/**
 * Esta función actualiza la página principal
 */
function actualizarPagina (sesion){

    if (sesion == true){

        var sesionValida = false;
        sesionValida = validarSesion();

        if (sesionValida){
            window.location.href = "home.php";
        }
    }
}