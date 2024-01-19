<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idPedido=$_GET['idPedido'];
// consulto los datos del pedido
$querypedido="SELECT * from th_pedidos ped
inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
where ped.ped_idPedido=$idPedido";
$respedido=mysqli_query($con, $querypedido);
$regpedido=mysqli_fetch_array($respedido);

include('class/pedidosEditar.php');
$NuUs = new accionesPedido_class();
if ($_POST) {
$NuUs->accionesPedidos();
}
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
      #map {
        height: 500px;
        width: 100%;
      }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalle de pedido</h1>
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

    <form action="" method="POST" enctype="multipart/form-data">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> <a href="#"><?php echo $regpedido['ped_foliopedido'] ?></a>
                    <small class="float-right">Fecha: <?php $fechapedido=$regpedido['ped_fechacreado'];
                     setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      echo $fecha = strftime("%d/%m/%Y", strtotime($fechapedido)); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <font color="#0386FB">Datos del cliente</font>
                  <address>
                    <strong><?php echo strtoupper($regpedido['usr_nombrenegocio']) ?></strong><br>
                    <?php echo strtoupper($regpedido['usr_nombre']) ?> <?php echo strtoupper($regpedido['usr_apellidos']) ?><br>
                    Teléfono: <?php echo $regpedido['usr_telefono'] ?><br>
                    Email: <?php echo $regpedido['usr_email'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <font color="#0386FB">Datos de entrega</font>
                  <address>
                    <strong><?php echo $regpedido['suc_nombresucursal'] ?></strong><br>
                    <?php echo $regpedido['suc_direccion'] ?><br>
                    Teléfono: <?php echo $regpedido['suc_telefono'] ?><br>
                    Email: <?php echo $regpedido['suc_email'] ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <font color="#0386FB">Datos del pedido</font><br>
                  <b>Pedido:</b> <?php echo $regpedido['ped_foliopedido'] ?><br>
                  <b>Fecha:</b> <?php echo $fecha ?><br>
                  <b>Notas:</b> <code><?php echo $regpedido['ped_comentarios'] ?></code>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive" id="datosproductospedido">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>SKU</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Subtotal</th>
                      <th><input type="hidden" id="montototal" name="montototal" value="<?php echo $regpedido['ped_montototal'] ?>"><input type="hidden" id="idCliente" name="idCliente" value="<?php echo $regpedido['ped_idCliente'] ?>"></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php // recorro los productos del pedido
                      $subtotalnew=0; 
                      $querypro="SELECT pp.pedpro_idProductopedido, pp.pedpro_cantidadproducto, pro.pro_sku, pro.pro_nombreproducto, pp.pedpro_costoproducto 
                      from th_pedidosproductos pp 
                      inner join th_cat_productos pro on pro.pro_idProducto=pp.pedpro_idProducto
                      where pp.pedpro_idPedido=$idPedido and pp.pedpro_estatus=1";
                      $respro=mysqli_query($con,$querypro);
                      while ($regproductos=mysqli_fetch_array($respro)){
                        $datos=$regproductos[0]."||".
                                     $regproductos[1]."||".
                                     $regproductos[2]."||".
                                     $regproductos[3]."||".
                                     $regproductos[4]."||".
                                     $regproductos[5];
                        $subtotal=$regproductos['pedpro_cantidadproducto']*$regproductos['pedpro_costoproducto'];
                        $subtotalnew=$subtotalnew+$subtotal;
                      ?>
                    <tr>
                      <td><input type="hidden" class="form-control" id="idpropedido" name="idpropedido[]" value="<?php echo $regproductos['pedpro_idProductopedido'] ?>">
                      <input type="text" class="form-control" id="cantidadpropedido" name="cantidadpropedido[]" value="<?php echo $regproductos['pedpro_cantidadproducto'] ?>"></td>
                      <td><?php echo $regproductos['pro_sku'] ?></td>
                      <td><?php echo $regproductos['pro_nombreproducto'] ?></td>
                      <td><input type="text" class="form-control" id="precioprop" name="precioprop[]" value="<?php echo $regproductos['pedpro_costoproducto'] ?>"></td>
                      <td>$<?php echo number_format($subtotal, 2, '.', ',') ?></td>
                      <td><button type="button" class="btn btn-danger float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#cancelarPedido" onclick="agregaform('<?php echo $datos ?>')">
                    <i class="fas fa-times"></i>
                  </button></td>
                    </tr>
                  <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">Productos</label>
                  <?php
                                $query="SELECT * from th_cat_productos as a  where a.pro_estatus=1";
                                $res = mysqli_query($con,$query);
                                ?>
                                <select class="form-control select2 select2" data-dropdown-css-class="select2" id="pro_idProducto" name="pro_idProducto">
                                    <option value="">- Selecciona un SKU -</option>
                                    <?php
                                    while ($campanas = mysqli_fetch_array($res)) {
                                        echo '<option value='.$campanas['pro_idProducto'].'>'.$campanas['pro_sku'] . ' / '.$campanas['pro_nombreproducto'] . ' </option>';
                                    }
                                    ?>    
                                </select>
                                <input type="hidden" class="form-control" id="idPedido" name="idPedido" value="<?php echo $idPedido ?>">
                                <input type="hidden" class="form-control" id="editaPedido" name="editaPedido" value="editaPedido">
                                <input type="hidden" class="form-control" id="sku" name="sku">
                                <input type="hidden" class="form-control" id="nombreproducto" name="nombreproducto">
                                <input type="hidden" class="form-control" id="prodescripcion" name="prodescripcion">
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                  <label>Cantidad</label>
                  <select class="form-control select2 select2" data-dropdown-css-class="select2" id="cantidadP" name="cantidadP">
                                <?php
                                for ($i = 1; $i <= 150; $i++) {
                                    echo "<option>".$i."</option>";
                                }
                                ?>
                            </select>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>Precio</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="text" class="form-control" id="precioP" name="precioP">
                      </div>
                    </div>
                  </div>
            </div>
          </div>

          <div class="card-footer">
            <button type="button" rel="noopener" class="btn btn-danger float-right" style="margin-right: 5px;" onclick="eliminarFila()">Eliminar último</button>
            <button type="button" rel="noopener" class="btn btn-success float-right" style="margin-right: 5px;" onclick="agregarFila()">Agregar</button>
            
          </div>

          <div class="row">
      <div class="col-md-12">
          <table class="table table-bordered" id="tablaProductosPedidos">
                        <thead>
                            <th>Cantidad</th>
                            <th>SKU</th>
                            <th>Producto</th>
                            <th>Precio unitario</th>
                            <th>Total</th>
                        </thead>
                        <tbody>
                          <tr>                             
                          </tr>
                        </tbody>
          </table>
        </div>
        </div>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  
                  <a href="pedidosDetalle?idPedido=<?php echo $idPedido?>" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
                  <button type="submit" class="btn btn-success float-right" style="margin-right: 5px;"><i class="far fa-credit-card"></i> Guardar cambios
                  </button>
                </div>
              </div>
            </div>
            
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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

<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/funciones_pedidos.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
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
</body>
</html>

<div id="cancelarPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header"><b>ELIMINAR PRODUCTO DEL PEDIDO</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <blockquote class="quote-danger">
                  <p>¿Estás seguro que deseas eliminar el Producto?</p>
                  <a href="#" target="_new"><small>Al eliminar el producto no se elimina el pedido complemente solo se elimina el producto del pedido</small></a>
                </blockquote>
                  </div>
              <input type="hidden" id="totalactual" name="totalactual" value="<?php echo $regpedido['ped_montototal'] ?>">
              <input type="hidden" class="form-control" id="idPedidoPP" name="idPedidoPP" value="<?php echo $idPedido ?>">
              <input type="hidden" class="form-control" id="idProductoCancelar" name="idProductoCancelar" >
              <input type="hidden" class="form-control" id="idClientePP" name="idClientePP" value="<?php echo $regpedido['ped_idCliente'] ?>">
              <button type="button" class="btn btn-danger" onclick="eliminarProductoPedido()">Eliminar producto</button> 
        </div>

        
      </div>
    </div>
  </div>
