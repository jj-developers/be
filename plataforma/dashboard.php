<?php 
require_once ("header.php");
require_once ("menu.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Panel Principal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php if ($usr_idRol=='2') { ?>          
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monto vencido</span>
                <span class="info-box-number">
                  <?php // obtengo el monto por vencder se cuenta 3 dias antes de vencer 
                $hoy=date('Y-m-d');
                $qryped2="SELECT sum(ped_montototal) as montoTotal from th_pedidos 
                inner join th_pedidosfacturas on fac_idPedido=ped_idPedido
                where ped_fechapago<'$hoy' and ped_estatus=4 
                and fac_idFactura not in (SELECT pag_idFactura from th_pedidospagos where pag_estatus=7)";
                $respro2=mysqli_query($con,$qryped2);
                $regpro2=mysqli_fetch_array($respro2);
                $montovencido=$regpro2['montoTotal']
                ?>
                <span class="info-box-number">$<?php echo number_format($montovencido, 2, '.', ','); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monto por vencer</span>
                <?php // obtengo el monto por vencder se cuenta 3 dias antes de vencer 
                $hoy=date('Y-m-d');
                $diasadelante=date("Y-m-d",strtotime($hoy."+ 3 days"));
                $qryped2="SELECT sum(ped_montototal) as montoTotal from th_pedidos 
                inner join th_pedidosfacturas on fac_idPedido=ped_idPedido
                where ped_fechapago='$diasadelante'
                and fac_idFactura not in (SELECT pag_idFactura from th_pedidospagos where pag_estatus=7)";
                $respro2=mysqli_query($con,$qryped2);
                $regpro2=mysqli_fetch_array($respro2);
                $monporvencer=$regpro2['montoTotal']
                ?>                
                <span class="info-box-number">$<?php echo number_format($monporvencer, 2, '.', ','); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><a href="productosListado"><i class="fas fa-shopping-cart"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Productos en catalogo</span>
                <span class="info-box-number">Ir</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><a href="listadoClientes"><i class="fas fa-users"></i></a></span>
                <?php
                $clientes="SELECT count(*) as totalClientes from th_usuarios u 
                          where u.usr_estatus in (1,3,4,5) and u.usr_idRol=1";                  
                $resclientes= mysqli_query($con,$clientes);
                $regclientes = mysqli_fetch_array($resclientes); 
                
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Clientes registrados</span>
                <span class="info-box-number"><?php echo $regclientes['totalClientes'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
 
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Reporte de ventas del mes</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">

                    <?php
                    $anio=date('Y');
                    $anonumeros=substr($anio,2, 2);
                    $sql="SELECT SUM(ped_montototal) as ventatotal, ped_mes FROM th_pedidos WHERE ped_anio='$anonumeros' GROUP BY ped_mes";
                      $result=mysqli_query($con,$sql);
                      while ($datosmetas=mysqli_fetch_array($result)) {
                         if ($datosmetas['ped_mes']=='01'){$mes="Enero";}
                         if ($datosmetas['ped_mes']=='02'){$mes="Febrero";}
                         if ($datosmetas['ped_mes']=='03'){$mes="Marzo";}
                         if ($datosmetas['ped_mes']=='04'){$mes="Abril";}
                         if ($datosmetas['ped_mes']=='05'){$mes="Mayo";}
                         if ($datosmetas['ped_mes']=='06'){$mes="Junio";}
                         if ($datosmetas['ped_mes']=='07'){$mes="Julio";}
                         if ($datosmetas['ped_mes']=='08'){$mes="Agosto";}
                         if ($datosmetas['ped_mes']=='09'){$mes="Septiembre";}
                         if ($datosmetas['ped_mes']=='10'){$mes="Octubre";}
                         if ($datosmetas['ped_mes']=='11'){$mes="Noviembre";}
                         if ($datosmetas['ped_mes']=='12'){$mes="Diciembre";}

                          $entry.="['".$mes."',".$datosmetas['ventatotal']."],";
                      }
                    ?>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mes', 'Ventas'],
          <?php echo $entry ?>
        ]);

        var options = {
          title: 'Ventas del año',
          hAxis: {title: 'Ventas por mes',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        // var chart = new google.visualization.line(document.getElementById('chart_div'));
        // var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
                <div id="chart_div"></div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos FROM th_pedidos where ped_estatus!=5";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos=$regtotal['totalPedidos'];

                      $quertytotal2="SELECT * FROM th_pedidos where ped_estatus!=5";
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
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos2 FROM th_pedidos where ped_estatus=8";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos2=$regtotal['totalPedidos2'];

                      $quertytotal2="SELECT * FROM th_pedidos where ped_estatus=8";
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
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos3 FROM th_pedidos where ped_estatus=7";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos3=$regtotal['totalPedidos3'];

                      $quertytotal2="SELECT * FROM th_pedidos where ped_estatus=7";
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
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <?php // TOTAL DE PEDIDOS
                      $quertytotal="SELECT sum(ped_montototal) totalPedidos4 FROM th_pedidos where ped_estatus=4";
                      $restotal=mysqli_query($con,$quertytotal);
                      $regtotal=mysqli_fetch_array($restotal);
                      $totalpedidos4=$regtotal['totalPedidos4'];

                      $quertytotal2="SELECT * FROM th_pedidos where ped_estatus=4";
                      $restotal2=mysqli_query($con,$quertytotal2);
                      $regtotal2=mysqli_num_rows($restotal2);
                      ?>
                      <span class="description"><font size="5">Entregado</font></span>
                      <h5 class="description-header"><?php echo $regtotal2 ?></h5>
                      <h5 class="description-header">$<?php echo number_format($totalpedidos4, 2, '.', ','); ?></h5>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>



        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            
            <!-- /.card -->
            
            <!-- /.row -->
            <?php } ?>
            <?php if ($usr_idRol=='2'||$usr_idRol=='3') { ?>          

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Últmos Pedidos</h3>
<!--
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                -->
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Folio</th>
                      <th>Cliente</th>
                      <th>Estatus</th>
                      <th>Monto</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $qryped="SELECT ped_idPedido,ped_foliopedido,usr_nombrenegocio,ped_estatus,est_descripcionEstatus,ped_montototal from th_pedidos 
                      inner join th_usuarios on usr_idUsuario=ped_idCliente
                      inner join th_tipoestatus on est_idEstatus=ped_estatus
                      ORDER BY ped_idPedido DESC";
                      $resped=mysqli_query($con,$qryped);
                      while ($regped=mysqli_fetch_array($resped)){
                        $estatus=$regped['ped_estatus'];
                        if ($estatus==8){$b='warning';}
                        if ($estatus==7){$b='info';}
                        if ($estatus==4){$b='success';}
                        if ($estatus==5){$b='danger';}
                       ?>
                    <tr>
                      <td><a href="pedidosDetalle?idPedido=<?php echo $regped['ped_idPedido'] ?>">
                        <?php echo $regped['ped_foliopedido'] ?></a></td>
                      <td><?php echo $regped['usr_nombrenegocio'] ?></td>
                      <td><span class="badge badge-<?php echo $b ?>"><?php echo $regped['est_descripcionEstatus'] ?></span></td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">$<?php echo number_format($regped['ped_montototal'], 2, '.', ',')  ?></div>
                      </td>
                    </tr>
                    <?php } ?>                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="pedidosListadoCompleto" class="btn btn-sm btn-info float-right">Ver Pedidos</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <?php } ?>

            <?php if ($usr_idRol=='2') { ?>          

            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">5,200</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mentions</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Downloads</span>
                <span class="info-box-number">114,381</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

            
            <!-- /.card -->

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Últimos productos agregados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">
                  <?php //inicia la consulta 
                  $qrypro="SELECT * from th_cat_productos
                  ORDER BY pro_idProducto DESC LIMIT 4";
                  $respro=mysqli_query($con,$qrypro);
                  while ($regpro=mysqli_fetch_array($respro)){
                  ?>
                  <li class="item">
                    <div class="product-img">
                      <img src="<?php echo $regpro['pro_imagen'] ?>" alt="Product Image" class="img-size-50">
                    </div>
                    <div class="product-info">
                      <a href="javascript:void(0)" class="product-title"><?php echo $regpro['pro_idCategoria'] ?>
                        <span class="badge badge-warning float-right">$<?php echo $regpro['pro_preciooro'] ?></span></a>
                      <span class="product-description">
                        <?php echo $regpro['pro_nombreproducto'] ?>
                      </span>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="productosListado" class="uppercase">Ver todos</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>



          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?> 

  <?php if ($usr_idRol=='1') { ?>          
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <?php require_once "panelesusuario.php" ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  <?php } ?> 




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
require_once ("footer.php");
?>
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>

