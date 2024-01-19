// funcion para buscar si ya existe el nombre del usuario a registrar
function buscaUsuarioRegistrado() {
    var nombrenegocio=$('#nombrenegocio').val();
      $.ajax({
          url: 'consultas/consultaUsuarioRegistrado',
          type: "POST",
          data: {"nombrenegocio":nombrenegocio},
          success: function (cmb) {
                     // alert(cmb);
          $('#tabladatos').html(cmb);                
        }
    }); 
}

// funcion para mostrar el formulario de registro
function nuevoBeneficiario() {
  $('#datosDomicilio').show('show');
  $('#avisoSinResultados').hide('hide');
  $('#tablaListado').hide('hide');
}

// funcion para validar que el email no este registrado en otro usuario
function validaUsuario() {
      var email=$('#email').val();
        $.ajax({
            url: 'consultas/validaEmailRegistrado',
            type: "POST",
            data: {"email":email},
            success: function (cmb) {
                     // alert(cmb);
                     if (cmb==2) {
                     $('#botonenviar').show('show');
                     var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });

                    $(document).ready(function() {
                      Toast.fire({
                        icon: 'success',
                        title: 'El email de usuario es valido'
                      })
                    });

                   } if (cmb==1) {
                      var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });

                    $(document).ready(function() {
                      Toast.fire({
                        icon: 'error',
                        title: 'El correo ingresado ya existe, intentar con otro diferente'
                      })
                    });
                    $('#botonenviar').hide('hide');
                }
            }
        });
  }


// funcion para registrar un nuevo usuario de la plataforma
  function registraUsuario() {
    var nombrenegocio=$('#nombrenegocio').val();
    var rol=$('#rol').val();
    var nombreusr=$('#nombreusr').val();
    var apellidosusr=$('#apellidosusr').val();
    var telefono=$('#telefono').val();
    var puesto=$('#puesto').val();
    var email=$('#email').val();
    var giroempresa=$('#giroempresa').val();
    var otrogiro=$('#otrogiro').val();
    var contrasena=$('#contrasena').val();
    var contrasenar=$('#contrasenar').val();

if (contrasena==contrasenar){
      $.ajax({
          url: 'consultas/agregarUsuarioPlataforma',
          type: "POST",
          data: {"nombrenegocio":nombrenegocio,"rol":rol,"nombreusr":nombreusr,"apellidosusr":apellidosusr,
          "telefono":telefono,"puesto":puesto,"email":email,"giroempresa":giroempresa,"otrogiro":otrogiro,"contrasena":contrasena},
          success: function (cmb) {
           // alert(cmb);
           window.location="usuariosAlta?token=6f19e8d4f5df8fae1e124941a48d980f&response=true";               
          }
        });
} else {
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });
      $(document).ready(function() {
      Toast.fire({
      icon: 'error',
      title: 'Las contraseñas no son iguales'
      })
    });
  } 
}


// js para encontrar el municipio dependiendo del estado  
$('#estado').on('change', function(){   
    var estado = $('#estado').val();
    $.ajax({
            url: 'consultas/consultasMunicipios',
            type: "POST",
            data: {"estado":estado},
            success: function (cmb) {
              // alert(cmb);
              $('#municipio').html(cmb);               
            }
        });
  }); 

// funcion para registrar un nuevo usuario de la plataforma
  function actdatosCliente() {
    var montoAct=$('#montoAct').val();
    var idUsrAct=$('#idUsrAct').val();
    var tipocosto=$('#tipocosto').val();
    var email=$("#email").val();

    if (montoAct>=1){
      $.ajax({
        type: "POST",
        url: "../enviarCorreo.php",
        data: {
            email: email,
            mensaje: 'Hola, bienvenido a Bebify tu credito fue aprobado. Consultalo desde tu cuenta.',
            asunto:'Bienvenido a bebify'
        },
        success: function(response) {
            console.log(response); 
    
        },
        error: function(error) {
            console.error('Error en la solicitud:', error);

        }
    });

      $.ajax({
          url: 'consultas/activarUsuarioFinal',
          type: "POST",
          data: {"montoAct":montoAct,"idUsrAct":idUsrAct,"tipocosto":tipocosto},
          success: function (cmb) {
           // alert(cmb);
               $("#datostabla").load(" #datostabla");
               $('#verDatosAcuse').modal('hide');
               $('.modal-backdrop').remove();
                 $(function() {
                  var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000
                  });

                  $(document).ready(function() {
                    Toast.fire({
                      icon: 'success',
                      title: ' El cliente ya termino su registro, ya puede solicitar pedidos por sitio Web'
                    })
                  });
                  });                
            }              
        });
} else {
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });
      $(document).ready(function() {
      Toast.fire({
      icon: 'error',
      title: 'El monto no puede ser menor que $1.00'
      })
    });
  } 
}

