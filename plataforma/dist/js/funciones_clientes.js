  // funcion para editar los giros de negocio
  function editarGiroConf() {
      var idUSer = $('#idUSer').val();
      var nombreusr = $('#usrname').val();

      if (nombreusr != '') {
          $.ajax({
              url: 'consultas/editarGiroNegocio',
              type: "POST",
              data: { "idUSer": idUSer, "nombreusr": nombreusr },
              success: function(cmb) {
                  // alert(cmb);
                  window.location = "clientesConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&editgiremp=true";
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
                  title: 'El nombre no puede ir vacio'
              })
          });
      }
  }

  // funcion para editar los giros de negocio
  function agregargironuevo() {
      var gironew = $('#gironew').val();

      if (gironew != '') {
          $.ajax({
              url: 'consultas/altaGiroNegocio',
              type: "POST",
              data: { "gironew": gironew },
              success: function(cmb) {
                  // alert(cmb);
                  window.location = "clientesConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altagironew=true";
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
                  title: 'El nombre no puede ir vacio'
              })
          });
      }
  }

  // funcion para editar los giros de negocio
  function agregardescuento() {
      var idCliente = $('#idCliente').val();
      var codigodes = $('#codigodes').val();
      var montodes = $('#montodes').val();
      var usodes = $('#usodes').val();
      var fechades = $('#fechades').val();

      if (idCliente != '' && codigodes != '' && montodes != '' && usodes != '' && fechades != '') {
          $.ajax({
              url: 'consultas/altaDescuento',
              type: "POST",
              data: { "idCliente": idCliente, "codigodes": codigodes, "montodes": montodes, "fechades": fechades, "usodes": usodes },
              success: function(cmb) {
                  // alert(cmb);
                  window.location = "clientesConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altagironew=true";
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
                  title: 'Es necesario colocar los 5 datos'
              })
          });
      }
  }

  // funcion para editar los giros de negocio
  function editarDescuento() {
      var idDesc = $('#idDesc').val();
      var codidesc = $('#codidesc').val();
      var montodesc = $('#montodesc').val();

      if (idDesc != '' && codidesc != '' && montodesc != '') {
          $.ajax({
              url: 'consultas/editarDescuento',
              type: "POST",
              data: { "idDesc": idDesc, "codidesc": codidesc, "montodesc": montodesc },
              success: function(cmb) {
                  // alert(cmb);
                  window.location = "clientesConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altagironew=true";
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
                  title: 'Es necesario colocar los 3 datos'
              })
          });
      }
  }

  $(document).ready(function() {
      $(document).on('click', '#btnEliminarD', function(e) {
          var iddescuento = $(this).data('id');
          $.ajax({
              url: 'consultas/cancelar_descuento',
              type: "POST",
              data: { "iddescuento": iddescuento },
              success: function(cmb) {
                  alert(cmb);
                  window.location = "clientesConfiguracion";
              }
          });
      })
  })