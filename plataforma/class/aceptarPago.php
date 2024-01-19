<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idPago=$_POST['idPago'];
$montoacancelar=$_POST['montopedido'];
$montoacancelar=str_replace(',','.',$montoacancelar);
$idCliente=$_POST['idCliente'];
// genero la actualizacion de los usuarios
$sql="UPDATE th_pedidospagos set pag_estatus=7 where pag_idPago=$idPago";
$res = mysqli_query($con,$sql);
$updmontcliente="UPDATE th_usuarios set usr_montoadeudo=usr_montoadeudo-$montoacancelar where usr_idUsuario=$idCliente";
$resupdate=mysqli_query($con,$updmontcliente);
return $resupdate;
}
echo postdatos(); 
?>