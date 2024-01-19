$('#pro_idProducto').on('change', function() {
    var idProducto = $('#pro_idProducto').val();
    $.ajax({
        url: 'consultas/consultasCostosProductos',
        type: 'POST',
        data: { 'idProducto': idProducto },
        success: function(cmb) {
            // alert(cmb);
            if (cmb != '') {
                var Data = cmb.split("/");
                $("#precioP").val(Data[0]);
                $("#sku").val(Data[1]);
                $("#nombreproducto").val(Data[2]);
                $("#prodescripcion").val(Data[3]);
            }
        }
    });
});

function agregarFila() {
    var idProducto = $('#pro_idProducto').val();
    var noParte = $('#sku').val();
    var nombreproducto = $('#nombreproducto').val();
    var cantidad = $('#cantidadP').val();
    var precio = $('#precioP').val();
    var productoMolde = $("#idMolde").val();
    var productoReceptor = $("#idReceptor").val();
    var productoOliva = $("#idOliva").val();
    var productoOpenfit = $("#idOpenfit").val();
    // alert(productoMolde);
    const formateador = new Intl.NumberFormat("en", { style: "currency", "currency": "MXN" });
    const numero = precio;
    const formateado = formateador.format(numero);
    console.log(formateado);
    // subotal js
    var subtotal = precio * cantidad;
    const subtotalformateado = formateador.format(subtotal);

    if (precio != '') {
        document.getElementById("tablaProductosPedidos").insertRow(-1).innerHTML = '<td>' + cantidad + '<input type="hidden" value="' + cantidad + '" name="cantidad[]"></td><td>' + noParte + '<input type="hidden" value="' + idProducto + '" name="idProducto[]"><td>' + nombreproducto + '</td><td>' + formateado + '<input type="hidden" value="' + precio + '" name="precio[]"></td><td>' + (subtotalformateado) + '<input type="hidden" value="' + (subtotal) + '" name="total[]"></td>';
        //pongo los valores en nada para agregar uno nuevo
        $('#precioP').val('');

    } else {
        // muestro la alerta de cantidad excedente
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500
            });

            $(document).ready(function() {
                Toast.fire({
                    icon: 'error',
                    title: ' El producto no puede agregarse a la orden'
                })
            });
        });
    }
}

// para eliminar un producto agregado recien a la tabla 
function eliminarFila() {
    var table = document.getElementById("tablaProductosPedidos");
    var rowCount = table.rows.length;
    if (rowCount <= 2) {
        // alert('No se puede eliminar el encabezado');
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3500
            });

            $(document).ready(function() {
                Toast.fire({
                    icon: 'error',
                    title: '  Ya no tienes productos agregados, es imposible quitar el encabezado de la tabla'
                })
            });
        });
    } else {
        table.deleteRow(rowCount - 1);
    }
}

// para cencelar un pedido
function cancelarPedido() {
    var idPedidoCancelar = $('#idPedidoCancelar').val();
    var montoacancelar = $('#montoacancelar').val();
    var idCliente = $('#idCliente').val();
    var email=$("#correo").val();
    var folioPedidoCancelar = $('#folioPedidoCancelar').val();

    $.ajax({
        type: "POST",
        url: "../enviarCorreo.php",
        data: {
            email: email,
            mensaje: 'Tu pedido '+folioPedidoCancelar+' fue cancelado, lamentamos las molestias.',
            asunto:'Pedido cancelado'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

    $.ajax({
        url: 'consultas/cancelarPedido',
        type: "POST",
        data: { "idPedidoCancelar": idPedidoCancelar, "montoacancelar": montoacancelar, "idCliente": idCliente },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosListado?delete=true";
        }
    });
}

// agrego los datos del producto para eliminar
function agregaform(datos) {
    d = datos.split('||');
    $('#idProductoCancelar').val(d[0]);
}

// para eliminar un producto
function eliminarProductoPedido() {
    var idProductoCancelar = $('#idProductoCancelar').val();
    var idPedidoPP = $('#idPedidoPP').val();
    var totalactual = $('#totalactual').val();
    var idClientePP = $('#idClientePP').val();
    $.ajax({
        url: 'consultas/cancelarProductoPedido',
        type: "POST",
        data: { "idProductoCancelar": idProductoCancelar, "idPedidoPP": idPedidoPP, "idClientePP": idClientePP, "totalactual": totalactual },
        success: function(cmb) {
            // alert(cmb);
            // window.location="pedidosListado?delete=true";
            $("#datosproductospedido").load(" #datosproductospedido");
            $('#cancelarPedido').modal('hide');
            $('.modal-backdrop').remove();
            $(function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3500
                });

                $(document).ready(function() {
                    Toast.fire({
                        icon: 'success',
                        title: '  Se ha eliminado el producto del pedido'
                    })
                });
            });
        }
    });
}

