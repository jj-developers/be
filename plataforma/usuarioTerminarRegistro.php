<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idUsuario=$_GET['idUsuario'];
include('class/activarRegistroCliente.php');
$NuUs=new activarRegistro_class();
if ($_POST) {
$NuUs->accionesCliente();
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ion Slider -->
  <link rel="stylesheet" href="plugins/ion-rangeslider/css/ion.rangeSlider.min.css">
  <!-- bootstrap slider -->
  <link rel="stylesheet" href="plugins/bootstrap-slider/css/bootstrap-slider.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Completar Registro</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Alta de Clientes</li>
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
            <h3 class="card-title">Datos generales del cliente</h3>
            <div class="card-tools">
            </div>
          </div>
          <?php //consulto los datos del registro
          $querynegocio="SELECT * from th_usuarios where usr_idUsuario=$idUsuario";
          $resdatos=mysqli_query($con,$querynegocio);
          $regdatos=mysqli_fetch_array($resdatos);
          ?>
          <div class="card-body">


            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre comercial</label>
                  <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $regdatos['usr_nombrenegocio'] ?>" readonly>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contacto</label>
                  <input type="text" class="form-control" id="nombrecompletousr" name="nombrecompletousr" value="<?php echo $regdatos['usr_nombre']; echo " "; echo $regdatos['usr_apellidos'] ?>" readonly>
                </div>
              </div>
            </div>

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de sucursales</label>
                  <input type="text" class="form-control" id="nosucursales" name="nosucursales" placeholder="Total de sucursales">
                  <input type="hidden" class="form-control" id="activarRegistro" name="activarRegistro" value="activarRegistro">
                  <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ticket promedio</label>
                  <input type="text" class="form-control" id="ticket" name="ticket" placeholder="Ticket promedio">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de mesas</label>
                  <input type="text" class="form-control" id="nomesas" name="nomesas" placeholder="Total de mesas">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de empleados</label>
                  <input type="text" class="form-control" id="noempleados" name="noempleados" placeholder="Total de empleados">
                </div>
              </div>
            </div>

          



            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Constancia de situación fiscal (PDF)</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input class="custom-file-input" type="file" id="archivocsf" name="archivocsf" accept=".pdf" required>
                        <label class="custom-file-label" for="customFile">Nombre del archivo</label>
                      </div>
                    </div> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Plazo de pago (días)</label>
                  <input type="text" class="form-control" id="plazopago" name="plazopago" placeholder="Dias de credito del cliente">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Monto autorizado de crédito</label>
                 <input type="text" class="form-control" id="monto" name="monto" placeholder="Monto que se le autorizara al cliente">
                  </div>
        </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Tipo de lista de precios</label>

                  <?php 
                  $query="select * from th_cat_membresias where mem_estatus=1";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="tipocosto" name="tipocosto" required>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['mem_idMembresia'] . '">'.strtoupper($Usuario['mem_nombre']). '</option>';
                                }
                                ?>
                  </select>
                </div>
              </div>
            </div>


<div class="row">
  <legend>Referencias comerciales de la empresa</legend>
    <div class="col-md-12"> 
      <div class="form-group">
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field3">
              <tr>
                <td><b>Proveedor</b></td>
                <td><b>Teléfono</b></td>
                <td><b>Dirección</b></td>
                <td><b>Comentarios</b></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" id="nameref1" name="nameref1" placeholder="Nombre comercial del proveedor"></td>
                <td><input type="text" class="form-control" id="telref1" name="telref1" placeholder="Teléfono de contacto"></td>
                <td><input type="text" class="form-control" id="dirref1" name="dirref1" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                <td><input type="text" class="form-control" id="comment1" name="comment1"></td>
              </tr>
              <tr>
                <td><input type="text" class="form-control" id="nameref2" name="nameref2" placeholder="Nombre comercial del proveedor"></td>
                <td><input type="text" class="form-control" id="telref2" name="telref2" placeholder="Teléfono de contacto"></td>
                <td><input type="text" class="form-control" id="dirref2" name="dirref2" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                <td><input type="text" class="form-control" id="comment2" name="comment2"></td>
              </tr>
            </table>
          </div>        
      </div>
    </div>
  </div>

            <div class="card-footer" id="botonenviar">
            <button type="submit" class="btn btn-success float-right">Terminar registro</button>
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
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Ion Slider -->
<script src="plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<!-- Bootstrap slider -->
<script src="plugins/bootstrap-slider/bootstrap-slider.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    /* BOOTSTRAP SLIDER */
    $('.slider').bootstrapSlider()

    /* ION SLIDER */
    $('#range_1').ionRangeSlider({
      min     : 0,
      max     : 20000,
      from    : 0,
      to      : 20000,
      type    : 'double',
      step    : 1,
      prefix  : '$',
      prettify: false,
      hasGrid : true
    })
    $('#range_2').ionRangeSlider()

    $('#range_5').ionRangeSlider({
      min     : 0,
      max     : 50000,
      type    : 'single',
      step    : 500.0,
      prefix  : '$ ',
      postfix : ' MXN',
      prettify: false,
      hasGrid : true
    })
    $('#range_6').ionRangeSlider({
      min     : -50,
      max     : 50,
      from    : 0,
      type    : 'single',
      step    : 1,
      postfix : '°',
      prettify: false,
      hasGrid : true
    })

    $('#range_4').ionRangeSlider({
      type      : 'single',
      step      : 100,
      postfix   : ' light years',
      from      : 55000,
      hideMinMax: true,
      hideFromTo: false
    })
    $('#range_3').ionRangeSlider({
      type    : 'double',
      postfix : ' miles',
      step    : 10000,
      from    : 25000000,
      to      : 35000000,
      onChange: function (obj) {
        var t = ''
        for (var prop in obj) {
          t += prop + ': ' + obj[prop] + '\r\n'
        }
        $('#result').html(t)
      },
      onLoad  : function (obj) {
        //
      }
    })
  })
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_usuarios.js"></script>
</body>
</html>

