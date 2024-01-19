<?php 
error_reporting(0);
include('../class/conexion.php'); 
if ($_POST) {
$conn=conexion();
$nombreproducto=$_POST['nombreproducto'];
  
$sql="SELECT * from th_cat_productos p where p.pro_nombreproducto like '%$nombreproducto%'";
$res = mysqli_query($conn,$sql);
$filas = mysqli_num_rows($res);

if ($filas>=1) {
$datos='';
$datos.= '<table class="table table-striped projects">
                   <thead>
                       <tr>
                             <th>Nombre del producto</th>
                             <th>Acciones</th>
                       </tr>
                                </thead><tbody>';
                                 while ($fila = mysqli_fetch_array($res)) {
                        $datos.= '<tr><td><b>'.$fila['pro_nombreproducto'].'</b></td><td>
                          <a class="btn btn-info btn-sm" href="productosVerDetalleCompleto?idProducto='.$fila['pro_idProducto'].'">
                              <i class="fas fa-search">
                              </i>
                              Ver producto
                          </a>
                      </td></tr>
              ';
}

$datos.='<tr><td colspan="5">
          <button type="button" class="btn btn-warning" onclick="nuevoproducto()">Agregar nuevo producto</button></td></tr>';
$datos.='</tbody></table>'; 

echo $datos;
} else  {
      echo '<div class="alert alert-block alert-info" id="avisoSinResultados">
              <p>
              <strong>
              <i class="ace-icon fa fa-check"></i>
              Ups.!
              </strong>
              No encontramos resultados para tus datos de busqueda, agrega al producto desde este botón 
              <button type="button" class="btn btn-warning" onclick="nuevoproducto()">Agregar nuevo Producto</button>
              </p>
              </div>';
 }
}

?>