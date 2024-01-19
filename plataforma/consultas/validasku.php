<?php 
error_reporting(0);
include('../class/conexion.php'); 
if ($_POST) {
$conn=conexion();
$sku=$_POST['sku'];
  
$sql="SELECT * from th_cat_productos p where p.pro_sku='$sku'";
$res = mysqli_query($conn,$sql);
$filas = mysqli_num_rows($res);

if ($filas<1) {
$datos='';
$datos.= '<div class="alert alert-block alert-success" id="avisoSinResultados">
              <p>
              <strong>
              <i class="ace-icon fa fa-check"></i>
              Bien.!
              </strong>
              El SKU esta disponible, no tendras problema para agregar el producto.
              </p>
              </div>
              ';
echo $datos;
} else  {
      echo '<div class="alert alert-block alert-danger" id="avisoSinResultados">
              <p>
              <strong>
              <i class="ace-icon fa fa-times"></i>
              Ups.!
              </strong>
              El SKU no esta disponible, debes cambiarlo para continuar con el registro
              </p>
              </div>';
 }
}

?>