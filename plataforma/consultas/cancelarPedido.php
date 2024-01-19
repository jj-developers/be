<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idPedidoCancelar=$_POST['idPedidoCancelar'];
$montoacancelar=$_POST['montoacancelar'];
$montoacancelar=str_replace(',','.',$montoacancelar);
$idCliente=$_POST['idCliente'];
// genero la actualizacion de los usuarios
$sql="UPDATE th_pedidos set ped_estatus=5 where ped_idPedido=$idPedidoCancelar";
$res = mysqli_query($con,$sql);
// actualizo el monto del cliente
$updmontcliente="UPDATE th_usuarios set usr_montoadeudo=usr_montoadeudo-$montoacancelar where usr_idUsuario=$idCliente";
$resupdate=mysqli_query($con,$updmontcliente);
return $res;
}
echo postdatos(); 
?>