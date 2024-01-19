var i=0;


$('#terminarregistro').click(function(e) {
    e.preventDefault();
    var nombreComercial = $("#name").val();
    var nombre = $("#first-name").val();
    var apellido = $("#last-name").val();
    var giro = $("#company").val();
    var puesto = $("#city-town").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
    var passw = $("#passw").val();
    var confirmpassw = $("#confirmpassw").val();
    var nosucursales = $("#nosucursales").val();
    var ticketpromedio = $("#ticketpromedio").val();
    var nomesas = $("#nomesas").val();
    var noempleados = $("#noempleados").val();
    var montocredito = $("#montocredito").val();

    var usr_nombrereferencia = $("#usr_nombrereferencia").val();
    var usr_telefonoreferencia = $("#usr_telefonoreferencia").val();
    var usr_dirreferencia = $("#usr_dirreferencia").val();
    var usr_comreferencia = $("#usr_comreferencia").val();

    var usr_nombrereferencia2 = $("#usr_nombrereferencia2").val();
    var usr_telefonoreferencia2 = $("#usr_telefonoreferencia2").val();
    var usr_dirreferencia2 = $("#usr_dirreferencia2").val();
    var usr_comreferencia2 = $("#usr_comreferencia2").val();

    let formData = new FormData();
    formData.append("file", constancia.files[0]);

    formData.append("nombreComercial", nombreComercial);
    formData.append("nombre", nombre);
    formData.append("apellido", apellido);
    formData.append("giro", giro);
    formData.append("puesto", puesto);
    formData.append("email", email);
    formData.append("phone", phone);
    formData.append("passw", passw);
    formData.append("nosucursales", nosucursales);
    formData.append("ticketpromedio", ticketpromedio);
    formData.append("nomesas", nomesas);
    formData.append("noempleados", noempleados);
    formData.append("montocredito", montocredito);

    formData.append("usr_nombrereferencia", usr_nombrereferencia);
    formData.append("usr_telefonoreferencia", usr_telefonoreferencia);
    formData.append("usr_dirreferencia", usr_dirreferencia);
    formData.append("usr_comreferencia", usr_comreferencia);

    formData.append("usr_nombrereferencia2", usr_nombrereferencia2);
    formData.append("usr_telefonoreferencia2", usr_telefonoreferencia2);
    formData.append("usr_dirreferencia2", usr_dirreferencia2);
    formData.append("usr_comreferencia2", usr_comreferencia2);
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2500
    });
    
    if (confirmpassw == passw) {
        $.ajax({
            type: "POST",
            url: 'usuarios.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                
                console.log(response);
                var jsonData = JSON.parse(response);
                if (jsonData.status == "1") {

                    Swal.fire({
                        icon: 'success',
                        title:'Gracias por registrase con nosotros, favor de verificar tu cuenta de email. No olvides revisar en tu bandeja de SPAM o Correo no deseado'

                    });

                    window.location.href = "acceso.php";

                } else {
                    
                    Swal.fire({
                        icon: 'error',
                        title:'Error al procesar datos, favor intentar nuevamente',
                        text:response

                    });
                }
            }

        });
        const mensaje = `
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Validación de Cuenta</title>
        </head>
        <body>
            <div class="elementor-element elementor-element-37bb730 e-con-full e-flex e-con e-child" data-id="37bb730"
                data-element_type="container" data-settings="{&quot;content_width&quot;:&quot;full&quot;}">
                <div class="elementor-element elementor-element-3b3448c elementor-widget elementor-widget-heading"
                    data-id="3b3448c" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;none&quot;,&quot;_animation_delay&quot;:100}"
                    data-widget_type="heading.default">
                    <div class="elementor-widget-container">
                        <h2 class="elementor-heading-title elementor-size-default">Validación de Cuenta</h2>
                    </div>
                </div>
                <div class="elementor-element elementor-element-58b7a5a customLineProgressAnim my-3 elementor-widget-divider--view-line elementor-widget elementor-widget-divider"
                    data-id="58b7a5a" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;none&quot;,&quot;_animation_delay&quot;:300}"
                    data-widget_type="divider.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-divider">
                            <span class="elementor-divider-separator">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="elementor-element elementor-element-f73a855 elementor-widget elementor-widget-text-editor"
                    data-id="f73a855" data-element_type="widget" data-widget_type="text-editor.default">
                    <div class="elementor-widget-container">
                        <div class="elementor-element elementor-element-173733e elementor-widget elementor-widget-heading"
                            data-id="173733e" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;none&quot;,&quot;_animation_delay&quot;:100}"
                            data-widget_type="heading.default">
                            <div class="elementor-widget-container"><strong><span style="color: #000000;">¡Hola ${nombre}!</span></strong></div>
                            <div>&nbsp;</div>
                        </div>
                        <div class="elementor-element elementor-element-d70bb94 elementor-widget elementor-widget-text-editor"
                            data-id="d70bb94" data-element_type="widget" data-widget_type="text-editor.default">
                            <div class="elementor-widget-container">
                                <p><span style="color: #000000;">Queremos informarte que hemos recibido tu registro en Bebify y estamos emocionados de que hayas decidido unirte a nosotros.</span></p>
                                <p><span style="color: #000000;">Actualmente, nuestro equipo está validando la información proporcionada para asegurarnos de brindarte el mejor servicio posible. Este proceso suele llevar poco tiempo, y te notificaremos tan pronto como tu cuenta haya sido confirmada.</span></p>
                                <p><span style="color: #000000;">Agradecemos tu paciencia durante este proceso y estamos ansiosos por darte la bienvenida a Bebify. Una vez confirmada tu cuenta, podrás disfrutar de todas las ventajas y servicios que ofrecemos.</span></p>
                                <p><span style="color: #000000;">Si tienes alguna pregunta o inquietud mientras validamos, no dudes en ponerte en contacto con nuestro equipo de atención al cliente.</span></p>
                                <p><span style="color: #000000;">¡Gracias por elegir Bebify!</span></p>
                                <p><span style="color: #000000;">Saludos,</span></p>
                                <p><span style="color: #000000;">Andy de Bebify</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
        </html>
    `;
    
    // Puedes utilizar la variable htmlString en tu código JavaScript según tus necesidades.
    
        
    $.ajax({
        type: "POST",
        url: "enviarCorreo.php",
        data: {
            email: email,
            mensaje: mensaje,
            asunto:'Registro completo Bebify'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

    } else {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 2500
        });
        Swal.fire({
            icon: 'error',
            title:'Las contraseñas no coinciden',
            text:response

        });
    }


});

