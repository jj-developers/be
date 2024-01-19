<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idInventarioAct=$_POST['idInventarioAct'];
$nvacantidad=$_POST['nvacantidad'];
$hoy=date('Y-m-d H:i:s');
// genero la actualizacion de los usuarios
$sql="UPDATE th_inventario set inv_cantidad=$nvacantidad, inv_ultimaactualizacion='$hoy' where inv_idInventario=$idInventarioAct";
$res = mysqli_query($con,$sql);

return $res;
}
echo postdatos(); 
?>