// funcion para buscar si ya existe el nombre del usuario a registrar
function buscaproductoregistrado() {
    var nombreproducto=$('#nombreproducto').val();
      $.ajax({
          url: 'consultas/consultaProductoRegistrado',
          type: "POST",
          data: {"nombreproducto":nombreproducto},
          success: function (cmb) {
                     // alert(cmb);
          $('#tabladatos').html(cmb);                
        }
    }); 
}

// funcion para mostrar el formulario de registro
function nuevoproducto() {
  $('#datosproducto').show('show');
  $('#avisoSinResultados').hide('hide');
  $('#tablaListado').hide('hide');
}

// js para encontrar la sub categoria de la categoria
$('#categoria').on('change', function(){   
    var categoria = $('#categoria').val();
    $.ajax({
            url: 'consultas/consultasSubcategorias',
            type: "POST",
            data: {"categoria":categoria},
            success: function (cmb) {
              // alert(cmb);
              $('#subcategoria').html(cmb);               
            }
        });
  });

// js para encontrar la sub categoria de la categoria en actualizar
$('#categoriaupd').on('change', function(){   
    var categoria = $('#categoriaupd').val();
    $.ajax({
            url: 'consultas/consultasSubcategorias',
            type: "POST",
            data: {"categoria":categoria},
            success: function (cmb) {
              // alert(cmb);
              console.log;
              $('#subcategoriaupd').html(cmb);               
            }
        });
  });

  // muestra el div de paquetes
  function mostrarpaquetes() {
    element = document.getElementById("tablapaquetes");
    check = document.getElementById("paquetespreguntar");
    if (check.checked) {
        element.style.display='block';
    }
    else {
        element.style.display='none';
    }
}

// funcion para agregar los paquetes de productos
$(document).ready(function(){
  var i=1;
  $('#btnpaquetes').click(function(){
    i++;
    $('#datospaquetes').append('<tr id="row'+i+'"><td><input type="text" class="form-control" name="cantidadpaq[]" placeholder="Ejemplo: 8 Piezas"></td><td><input type="text" class="form-control" name="costopaq[]" placeholder="Costo del paquete"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  $("#formnuevo").submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: 'consultas/actualizacionProducto',
        type: "POST",
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function (response) {
            console.log(response);
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
              });
            // Mostrar mensaje al usuario
            Toast.fire({
              icon: 'success',
              title: response
              })
            // Redirigir a otra página después de un cierto tiempo (por ejemplo, 2 segundos)
            setTimeout(function () {
              window.location.reload();                
            }, 2000);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al actualizar el producto. Por favor, inténtelo de nuevo.");
        }
    });
});

});



// para ajustar el inventario directo
function ajustedeinventario() {
    var idInventarioAct=$('#idInventarioAct').val();
    var nvacantidad=$('#nvacantidad').val();
      $.ajax({
          url: 'consultas/ajustarInventario',
          type: "POST",
          data: {"idInventarioAct":idInventarioAct,"nvacantidad":nvacantidad},
          success: function (cmb) {
          // alert(cmb);
          window.location="inventarioListado?success=true";
            /*
              $("#invdatos").load(" #invdatos");
               $('#ajustarinventario').modal('hide');
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
                title: '  Se actualizo el inventario del producto'
              })
            });
            });   */         
        }
    }); 
}

function eliminarImagenPro() {
    var idProducto=$('#pro_idProducto').val();
      $.ajax({
          url: 'consultas/elininarImagenProducto',
          type: "POST",
          data: {"idProducto":idProducto},
          success: function (cmb) {
          // alert(cmb);
          // $('#tabladatos').html(cmb);
          window.location.reload();                
        }
    }); 
}
$('#archivofoto').change(function() {
subirFoto();

});
function subirFoto() {
  var idProducto = $('#pro_idProducto').val();

  // Crear un objeto FormData para manejar el archivo
  var formData = new FormData();
  formData.append('idProducto', idProducto);
  formData.append('foto', $('#archivofoto')[0].files[0]); // Asegúrate de tener un elemento de entrada de tipo archivo con el ID 'archivoInput'

  $.ajax({
      url: 'consultas/subirFoto',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
          // Manejar la respuesta del servidor después de subir el archivo
          console.log(response);

          // Realizar acciones adicionales si es necesario

          // Recargar la página después de realizar las acciones
          window.location.reload();
      },
      error: function (error) {
          // Manejar errores si la carga del archivo falla
          console.error('Error al subir el archivo:', error.responseText);
          alert('Error al subir el archivo. Por favor, inténtalo de nuevo.');
      }
  });
}

  // funcion para editar las categorias
  function editarCategoria() {
    var idUSer=$('#idUSer').val();
    var usrname=$('#usrname').val();
      if (usrname!=''){
            $.ajax({
                url: 'consultas/editarCategoria',
                type: "POST",
                data: {"idUSer":idUSer,"usrname":usrname},
                success: function (cmb) {
                 // alert(cmb);
                 window.location="productosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&editcat=true";               
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

  // funcion para agregar una categoria
  function agregarcategoria() {
    var catnew=$('#catnew').val();
      if (catnew!=''){
            $.ajax({
                url: 'consultas/agregarCategoria',
                type: "POST",
                data: {"catnew":catnew},
                success: function (cmb) {
                 // alert(cmb);
                 window.location="productosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altacat=true";               
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

  // funcion para editar las categorias
  function editarSubccategoria() {
    var idsubcategoria=$('#idUSer2').val();
    var catact2=$('#catact2').val();
    var categorianew=$('#categorianew').val();
    var subcatact2=$('#subcatact2').val();    
   
    if (subcatact2!=''){
            $.ajax({
                url: 'consultas/editarSubcategoria',
                type: "POST",
                data: {"idsubcategoria":idsubcategoria,"catact2":catact2,"categorianew":categorianew,"subcatact2":subcatact2},
                success: function (cmb) {
                  // alert(cmb);
                 window.location="productosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&editsubcat=true";               
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

  function agregarsubcategoria() {
    var categoriaagregar=$('#categoriaagregar').val();
    var subcategorianueva=$('#subcategorianueva').val();

    if (categoriaagregar!='' && subcategorianueva!=''){
            $.ajax({
                url: 'consultas/agregarSubcategoria',
                type: "POST",
                data: {"subcategorianueva":subcategorianueva,"categoriaagregar":categoriaagregar},
                success: function (cmb) {
                 // alert(cmb);
                 window.location="productosConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altacat=true";               
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

// valido que el sku no este repetido
function validasku() {
    var sku=$('#sku').val();
      $.ajax({
          url: 'consultas/validasku',
          type: "POST",
          data: {"sku":sku},
          success: function (cmb) {
                     // alert(cmb);
          $('#tablasku').html(cmb);                
        }
    }); 



  

}