// Obtener referencias a los campos de contraseña
var passwField = $("#passw");
var confirmpasswField = $("#confirmpassw");

// Función para verificar la seguridad de la contraseña
function esContrasenaSegura(contrasena) {
    // La contraseña debe tener al menos 8 caracteres de longitud
    if (contrasena.length < 8) {
        return 'La contraseña debe tener al menos 8 caracteres de longitud.';
    }

    // Verificar la presencia de al menos una letra mayúscula
    if (!/[A-Z]/.test(contrasena)) {
        return 'La contraseña debe contener al menos una letra mayúscula.';
    }

    // Verificar la presencia de al menos una letra minúscula
    if (!/[a-z]/.test(contrasena)) {
        return 'La contraseña debe contener al menos una letra minúscula.';
    }

    // Verificar la presencia de al menos un número
    if (!/\d/.test(contrasena)) {
        return 'La contraseña debe contener al menos un número.';
    }

    // Verificar la presencia de al menos un carácter especial
    if (!/[!@#$%^&*(),.?":{}|<>]/.test(contrasena)) {
        return 'La contraseña debe contener al menos un carácter especial.';
    }

    // La contraseña cumple con todos los criterios de seguridad
    return null;
}

// Función para manejar eventos de entrada en el campo de contraseña
function manejarEntradaContrasena() {
    $(".elementor-message-danger").css("display", "block");
    var passw = passwField.val();
    var confirmpassw = confirmpasswField.val();

    // Verificar si las contraseñas coinciden y son seguras
    var errorSeguridad = esContrasenaSegura(passw);
    if (passw === confirmpassw && !errorSeguridad) {
        $(".elementor-message-danger").css("display", "none");

        // Las contraseñas coinciden y son seguras
        // Aquí puedes continuar con tu lógica, por ejemplo, habilitar un botón de enviar
    } else {
        // Las contraseñas no coinciden o no son seguras
        // Mostrar un mensaje de error detallado
        $(".elementor-message-danger").text(
            (passw !== confirmpassw ? 'Las contraseñas no coinciden. ' : '') +
            (errorSeguridad ? errorSeguridad : '')
        );
    }
}

// Escuchar eventos de entrada en los campos de contraseña
passwField.on("input", manejarEntradaContrasena);
confirmpasswField.on("input", manejarEntradaContrasena);
