<?php 
error_reporting(0);
require_once ("class/conexion.php");
$con=conexion();
$idPedido=$_GET['idPedido'];
// consulto los datos del pedido
$querypedido="SELECT * from th_pedidos ped
inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
inner join th_pedidosfirmas fir on fir.sig_idPedido=ped.ped_idPedido
where ped.ped_idPedido=$idPedido";
$respedido=mysqli_query($con, $querypedido);
$regpedido=mysqli_fetch_array($respedido);
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
      #map {
        height: 500px;
        width: 100%;
      }
</style>
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> <?php echo $regpedido['ped_foliopedido'] ?>
                    <small class="float-right">Fecha: <?php $fechapedido=$regpedido['ped_fechacreado'];
                     setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
                      $fecha = strftime("%d de %B de %Y", strtotime($fechapedido));
                      echo $fecha; ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        Datos del cliente
                  <address>
                    <strong><?php echo strtoupper($regpedido['usr_nombrenegocio']) ?></strong><br>
                    <?php echo strtoupper($regpedido['usr_nombre']) ?> <?php echo strtoupper($regpedido['usr_apellidos']) ?><br>
                    Teléfono: <?php echo $regpedido['usr_telefono'] ?><br>
                    Email: <?php echo $regpedido['usr_email'] ?>
                  </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Datos de envio
                  <address>
                    <strong><?php echo $regpedido['suc_nombresucursal'] ?></strong><br>
                    <?php echo $regpedido['suc_direccion'] ?><br>
                    Teléfono: <?php echo $regpedido['suc_telefono'] ?><br>
                    Email: <?php echo $regpedido['suc_email'] ?>
                    <input type="hidden" name="latitud" id="latitud" value="<?php echo $regpedido['suc_latitud'] ?>">
                    <input type="hidden" name="longitud" id="longitud" value="<?php echo $regpedido['suc_longitud'] ?>">
                  </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
                  Datos del pedido<br>
                  <b>Pedido:</b> <?php echo $regpedido['ped_foliopedido'] ?><br>
                  <b>Fecha:</b> <?php echo $fecha ?><br>
                  <b>Notas:</b> <?php echo $regpedido['ped_comentarios'] ?>
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
                      $querypro="SELECT * from th_pedidosproductos pp inner join th_cat_productos pro on pro.pro_idProducto=pp.pedpro_idProducto where pp.pedpro_idPedido=$idPedido and pp.pedpro_estatus=1
                      ";
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
                
                }                ?>
                    </tbody>
                  </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">Firma de Recibido<br>
        <img src="data:image/png;base64,<?php echo $regpedido['sig_firmab64'] ?>" width="400" height="110">
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

        <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Ubicación donde se entrego el pedido</h5>
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
            </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
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
