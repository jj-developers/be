<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idPedido=$_GET['idPedido'];
// consulto los datos del pedido
$querypedido="SELECT * from th_pedidos ped
inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
inner join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
where ped.ped_idPedido=$idPedido";
$respedido=mysqli_query($con, $querypedido);
$regpedido=mysqli_fetch_array($respedido);
$idFactura=$regpedido['fac_idFactura'];
$idCliente=$regpedido['ped_idCliente'];
$montopedido=$regpedido['ped_montototal'];

$querypag="SELECT * from th_pedidospagos pg 
where pg.pag_idFactura=$idFactura";
$respag=mysqli_query($con,$querypag);
$regpagos=mysqli_fetch_array($respag);
$pagoestatus=$regpagos['pag_estatus'];
$archivopago=$regpagos['pag_filepago'];
$idPago=$regpagos['pag_idPago'];
?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <form action="" method="POST">
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
                <div class="col-sm-12">
            <div class="callout callout-danger">
                  <h5>Datos del pago</h5>

                  <p>Dar clic en el botón para visualizar el comprobante de pago que envió el cliente. 
                    </p>
              <div class="card-body">
                <a href="<?php echo $archivopago ?>" class="btn btn-app" target="_new">
                  <i class="fas fa-bullhorn"></i> Ver comprobante
                </a>
                <input type="hidden" name="idPago" id="idPago" value="<?php echo $idPago ?>">
                <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $idPedido ?>">
                <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente ?>">
                <input type="hidden" name="montopedido" id="montopedido" value="<?php echo $montopedido ?>">
              </div>

                    <div class="card-footer">
<a href="javascript:history.back()" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
            <button type="button" class="btn btn-success float-right" onclick="aceptarPago()">Aceptar pago</button>
          </div>
          </div>
                </div>
                
              </div>
              <!-- /.row -->

              
              <!-- /.row -->
         


                <!-- /.col -->
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
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_pedidos.js"></script>
</body>
</html>
