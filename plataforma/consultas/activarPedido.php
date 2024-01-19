<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idPedidoActivar=$_POST['idPedidoActivar'];
$montoacancelar=$_POST['montoacancelar'];
$montoacancelar=str_replace(',','.',$montoacancelar);
$idCliente=$_POST['idCliente'];
// genero la actualizacion de los usuarios
$sql = "UPDATE th_pedidos set ped_estatus=8 where ped_idPedido=$idPedidoActivar";
$res = mysqli_query($con,$sql);
$updmontcliente="UPDATE th_usuarios set usr_montoadeudo=usr_montoadeudo+$montoacancelar where usr_idUsuario=$idCliente";
$resupdate=mysqli_query($con,$updmontcliente);
return $resupdate;
}
echo postdatos(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Incluye el enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>


<!-- Incluye el enlace a Bootstrap JS (opcional, si deseas utilizar componentes interactivos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
