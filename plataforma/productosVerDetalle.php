<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
include('class/agregarProducto.php');
//creamo el objeto de la orde de venta class
$NuUs = new productos_class();
if ($_POST) {
$NuUs->accionesproductos();
}

$hoy=date('Y-m-d');
$idProducto=$_GET['idProducto'];
$criteriofecha='';
$criteriocliente='';

if ($_GET) {
$idProducto=$_GET['id'];
$fecha=$_GET['fechap'];
$idCliente=$_GET['idCliente'];
  switch ($fecha) {
      case 0:
          $desde=date("Y-m-d",strtotime($hoy."- 0 days"));
          $criteriofecha="and ped.ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 1:
          $desde=date("Y-m-d",strtotime($hoy."- 1 days"));
          $criteriofecha="and ped.ped_fechacreado between '$desde' and '$desde'";
          break;
      case 7:
          $desde=date("Y-m-d",strtotime($hoy."- 7 days"));
          $criteriofecha="and ped.ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 30:
          $desde=date("Y-m-d",strtotime($hoy."- 30 days"));
          $criteriofecha="and ped.ped_fechacreado between '$desde' and '$hoy'";
          break;
      case 97:
          $desde=date("Y-m",strtotime($hoy."- 0 month"));
          $criteriofecha="and ped.ped_fechacreado like '%$desde%'";
          break;
      case 98:
          $desde=date("Y-m",strtotime($hoy."- 1 month"));
          $criteriofecha="and ped.ped_fechacreado like '%$desde%'";
          break;
      case 99:
          $fechahasta=$_GET['fechaFin'];
          $fechadesde=$_GET['fechaInicio'];
          $criteriofecha="and ped.ped_fechacreado between '$fechadesde' and '$fechahasta'";
          break;
  }

  if ($fecha==''){
    $criteriofecha='';
  }

  if ($idCliente==''){
    $criteriocliente="";
  }
  if ($idCliente!=''){
    $criteriocliente="and ped_idCliente=$idCliente";
  }
}
    // CONSULTO EL PRODUCTO
    $querypoducto="SELECT * from th_cat_productos where pro_idProducto=$idProducto";
    $resp=mysqli_query($con,$querypoducto);
    $regprod=mysqli_fetch_array($resp);
    $estatus=$regprod['pro_estatus'];
    echo $estatus;

