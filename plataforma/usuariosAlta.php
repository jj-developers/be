<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alta y Edición de Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Alta de clientes</li>
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
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nombre comercial</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" placeholder="Nombre comercial del Negocio"><span class="input-group-append">
                    <button type="button" class="btn btn-success btn-flat" onclick="buscaUsuarioRegistrado()">Buscar / Agregar</button>
                  </span>
                  </div>
                  <div class="row no-print">
                <div class="col-12">
                  <a href="dashboard" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
              </div>
        </div>                
                </div>
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

          <div class="card card-default" id="datosDomicilio" style="display: none">
          <div class="card-header">
            <h3 class="card-title">Datos generales del cliente</h3>
            <div class="card-tools">
            </div>
          </div>
          <div class="card-body">

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Perfil de usuario</label>
                  <?php 
                  $query="select * from th_cat_usuariosroles where rol_estatus=1 and rol_id not in (2,3) ORDER BY rol_descripcion";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="rol" name="rol" required>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['rol_id'] . '">'.$Usuario['rol_descripcion']. '</option>';
                                }
                                ?>                                
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fecha de registro</label>
                  <input type="text" class="form-control" id="fechareg" name="fechareg" value="<?php echo date('Y-m-d') ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" class="form-control" id="nombreusr" name="nombreusr" placeholder="Nombre del usuario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apellido(s)</label>
                  <input type="text" class="form-control" id="apellidosusr" name="apellidosusr" placeholder="Apellidos del usuario" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Teléfono de contacto</label>
                  <input type="number" class="form-control" maxlength="10" id="telefono" name="telefono" placeholder="Telefono de Contacto" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Puesto</label>
                  <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto que ocupa en la empresa">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email de Contacto, sirve de acceso a plataforma" onchange="validaUsuario()" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Giro comercial</label>
                  <?php 
                  $query="select * from th_cat_girosempresas where giremp_estatus=1 ORDER BY giremp_nombre";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="giroempresa" name="giroempresa">
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['giremp_idGiro'] . '">'.strtoupper($Usuario['giremp_nombre']). '</option>';
                                }
                                ?>
                  <option value="otro">OTRO</option>
                  </select>               
                </div>
              </div>
            </div>

            <div class="row" id="otrogirodiv" style="display: none">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="otrogiro" name="otrogiro" placeholder="Escribe tu giro de negocio" >
                </div>
              </div>
            </div>

            <hr color="red">

           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="******">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Confirmar Contraseña</label>
                  <input type="password" class="form-control" id="contrasenar" name="contrasenar" placeholder="******" required>            
                </div>
              </div>
            </div>

            <div class="card-footer" id="botonenviar" style="display:none">
            <button type="button" class="btn btn-success" onclick="registraUsuario()">Guardar registro</button>
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
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_usuarios.js"></script>
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
        title: ' El usuario se genero correctamente, ya esta listo para asignacioón de cursos'
      })
    });
    });
</script>
<?php } ?>

