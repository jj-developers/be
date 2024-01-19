// ver div facturas
function versucursales() {
    var x = document.getElementById("verformsuc");
    var z = document.getElementById("btnVerSuc");
    x.style.display = "block";
    z.style.display = "none";

}

$(document).on('click', '#cerrar', function(e) {
    //alert((this).data('id'));
    e.preventDefault();

    window.location.href = 'index.php';



});





jQuery(function($) {

    $('[id^=Btn_actualizarinformacionusuario]').on('click', function(e) {

        e.preventDefault();



        var idUsuario = $("#idUsuario").val();

        var nosucursales = $("#nosucursales").val();

        var ticket = $("#ticket").val();

        var nomesas = $("#nomesas").val();

        var noempleados = $("#noempleados").val();

        var files = $("#urlpdf").val();;

        var plazopago = $("#plazopago").val();

        var price_filter = $("#credito").val();







        var nameref1 = $("#nameref1").val();

        var telref1 = $("#telref1").val();

        var dirref1 = $("#dirref1").val();

        var comment1 = $("#comment1").val();



        var nameref2 = $("#nameref2").val();

        var telref2 = $("#telref2").val();

        var dirref2 = $("#dirref2").val();

        var comment2 = $("#comment2").val();







        let ajax = {

            method: "actualizar_perfil",

            idUsuario: idUsuario,

            nosucursales: nosucursales,

            ticket: ticket,

            nomesas: nomesas,

            noempleados: noempleados,

            files: files,

            plazopago: plazopago,

            price_filter: price_filter,

            nameref1: nameref1,

            telref1: telref1,

            dirref1: dirref1,

            comment1: comment1,

            nameref2: nameref2,

            telref2: telref2,

            dirref2: dirref2,

            comment2: comment2



        }





        $.ajax({

            url: 'global/sp_registro.php',

            type: "POST",

            data: ajax,

            success: function(response, textStatus, jqXHR)

            {

                //  console.log(response);

                $respuesta = JSON.parse(response);

                // console.log(response);

                if ($respuesta['status'] == true) {



                    Swal.fire({

                        type: 'success',

                        title: 'Actualización de perfil',

                        text: 'Información actualizada correctamente',

                        confirmButtonColor: '#3085d6',

                        confirmButtonText: 'Aceptar'

                    }).then((result) => {

                        if (result.value) {

                            window.location.href = "mi-cuenta.php";

                        }

                    })



                } else if ($respuesta['status'] == false) {



                    Swal.fire({

                        type: 'info',

                        title: 'Actualización de perfil',

                        text: $respuesta['message'],

                        confirmButtonColor: '#3085d6',

                        confirmButtonText: 'Aceptar'

                    }).then((result) => {

                        if (result.value) {

                            //$("#verificar-popup").modal('show', {}, 500);

                        }

                    })



                }

            },

            error: function(request, textStatus, errorThrown) {

                return response.json()

            }

        });



    });

});



// funcion para registrar una nueva sucursal de cliente

function generarSucursal() {
    var x = document.getElementById("averformsuc");
        x.style.display = "none";
    var idCliente = $('#idCliente').val();
    var nombresucursal = $('#nombresucursal').val();
    var contactosuc = $('#contactosuc').val();
    var telefonosuc = $('#telefonosuc').val();
    var emailsuc = $('#emailsuc').val();
    var direccion = $('#direccion').val();
    var latitud = $('#latitud').val();
    var longitud = $('#longitud').val();

    /*if (idCliente == idCliente) {*/
    let formData = new FormData();
    formData.append("idCliente", idCliente);
    formData.append("nombresucursal", nombresucursal);
    formData.append("contactosuc", contactosuc);
    formData.append("telefonosuc", telefonosuc);
    formData.append("emailsuc", emailsuc);
    formData.append("direccion", direccion);
    //formData.append("municipio", municipio);
    formData.append("latitud", latitud);
    formData.append("longitud", longitud);

    $.ajax({
        type: "POST",
        url: 'class/sucursal.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            //var jsonData = JSON.parse(response);
            alert('Registro correcto');
            location.reload();
        }

    });

    /*} else {

        var Toast = Swal.mixin({

            toast: true,

            position: 'top-end',

            showConfirmButton: false,

            timer: 3000

        });

        $(document).ready(function() {

            Toast.fire({

                icon: 'error',

                title: 'No se establecio un cliente'

            })

        });

    }*/

}