?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            <h1>Detalle de <?php echo $regprod['pro_nombreproducto'] ?></h1>
          </div>
          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Detalle de producto</li>
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
                  <input type="hidden" class="form-control" id="idProducto" name="idProducto" value="<?php echo $idProducto ?>">
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Cliente</label>
                  <div class="input-group">
                    <select class="form-control select2 select2" data-dropdown-css-class="select2" id="idCliente" name="idCliente">
                                    <option value="">Elige un cliente</option>
                                    <?php
                                    $query="SELECT * from th_usuarios where usr_idRol=1 and usr_estatus=3 and EmailVerificado=1";
                                    $res = mysqli_query($con,$query);
                                    while ($campanas = mysqli_fetch_array($res)) {
                                        echo '<option value='.$campanas['usr_idUsuario'].'>'.$campanas['usr_nombrenegocio'] . '</option>';
                                    }
                                    ?>    
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
              <div class="col-md-2">
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
              <div class="col-md-2">
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
            </form>
        </div>

          

      
          <div class="card card-default" id="datosproducto">
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(pedpro_cantidadproducto) totalPedidos FROM th_pedidosproductos pp
                                inner join th_pedidos ped on ped.ped_idPedido=pp.pedpro_idPedido where pedpro_estatus!=5 and pedpro_idProducto=$idProducto $criteriofecha $criteriocliente";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos=$regtotal['totalPedidos'];
                      if ($totalpedidos==''){$totalpedidos=0;}
                      ?>
                      
                      <span class="description"><font size="5">Piezas vendidas</font></span>
                      <h5 class="description-header"><?php echo $totalpedidos ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php 
                      $quertytotal2="SELECT distinct(pedpro_idPedido) FROM th_pedidosproductos pp
                                inner join th_pedidos ped on ped.ped_idPedido=pp.pedpro_idPedido
                                where pedpro_estatus!=5 and pedpro_idProducto=$idProducto $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>                      
                      <span class="description"><font size="5">Pedidos</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal2="SELECT sum(pedpro_cantidadproducto*pedpro_costoproducto) totalPedidos FROM th_pedidosproductos pp
                        inner join th_pedidos ped on ped.ped_idPedido=pp.pedpro_idPedido
                        where pedpro_estatus!=5 and pedpro_idProducto=$idProducto $criteriofecha $criteriocliente";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_fetch_array($restotal2);
                      $totalpedidos2=$regtotal2['totalPedidos']

                      ?>                      
                      <span class="description"><font size="5">Total vendidos</font></span>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos2, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>

                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                    <?php // TOTAL DE PEDIDOS
                      $quertyinventario="SELECT inv_cantidad FROM th_inventario where inv_idProducto=$idProducto and inv_estatus=1";
                      $resinventario=mysqli_query($con,$quertyinventario);
                      $reginventario=mysqli_fetch_array($resinventario);
                      $totalinventario=$reginventario['inv_cantidad']

                      ?>                      
                      <span class="description"><font size="5">Existencias</font></span>
                      <h5 class="description-header"><?php echo $totalinventario ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  
                </div>
                <!-- /.row -->
              </div>


          <div class="card-body">

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Nombre del producto</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="nombreproducto" name="nombreproducto" value="<?php echo $regprod['pro_nombreproducto'] ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>SKU</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="sku" name="sku" value="<?php echo $regprod['pro_sku'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Tags</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="tags" name="tags" value="<?php echo $regprod['pro_tags'] ?>">
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Estatus</label>
                   
                  <select class="form-control select2 select2" id="estatus" name="estatus">
                    <?php if ($estatus==1){ ?>
                          <option value="1">Activado</option>
                          <option value="5">Desactivado</option>
                      <?php } else {?>
                          <option value="5">Desactivado</option>
                          <option value="1">Activado</option>
                      <?php } ?>

                  </select> 
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Categoría</label>
                  <?php
                  $idcategoria=$regprod['pro_idCategoria']; 
                  $query="select * from th_cat_categorias where cat_nombrecategoria='$idcategoria'";
                  $res = mysqli_query($con,$query);

                   
                  $query2="select * from th_cat_categorias where cat_nombrecategoria!='$idcategoria'";
                  $res2 = mysqli_query($con,$query2);
                  ?>
                  <select class="form-control select2 select2" id="categoriaupd" name="categoriaupd">
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['cat_idCategoria'] . '">'.$Usuario['cat_nombrecategoria']. '</option>';
                                }
                                ?>
                                 <?php
                                while ($Usuario2 = mysqli_fetch_array($res2)) {
                                    echo '<option value="' . $Usuario2['cat_idCategoria'] . '">'.$Usuario2['cat_nombrecategoria']. '</option>';
                                }
                                ?>

                  </select>
                  <input type="hidden" id="actualizarProducto" name="actualizarProducto" value="actualizarProducto"> 
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Sub Categoría</label>
                  <?php
                  $idsubcategoria=$regprod['pro_idSubcategoria']; 
                  $query2="select * from th_cat_subcategorias where subcat_nombresubcategoria='$idsubcategoria'";
                  $res2 = mysqli_query($con,$query2);
                  ?>
                  <select class="form-control select2 select2" id="subcategoriaupd" name="subcategoriaupd">
                                <?php
                                while ($Usuario2 = mysqli_fetch_array($res2)) {
                                    echo '<option value="' . $Usuario2['subcat_idSubCategoria'] . '">'.strtoupper($Usuario2['subcat_nombresubcategoria']). '</option>';
                                }
                                ?>

                  </select>               
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $regprod['pro_marca'] ?>" >              
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Oro</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="costooro" name="costooro" value="<?php echo $regprod['pro_preciooro'] ?>" >
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Premium</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="costopremium" name="costopremium" value="<?php echo $regprod['pro_preciopremium'] ?>" >
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Precio Platinium</label>
                  <div class="input-group">
                    <input type="number" class="form-control" id="costoplatinium" name="costoplatinium" value="<?php echo $regprod['pro_precioplatino'] ?>" >
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Descripción del producto</label>
                  <div class="input-group">
                    <textarea class="form-control" rows="3" id="descripcion" name="descripcion" ><?php echo $regprod['pro_descripcion'] ?></textarea>
                  </div>
                </div>
              </div>
              
            </div>


            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Imagen</label>
                  <div class="input-group">
                        <img src="<?php echo $regprod['pro_imagen'] ?>" width="250px" height="150px">
                    </div> 
                    <div class="input-group">
                      <button type="button" class="btn btn-danger float-right" onclick="eliminarImagenPro()">Eliminar Imagen</button>
                    </div> 
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Cambiar imagen</label>
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" id="archivofoto" name="archivofoto" accept="image/*">
                      </div>
                    </div> 
                    

                    
                </div>
              </div>
            </div>

            <hr color="red">
    <?php
    // CONSULTO EL PRECIO DE LOS PAQUETES
    $querypaqpoducto="SELECT * from th_productospaquetesprecios where propaq_idProducto=$idProducto";
    $respp=mysqli_query($con,$querypaqpoducto);
    $rowpro=mysqli_num_rows($respp);
    if ($rowpro>=1){  
    ?>
 <div class="row" id="tablapaquetes">
    <div class="col-md-12"> 
      <legend>Paquetes</legend>
      <div class="form-group">
          <div class="table-responsive">
            <table class="table table-bordered" id="datospaquetes">
              <tr>
                <td><b>Cantidad y descripción</b></td>
                <td><b>Precio</b></td>
              </tr>
              <?php while ($regppprod=mysqli_fetch_array($respp)){ ?>
              <tr>
                <td><input type="text" class="form-control" name="cantidadpaq[]" value="<?php echo $regppprod['propaq_cantidadpaq'] ?>" ></td>
                <td><input type="text" class="form-control" name="costopaq[]" value="<?php echo $regppprod['propaq_costopaq'] ?>" ></td>
              </tr>
            <?php } ?>
            </table>
          </div>        
      </div>
    </div>
  </div><?php } else { ?>
  <div class="row" id="tablapaquetes">
    <div class="col-md-12"> 
      <legend>Paquetes</legend>
      <div class="alert alert-warning alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Aviso!</h5>
                  El producto no cuenta con paquetes relacionados
                </div>
    </div>
  </div>  
  <?php } ?>
  <div class="card-footer" id="botonenviar">
    <a href="javascript:history.back()" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-edit"></i> Regresar</a>
            <button type="submit" class="btn btn-success float-right">Guardar Datos</button>
          </div>
            </div>
          </div>
        </div>
        </div>                
    </section>
    </form>
  </div>

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

