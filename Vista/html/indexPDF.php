<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Librerias/bootstrap-5.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estructura/css/styles.css">
    <script type="text/javascript" src="Librerias/bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <title>Generador Currículum</title>
</head>

<body>
    <div class="contenedor-formulario">
        <div class="container">
            <div class="bg-light">
                <h5 class="bi bi-box-arrow-in-down-left bg-gray text-blue p-2">Generador de currículum</h5>
            </div>
            <div class="container-fluid">

                <form class="row mt-3 g-3 needs-validation" method="POST" action="Accion/generarCurriculum.php" novalidate enctype="multipart/form-data">

                    <!-- INPUTS ALFANUMÉRICOS -->
                    <div class="contenedor-dato">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" pattern="[a-zA-Z]+" required>
                        <div class="invalid-feedback">
                            Complete el campo correctamente.
                        </div>
                    </div>
                    <div class="contenedor-dato">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" pattern="[a-zA-Z]+" required>
                        <div class="invalid-feedback">
                            Complete el campo correctamente.
                        </div>
                    </div>
                    <div class="contenedor-dato">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" class="form-control" name="edad" id="edad" pattern="^\d{1,3}$" required>
                        <div class="invalid-feedback">
                            Ingrese una edad válida.
                        </div>
                    </div>
                    <div class="contenedor-dato">
                        <label for="correo" class="form-label">Correo electrónico</label>
                        <input type="text" class="form-control" name="correo" id="correo" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z]+\.[a-zA-Z\.]+$" placeholder="example@example.com" required>
                        <div class="invalid-feedback">
                            Ingrese un correo válido.
                        </div>
                    </div>
                    <div class="contenedor-dato">
                        <label for="sobreMi" class="form-label">Sobre mí</label>
                        <textarea class="form-control" name="sobreMi" id="sobreMi" placeholder="Aparte de estudiar/trabajar también hago..." maxlength=400 required></textarea>
                        <div class="invalid-feedback">
                            Campo obligatorio.
                        </div>
                    </div>
                    <div class="contenedor-dato">
                        <label for="formFile" class="form-label">Cargar una imagen (formato jpg o png) <span class="opcional">*Obligatorio</span></label>
                        <input class="form-control" type="file" name="imagen" id="imagen" required>
                    </div>

                    <!-- RADIO BUTTONS -->
                    <div class="contenedor-dato">
                        <label for="educacion" class="form-label">Nivel de estudios</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="estudios" id="estudios" value="Sin estudios" required>
                            <label class="form-check-label" for="educacion">Sin estudios</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="estudios" id="estudios" value="Estudios primarios" required>
                            <label class="form-check-label" for="educacion">Estudios primarios</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="estudios" id="estudios" value="Estudios secundarios" required>
                            <label class="form-check-label" for="educacion">Estudios secundarios</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="estudios" id="estudios" value="Estudios terciarios/universitarios" required>
                            <label class="form-check-label" for="educacion">Estudios terciarios/universitarios</label>
                        </div>
                    </div>

                    <!-- EXP LABORAL -->
                    <div class="contenedor-dato">
                        <label for="exp" class="form-label">Experiencia laboral</label>
                        <textarea class="form-control" name="exp" id="exp" placeholder="He trabajado en..." maxlength=400 required></textarea>
                        <div class="invalid-feedback">
                            Campo obligatorio.
                        </div>
                    </div>

                    <!-- BOTÓN DE ENVIAR -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-primary me-md-2 boton" type="submit">Crear</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        //Desactivo envío de formularios con campos inválidos.
        (function() {
            'use strict'

            //Selecciono los formularios que requieren validación
            var forms = document.querySelectorAll('.needs-validation')

            //Los recorro y evito que se manden
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })();
    </script>

</body>

</html>