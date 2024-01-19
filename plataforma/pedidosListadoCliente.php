<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idCliente=$_GET['idCliente'];
// consulta para el nombre del cliente
$qrycliente="SELECT * from th_usuarios where usr_idUsuario=$idCliente";
$rescliente=mysqli_query($con,$qrycliente);
$regcliente=mysqli_fetch_array($rescliente);
$hoy=date('Y-m-d');
$criteriofecha='';
$criteriocliente='';
$criterioestatus="where ped_idPedido!=''";
$criterioestatuspendiente="where ped_estatus=8";
$criterioestatusconfirmado="where ped_estatus=7";
$criterioestatusentregado="where ped_estatus=4";
$criterioestatuscancelado="where ped_estatus=5";
// recibo el get
if ($_GET) {
$estatus=$_GET['estatus'];
$fecha=$_GET['fechap'];
$idCliente=$_GET['idCliente'];
  switch ($fecha) {
      case 0:
          $desde=date("Y-m-d",strtotime($hoy."- 0 days"));
          $criteriofecha="and ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 1:
          $desde=date("Y-m-d",strtotime($hoy."- 1 days"));
          $criteriofecha="and ped_fechacreado between '$desde' and '$desde'";
          break;
      case 7:
          $desde=date("Y-m-d",strtotime($hoy."- 7 days"));
          $criteriofecha="and ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 30:
          $desde=date("Y-m-d",strtotime($hoy."- 30 days"));
          $criteriofecha="and ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 97:
          $desde=date("Y-m",strtotime($hoy."- 0 month"));
          $criteriofecha="and ped_fechacreado like '%$desde%'";
          break;
      case 98:
          $desde=date("Y-m",strtotime($hoy."- 1 month"));
          $criteriofecha="and ped_fechacreado like '%$desde%'";
          break;
      case 99:
          $fechahasta=$_GET['fechaFin'];
          $fechadesde=$_GET['fechaInicio'];
          $criteriofecha="and ped_fechacreado between '$fechadesde' and '$fechahasta'";
          break;
  }

  if ($fecha==''){
    $criteriofecha='';
  }

  switch ($estatus) {
      case 8:
          $criterioestatuspendiente="where ped_estatus=8";
          $criterioestatusconfirmado="where ped_estatus=!7";
          $criterioestatusentregado="where ped_estatus=!4";
          $criterioestatuscancelado="where ped_estatus=!5";
      break;

      case 7:
          $criterioestatuspendiente="where ped_estatus=!8";
          $criterioestatusconfirmado="where ped_estatus=7";
          $criterioestatusentregado="where ped_estatus=!4";
          $criterioestatuscancelado="where ped_estatus=!5";
      break;
      case 4:
          $criterioestatuspendiente="where ped_estatus=!8";
          $criterioestatusconfirmado="where ped_estatus=!7";
          $criterioestatusentregado="where ped_estatus=4";
          $criterioestatuscancelado="where ped_estatus=!5";
      break;
      case 5:
          $criterioestatuspendiente="where ped_estatus=!8";
          $criterioestatusconfirmado="where ped_estatus=!7";
          $criterioestatusentregado="where ped_estatus=!4";
          $criterioestatuscancelado="where ped_estatus=5";
      break;
  }

  if ($estatus!=''){
    $criterioestatus="where ped_estatus=$estatus";
  } 

  if ($idCliente==''){
    $criteriocliente="";
  }
  if ($idCliente!=''){
    $criteriocliente="and ped_idCliente=$idCliente";
  }
  



}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Historial de <?php echo $regcliente['usr_nombrenegocio'] ?></h1>
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
          <h3 class="card-title"><font color="#FFF">.</font></h3>
        </div>

        <div class="card-body">
        <form action="" method="GET">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Fecha</label>
                  <div class="input-group">
                    <select class="form-control select2 select2" id="fechap" name="fechap">
                    <option value="">Elige una fecha</option>
                    <option value="0">Hoy</option>
                    <option value="1">Ayer</option>
                    <option value="7">Últimos 7 días</option>
                    <option value="30">Últimos 30 días</option>
                    <option value="97">Mes Actual</option>
                    <option value="98">Mes anterior</option>
                    <option value="99">Rango de fechas</option>
                  </select>
                  <input type="hidden" name="idCliente" id="idcliente" value="<?php echo $idCliente ?>">
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Estatus</label>
                  <div class="input-group">
                    <select class="form-control select2 select2" id="estatus" name="estatus">
                    <option value="">Elige un estatus</option>
                    <option value="8">Pendiente</option>
                    <option value="7">Confirmado</option>
                    <option value="4">Entregado</option>
                    <option value="5">Cancelado</option>
                  </select>
                  </div>                
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label><font color="#FFF">.</font></label>
                  <div class="input-group">
                  <button type="submit" class="btn btn-success">Buscar</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="row" id="divfechas" style="display: none">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Desde</label>
                  <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="fechaInicio" name="fechaInicio" placeholder="Fecha inicial">
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>               
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Hasta</label>
                  <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate2" id="fechaFin" name="fechaFin" placeholder="Fecha final">
                        <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>               
                </div>
              </div>
            </div>
        </div>
      </form>

        <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos FROM th_pedidos $criterioestatus $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos=$regtotal['totalPedidos'];

                      $quertytotal2="SELECT * FROM th_pedidos $criterioestatus $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>
                      
                      <span class="description"><font size="5">Pedidos</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos2 FROM th_pedidos $criterioestatuspendiente $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos2=$regtotal['totalPedidos2'];

                      $quertytotal2="SELECT * FROM th_pedidos $criterioestatuspendiente $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>                      
                      <span class="description"><font size="5">Pendiente</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos2, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos3 FROM th_pedidos $criterioestatusconfirmado $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos3=$regtotal['totalPedidos3'];

                      $quertytotal2="SELECT * FROM th_pedidos $criterioestatusconfirmado $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>                      
                      <span class="description"><font size="5">Confirmado</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos3, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-2 col-6">
                    <div class="description-block  border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos4 FROM th_pedidos $criterioestatusentregado $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos4=$regtotal['totalPedidos4'];

                      $quertytotal2="SELECT * FROM th_pedidos $criterioestatusentregado $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>
                      <span class="description"><font size="5">Entregado</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos4, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 col-6">
                    <div class="description-block  border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos4 FROM th_pedidos $criterioestatuscancelado $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos4=$regtotal['totalPedidos4'];

                      $quertytotal2="SELECT * FROM th_pedidos $criterioestatuscancelado $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>
                      <span class="description"><font size="5">Cancelado</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos4, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