// envio el form para guardar los pagos
$(document).ready(function(e) {
    $("#formpagos").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'consultas/agregarPago.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(cmb) {
                // alert(cmb);
                window.location = "mi-cuenta?sucesspago=true";
            }
        });
    });
});



$(document).ready(function() {
    $(document).on('click', '#btnEliminar', function(e) {
        //alert((this).data('id'));
        e.preventDefault();
        var idSucursal = $(this).data('id');
        $.ajax({
            url: "consultas/eliminarSucursal.php",
            type: "POST",
            data: { "idSucursal": idSucursal },
            success: function(cmb) {
                var jsonData = JSON.parse(cmb);
                if (jsonData.status == "1") {
                    alert(jsonData.message);
                    window.location.reload();
                } else {
                    alert(jsonData.message);
                }
                //window.location.reload();
            }
        });
    });
});


$(document).ready(function() {
    $(document).on('click', '#btnVerE', function(e) {
        e.preventDefault();
        var x = document.getElementById("averformsuc");
        x.style.display = "block";
        var idSucursal = $(this).data('id');

        $.ajax({
            url: "consultas/eliminarSucursal.php",
            type: "GET",
            data: { "idSucursal": idSucursal },
            success: function(cmb) {
               // $('#modalConsulta').modal({ show: true });
                var sucursal = JSON.parse(cmb);
                console.log(sucursal);
                $('#sucursalidE').val(idSucursal);

                $('#aemailsuc').val(sucursal.suc_email).prop('disabled', false);
$('#anombresucursal').val(sucursal.suc_nombresucursal).prop('disabled', false);
$('#acontactosuc').val(sucursal.suc_contactosucursal).prop('disabled', false);
$('#atelefonosuc').val(sucursal.suc_telefono).prop('disabled', false);
$('#adireccion').val(sucursal.suc_direccion).prop('disabled', false);
$("#actu").show();

                $('#aemailsuc').val(sucursal.suc_email);

                $('#anombresucursal').val(sucursal.suc_nombresucursal);
                $('#acontactosuc').val(sucursal.suc_contactosucursal);
                $('#atelefonosuc').val(sucursal.suc_telefono);
                $('#adireccion').val(sucursal.suc_direccion);
            }
        });
    });
});


$(document).ready(function() {
    $(document).on('click', '#btnVerS', function(e) {
        e.preventDefault();
        var x = document.getElementById("averformsuc");
        x.style.display = "block";
        var idSucursal = $(this).data('id');

        $.ajax({
            url: "consultas/eliminarSucursal.php",
            type: "GET",
            data: { "idSucursal": idSucursal },
            success: function(cmb) {
               // $('#modalConsulta').modal({ show: true });
                var sucursal = JSON.parse(cmb);
                console.log(sucursal);
                $('#sucursalidE').val(idSucursal);
                $('#aemailsuc').val(sucursal.suc_email).prop('disabled', true);
$('#anombresucursal').val(sucursal.suc_nombresucursal).prop('disabled', true);
$('#acontactosuc').val(sucursal.suc_contactosucursal).prop('disabled', true);
$('#atelefonosuc').val(sucursal.suc_telefono).prop('disabled', true);
$('#adireccion').val(sucursal.suc_direccion).prop('disabled', true);
$("#actu").hide();
            }
        });
    });
});


$(document).ready(function(e) {
    $(document).on('click', '#actu', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'consultas/eliminarSucursal.php',
            data: new FormData(document.getElementById('faverformsuc')),
            contentType: false,
            cache: false,
            processData: false,
            success: function(cmb) {
                console.log(cmb);
                var jsonData = JSON.parse(cmb);
                if (jsonData.status == "1") {
                    alert(jsonData.message);
                    window.location.reload();
                } else {
                    //$('#modalEdicion').modal('hide')
                    alert(jsonData.message);
                }
            }
        });
    });
});