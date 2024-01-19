<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idPedido=$_POST['idPedido'];
$imagenb64=$_POST['imagenb64'];
// genero la actualizacion de los usuarios
$sql="INSERT INTO th_pedidosfirmas (sig_idPedido,sig_firma,sig_estatus) VALUES ($idPedido,'$imagenb64',1)";
$res = mysqli_query($con,$sql);
return $sql;
}
echo postdatos(); 
?>