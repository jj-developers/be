<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idUsuario=$_GET['idCliente'];
include('class/activarRegistroCliente.php');
$NuUs=new activarRegistro_class();
if ($_POST) {
$NuUs->accionesCliente();
}
          $querynegocio="SELECT * from th_usuarios u
          where u.usr_idUsuario=$idUsuario";
          $resdatos=mysqli_query($con,$querynegocio);
          $regdatos=mysqli_fetch_array($resdatos);
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
            <h1>Detalle de <?php echo $regdatos['usr_nombrenegocio'] ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Thirsty</a></li>
              <li class="breadcrumb-item active">Detalle de Clientes</li>
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

          ?>
          <div class="card-body">


            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre del negocio</label>
                  <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $regdatos['usr_nombrenegocio'] ?>" >
                  <input type="hidden" class="form-control" id="actualizarRegistro" name="actualizarRegistro" value="actualizarRegistro">
                  <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $idUsuario ?>">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" class="form-control" id="nombreusr" name="nombreusr" value="<?php echo $regdatos['usr_nombre']; ?>" >
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Apellido(s)</label>
                  <input type="text" class="form-control" id="apellidousr" name="apellidousr" value="<?php echo $regdatos['usr_apellidos'] ?>" >
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Teléfono de contacto</label>
                  <input type="number" class="form-control" maxlength="10" id="telefono" name="telefono" value="<?php echo $regdatos['usr_telefono'] ?>" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Puesto</label>
                  <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $regdatos['usr_puesto'] ?>" >
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $regdatos['usr_email'] ?>" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Giro comercial</label>
                  <?php
                  $giroempresa=$regdatos['usr_giroempresa'];
                  $query="select * from th_cat_girosempresas where giremp_idGiro=$giroempresa";
                  $res = mysqli_query($con,$query);
                  $query2="select * from th_cat_girosempresas where giremp_idGiro!=$giroempresa";
                  $res2 = mysqli_query($con,$query2);
                  ?>
                  <select class="form-control select2 select2" id="giroempresa" name="giroempresa">
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['giremp_idGiro'] . '">'.strtoupper($Usuario['giremp_nombre']). '</option>';
                                }
                                ?>
                                <?php
                                while ($Usuario2 = mysqli_fetch_array($res2)) {
                                    echo '<option value="' . $Usuario2['giremp_idGiro'] . '">'.strtoupper($Usuario2['giremp_nombre']). '</option>';
                                }
                                ?>
                  </select>               
                </div>
              </div>
            </div>

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de Sucursales</label>
                  <input type="text" class="form-control" id="nosucursales" name="nosucursales" value="<?php echo $regdatos['usr_nosucursales']  ?>" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ticket promedio</label>
                  <input type="text" class="form-control" id="ticket" name="ticket" value="<?php echo $regdatos['usr_ticketpromedio']  ?>" >
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de mesas</label>
                  <input type="text" class="form-control" id="nomesas" name="nomesas" value="<?php echo $regdatos['usr_numeromesas']  ?>" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Número de empleados</label>
                  <input type="text" class="form-control" id="noempleados" name="noempleados" value="<?php echo $regdatos['usr_numeroempleados']  ?>" >
                </div>
              </div>
            </div>

          



            <div class="row">
              <div class="col-md-2">
                <div class="form-group">
                  <label>Ver CSF</label>
                  <div class="input-group">
                      <a class="btn btn-app" href="../<?php echo $regdatos['usr_archivocsf'] ?>" target="_new"><i class="fas fa-file-pdf"></i>Ver</a>
                    </div> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Actualizar CSF</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input class="custom-file-input" type="file" id="archivocsf" name="archivocsf" accept=".pdf">
                        <label class="custom-file-label" for="customFile">Nombre del archivo</label>
                      </div>
                    </div> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Plazo de pago (días)</label>
                  <input type="text" class="form-control" id="plazopago" name="plazopago" value="<?php echo $regdatos['usr_diascredito']  ?>" >
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Monto autorizado de crédito</label>
                 <input type="text" class="form-control" id="monto" name="monto" value="<?php echo $regdatos['usr_montocredito'] ?>" >
                  </div>
        </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Lista de precios</label>
                  <?php 
                  $idMembresia=$regdatos['usr_tipocosto'];
                  $query="select * from th_cat_membresias where mem_idMembresia=$idMembresia";
                  $res = mysqli_query($con,$query);
                  $totallista=mysqli_num_rows($res);
                  // la otra lista
                  $query2="select * from th_cat_membresias where mem_idMembresia!=$idMembresia";
                  $res2 = mysqli_query($con,$query2);
                  if ($totallista!=''){
                  ?>
                  <select class="form-control select2 select2" id="tipocosto" name="tipocosto" required>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['mem_idMembresia'] . '">'.strtoupper($Usuario['mem_nombre']). '</option>';
                                }
                                ?>
                                <?php
                                while ($Usuario2 = mysqli_fetch_array($res2)) {
                                    echo '<option value="' . $Usuario2['mem_idMembresia'] . '">'.strtoupper($Usuario2['mem_nombre']). '</option>';
                                }
                                ?>
                  </select>
                <?php } else { ?><br>
                  Aún no se tiene asignada una lista de precios.  
                <?php } ?>
                </div>
              </div>
            </div>
            
           <div class="row">
              <div class="col-md-6">
                <label>Estatus</label>
                <div class="form-group">
                  <select class="form-control select2 select2" id="estatus" name="estatus" required>
                    <?php if ($regdatos['usr_estatus']!=5){ ?>
                        <option value="3">Activado</option>
                        <option value="5">Desactivado</option>
                    <?php } else {?>
                      <option value="5">Desactivado</option>
                      <option value="3">Activado</option>
                    <?php } ?>
                  </select>
                  </div>
            </div>
          </div>
          

