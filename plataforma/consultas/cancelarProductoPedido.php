<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idProductoCancelar=$_POST['idProductoCancelar'];
$idPedido=$_POST['idPedidoPP'];
$montopedidoanterior=$_POST['totalactual'];
$idCliente=$_POST['idClientePP'];
// genero la actualizacion de los usuarios
$sql="UPDATE th_pedidosproductos set pedpro_estatus=5 where pedpro_idProductopedido=$idProductoCancelar";
$res = mysqli_query($con,$sql);
// consulto el total de cantidades y precios para sacar subtotales
$querypedidos="SELECT SUM((pedpro_cantidadproducto*pedpro_costoproducto)) as totalPedidot FROM th_pedidosproductos where pedpro_idPedido=$idPedido and pedpro_estatus=1";
$resquerypedidos=mysqli_query($con,$querypedidos);
$regpedidos=mysqli_fetch_array($resquerypedidos);
$totalpedido=$regpedidos['totalPedidot'];
$iva=$totalpedido*0.16;
$ttpedt=$totalpedido+$iva;
// actualizo el monto del pedido
$acped="UPDATE th_pedidos set ped_montototal='$ttpedt' where ped_idPedido=$idPedido";
$react=mysqli_query($con,$acped);

            // actualizo el monto del cliente quitando primero el adeudo anterior
            $updquitar="UPDATE th_usuarios SET usr_montoadeudo=(usr_montoadeudo-$montopedidoanterior)+$ttpedt where usr_idUsuario=$idCliente";
            $resupd=mysqli_query($con,$updquitar); 

return $react;
}
echo postdatos(); 
?>