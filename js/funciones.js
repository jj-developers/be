
// agregar al carrito los productos
// envio el form para guardar los datos

$(document).ready(function(e) {

    $("#formcart").on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'consultas/agregarCarrito.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(cmb) {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2500
                  });

if(cmb == 1){
    $(document).ready(function() {
        Toast.fire({
          icon: 'success',
          title: '  Producto agregado al carrito'
        })
      });
                window.location = "carrito";
            
}else{
    $(document).ready(function() {
        Toast.fire({
          icon: 'error',
          title: cmb
        })
      });

}
}
        });
    });

// para actualizar cantidades del carrito
    $("#formcartactualizar").on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'consultas/actualizarCarrito.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(cmb) {
console.log(cmb);
                window.location.reload()
                    // window.location="index";              
            }
        });
    });

    $(document).on('click', '#btnView', function(e) {

        e.preventDefault();
        var idProducto = $(this).data('id');

        $.ajax({
            url: "consultas/eliminarProductoCarrito.php",
            type: "POST",
            data: { "idProducto": idProducto },
            success: function(cmb) {
                console.log(cmb);
                window.location.reload();
            }
        });
    });

// creo el pedido y elimino el carrito
    $(document).on('click', '#btnEnviarPedido', function(e) {
        //$("#crearpedido").on('submit', function(e) {
        e.preventDefault();
        var sucursalSolicita = $('#shop-shipping-checkout-company').val();
        var email=$("#shop-shipping-checkout-email").val();

            if (sucursalSolicita >= 1) {
                var valorDescuentoAp = $('#valorDescuentoAp').val();
                var idDescuentoAp = $('#idDescuentoAp').val();
                var comentarios = $('#comentarios').val();

                var desc = '';
                var iddesc = '';
                if (valorDescuentoAp) {
                    desc = valorDescuentoAp;
                    iddesc = idDescuentoAp;
                } else {
                    desc = 0;
                    iddesc = 0;
                }

                let formData = new FormData(document.getElementById('crearpedido'));
                formData.append("comentarios", comentarios);
                formData.append("sucursalSolicita", sucursalSolicita)
                formData.append("valorDescuentoAp", desc)
                formData.append("idDescuentoAp", iddesc)
 
                
              

                $.ajax({
                    type: 'POST',
                    url: 'consultas/generarPedido.php',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(cmb) {
                        console.log(cmb);
                        alert('Pedido generado correctamente');
                     //   window.location = "mi-cuenta";
                    }
                });

                $.ajax({
                    type: "POST",
                    url: "enviarCorreo.php",
                    data: {
                        email: email,
                        mensaje: 'Recibimos tu pedido, lo estamos procesando pronto tendras mas noticias.',
                        asunto:'Pedido nuevo Bebify'
                    },
                    success: function(response) {
                        console.log(response); 
                
                    },
                    error: function(error) {
                        console.error('Error en la solicitud:', error);
            
                    }
                });
            } else {
               
                alert('Es necesario elegir una sucursal para poder envíar tu pedido');
            }
        
    });


function enviarbusqueda() {
    document.getElementById('formdatosbus').submit();
}



$('#shop-shipping-checkout-company').on('change', function() {
    var idSucursal = this.value;
    $('#contactosuc').val('');
    $('#telefonosuc').val('');
    $('#shop-shipping-checkout-email').val('');
    $('#direccion').val('');
    if (idSucursal > 0) {
        $.ajax({
            url: "consultas/eliminarSucursal.php",
            type: "GET",
            data: { "idSucursal": idSucursal },
            success: function(cmb) {
              //  console.log(cmb);
                var sucursal = JSON.parse(cmb);
                $('#encargado').val(sucursal.Encargado);
                $('#telefonosuc').val(sucursal.Telefono);
                $('#shop-shipping-checkout-email').val(sucursal.Correo);
                $('#direccion').val(sucursal.Direccion);
            }
        });
    }
});

    $(document).on('click', '#aplicardescuento', function(e) {
        var codigo = $('#codigodescuento').val();
        var cliente = $('#idcliented').val();
        if (codigo != '') {
            $.ajax({
                url: "consultas/obtenerDescuento.php",
                type: "GET",
                data: { "codigo": codigo, "cliente": cliente },
                success: function(cmb) {

                    var descuento = JSON.parse(cmb);
                    if (descuento) {
                        var total = $('#subtotalCaVa').val();
                        var disponible = $('#montoDisD').val();
                        var costoenvip = $('#costoenvip').val();

                        $('#idDescuentoAp').val(descuento.desc_idDescuento);
                        $('#valorDescuentoAp').val(descuento.desc_monto);

                        $('#descuentoEnvId').val(descuento.desc_idDescuento);
                        $('#descuentoEnv').val(descuento.desc_monto);

                        document.getElementById("divDescuento").style.display = "none";
                        var valordes = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(descuento.desc_monto)
                        $('.descuentoVista').text('Descuento:  ' + valordes);
                        $('.tableDescuento').text('Descuento:  ' + valordes);

                        var valorTotal = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(Number(total - descuento.desc_monto) + Number(costoenvip))

                        $('.totalCa').text('Total:  ' + valorTotal);
                        $('.totalNotaE').text('Total:  ' + valorTotal);

                        var valorcredito = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(disponible - ((Number(total - descuento.desc_monto) + Number(costoenvip))))
                        $('.creditoCa').text('Crédito disponible:  ' + valorcredito);

                        $('#saldocarrito').val(disponible - ((Number(total - descuento.desc_monto) + Number(costoenvip))));
                        var nuevoTva = (total - descuento.desc_monto);

                        $.ajax({
                            url: "consultas/obtenerCostos.php",
                            type: "GET",
                            data: { "nuevoTva": nuevoTva },
                            success: function(datos) {
                                var costose = JSON.parse(datos);

                                if (costose) {
                                    $('#costoenvip').val(costose.env_monto);
                                    $('#costoEnvioen').val(costose.env_monto);

                                    var valorenvio = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(costose.env_monto)
                                    $('.envioCa').text('Envío:  ' + valorenvio);
                                    $('.tableenvio').text('Envío:  ' + valorenvio);

                                    var valortotaenv = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(Number(nuevoTva) + Number(costose.env_monto))

                                    $('.totalCa').text('Total:  ' + valortotaenv);
                                    $('.totalNotaE').text('Total:  ' + valortotaenv);

                                    var valorcreditoe = Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' }).format(disponible - (Number(nuevoTva) + Number(costose.env_monto)))
                                    $('.creditoCa').text('Crédito disponible:  ' + valorcreditoe);
                                    $('#saldocarrito').val(disponible - (Number(nuevoTva) + Number(costose.env_monto)));
                                }
                            }
                        });
                    }

                }
            });
        } else {
            alert('Favor de ingresar un código de descuento');
        }
    });


});
