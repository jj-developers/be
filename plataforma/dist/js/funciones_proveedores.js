// funcion para buscar si ya existe el nombre del usuario a registrar
function buscaProveedor() {
    var nombrenegocio=$('#nombrenegocio').val();
      $.ajax({
          url: 'consultas/consultaProveedorRegistrado',
          type: "POST",
          data: {"nombrenegocio":nombrenegocio},
          success: function (cmb) {
                     // alert(cmb);
          $('#tabladatosprove').html(cmb);                
        }
    }); 
}

// funcion para mostrar el formulario de registro
function nuevoproveedornew() {
  $('#datosProveedorGral').show('show');
  $('#avisoSinResultados').hide('hide');
  // $('#datosProveedorGral').hide('hide');
}