// funcion para registrar una nueva sucursal de cliente
  function generarSucursal() {
    var idCliente=$('#idCliente').val();
    var nombresucursal=$('#nombresucursal').val();
    var contactosuc=$('#contactosuc').val();
    var telefonosuc=$('#telefonosuc').val();
    var emailsuc=$('#emailsuc').val();
    var direccion=$('#direccion').val();
    var latitud=$('#latitud').val();
    var longitud=$('#longitud').val();

if (idCliente==idCliente){
      $.ajax({
          url: 'consultas/agregarSucursalCliente',
          type: "POST",
          data: {"idCliente":idCliente,"nombresucursal":nombresucursal,"contactosuc":contactosuc,
          "telefonosuc":telefonosuc,"emailsuc":emailsuc,"direccion":direccion,"latitud":latitud,
          "longitud":longitud},
          success: function (cmb) {
           // alert(cmb);
           window.location="usuariosAlta?token=6f19e8d4f5df8fae1e124941a48d980f&response=true";               
          }
        });
} else {
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
  } 
}

// js para encontrar el municipio dependiendo del estado  
$('#giroempresa').on('change', function(){   
    var giroempresa = $('#giroempresa').val();
      if (giroempresa=='otro'){
        $('#otrogirodiv').show('show');
      } else {
        $('#otrogirodiv').hide('hide');
        $('#otrogiro').val('');
      }
  });


// funcion para registrar un nuevo usuario de la plataforma
  function registraUsuarioempleado2() {
    var rol=$('#rol').val();
    var nombreusr=$('#nombreusr').val();
    var apellidosusr=$('#apellidosusr').val();
    var telefono=$('#telefono').val();
    var email=$('#email').val();
    var contrasena=$('#contrasena').val();
    var contrasenar=$('#contrasenar').val();

if (contrasena==contrasenar){
      $.ajax({
          url: 'consultas/agregarUsuarioPlataformaEmpleado',
          type: "POST",
          data: {"rol":rol,"nombreusr":nombreusr,"apellidosusr":apellidosusr,
          "telefono":telefono,"email":email,"contrasena":contrasena},
          success: function (cmb) {
           // alert(cmb);
           window.location="usuariosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altauserpla=true";               
          }
        });
} else {
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });
      $(document).ready(function() {
      Toast.fire({
      icon: 'error',
      title: 'Las contraseñas no son iguales'
      })
    });
  } 
}

  function editarUsrPlatf() {
    var idUSer=$('#idUSer').val();
    var nombreusr=$('#usrname').val();
    var apellidosusr=$('#apeusr').val();
    var telefono=$('#telusr').val();
    var email=$('#emausr').val();
    var contrasena=$('#usrpass').val();
    
if (contrasena!=''){
      $.ajax({
          url: 'consultas/editarUsuarioPlataforma',
          type: "POST",
          data: {"idUSer":idUSer,"nombreusr":nombreusr,"apellidosusr":apellidosusr,
          "telefono":telefono,"email":email,"contrasena":contrasena},
          success: function (cmb) {
           // alert(cmb);
           window.location="usuariosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&edituserpla=true";               
          }
        });
} else {
      var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
      });
      $(document).ready(function() {
      Toast.fire({
      icon: 'error',
      title: 'La contraseña no puede ir vacia'
      })
    });
  } 
}