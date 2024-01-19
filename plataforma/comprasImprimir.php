<?php 
error_reporting(0);
require_once ("class/conexion.php");
$con=conexion();
$idCompra=$_GET['idCompra'];
$foliocompra=$_GET['foliocompra'];
// consulto los datos del pedido
$querypedido="SELECT * from th_compras com
INNER JOIN th_proveedores pro on pro.prov_idProveedor=com.com_idProveedor
INNER JOIN th_comprasdestinos des on des.comdes_idDestino=com.com_destino
ORDER BY com_idCompra DESC LIMIT 1";
$respedido=mysqli_query($con, $querypedido);
$regpedido=mysqli_fetch_array($respedido);
$idCompra=$regpedido['com_idCompra'];

?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thirsty</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>
<!-- Content Wrapper. Contains page content -->
<div class="">
    <!-- Content Header (Page header) -->
    

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
                    <i class="fas fa-globe"></i> <a href="#"><?php echo $regpedido['com_foliocompra'] ?></a>
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
                      $totalnew=0; 
                      $newiva=0;
                      $querypro="SELECT * from th_comprasproductos
                      INNER JOIN th_cat_productos pro on pro_idProducto=compro_idProducto
                      where compro_idCompra=$idCompra";
                      $respro=mysqli_query($con,$querypro);
                      while ($regproductos=mysqli_fetch_array($respro)){
                        $subtotal=$regproductos['compro_cantidadproducto']*$regproductos['compro_costoproducto'];
                        //$iva=$subtotal*0.16;
                       // $ivaproducto=$subtotal+$iva;

                        $iva=$subtotal*0.16;
                        $totaliva=$subtotal-$iva;
                        $subtotalnew=$subtotalnew+$totaliva;
                        $totalnew=$totalnew+$subtotal;
                        $newiva=$newiva+$iva;
                      ?>
                    <tr>
                      <td><?php echo $regproductos['compro_cantidadproducto'] ?></td>
                      <td><?php echo $regproductos['pro_sku'] ?></td>
                      <td><?php echo $regproductos['pro_nombreproducto'] ?></td>
                      <td>$<?php echo number_format($totaliva, 2, '.', ',') ?></td>
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
                        <td align="right">$<?php echo number_format($newiva, 2, '.', ',') ?></td>
                      </tr>
                      <tr>
                        <th>Descuento:</th>
                        <td align="right">$0.0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td align="right">$<?php echo number_format($totalnew, 2, '.', ',') ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              
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
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
</body>
</html>
<script>
setTimeout(function(){
    window.addEventListener("load", window.print());
}, 2000);
  
</script>
