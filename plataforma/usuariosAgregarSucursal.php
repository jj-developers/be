<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idUsuario=$_GET['idCliente'];
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
      #map {
        height: 500px;
        width: 100%;
      }
</style>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Alta de Sucursal</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Thirsty</a></li>
              <li class="breadcrumb-item active">Alta de Sucursales para Clientes</li>
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
            <h3 class="card-title">Datos generales del cliente para el registro</h3>
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
                  <label>Cliente</label>
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
                  <label>Nombre de la sucursal</label>
                  <input type="text" class="form-control" id="nombresucursal" name="nombresucursal" placeholder="Nombre con el que se identifica la sucursal. Ejemplo:  Suc. Centro">
                  <input type="hidden" class="form-control" id="altaSucursal" name="altaSucursal" value="altaSucursal">
                  <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="<?php echo $idUsuario ?>">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contacto de sucursal</label>
                  <input type="text" class="form-control" id="contactosuc" name="contactosuc" placeholder="Nombre completo de la persona con la cual se puede comunicar a la sucursal">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" class="form-control" id="telefonosuc" name="telefonosuc" placeholder="Teléfono de la sucursal">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Email de la sucursal </label>
                  <input type="text" class="form-control" id="emailsuc" name="emailsuc" placeholder="Email de la sucursal, en caso de tenerlo">
                </div>
              </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                <div class="form-group">
                <label>Dirección</label>
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Captura la direccion de la sucursal">
                  <input type="hidden" class="form-control" id="latitud" name="latitud" >
                  <input type="hidden" class="form-control" id="longitud" name="longitud">
              </div>
              </div>
            </div>

            <div class="row">
               <div class="col-md-12">
                <div class="form-group">
                  <div id="map"></div>
                  <script>

                    function iniciarMap(){
                    var coord = {lat:19.42847 ,lng: -99.12766};
                    var map = new google.maps.Map(document.getElementById('map'),{
                      zoom: 12,
                      center: coord
                    });
                    var marker = new google.maps.Marker({
                      position: coord,
                      map: map
                    });
                    iniciarautocomplete()                   
                    }

                    var searchInput = 'direccion';
                    
                    $(document).ready(function () {
                     var autocomplete;
                     autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                      types: ['geocode'],
                      componentRestrictions: {
                       country: "MEX"
                      }
                     }); 
                     google.maps.event.addListener(autocomplete, 'place_changed', function () {
                      var near_place = autocomplete.getPlace();                      
                       var map2 = new google.maps.Map(document.getElementById('map'),{
                        zoom: 16,
                        center: near_place.geometry.location
                    });
                      var marker2 = new google.maps.Marker({
                      position: near_place.geometry.location,
                      map: map2
                      });
                      $('#latitud').val(near_place.geometry.location.lat);
                      $('#longitud').val(near_place.geometry.location.lng);
                    });
                  });
                  </script>
                <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCc8JXHTWeK1HLEkH0-ayrxBZTBp90BPB4&callback=iniciarMap"></script>
                  
                </div>
              </div>
            </div>

            
            <div class="card-footer" id="botonenviar">
              <a href="usuariosAlta" rel="noopener" class="btn btn-warning float-right" style="margin-right: 5px;"><i class="fas fa-edit"></i> Regresar</a>
            <button type="button" class="btn btn-success float-right" style="margin-right: 5px;" onclick="generarSucursal()">Crear sucursal</button>
            
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
