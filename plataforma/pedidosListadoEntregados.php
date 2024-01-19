<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pedidos Entregados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Pedidos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>  

    <!-- Main content -->
    <section class="content">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Listado de pedidos por cobrar</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>


        <div class="card-body p-0" id="datosListado">
        <div style="overflow-x: scroll;">

          <table id="" class="table table-bordered table-striped">
              <thead>
                  <tr>
                    <td align="center"><b>Pedido</b></td>
                    <td align="center"><b>Fecha</b></td>
                    <td align="center"><b>Fecha de vencimiento</b></td>
                    <td align="center"><b>Cliente</b></td>
                    <td align="center"><b>Sucursal</b></td>
                    <td align="center"><b>Total</b></td>
                    <td align="center"><b>Estatus</b></td>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * from th_pedidos ped
                  inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
                  inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
                  inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
                  inner join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
                  where ped.ped_estatus=4 and fac_idFactura not in (SELECT pag_idFactura from th_pedidospagos where pag_estatus=7)";
                  $res = mysqli_query($con,$query);
                      while ($registro = mysqli_fetch_array($res)) {
                        $estatus=$registro['ped_estatus'];
                        if ($estatus==4){$b='success';}
                  ?>
                      <tr>
                       <td><a href="pedidosDetalleEntregados?idPedido=<?php echo $registro['ped_idPedido'] ?>"><b>
                        <?php echo $registro['ped_foliopedido'] ?></b></a></td>
                        <td><?php 
                        $fechapedido=$registro['ped_fechacreado'];
                      setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      $fecha = strftime("%d/%m/%Y", strtotime($fechapedido));
                      echo $fecha ?></td>
                        <td><?php 
                        $fechapago=$registro['ped_fechapago'];
                      setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      echo $fecha = strftime("%d/%m/%Y", strtotime($fechapago)); ?></td>
                       <td><?php echo $registro['usr_nombrenegocio'] ?></td>
                       <td><?php echo $registro['suc_nombresucursal'] ?></td>
                       <td>$<?php echo number_format($registro['ped_montototal'], 2, '.', ',') ?></td>                       
                       <td><span class="badge badge-<?php echo $b ?>"><?php echo $registro['est_descripcionEstatus'] ?></span></td>
                  </tr>
                <?php } ?>
                  
              </tbody>
          </table>
          </div>


<div class="row no-print">
                <div class="col-12">
                  <a href="dashboard" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
              </div>
        </div>
      
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
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

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
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
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>

<?php if ($_GET['response']=='true'){ ?>
    <script type="text/javascript">
    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 5000
                    });

                    $(document).ready(function() {
                      Toast.fire({
                        icon: 'success',
                        title: 'El pedido fue entregado al cliente se continua con el proceso del pedido'
                      })
                    });
  </script>
<?php } ?>