<div class="row">
  <legend>Referencias comerciales</legend>
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
                <td><?php echo $regdatos['usr_nombrereferencia'] ?></td>
                <td><?php echo $regdatos['usr_telefonoreferencia'] ?></td>
                <td><?php echo $regdatos['usr_dirreferencia'] ?></td>
                <td><?php echo $regdatos['usr_comreferencia'] ?></td>
              </tr>
              <tr>
                <td><?php echo $regdatos['usr_nombrereferencia2'] ?></td>
                <td><?php echo $regdatos['usr_telefonoreferencia2'] ?></td>
                <td><?php echo $regdatos['usr_dirreferencia2'] ?></td>
                <td><?php echo $regdatos['usr_comreferencia2'] ?></td>
              </tr>
            </table>
          </div>        
      </div>
    </div>
  </div>

  <div class="row">
  <legend>Sucursales</legend>
    <div class="col-md-12"> 
      <div class="form-group">
          <div class="table-responsive">
            <table class="table table-bordered" id="dynamic_field3">
              <tr>
                <td><b>Nombre de Sucursal</b></td>
                <td><b>Contacto</b></td>
                <td><b>Teléfono</b></td>
                <td><b>Dirección</b></td>
                <td><b>Ubicación</b></td>
              </tr>
              <?php 
                  $queryl="select * from th_usuariossucursales where suc_idCliente=$idUsuario";
                  $resl=mysqli_query($con,$queryl);
                  while ($regsucursales = mysqli_fetch_array($resl)) {
                  ?>
              <tr>
                <td><b><?php echo $regsucursales['suc_nombresucursal'] ?></b></td>
                <td><?php echo $regsucursales['suc_contactosucursal'] ?></td>
                <td><?php echo $regsucursales['suc_telefono'] ?></td>
                <td><?php echo $regsucursales['suc_direccion']; ?></td>
                <td><a class="btn btn-warning" href="https://www.google.com/maps/place/<?php echo $regsucursales['suc_direccion']; ?>/@<?php echo $regsucursales['suc_latitud']; echo ","; echo $regsucursales['suc_longitud']; ?>,16z" target="_new">
                  <i class="fas fa-map-marker"></i> Ver Mapa
                </a>
                </td>
              </tr>
            <?php } ?>
            </table>
          </div>        
      </div>
    </div>
  </div>

  <div class="card-footer" id="botonenviar">
            <button type="submit" class="btn btn-success float-right">Guardar Cambios</button>
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

