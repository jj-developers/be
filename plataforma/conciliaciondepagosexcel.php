<?php
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reportegeneralpedidos.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Reporte General Copagos Informativos</title>
    <meta charset="UTF-8">
    <style type='text/css'>
    body {
    margin: 0;
    padding: 0;
    background-color: #fff;
    font: 12pt 'Calibri';
    color: rgb(0, 0, 0);
    font-size: 12px;
    }
</style>
</head>
<body>
<?php
error_reporting(0);
@session_start();
//creo la conexion
require_once ('class/conexion.php');
$con=conexion();
//recibo los datos por POST
$fechaInicio=$_POST['fechaInicio'];
$fechaFin=$_POST['fechaFin'];
?>
<table border="1">
    <tr>
        <th>Pedido</td>
        <th>Fecha de solicitud</th>
        <th>Fecha de aprobación</th>
        <th>Fecha de entrega</th>
        <th>Fecha de vencimiento</th>
        <th>Fecha de pago</th>
        <th>Cliente</th>
        <th>Total</th>
        <th>Estatus</th> 
        <th>Comprobante de entrega</th>
        <th>Pago</th>
        <th>Comprobante de pago</th> 
 
    </tr>
    <?php
    $hoy=date('Y-m-d') ;
    // genero la lista de servios solicitados
    $query4="SELECT * from th_pedidos ped
    inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
    inner join th_tipoestatus est on est.est_idEstatus=ped.ped_estatus
    left join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
    left join th_pedidospagos pag on pag.pag_idFactura=fac.fac_idFactura
    where ped.ped_fechacreado between '$fechaInicio 00:00:00' and '$fechaFin 23:59:59'";
    $res4=mysqli_query($con,$query4);
    while ($registros=mysqli_fetch_array($res4)) {
        $fechaparapagar=$registros['ped_fechapago'];
        $estatus=$registros['ped_estatus'];
        $idFactura=$registros['fac_idFactura'];
        $i=$i+1;
    ?>
    <tr>
        <td><?php echo $registros['ped_foliopedido']; ?></td>
        <td><?php echo $registros['ped_fechacreado']; ?></td>
        <td><?php echo $registros['ped_fechaautorizado']; ?></td>
        <td><?php echo $registros['ped_fechaentregado']; ?></td>
        <td><?php echo $registros['ped_fechapago']; ?></td>
        <td><?php echo $registros['pag_fechasepago']; ?></td>
        <td><?php echo $registros['usr_nombrenegocio']; ?></td>
        <td>$<?php echo number_format($registros['ped_montototal'], 2, '.', ',')  ?></td>
        <td><?php echo $registros['est_descripcionEstatus']; ?></td>
        <td><?php if ($estatus==4){ ?>
                        Si
                      <?php } ?></td>
        <td><?php 
                         if ($estatus==4){
                         if ($hoy<$fechaparapagar) { ?>
                          Por vencer
                         <?php } ?>
                         <?php if ($hoy>=$fechaparapagar) { ?>
                          Vencido
                         <?php } } ?></td>
                         <td>
                    <?php // busco si tiene informacion de pago
                         if ($idFactura!=''){ 
                         $querypago="SELECT * from th_pedidospagos where pag_idFactura=$idFactura";
                         $respagos=mysqli_query($con,$querypago);
                         $regpagos=mysqli_fetch_array($respagos);
                         $pago=$regpagos['pag_filepago']; 
                         if ($pago!=''){
                         ?>
                         Si
                         <?php } } ?>
                         </td>
        
    </tr>
<?php } ?>
</table>
</body>
</html>

