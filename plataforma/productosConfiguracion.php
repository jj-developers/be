<?php 
error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Configuración de Productos</h1>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Categorías</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Subcategorías</a></li>
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
                          <table id="example2" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Categoría</th>   
                      <th>Editar</th>
                      <th>ON/OFF</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * from th_cat_categorias";
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
                       <td><?php echo $registro['cat_nombrecategoria'] ?></td>
                       <td><button id="btn" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-info" onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> 
                        </button>
                       </td>

                       <td><label class="switch">
        <input type="checkbox" id="miCheckbox" data-pro-id="<?php echo $registro['cat_idCategoria']; ?>" <?php echo ($registro['cat_estatus'] == 1) ? 'checked' : ''; ?>>
        <span class="slider round"></span>
    </label></td>
   

                  </tr>
                <?php } ?>
              </tbody>
          </table>
        <hr color="red">
              <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label>Categoría</label>
                  <input type="text" class="form-control" id="catnew" name="catnew" placeholder="Nombre de categoría nueva">
                </div>
              </div>
            </div>
            <div class="card-footer" id="botonenviar">
            <button type="button" class="btn btn-success float-right" onclick="agregarcategoria()">Agregar Nuevo</button>
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
                          <table id="example1" class="table table-bordered table-hover">
              <thead>
                  <tr>
                      <th>Categoría</th>
                      <th>Subcategoría</th>   
                      <th>Editar</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT subcat_idSubCategoria,subcat_idCategoria,subcat_nombresubcategoria,subcat_estatus,cat_nombrecategoria from th_cat_subcategorias
                  inner join th_cat_categorias on cat_idCategoria=subcat_idCategoria
                  ";
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
                       <td><?php echo $registro['cat_nombrecategoria'] ?></td>
                       <td><?php echo $registro['subcat_nombresubcategoria'] ?></td>
                       <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#subceditar" id="btnView" onclick="agregaform2('<?php echo $datos2 ?>')"><i class="fas fa-edit"></i> 
                        </button>
                       </td>
                            <!--subcategoria switch-->
                       <td><label class="switch">
        <input type="checkbox" id="miCheckboxdos" data-pro-id="<?php echo $registro['subcat_idSubCategoria']; ?>" <?php echo ($registro['subcat_estatus'] == 1) ? 'checked' : ''; ?>>
        <span class="slider round"></span>
    </label></td>


   



                  </tr>
                <?php } ?>
              </tbody>
          </table>
<hr color="red">
              <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                      <label>Categoría</label>
                      <?php 
                  $query="select * from th_cat_categorias where cat_estatus=1";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="categoriaagregar" name="categoriaagregar">
                    <option value="">Elige una categoria</option>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['cat_idCategoria'] . '">'.$Usuario['cat_nombrecategoria']. '</option>';
                                }
                                ?>

                  </select>                  
                    </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Subcategoría</label>
                  <input type="text" class="form-control" id="subcategorianueva" name="subcategorianueva" placeholder="Agregar el nombre de subcategoría">
                </div>
              </div>
            </div>
            <div class="card-footer" id="botonenviar">
            <button type="button" class="btn btn-success float-right" onclick="agregarsubcategoria()">Agregar Nuevo</button>
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
  });
</script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="dist/js/funciones_productos.js"></script>
</body>
</html>
<?php 
if ($_GET['editcat']=='true') { ?>
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
        title: ' La categoria se actualizo correctamente'
      })
    });
    });
</script>
<?php } ?>
<?php 
if ($_GET['altacat']=='true') { ?>
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
        title: ' La categoria se agrego correctamente ya puede ser utilizada'
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
    $('#idUSer2').val(d[0]); 
    $('#subcatact2').val(d[2]);
    $('#catact').val(d[4]);
    $('#catact2').val(d[1]);

  }
</script>

      <div role="dialog" class="modal fade" id="subceditar">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Subcategoría</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="row">
                  <div class="col-12 col-sm-12">
                    <div class="form-group">
                      <label>Categoria Actual</label>
                      <input type="text" class="form-control" id="catact" name="catact" readonly>
                      <input type="hidden" id="catact2" name="catact2">                
                    </div>
                    <div class="form-group">
                      <label>Cambiar Categoría</label>
                      <?php 
                  $query="select * from th_cat_categorias where cat_estatus=1";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="categorianew" name="categorianew">
                    <option value="">Elige una categoria</option>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['cat_idCategoria'] . '">'.$Usuario['cat_nombrecategoria']. '</option>';
                                }
                                ?>

                  </select>                  
                    </div>
                    <div class="form-group">
                      <label>Nombre actual</label>
                      <input type="text" class="form-control" id="subcatact2" name="subcatact2">
                      <input type="hidden" id="idUSer2" name="idUSer2">                  
                    </div> 
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" onclick="editarSubccategoria()">Guardar Edición</button>
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
              <h4 class="modal-title">Editar Categoría</h4>
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
              <button type="button" class="btn btn-success" onclick="editarCategoria()">Guardar Edición</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>


      <script>
        var pro_estatus ="";
        var proId = "";
        var isChecked = "";
        var pro_id = "";
        var queryn=false;
$('input[type="checkbox"]').on('change', function () {
    if ($(this).attr('id') === 'miCheckbox') {
        proId = $(this).data('pro-id');
         isChecked = $(this).is(':checked');
         pro_id = $(this).data('pro-id');
      pro_estatus = $(this).is(':checked') ? 1 : 5;
    } else if ($(this).attr('id') === 'miCheckboxdos') {
      proId = $(this).data('pro-id');
         isChecked = $(this).is(':checked');
         pro_id = $(this).data('pro-id');
         pro_estatus = $(this).is(':checked') ? 1 : 5;
         queryn=true;
    }

    $.ajax({
type: 'POST',
url: 'ActualizaEstatusCliente.php', // Nombre del archivo PHP que manejará la actualización
data: { pro_id: pro_id, pro_estatus: pro_estatus,queryn:queryn },
success: function (data) {
// Aquí puedes manejar la respuesta del servidor si es necesario
}
});


});

</script>