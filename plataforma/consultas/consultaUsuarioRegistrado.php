<?php 
error_reporting(0);
include('../class/conexion.php'); 
if ($_POST) {
$conn=conexion();
$nombrenegocio=$_POST['nombrenegocio'];
  
$sql="SELECT * from th_usuarios u where u.usr_nombrenegocio like '%$nombrenegocio%'";
$res = mysqli_query($conn,$sql);
$filas = mysqli_num_rows($res);

if ($filas>=1) {
$datos='';
$datos.= '<table class="table table-striped projects">
                   <thead>
                       <tr>
                             <th>Negocio</th>
                             <th>Nombre de la persona</th>
                             <th>Teléfono</th>
                             <th>Email</th>
                             <th>Acciones</th>
                       </tr>
                                </thead><tbody>';
                                 while ($fila = mysqli_fetch_array($res)) {
                        $datos.= '<tr><td><b>'.$fila['usr_nombrenegocio'].'</b></td><td>'.$fila['usr_nombre'].' '.$fila['usr_apellidos'].'</td><td>'.$fila['usr_telefono'].'</td><td>'.$fila['usr_email'].'</td><td>
                          <a class="btn btn-info btn-sm" href="usuariosVerDetalle?idCliente='.$fila['usr_idUsuario'].'">
                              <i class="fas fa-search">
                              </i>
                             Ver datos
                          </a>
                          <a class="btn btn-warning btn-sm" href="usuariosAgregarSucursal?idCliente='.$fila['usr_idUsuario'].'">
                              <i class="fas fa-check">
                              </i>
                             Agregar Sucursal
                          </a>
                      </td></tr>
              ';
}

$datos.='<tr><td colspan="5">
          <button type="button" class="btn btn-success" onclick="nuevoBeneficiario()">Agregar cliente</button></td></tr>';
$datos.='</tbody></table>'; 

echo $datos;
} else  {
      echo '<div class="alert alert-block alert-info" id="avisoSinResultados">
              <p>
              <strong>
              <i class="ace-icon fa fa-check"></i>
              Ups.!
              </strong>
              No encontramos resultados para tus datos de busqueda, agrega al usuario desde este botón 
              <button type="button" class="btn btn-success float-right" onclick="nuevoBeneficiario()">Agregar cliente</button>
              </p>
              </div>';
 }
}

?>