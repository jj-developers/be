<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración de Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Productos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Giros de Negocio</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Descuentos</a></li>
                  <!-- li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Descargar</a></li-->
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <form id="formreguser" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Giro</th>   
                      <th>Editar</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * from th_cat_girosempresas";
                  $res = mysqli_query($con,$query);
                      while ($registro = mysqli_fetch_array($res)) {
                        $datos=$registro[0]."||".
                                     $registro[1]."||".
                                     $registro[2]."||".
                                     $registro[3]."||".
                                     $registro[4]."||".
                                     $registro[5]."||".
                                     $registro[6]."||".
                                     $registro[7]."||".
                                     $registro[8]."||".
                                     $registro[9]."||".
                                     $registro[10]."||".
                                     $registro[11];
                  ?>
                      <tr>
                       <td><?php echo $registro['giremp_nombre'] ?></td>
                       <td>
                        <button id="btn" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-info" onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> 
                        </button>
                       </td>
                          

                  </tr>
                <?php } ?>
              </tbody>
          </table>
        <hr color="red">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Giro de Negocio</label>
                  <input type="text" class="form-control" id="gironew" name="gironew" placeholder="Agregar un giro de negocio nuevo">
                </div>
              </div>
            </div>
            <div class="card-footer" id="botonenviar">
            <button type="button" class="btn btn-success float-right" onclick="agregargironuevo()">Agregar Nuevo</button>
            </div>
            </div>
                      </form>
                    </div>
                  </div>

<div class="tab-pane" id="timeline">
                  <div class="active tab-pane" id="timeline">
                    <!-- Post -->
                    <div class="post">
                      <form id="formreguser" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="card-body">
                          <table id="descuentos" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Código</th>                      
                                    <th>Cliente</th>
                                    <th>Monto</th>
                                    <th>Fecha de vencimiento</th>
                                    <th>Cantidad disponible</th>
                                    <th>Usos</th>
                                    <th>Estatus</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                                $actual=date('Y-m-d');
                                $query = "SELECT * from th_descuentos 
                                INNER join th_usuarios on usr_idUsuario=desc_idCliente
                                where desc_estatus=1 and des_numDisponibles>0 and desc_fechaVence>='$actual'";
                                $res = mysqli_query($con,$query);
                                    while ($registro = mysqli_fetch_array($res)) {
                                      $datos2=$registro[0]."||".
                                                  $registro[1]."||".
                                                  $registro[2]."||".
                                                  $registro[3]."||".
                                                  $registro[4]."||".
                                                  $registro[5]."||".
                                                  $registro[6]."||".
                                                  $registro[7]."||".
                                                  $registro[8]."||".
                                                  $registro[9]."||".
                                                  $registro[10]."||".
                                                  $registro[11];
                                ?>
                                    <tr>
                                      <td><?php echo $registro['desc_codigo'] ?></td>
                                      <td><?php echo $registro['usr_nombrenegocio'] ?></td>
                                      <td>$<?php echo $registro['desc_monto'] ?></td>
                                      <td>
                                        <?php
                                          if($registro['desc_fechaVence']!=''){
                                            //echo date_format($registro['desc_fechaVence'], 'Y-m-d');
                                            $date=date_create($registro['desc_fechaVence']);
                                            echo date_format($date,"d-m-Y");
                                          }else{

                                          }
                                        ?>
                                      </td>
                                      <td><?php echo $registro['des_numDisponibles'] ?></td>
                                      <td><?php echo $registro['desc_numUsados'] ?></td>
                                      <td><?php if ($registro['desc_estatus']!=5){ echo "Activo";} ?><?php if ($registro['desc_estatus']==5){ echo "Inactivo";} ?></td>
                                      <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#subceditar" id="btnView" onclick="agregaform2('<?php echo $datos2 ?>')"><i class="fas fa-edit"></i> 
                                        </button>
                                        <button type="button" class="btn-danger btn" id="btnEliminarD" data-id="<?php echo $registro['desc_idDescuento'] ?>" title="Eliminar">X</button>
                                      </td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                          </table>
<hr color="red">
              <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label>Cliente</label>
                  <?php
                  $query="SELECT * FROM th_usuarios where usr_estatus!=5 and usr_idRol=1 ORDER BY usr_nombrenegocio";
                    $res = mysqli_query($con,$query);
                                ?>
                                <select class="form-control select2 select2" data-dropdown-css-class="select2" id="idCliente" name="idCliente">
                                    <option value="">Elige un cliente</option>
                                    <?php
                                    while ($campanas = mysqli_fetch_array($res)) {
                                        echo '<option value='.$campanas['usr_idUsuario'].'>'.$campanas['usr_nombrenegocio'] . ' </option>';
                                    }
                                    ?>    
                                </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" id="codigodes" name="codigodes" placeholder="Ingresa el código de descuento">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Monto</label>
                  <input type="number" max="1000" min="1" class="form-control" id="montodes" name="montodes" placeholder="Agregar el monto del descuento en pesos">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Candidad de usos</label>
                  <input type="number" max="5" min="1" value="1" class="form-control" id="usodes" name="usodes">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Fecha de vencimiento</label>
                  <input type="date" class="form-control" id="fechades" name="fechades">
                </div>
              </div>
            </div>
            <div class="card-footer" id="botonenviar">
            <button type="button" class="btn btn-success float-right" onclick="agregardescuento()">Agregar Nuevo</button>
            </div>
            </div>
                      </form>
                    </div>
                  </div>
                  </div>





                  <!-- /.tab-pane -->
                  
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example11").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });

    $("#descuentos").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,"info": true,"ordering": true,"searching": true,"paging": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print"]
    }).buttons().container().appendTo('#descuentos_wrapper .col-md-6:eq(0)');
  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_clientes.js"></script>
</body>
</html>
<?php 
if ($_GET['editgiremp']=='true') { ?>
    <script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $(document).ready(function() {
      Toast.fire({
        icon: 'success',
        title: ' Los datos se actualizaron correctamente'
      })
    });
    });
</script>
<?php } ?>
<?php 
if ($_GET['altagironew']=='true') { ?>
    <script>
  $(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    $(document).ready(function() {
      Toast.fire({
        icon: 'success',
        title: ' Los datos se actualizaron correctamente'
      })
    });
    });
</script>
<?php } ?>
<script type="text/javascript">
  function agregaform(datos){ 
    d=datos.split('||');
    $('#idUSer').val(d[0]); 
    $('#usrname').val(d[1]);
  }
</script>

  <script type="text/javascript">
  function agregaform2(datos){ 
    d=datos.split('||');
    $('#idDesc').val(d[0]); 
    $('#codidesc').val(d[1]);
    $('#montodesc').val(d[3]);

  }
</script>

      <div role="dialog" class="modal fade" id="subceditar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Descuento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Código</label>
                  <input type="text" class="form-control" id="codidesc" name="codidesc">
                  <input type="hidden" id="idDesc" name="idDesc">                  
                </div> 
            </div>
            <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Monto</label>
                  <input type="text" class="form-control" id="montodesc" name="montodesc">                
                </div> 
            </div>
            </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
               <button type="button" class="btn btn-success" onclick="editarDescuento()">Guardar Edición</button>
              </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      </div>


      <div role="dialog" class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Giro de Negocio</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="GET">
            <div class="modal-body">
             <div class="row">
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Nombre actual</label>
                  <input type="text" class="form-control" id="usrname" name="usrname">
                  <input type="hidden" id="idUSer" name="idUSer">                  
                </div> 
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success" onclick="editarGiroConf()">Guardar Edición</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


