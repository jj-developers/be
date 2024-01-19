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
$idProducto=$regpedido['pro_idProducto'];
$enviar="si";
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
                    <strong><?php echo $regpedido['usr_nombrenegocio'] ?></strong><br>
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
                    <input type="hidden" name="latitud" id="latitud" value="<?php echo $regpedido['suc_latitud'] ?>">
                    <input type="hidden" name="longitud" id="longitud" value="<?php echo $regpedido['suc_longitud'] ?>">
                    <input type="hidden" name="correo" id="correo" value="<?php echo $regpedido['usr_email'] ?>">

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
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Cantidad</th>
                      <th>Inventario</th>
                      <th>SKU</th>
                      <th>Producto</th>
                      <th>Precio</th>
                      <th>Subtotal</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                      <?php // recorro los productos del pedido
                     $enviar = 'si'; // Inicializamos a 'si' para indicar que se puede enviar el pedido

                     // Recorremos los productos del pedido
                     $querypro = "SELECT * from th_pedidosproductos pp 
                     inner join th_cat_productos pro on pro.pro_idProducto=pp.pedpro_idProducto
                     where pp.pedpro_idPedido=$idPedido and pedpro_estatus=1";
                     $respro = mysqli_query($con, $querypro);
                     while ($regproductos = mysqli_fetch_array($respro)) {
                         $subtotal = $regproductos['pedpro_cantidadproducto'] * $regproductos['pedpro_costoproducto'];
                         $subtotalnew = $subtotalnew + $subtotal;
                         $idProductoNew = $regproductos['pro_idProducto'];
                      
                         $concompras2 = "SELECT sum(compro_cantidaddisponible) as totalexistencias from th_comprasproductos 
                         where compro_idProducto=$idProductoNew and compro_cantidaddisponible>=1";
                         $resinv2 = mysqli_query($con, $concompras2);
                         $reginv2 = mysqli_fetch_array($resinv2);
                     ?>
                         <tr>
                             <td><?php echo $regproductos['pedpro_cantidadproducto'] ?></td>
                             <td>
                                 <?php
                                 if ($reginv2['totalexistencias'] >= 1 && $reginv2['totalexistencias'] >= $regproductos['pedpro_cantidadproducto']) {
                                     echo $reginv2['totalexistencias'];
                                 } else {
                                  echo '<span style="color: red;">' . $reginv2['totalexistencias'] . '</span>';
                                  $enviar = 'no'; // Actualizamos a 'no' si la existencia no es suficiente
                                 }
                                 ?>
                             </td>
                             <td><?php echo $regproductos['pro_sku'] ?></td>
                             <td><?php echo $regproductos['pro_nombreproducto'] ?></td>
                             <td>$<?php echo number_format($regproductos['pedpro_costoproducto'], 2, '.', ',') ?></td>
                             <td>$<?php echo number_format($subtotal, 2, '.', ',') ?></td>
                         </tr>
                     <?php
                     }
                     // Verificamos si se debe enviar el pedido
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
                      <?php if ($enviar=='no'){ ?>
                        <tr>
                        <td colspan="2"><code>El pedido contiene productos sin inventario disponible, será necesario agregar compras al producto o eliminarlo de la lista para continuar.</code></td>
                      </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="pedidosImprimir?idPedido=<?php echo $idPedido?>" rel="noopener" target="_blank" class="btn btn-dark float-left" style="margin-right: 5px;"><i class="fas fa-print"></i> Imprimir</a>
                  <a href="pedidosListado" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
                  
                  <button type="button" class="btn btn-danger float-right" style="margin-right: 5px;" data-toggle="modal" data-target="#cancelarPedido">
                    <i class="fas fa-times"></i> Cancelar
                  </button>
                  <a href="pedidosEditar?idPedido=<?php echo $idPedido?>" rel="noopener" class="btn btn-warning float-right" style="margin-right: 5px;"><i class="fas fa-edit"></i> Editar</a>
                  <?php if ($enviar=='si'){ ?>
                  <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#aceptarPedido" style="margin-right: 5px;"><i class="fa fa-check"></i> Aceptar
                  </button> <?php }?>
                </div>
              </div>
            </div>

            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Ubicación para entregar pedido</h5>
              <div id="map"></div>
                  <script>

                    function iniciarMap(){
                    var latitud=$('#latitud').val(); 
                    var longitud=$('#longitud').val(); 
                    
                    var coord = {lat: +latitud ,lng: +longitud};
                    var map = new google.maps.Map(document.getElementById('map'),{
                      zoom: 18,
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

<div id="cancelarPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header"><b>CANCELAR PEDIDO</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <blockquote class="quote-danger">
                  <p>¿Estás seguro que deseas cancelar el Pedido <b><?php echo $regpedido['ped_foliopedido'] ?>?</b></p>
                  <a href="#" target="_new"><small>Ya no estará disponible y será eliminado de la cuenta del cliente</small></a>
                </blockquote>
                  </div>                
                 <input type="hidden" class="form-control" id="idPedidoCancelar" name="idPedidoCancelar" value="<?php echo $idPedido ?>"> 
                 <input type="hidden" class="form-control" id="folioPedidoCancelar" name="folioPedidoCancelar" value="<?php echo $regpedido['ped_foliopedido'] ?>"> 

                 <input type="hidden" class="form-control" id="montoacancelar" name="montoacancelar" value="<?php echo ($subtotalnew+($subtotalnew*.16))?>"> 
                 <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="<?php echo $regpedido['ped_idCliente'] ?>"> 
                 <button type="button" class="btn btn-danger float-right" onclick="cancelarPedido()">Cancelar pedido</button> 
        </div>

        
      </div>
    </div>
  </div>


<?php if ($_GET['successedit']=='true'){ ?>
    <script type="text/javascript">
    var Toast = Swal.mixin({
                      toast: true,
                      position: 'top-end',
                      showConfirmButton: false,
                      timer: 3000
                    });

                    $(document).ready(function() {
                      Toast.fire({
                        icon: 'success',
                        title: 'El pedido fue editado correctamente'
                      })
                    });
  </script>
<?php } ?>

<div id="aceptarPedido" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-header"><b>ACEPTAR PEDIDO</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
        <blockquote class="quote-success">
                  <p>¿Estás seguro que deseas aceptar el Pedido <b><?php echo $regpedido['ped_foliopedido'] ?>?</b></p>
                  <a href="#" target="_new"><small>Al aceptar el pedido estará disponible para poder entregarse y ya no podrá ser editado</small></a>
                </blockquote>
                  </div>                
                  <input type="hidden" class="form-control" id="folioPedidoAceptar" name="folioPedidoAceptar" value="<?php echo $regpedido['ped_foliopedido'] ?>"> 

                 <input type="hidden" class="form-control" id="idPedidoCancelar" name="idPedidoCancelar" value="<?php echo $idPedido ?>"> 
                 <button type="button" class="btn btn-success float-right" onclick="aceptarPedido()">Aceptar pedido</button> 
        </div>

        
      </div>
    </div>
  </div>
