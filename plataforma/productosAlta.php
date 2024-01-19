<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
include('class/agregarProducto.php');
//creamo el objeto de la orde de venta class
$NuUs = new productos_class();

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alta y/o Edición de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Alta de productos</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

  <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
  <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title"><font color="#FFF">.</font></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Nombre del producto</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nombreproducto" name="nombreproducto" placeholder="Nombre del producto" required>
                  </div>                
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Buscar</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-success"  onclick="buscaproductoregistrado()">Buscar / Agregar</button>
                  </div>                
                </div>
              </div>
            </div>
            <div class="row no-print">
                <div class="col-12">
                  <a href="dashboard" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
              </div>
        </div>
            <div class="row" id="tablaListado">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12" id="tabladatos">
                  </div>
                  </div>                
                </div>
              </div>
          </div>          
        </div>

          <div class="card card-default" id="datosproducto" style="display: none">
          <div class="card-header">
            <h3 class="card-title">Datos generales del Producto</h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>SKU</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="SKU del producto" onchange="validasku()">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tags</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Captura por comas. Ejemplo: Refresco,Vino,Coca">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Estatus</label>
                    <select class="form-control select2 select2" id="estatus" name="estatus">
                    <option value="1">Activo</option>
                    <option value="5">Inactivo</option>
                  </select>
                  
                </div>
              </div>
            </div>
            <div class="row" id="tablaListado">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-sm-12" id="tablasku">
                  </div>
                  </div>                
                </div>
              </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Categoría</label>
                  <?php 
                  $query="select * from th_cat_categorias where cat_estatus=1";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="categoria" name="categoria">
                    <option value="">Elige una categoria</option>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['cat_idCategoria'] . '">'.$Usuario['cat_nombrecategoria']. '</option>';
                                }
                                ?>

                  </select>
                  <input type="hidden" id="ingresarProducto" name="ingresarProducto" value="ingresarProducto"> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sub categoría</label>
                  <select class="form-control select2 select2" id="subcategoria" name="subcategoria">
                  </select>               
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca del producto">              
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              <div class="alert alert-warning alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Importante!</h5>
                  Si el producto requiere precios en paquete, solo colocar 0 (cero) en el precio
                </div>
              </div>
            </div>  

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Oro</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="costooro" name="costooro" placeholder="Precio Oro">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Premium</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="costopremium" name="costopremium" placeholder="Precio Premium">
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Platinium</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="costoplatinium" name="costoplatinium" placeholder="Precio Platinium">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descripción</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="3" id="descripcion" name="descripcion" placeholder="Ingresa la descripcón del producto, se observa en la página"></textarea>
                  </div>
                </div>
              </div>
            </div>


            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Imagen</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="archivofoto" name="archivofoto" accept="image/*">
                      </div>
                    </div> 
                </div>
              </div>
            </div>

            <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input type="checkbox" class="custom-control-input" id="paquetespreguntar" name="paquetespreguntar" value="0" onchange="javascript:mostrarpaquetes()">
                      <label class="custom-control-label" for="paquetespreguntar">Activar si el producto requiere venta en paquetes</label>
                    </div>
                  </div>
              </div>
            </div>

            <hr color="red">

 <div class="row" id="tablapaquetes" style="display: none">
    <div class="col-md-12"> 
      <legend>Paquetes</legend>
      <div class="form-group">
          <div class="table-responsive">
            <table class="table table-bordered" id="datospaquetes">
              <tr>
                <td><b>Cantidad y descripción</b></td>
                <td><b>Costo</b></td>
                <td><b>Acciones</b></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" name="cantidadpaq[]" placeholder="Ejemplo: 8 Piezas"></td>
                <td><input type="text" class="form-control" name="costopaq[]" placeholder="Costo del paquete"></td>
                <td><button type="button" name="btnpaquetes" id="btnpaquetes" class="btn btn-success">Agregar Otra Opción</button></td>
              </tr>
            </table>
          </div>        
      </div>
    </div>
  </div>
            <div class="card-footer" id="botonenviar">
            <button type="submit" class="btn btn-success" id="btnenviar">Alta Producto</button>
          </div>
            </div>
          </div>
        </div>
        </div>        
    </section>
  </div>
</form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
require_once ("footer.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_productos.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#reservationdate2').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'YYYY-MM-DD hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'YYYY-MM-DDs'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>


</body>
</html>

<?php 
if ($_GET['response']=='true') { ?>
    <script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $(document).ready(function() {
      Toast.fire({
        icon: 'success',
        title: ' El producto se genero correctamente, ya esta disponible para ser utilizado'
      })
    });
    });
</script>
<?php } ?>

