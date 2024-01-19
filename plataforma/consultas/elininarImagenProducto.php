<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idProducto=$_POST['idProducto'];
$sql="UPDATE th_cat_productos set pro_imagen='documentos/productos/botella_demo.png' where pro_idProducto=$idProducto";
$res = mysqli_query($con,$sql);

return $res;
}
echo postdatos(); 
?>