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
            <h1>Configuración de Compras</h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Destinos</a></li>
                  <!--li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edición</a></li-->
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
                      <th>Nombre</th>   
                      <th>Ubicación</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * from th_comprasdestinos";
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
                       <td><?php echo $registro['comdes_nombre'] ?></td>
                       <td><?php echo $registro['comdes_direccion'] ?></td>
                       <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-info" onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> 
                        </button>
                       </td>
                          

                  </tr>
                <?php } ?>
              </tbody>
          </table>
<hr color="red">
              <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="namenew2" name="namenew2" placeholder="Nombre del destino">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Ubicación</label>
                  <input type="text" class="form-control" id="ubine2" name="ubine2" placeholder="Ubicación del destino">
                </div>
              </div>
            </div>




            
            <div class="card-footer" id="botonenviar">
            <button type="button" class="btn btn-success float-right" onclick="agregardestinew()">Agregar Destino</button>
            </div>
            </div>
                      </form>
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
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_compras.js"></script>
</body>
</html>
<?php 
if ($_GET['editcompra']=='true') { ?>
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
        title: ' El Destino de compra fue actualizado correctamente'
      })
    });
    });
</script>
<?php } ?>
<?php 
if ($_GET['altadircomp']=='true') { ?>
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
        title: ' El destino se agrego correctamente'
      })
    });
    });
</script>
<?php } ?>
<script type="text/javascript">
  function agregaform(datos){ 
    d=datos.split('||');
    $('#idDestino').val(d[0]); 
    $('#namenew').val(d[1]);
    $('#ubinew').val(d[2]);
  }
</script>

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Destino</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="GET">
            <div class="modal-body">
              <div class="row">
              <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="namenew" name="namenew">
                  <input type="hidden" id="idDestino" name="idDestino">                  
                </div> 
            </div>
            <div class="col-12 col-sm-12">
                <div class="form-group">
                  <label>Ubicación</label>
                  <input type="text" class="form-control" id="ubinew" name="ubinew">                
                </div> 
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success" onclick="editarDestCompra()">Guardar edición</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>