// para cencelar un pedido
function aceptarPedido() {
    var email=$("#correo").val();
    var folioPedidoAceptar=$("#folioPedidoAceptar").val();

    $.ajax({
        type: "POST",
        url: "../enviarCorreo.php",
        data: {
            email: email,
            mensaje: 'Tu pedido '+folioPedidoAceptar+' fue aceptado te avisaremos cuando sea entregado.',
            asunto:'Pedido en camino'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

    var idPedidoCancelar = $('#idPedidoCancelar').val();
    $.ajax({
        url: 'consultas/aceptarPedido',
        type: "POST",
        data: { "idPedidoCancelar": idPedidoCancelar },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosListado?acept=true";
        }
    });
}

function aceptarPago() {
    var idPedido = $('#idPedido').val();
    var idPago = $('#idPago').val();
    var montopedido = $('#montopedido').val();
    var idCliente = $('#idCliente').val();
    // alert('idPedido '+idPedido);
    $.ajax({
        url: 'consultas/aceptarPago',
        type: "POST",
        data: { "idPago": idPago, "montopedido": montopedido, "idCliente": idCliente },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosDetalleEntregados?aprobe=true&success=true&idPedido=" + idPedido;
        }
    });
}

// para activar un pedido
function activarPedido() {
    var idPedidoActivar = $('#idPedidoActivar').val();
    var montoacancelar = $('#montoacancelar').val();
    var idCliente = $('#idCliente').val();
    $.ajax({
        url: 'consultas/activarPedido',
        type: "POST",
        data: { "idPedidoActivar": idPedidoActivar, "montoacancelar": montoacancelar, "idCliente": idCliente },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosListado?activate=true";
        }
    });
}

// funcion al cambiar fecha en reporte de listado de pedidos
$('#fechap').on('change', function() {
    var fechap = $('#fechap').val();
    if (fechap == '99') {
        $('#divfechas').show('show');
    } else {
        $('#divfechas').hide('hide');
        $('#fechaInicio').val('');
        $('#fechaFin').val('');
    }
});

// para editar un envio
function editarEnvio() {
    var idEnvio = $('#idEnvio').val();
    var miniact = $('#miniact').val();
    var mfinact = $('#mfinact').val();
    var costoact = $('#costoact').val();
    $.ajax({
        url: 'consultas/editarEnvio',
        type: "POST",
        data: { "idEnvio": idEnvio, "miniact": miniact, "mfinact": mfinact, "costoact": costoact },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosConfiguracion?activate=true";
        }
    });
}

// para agregar un envio
function agregarnuevoenvio() {
    var minicial = $('#minicial').val();
    var mfinal = $('#mfinal').val();
    var costoenvio = $('#costoenvio').val();
    $.ajax({
        url: 'consultas/agregarEnvio',
        type: "POST",
        data: { "minicial": minicial, "mfinal": mfinal, "costoenvio": costoenvio, },
        success: function(cmb) {
            // alert(cmb);
            window.location = "pedidosConfiguracion?activate=true";
        }
    });
}

$(document).on('click', '#entregar', function(e) {
    var email=$("#correo").val();
    var folioPedidoCancelar=$("#folioPedidoCancelar").val();

    $.ajax({
        type: "POST",
        url: "../enviarCorreo.php",
        data: {
            email: email,
            mensaje: 'Tu pedido '+folioPedidoCancelar+' fue entregado correctamente.',
            asunto:'Pedido en entregado'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

})

$(document).ready(function() {
    $(document).on('click', '#btnEliminarEn', function(e) {
        var idCostoEnvio = $(this).data('id');
        $.ajax({
            url: 'consultas/cancelarCostoEnvio',
            type: "POST",
            data: { "idCostoEnvio": idCostoEnvio },
            success: function(cmb) {
                alert(cmb);
                location.reload()
            }
        });
    })
})