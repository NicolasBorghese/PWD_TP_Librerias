$(document).ready(function () {
    // Agregar reglas de validación a los campos del formulario
    $("#formularioLogin").validate({
        rules: {
            direccionMail: {
                required: true
            },
            contrasenia: {
                required: true
            },
            captcha: {
                required: true,
                minlength: 4
            }
        },
        messages: {
            direccionMail: {
                required: "Ingrese su usuario (dirección de mail)"
            },
            contrasenia: {
                required: "Ingrese su contraseña"
            },
            captcha: {
                required: "Debe completar el captcha"
            }
        },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".contenedor-dato").append(error);
            },
            highlight: function (element) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });

    $("#actualizarCaptcha").on("click", function() {
        $("#imgcaptcha").attr("src", "../../Control/captcha.php?r=" + Math.random());
    });

    $("#formularioLogin").submit(function(event) {

        preventDefault(event);

        var formData = $("#formularioLogin").serialize();
        var ruta = "../../Control/ajaxLogin.php";
        $.ajax({
          url: ruta,
          type: "POST",
          data: formData,
  
          success: function(respuesta) {
            if (respuesta.validacion == "exito"){

                window.location.href = "../html/home.php";

            }
          }
        });
      });
});