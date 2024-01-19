<?php 
error_reporting(0);
include('../class/conexion.php'); 
if ($_POST) {
$conn=conexion();
$nombrenegocio=$_POST['nombrenegocio'];
  
$sql="SELECT * from th_proveedores p where p.prov_nombreproveedor like '%$nombrenegocio%'";
$res = mysqli_query($conn,$sql);
$filas = mysqli_num_rows($res);

if ($filas>=1) {
$datos='';
$datos.= '<table class="table table-striped projects">
                   <thead>
                       <tr>
                          <th>Nombre del proveedor</th>
                          <th>Acciones</th>
                       </tr>
                    </thead>
                  <tbody>';
                                 while ($fila = mysqli_fetch_array($res)) {
                        $datos.= '<tr><td><b>'.$fila['prov_nombreproveedor'].'</b></td><td>
                          <a class="btn btn-info btn-sm" href="proveedorVerDetalle?id='.$fila['prov_idProveedor'].'">
                              <i class="fas fa-search">
                              </i>
                              Ver proveedor
                          </a>
                      </td></tr>';
}

$datos.='<tr><td colspan="5">
          <button type="button" class="btn btn-success" onclick="nuevoproveedornew()">Agregar Nuevo Proveedor</button></td></tr>';
$datos.='</tbody></table>'; 

echo $datos;
} else  {
      echo '<div class="alert alert-block alert-info" id="avisoSinResultados">
              <p>
              <strong>
              <i class="ace-icon fa fa-check"></i>
              Ups.!
              </strong>
              No encontramos resultados para tus datos de busqueda, agrega al proveedor desde este botón 
              <button type="button" class="btn btn-success" onclick="nuevoproveedornew()">Agregar Nuevo Proveedor</button>
              </p>
              </div>';
 }
}

?>