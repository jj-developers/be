// funcion para buscar si ya existe el nombre del usuario a registrar
function buscaCursoRegistrado() {
    var nombrecurso=$('#nombrecurso').val();
      $.ajax({
          url: 'consultas/consultaCursoRegistrado',
          type: "POST",
          data: {"nombrecurso":nombrecurso},
          success: function (cmb) {
                     // alert(cmb);
          $('#tabladatos').html(cmb);                
        }
    }); 
}

// funcion para mostrar el formulario de registro
function nuevoCurso() {
  $('#datosDomicilio').show('show');
  $('#avisoSinResultados').hide('hide');
  $('#tablaListado').hide('hide');
}


// funcion para agregar los modulos
$(document).ready(function(){
  var i=1;
  $('#add3').click(function(){
    i++;
    $('#dynamic_field3').append('<tr id="row'+i+'"><td><input type="text" class="form-control" name="modulono[]" placeholder="Número de Modulo"></td><td><input type="text" class="form-control" name="nombremodulo[]" placeholder="Nombre del módulo"></td><td><input type="text" class="form-control" name="fechamodulo[]" placeholder="yyyy-mm-dd" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
});

// funcion para agregar los costos por modulo
$(document).ready(function(){
  var i=1;
  $('#add2').click(function(){
    i++;
    $('#dynamic_field2').append('<tr id="row'+i+'"><td><input type="text" class="form-control" name="costomodulo[]" placeholder="Costo por módulo antes de fecha"></td><td><input type="text" class="form-control" name="fechamoduloa[]" placeholder="yyyy-mm-dd" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
  });
  $(document).on('click', '.btn_remove', function(){
    var button_id = $(this).attr("id"); 
    $('#row'+button_id+'').remove();
  });
  
});