<br><hr>

        <div class="card-body p-0" id="datosListado">
          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>No. Pedido</th>
                      <th>Fecha</th>
                      <th>Fecha de pago</th>
                      <th>Cliente</th>
                      <th>Sucursal</th>
                      <th>Total</th>                      
                      <th>Estatus</th>
                      <th>Comprobante de entrega</th>
                      <th>Pago</th>
                      <th>Comprobante de pago</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                  $hoy=date('Y-m-d');
                  $query = "SELECT * from th_pedidos ped
                  inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
                  inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
                  inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
                  left join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
                  $criterioestatus $criteriofecha $criteriocliente and ped_idCliente=$idCliente
                  ";
                  $res = mysqli_query($con,$query);
                      while ($registro = mysqli_fetch_array($res)) {
                        $fechaparapagar=$registro['ped_fechapago'];
                        $estatus=$registro['ped_estatus'];
                        $idFactura=$registro['fac_idFactura'];
                        if ($estatus==8){$b='warning';}
                        if ($estatus==7){$b='info';}
                        if ($estatus==4){$b='success';}
                        if ($estatus==5){$b='danger';}
                  ?>
                      <tr>
                       <td><a href="pedidosDetalleCompleto?idPedido=<?php echo $registro['ped_idPedido'] ?>">
                        <?php echo $registro['ped_foliopedido'] ?></a></td>
                        <td><?php 
                        $fechapedido=$registro['ped_fechacreado'];
                      setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      $fecha = strftime("%d/%m/%Y", strtotime($fechapedido));
                      echo $fecha ?></td>
                        <td><?php if ($estatus==4){
                        $fechapago=$registro['ped_fechapago'];
                      setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      echo $fecha = strftime("%d/%m/%Y", strtotime($fechapago)); 
                      } ?></td>
                       <td><?php echo $registro['usr_nombrenegocio'] ?></td>
                       <td><?php echo $registro['suc_nombresucursal'] ?></td>
                       <td>$<?php echo number_format($registro['ped_montototal'], 2, '.', ',') ?></td>                       
                       <td><span class="badge badge-<?php echo $b ?>"><?php echo $registro['est_descripcionEstatus'] ?></span></td>
                      <td><?php if ($estatus==4){ ?>
                        <a href="pedidosImprimircompleto?idPedido=<?php echo $registro['ped_idPedido'] ?>" rel="noopener" target="_blank" class="btn btn-block bg-gradient-primary btn-xs"><i class="fas fa-print"></i> Ver</a>
                      <?php } ?>
                      </td>
                       <td>
                         <?php
                         // consulta los pagos
                         $querypago="SELECT * from th_pedidospagos where pag_idFactura=$idFactura";
                         $respagos=mysqli_query($con,$querypago);
                         $regpagos=mysqli_fetch_array($respagos);
                         $pago=$regpagos['pag_filepago'];
                         $estatuspago=$regpagos['pag_estatus']; 

                         if ($estatuspago==7){ ?>
                          <span class="badge badge-success">Pagado</span>

                         <?php } else {
                         if ($estatus==4){
                         if ($hoy<$fechaparapagar) { ?>
                          <span class="badge badge-warning">Por vencer</span>
                         <?php } ?>
                         <?php if ($hoy>=$fechaparapagar) { ?>
                          <span class="badge badge-danger">Vencido</span>
                         <?php } } }  ?>
                       </td>
                       <td>
                         <?php // busco si tiene informacion de pago
                         if ($idFactura!=''){ 
                         $querypago="SELECT * from th_pedidospagos where pag_idFactura=$idFactura";
                         $respagos=mysqli_query($con,$querypago);
                         $regpagos=mysqli_fetch_array($respagos);
                         $pago=$regpagos['pag_filepago']; 
                         if ($pago!=''){
                         ?>
                         <a href="<?php echo $pago ?>" rel="noopener" target="_blank" class="btn btn-block bg-gradient-success btn-xs"><i class="fas fa-file-pdf"></i> Cargado</a>
                         <?php } } ?>
                       </td>
                  </tr>
                <?php } ?>
                  
              </tbody>
          </table>
<div class="card-footer">
          <a href="javascript:history.back()" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
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
          'Hoy'       : [moment(), moment()],
          'Ayer'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Últimos 7 días' : [moment().subtract(6, 'days'), moment()],
          'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
          'Mes actual'  : [moment().startOf('month'), moment().endOf('month')],
          'Mes anterior'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('YYYY-MM-DD') + ' - ' + end.format('YYYY-MM-DD'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'YYYY-MM-DD'
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
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script src="dist/js/funciones_pedidos.js"></script>
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
      "autoWidth": true,
      "responsive": true,
    });
  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>