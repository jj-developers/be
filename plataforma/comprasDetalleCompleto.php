<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
$idCompra=$_GET['idCompra'];
$foliocompra=$_GET['foliocompra'];
// consulto los datos del pedido
$querypedido="SELECT * from th_compras com
INNER JOIN th_proveedores pro on pro.prov_idProveedor=com.com_idProveedor
INNER JOIN th_comprasdestinos des on des.comdes_idDestino=com.com_destino
where com.com_consecutivo=$idCompra";
$respedido=mysqli_query($con, $querypedido);
$regpedido=mysqli_fetch_array($respedido);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalle de compra</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Compras</li>
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
                    <i class="fas fa-globe"></i> <a href="#"><?php echo $regpedido['com_foliointerno'] ?></a>
                    <small class="float-right">Fecha: <?php 
                     $fechapedido=$regpedido['com_fecha'];
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
                  <font color="#0386FB">Datos del proveedor</font>
                  <address>
                    <strong><?php echo strtoupper($regpedido['prov_nombreproveedor']) ?></strong><br>
                    <?php echo strtoupper($regpedido['prov_nombrecontacto']) ?><br>
                    Teléfono: <?php echo $regpedido['prov_telefono'] ?><br>
                    Email: <?php echo $regpedido['prov_email'] ?>
                  </address>
                </div>
                
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <font color="#0386FB">Datos de la compra</font><br>
                  <b>Compra:</b> <?php echo $regpedido['com_foliocompra'] ?><br>
                  <b>Fecha:</b> <?php echo $fecha ?><br>
                </div>
                <div class="col-sm-4 invoice-col">
                  <font color="#0386FB">Ubicación del producto</font><br>
                  <b>Lugar:</b> <?php echo $regpedido['comdes_nombre'] ?><br>
                  <b>Dirección:</b> <?php echo $regpedido['comdes_direccion'] ?><br>
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
                      <th>Costo</th>
                      <th>Subtotal</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                      <?php // recorro los productos del pedido
                      $subtotalnew=0; 
                      $querypro="SELECT * from th_comprasproductos
                      INNER JOIN th_cat_productos pro on pro_idProducto=compro_idProducto
                      where compro_idCompra=$idCompra";
                      $respro=mysqli_query($con,$querypro);
                      while ($regproductos=mysqli_fetch_array($respro)){
                        $subtotal=$regproductos['compro_cantidadproducto']*$regproductos['compro_costoproducto'];
                        $subtotalnew=$subtotalnew+$subtotal;
                      ?>
                    <tr>
                      <td><?php echo $regproductos['compro_cantidadproducto'] ?></td>
                      <td><?php echo $regproductos['pro_sku'] ?></td>
                      <td><?php echo $regproductos['pro_nombreproducto'] ?></td>
                      <td>$<?php echo number_format($regproductos['compro_costoproducto'], 2, '.', ',') ?></td>
                      <td>$<?php echo number_format($subtotal, 2, '.', ',') ?></td>
                    </tr>
                  <?php 

                } ?>
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
                        <th>Descuento:</th>
                        <td align="right">$0.0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td align="right">$<?php echo number_format($subtotalnew+($subtotalnew*.16), 2, '.', ',') ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  
                  <a href="comprasImprimir?idCompra=<?php echo $idCompra?>&foliocompra=<?php echo $foliocompra ?>" rel="noopener" target="_blank" class="btn btn-dark float-left" style="margin-right: 5px;"><i class="fas fa-print"></i> Imprimir</a>
                  <a href="javascript:history.back()" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-edit"></i> Regresar</a>
                </div>
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
</body>
</html>





