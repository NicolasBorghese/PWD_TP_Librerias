$(document).ready(function () {
    // Agregar reglas de validación a los campos del formulario
    $("#formulario").validate({
        rules: {
            NroDni: {
                required: true,
                number: true,
                validDni: { validDni: true }
            }
        },
        messages: {
            NroDni: {
                required: "El documento es obligatorio.",
                number: "Solo puede ingresar numeros."
            }
        },
            errorElement: "span",
            errorPlacement: function (error, element) {
                error.addClass("invalid-feedback");
                element.closest(".col-md-4").append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass("is-valid");
            }
        });
});

jQuery.validator.addMethod("validDni", function (value, element) {
    return this.optional(element) || (/^(\d{8})$/.test(value));
}, "Debe ingresar un documento con 8 caracteres.");