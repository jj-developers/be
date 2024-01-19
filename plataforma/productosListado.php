<?php 
//error_reporting(0);
require_once ("header.php");
require_once ("menu.php");
if ($_POST['actualizarcatalogo'] != '') {
  header('Content-type: text/html; charset=utf-8');
  // Aquí es donde seleccionamos nuestro csv
  $fname = $_FILES['sel_file']['name'];
  $chk_ext = explode(".", $fname);
  ini_set('auto_detect_line_endings', '1');
  if (strtolower(end($chk_ext)) == "csv") {
    $filename = $_FILES['sel_file']['tmp_name'];
    $handle = fopen($filename, "r");
    
    $isFirstLine = true; // Para rastrear si estamos en la primera línea
    $header = array(); // Para almacenar los nombres de las columnas
    $updatedSKUs = array(); // Para almacenar los SKUs actualizados

    // Crear un nuevo archivo CSV para almacenar los SKUs actualizados
    $outputFilename = "skus_actualizados.csv";
    $outputHandle = fopen($outputFilename, "w");

    while ($data = fgetcsv($handle, 10000, ",")) {
        if ($isFirstLine) {
            $isFirstLine = false;
            $header = $data; // Almacenar los nombres de las columnas
            //fputcsv($outputHandle, $header); // Escribir los encabezados en el nuevo archivo
            continue;
        }
        if (empty(array_filter($data, 'strlen'))) {
          // La fila está vacía, así que la saltamos
          continue;
      }
        $rowData = array();
        foreach ($header as $index => $columnName) {
            $columnValue = isset($data[$index]) ? $data[$index] : ''; // Verificar si el valor existe
            
            if (!empty($columnValue)) {
                $columnName = $columnName; // No es necesario trim aquí
                $rowData[$columnName] = $columnValue;
            }
        }

        // Ahora puedes acceder a los datos por nombre de columna
        $sku = $data[0];
        $nombre = $rowData['Nombre'];
        $marca = $rowData['Marca'];
        $categoria = $rowData['Categoria'];
        $subcategoria = $rowData['SubCategoria'];
        //$cantidad = $rowData['Cantidad'];
        $precioOro = $rowData['PrecioOro'];
        $precioPremium = $rowData['PrecioPremium'];
        $precioPlatino = $rowData['PrecioPlatino'];
        $estatus = $rowData['Estado'];
        $proveedor = $rowData['Proveedor'];
        $etiquetas = $rowData['Etiquetas'];
        $descripcion = $rowData['Descripcion'];

        // Verificar si el registro ya existe
        $existingRecord = mysqli_query($con, "SELECT * FROM th_cat_productos WHERE pro_sku = '$sku'");
        
        if (mysqli_num_rows($existingRecord) > 0) {
            // El registro existe, realizar una actualización
           // echo "Entró en la actualización";
            $sql = "UPDATE th_cat_productos SET pro_idCategoria = '$categoria', pro_idSubcategoria = '$subcategoria',
            pro_marca = '$marca', pro_nombreproducto = '$nombre', pro_preciooro = '$precioOro',
            pro_preciopremium = '$precioPremium', pro_precioplatino = '$precioPlatino', pro_estatus = '$estatus',
            pro_proveedor = '$proveedor',pro_tags = '$etiquetas',pro_descripcion	= '$descripcion' WHERE pro_sku = '$sku'";
            mysqli_query($con, $sql);

            // Almacena el SKU actualizado en el array
            $updatedSKUs[] = $sku;
        } else {
            // El registro no existe, realizar una inserción
            $sql = "INSERT INTO th_cat_productos (pro_sku, pro_idCategoria, pro_idSubcategoria, pro_marca,
            pro_nombreproducto, pro_preciooro, pro_precioplatino, pro_preciopremium, pro_estatus,
            pro_proveedor,pro_tags,pro_descripcion)
            VALUES ('$sku', '$categoria', '$subcategoria', '$marca', '$nombre', '$precioOro',
            '$precioPlatino', '$precioPremium', '$estatus', '$proveedor','$etiquetas','$descripcion')";
            mysqli_query($con, $sql);
        }
    }

    // Escribe los SKUs actualizados en un archivo CSV
    fputcsv($outputHandle, array("SKU"));
    foreach ($updatedSKUs as $updatedSKU) {
        fputcsv($outputHandle, array($updatedSKU));
    }

    // Cierra el archivo de salida
    fclose($outputHandle);
  ?>

    
<?php
    // genero la lista de productos duplicados solicitados
    
      //aqui le decimos al navegador que vamos a enviar a un archivo del tipo CSV
          if (count($updatedSKUs) > 0) {
 ?>
        <script type="text/javascript">
          window.open('descarga_duplicados', '_blank');
        </script>
      <?php }
      ?>
      <script type="text/javascript">
         window.location="productosListado?success=true";
      </script>
      <?php     
    }else{
      //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             //ver si esta separado por " , "
      ?>
      <script type="text/javascript">
         window.location="productosListado?success=false";
      </script>
      <?php
    }

  }
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de Productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Bebify</a></li>
              <li class="breadcrumb-item active">Clientes</li>
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
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Listado</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Cargar</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Descargar</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <table id="example1" class="table table-striped table-hover">
              <thead>
                  <tr>
                      <th>SKU</th>
                      <th>Nombre del Producto</th>                      
                      <th>Precio Oro</th>
                      <th>Precio Premium</th>
                      <th>Precio Platino</th>
                      <th>Estatus</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * from th_cat_productos";
                  $res = mysqli_query($con,$query);
                      while ($registro = mysqli_fetch_array($res)) {
                  ?>
                      <tr>
                       <td><a href="productosVerDetalleCompleto?idProducto=<?php echo $registro['pro_idProducto'] ?>"><?php echo $registro['pro_sku'] ?></a></td>
                       <td><?php echo $registro['pro_nombreproducto'] ?></td>
                       <td>$<?php echo number_format($registro['pro_preciooro'], 2, '.', ',') ?></td>
                       <td>$<?php echo number_format($registro['pro_preciopremium'], 2, '.', ',') ?></td>
                       <td>$<?php echo number_format($registro['pro_precioplatino'], 2, '.', ',') ?></td>
                       <td><?php if ($registro['pro_estatus']==1){ echo "Activo";} ?><?php if ($registro['pro_estatus']==2){ echo "No disponible";} ?><?php if ($registro['pro_estatus']==5){ echo "Inactivo";} ?></td>
                          

                  </tr>
                <?php } ?>
              </tbody>
          </table>
          <div class="row no-print">
                <div class="col-12">
                  <a href="dashboard" rel="noopener" class="btn btn-info float-left" style="margin-right: 5px;"><i class="fas fa-arrow-left"></i> Regresar</a>
              </div>
        </div>
                    </div>
                  </div>


                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group row">
                        <div class="col-md-12">
                    <label>Archivo CSV</label>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" id='sel_file' name='sel_file' size='20' accept=".csv" placeholder="Subir archivo" required>
                        <input type="hidden" name="actualizarcatalogo" id="actualizarcatalogo" value="actualizarcatalogo">   
                      </div>
                    </div>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Cargar</button>
                      </div>
                      </div>
                    </div>
                    </form>
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
                          <input  type="checkbox" name="categoria[]" value="'<?php echo $regcat['cat_nombrecategoria']  ?>'">
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
              <!-- /.card-body -->
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
</body>
</html>
<?php 
if ($_GET['responsedit']=='true') { ?>
    echo '<script>
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
        title: ' Los productos ya fueron actualizados correctamente, en este momento los cambios ya estan siendo aplicados'
      })
    });
    });
</script>
<?php } ?>
<script type="text/javascript">
function ActivarCasilla(casilla) 
{
  miscasillas=document.getElementsByTagName('input'); //Rescatamos controles tipo Input
  for(i=0;i<miscasillas.length;i++) //Ejecutamos y recorremos los controles
  {
    if(miscasillas[i].type == "checkbox") // Ejecutamos si es una casilla de verificacion
    {
      miscasillas[i].checked=casilla.checked; // Si el input es CheckBox se aplica la funcion ActivarCasilla
    }
  }
}
</script>
