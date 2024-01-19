$('#pro_idProducto').on('change', function(){   
    var idProducto = $('#pro_idProducto').val();
    var idProveedor = $('#idProveedor').val();
    $.ajax({
      url: 'consultas/consultasCostosProductos',
      type: 'POST',      
      data: {'idProducto': idProducto}, 
      success: function (cmb) {
      // alert(cmb);
                if (cmb!='') {
                    var Data=cmb.split("/");
                    $("#sku").val(Data[1]);
                    $("#nombreproducto").val(Data[2]);
                    $("#prodescripcion").val(Data[3]);
                    $("#idProveedorfijo").val(idProveedor);
                } 
          }           
    });
});

function agregarFila(){
  var idProducto=$('#pro_idProducto').val();
  var noParte=$('#sku').val();
  var nombreproducto=$('#nombreproducto').val(); 
  var cantidad=$('#cantidadP').val();
  var precio=$('#costo').val();
  if (!idProducto || !noParte || !nombreproducto || !cantidad || !precio) {
    // Al menos uno de los campos está vacío
    alert('Por favor, completa todos los campos antes de continuar.');
}else{
  var precio=precio;
  var iva =precio*0.16;
  // alert(productoMolde);
  const formateador = new Intl.NumberFormat("en", { style: "currency", "currency": "MXN" });
  const numero = precio;
  const formateado = formateador.format(numero);
  // subotal js
  iva=iva*cantidad;
  var subtotal=precio*cantidad;
  var total=precio*cantidad;
  var costo=subtotal-iva;

  const subtotalformateado = formateador.format(subtotal);
  const costoformateado = formateador.format(costo);

  const ivaformateado = formateador.format(iva);
      console.log(ivaformateado);

  if (precio!='') {

  document.getElementById("tablaProductosCompras").insertRow(-1).innerHTML = '<td>'+noParte+
  '<input type="hidden" value="'+idProducto+'" name="idProducto[]">'+
  '<td>'+nombreproducto+'</td><td>'+cantidad+
  '<input type="hidden" value="'+cantidad+'" name="cantidad[]">'+
  '</td><td>'+costoformateado+
  '<input type="hidden" value="'+precio+'" name="costo[]">'+
  '</td><td>'+ivaformateado+
  '<input type="hidden" value="'+iva+'" name="iva[]">'+
  '</td><td>'+(subtotalformateado)+
  '<input type="hidden" class="valor" value="'+(subtotal)+'" name="total[]"></td>';
  //pongo los valores en nada para agregar uno nuevo
  $('#precioP').val('');
  $('#costo').val('');
  var suma = 0;
  $('.valor').each(function() {

      var valor = parseFloat($(this).val()); // Convierte el texto de la celda a un número

      if (!isNaN(valor)) {
          suma += valor; // Suma el valor a la suma total
      }
  });
  const tot = formateador.format(suma);

  $("#total").text(tot);
  } else{
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
        title: ' El producto no puede agregarse a la compra'
      })
    });
    });
  }
}
}

// para eliminar un producto agregado recien a la tabla 
function eliminarFila(){
  var table = document.getElementById("tablaProductosCompras");
  var rowCount = table.rows.length;
  if(rowCount <= 2) {
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
    table.deleteRow(rowCount -1);
  }
}


// envio el form para guardar los datos
$(document).ready(function(e){
    $("#formcompra").on('submit', function(e){
        e.preventDefault();
        var formData = new FormData(this);

        // Recorre los parámetros de FormData y muestra cada clave y valor en la consola
        formData.forEach(function (value, key) {
            console.log(key, value);
        });
        $.ajax({
            type: 'POST',
            url: 'consultas/agregarCompra.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function (cmb) {
            console.log(cmb);
           window.location="resumencompra?success=true";              
            }
        });
    });
  });


  // funcion para editar los giros de negocio
  function editarDestCompra() {
    var idDestino=$('#idDestino').val();
    var namenew=$('#namenew').val();
    var ubinew=$('#ubinew').val();
    
      if (namenew!=''){
            $.ajax({
                url: 'consultas/editarDestinoCompras',
                type: "POST",
                data: {"idDestino":idDestino,"namenew":namenew,"ubinew":ubinew},
                success: function (cmb) {
                 // alert(cmb);
                 window.location="comprasConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&editcompra=true";               
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
  function agregardestinew() {
    var namenew2=$('#namenew2').val();
    var ubine2=$('#ubine2').val();
    
    if (namenew2!=''||ubine2!=''){
      $.ajax({
          url: 'consultas/altaDestinoCompra',
          type: "POST",
          data: {"namenew2":namenew2,"ubine2":ubine2},
          success: function (cmb) {
           // alert(cmb);
           window.location="comprasConfiguracion?token=6f19e8d4f5df8fae1e124941a48d980f&altadircomp=true";               
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
      title: 'Es necesario colocar nombre y dirección'
      })
    });
  } 
}
