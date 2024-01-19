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
            <h1>Configuración de Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Creación</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Edición</a></li>
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

              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Perfil de usuario</label>
                  <?php 
                  $query="select * from th_cat_usuariosroles where rol_estatus=1 and rol_id!=1 ORDER BY rol_descripcion";
                  $res = mysqli_query($con,$query);
                  ?>
                  <select class="form-control select2 select2" id="rol" name="rol" required>
                                <?php
                                while ($Usuario = mysqli_fetch_array($res)) {
                                    echo '<option value="' . $Usuario['rol_id'] . '">'.$Usuario['rol_descripcion']. '</option>';
                                }
                                ?>                                
                  </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Fecha de registro</label>
                  <input type="text" class="form-control" id="fechareg" name="fechareg" value="<?php echo date('Y-m-d') ?>" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nombre(s)</label>
                  <input type="text" class="form-control" id="nombreusr" name="nombreusr" placeholder="Nombre del usuario" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Apellido(s)</label>
                  <input type="text" class="form-control" id="apellidosusr" name="apellidosusr" placeholder="Apellidos del usuario" required>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Teléfono de contacto</label>
                  <input type="number" class="form-control" maxlength="10" id="telefono" name="telefono" placeholder="Telefono de Contacto" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                </div>
              </div><div class="col-md-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email de Contacto, sirve de acceso a plataforma" onchange="validaUsuario()" required>
                </div>
              </div>
            </div>

            <div class="row">
              
            </div>

            <div class="row" id="otrogirodiv" style="display: none">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control" id="otrogiro" name="otrogiro" placeholder="Escribe tu giro de negocio" >
                </div>
              </div>
            </div>

            <hr color="red">

           <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="******">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Confirmar Contraseña</label>
                  <input type="password" class="form-control" id="contrasenar" name="contrasenar" placeholder="******" required>            
                </div>
              </div>
            </div>

            <div class="card-footer" id="botonenviar" style="display:none">
            <button type="button" class="btn btn-success float-right" onclick="registraUsuarioempleado2()">Generar Usuario</button>
            </div>
            </div>
                      </form>
                    </div>
                  </div>


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <div class="post">
                      <table id="example1" class="table table-bordered table-striped">
              <thead>
                  <tr>
                      <th>Nombre</th>                      
                      <th>Apellidos</th>
                      <th>Perfil</th>
                      <th>Email</th>
                      <th>Estatus</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT usr_idUsuario,usr_nombre,usr_apellidos,usr_telefono,usr_email,usr_contrasena,usr_estatus,rol_descripcion from th_usuarios 
                  inner join th_cat_usuariosroles on rol_id=usr_idrol
                  where usr_idRol not in (1)";
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
                       <td><?php echo $registro['usr_nombre'] ?></td>
                       <td><?php echo $registro['usr_apellidos'] ?></td>
                       <td><?php echo $registro['rol_descripcion'] ?></td>
                       <td><?php echo $registro['usr_email'] ?></td>
                       <td><?php if ($registro['usr_estatus']!=5){ echo "Activo";} ?><?php if ($registro['pro_estatus']==5){ echo "Inactivo";} ?></td>
                       <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-info" onclick="agregaform('<?php echo $datos ?>')"><i class="fas fa-edit"></i> 
                        </button>
                       </td>
                          

                  </tr>
                <?php } ?>
              </tbody>
          </table>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form  method="post" action="productosCatalogoDescargarExcel">
                    <form class="form-horizontal">
                      Elige la(s) categoría(s) de productos para descargar<br><hr>
                      <div class="form-group row">
                         
                  <?php 
                  $querycat="SELECT * FROM th_cat_categorias WHERE cat_estatus=1";
                  $rescat=mysqli_query($con,$querycat);
                  while ($regcat=mysqli_fetch_array($rescat)) {
                  ?>
                  <div class="custom-control custom-checkbox">
                          <input  type="checkbox" name="categoria[]" value="<?php echo $regcat['cat_idCategoria']  ?>">
                          <label><?php echo $regcat['cat_nombrecategoria'] ?></label>
                        </div>
                  <?php } ?>                
                  <div class="custom-control custom-checkbox">
                        <input  type="checkbox" onClick="ActivarCasilla(this);">
                          <label>Todas</label>
                          </div>
                </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Descargar</button>
                      </div>
                    </form>
                  </div>
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
<script src="dist/js/funciones_usuarios.js"></script>
</body>
</html>
<?php 
if ($_GET['altauserpla']=='true') { ?>
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
        title: ' El usuario fue creado satisfacotriamente, ya puede accesar a la plataforma'
      })
    });
    });
</script>
<?php } ?>
}<?php 
if ($_GET['edituserpla']=='true') { ?>
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
        title: ' El usuario se edito correctamente'
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
    $('#apeusr').val(d[2]);
    $('#telusr').val(d[3]);
    $('#emausr').val(d[4]);
    $('#usrpass').val(d[5]);
  }
</script>

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="GET">
            <div class="modal-body">
              <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="usrname" name="usrname">
                  <input type="hidden" id="idUSer" name="idUSer">                  
                </div> 
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Apellidos</label>
                  <input type="text" class="form-control" id="apeusr" name="apeusr">                 
                </div> 
            </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="number" class="form-control" id="telusr" name="telusr" maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">                 
                </div> 
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" id="emausr" name="emausr">                 
                </div> 
            </div>
            </div>
            <div class="row">
              <div class="col-12 col-sm-6">
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="text" class="form-control" id="usrpass" name="usrpass">               
                </div> 
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-success" onclick="editarUsrPlatf()">Guardar edición</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>