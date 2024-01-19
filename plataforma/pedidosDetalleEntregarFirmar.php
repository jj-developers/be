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
$diaspago=$regpedido['usr_diascredito'];
$hoy=date('Y-m-d');
$fechapago=date("Y-m-d",strtotime($fecha_actual."+ ".$diaspago." days"));
// envio el fomrulario
include('class/entregarPedido.php');
//creamo el objeto de la orde de venta class
$NuUs = new entregarpedido_class();
if ($_POST) {
$NuUs->entregarpedido();
}
?>
<style>
  canvas {
  background-color: #fff;
  border:1px solid;
  border-color: red;
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
                    <small class="float-right">Fecha: <?php 
                     $fechapedido=$regpedido['ped_fechacreado'];
                     setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      $fecha = strftime("%d/%m/%Y", strtotime($fechapedido));
                      echo $fecha; ?></small>
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
                  <b>Fecha:</b> <?php echo $fecha?><br>
                  <b>Notas:</b> <code><?php echo $regpedido['ped_comentarios'] ?></code>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>Sku</th>
                      <th>Producto</th>
                      <th>Precio unitario</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php // recorro los productos del pedido
                      $subtotalnew=0; 
                      $querypro="SELECT * from th_pedidosproductos pp 
                      inner join th_cat_productos pro on pro.pro_idProducto=pp.pedpro_idProducto
                      where pp.pedpro_idPedido=$idPedido and pedpro_estatus=1";
                      $respro=mysqli_query($con,$querypro);
                      while ($regproductos=mysqli_fetch_array($respro)){
                        $subtotal=$regproductos['pedpro_cantidadproducto']*$regproductos['pedpro_costoproducto'];
                        $subtotalnew=$subtotalnew+$subtotal;
                      ?>
                    <tr>
                      <td><?php echo $regproductos['pedpro_cantidadproducto'] ?></td>
                      <td><?php echo $regproductos['pro_sku'] ?></td>
                      <td><?php echo $regproductos['pro_nombreproducto'] ?></td>
                      <td>$<?php echo number_format($regproductos['pedpro_costoproducto'], 2, '.', ',') ?></td>
                      <td>$<?php echo number_format($subtotal, 2, '.', ',') ?></td>
                    </tr>
                  <?php 

                } 
                $queryenv="SELECT env_monto as costoEnvio FROM th_pedidoscostoenvios WHERE $subtotalnew BETWEEN env_minicial AND env_mfinal and env_estatus=1";
                $resenv=mysqli_query($con,$queryenv);
                if ($regenv=mysqli_fetch_array($resenv)){
                  $costoEnvio=$regenv['costoEnvio'];
                
                }
                ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead"></p>
                </div>
                <!-- /.col -->
                <div class="col-6">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td align="right">$<?php echo number_format($subtotalnew, 2, '.', ',') ?></td>
                      </tr>
                      <tr>
                        <th>IVA (16%)</th>
                        <td align="right">$<?php echo number_format($subtotalnew*.16, 2, '.', ',') ?></td>
                      </tr>
                      <tr>
                        <th>Envio</th>
                        <td align="right">$<?php echo number_format($costoEnvio, 2, '.', ',') ?></td>
                      </tr>
                      <tr>
                        <th>Descuento:</th>
                        <td align="right">$0.0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td align="right">$<?php echo number_format($subtotalnew+($subtotalnew*.16)+$costoEnvio, 2, '.', ',') ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          <form id="formfirma" action="" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="col-12">
                   <main class="main-container">                      
                      <center>
                        <b>Firmar aquí de recibido</b><br>
                        <!--canvas id="main-canvas" width="400" height="100"></canvas><br><br>
                        <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $idPedido ?>">
                        <input type="hidden" name="fechapago" id="fechapago" value="<?php echo $fechapago ?>">
                        <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $idPedido ?>">
                        <textarea name="imagenb64" id="imagenb64" hidden></textarea>
                        <input type="hidden" name="entregarPedido" id="entregarPedido" value="entregarPedido">
                        <button type="button" id="btnLimpiar" class="btn btn-info">Borrar firma</button-->
                        <div id="app">
                    <canvas id="canvas" style="border:1px solid red; cursor:crosshair;" width="600" height="400"></canvas>
                    <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $idPedido ?>">
                        <input type="hidden" name="fechapago" id="fechapago" value="<?php echo $fechapago ?>">
                        <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $idPedido ?>">
                        <textarea name="imagenb64" id="imagenb64" hidden></textarea><br>
                  <a id="limpiar" class="btn btn-sm btn-info" style="margin-left:10px; vertical-align: middle;">Borrar firma</i></a>
                  </div>
                      </center>
                  </main>
                  
                  
                </div>
              </div>
<script src="assets/index.js"></script>
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="pedidosDetalleEntregar?idPedido=<?php echo $idPedido?>" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
                  <button type="button" class="btn btn-success float-right" style="margin-right: 5px;" onclick="enviarDatosEntregaPedido()">
                    <i class="fa fa-check"></i> Entregado
                  </button>
                   
                </div>
              </div>
          </form>


                <!-- /.col -->
              </div>

            </div>

            
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_pedidos.js"></script>
</body>
</html>
<script type="text/javascript">
  // envio el pedido cuando ya fue entrehado
function enviarDatosEntregaPedido() {
  //alert('enviamos form');
  const mainCanvas = document.getElementById("canvas");
  let url = mainCanvas.toDataURL('image/png');
  let b64 = url.slice(url.indexOf(',') + 1);
  var idPedido=$('#idPedido').val();
  $("#imagenb64").val(b64);
  var imagenb64=$('#imagenb64').val();
  // envio el form  
  let formulario = document.getElementById('formfirma');
  formulario.submit();
  
}

</script>
