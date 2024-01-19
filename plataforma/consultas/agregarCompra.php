<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
$hoy=date('Y-m-d');
$mes=date('m');
$anio=date('Y');
$anonumeros=substr($anio,2, 2);
// recibo los post
$idProveedor=$_POST['idProveedor'];
$destino=$_POST['destino'];

// GENERO EL FOLIO DE LA ORDEN
$queryFolio="SELECT com_consecutivo FROM th_compras where anio=$anonumeros and mes='$mes' ORDER BY com_idCompra DESC";
$resquery=mysqli_query($con,$queryFolio);
if (!$resquery) {
    echo "Error: " . mysqli_error($con);
}
$regquery=mysqli_fetch_array($resquery);
$consecutivo=$regquery['com_consecutivo'];
$consecutivonuevo=$consecutivo+1;
if ($consecutivonuevo>=0 && $consecutivonuevo<=9) {$ceros='00';}
if ($consecutivonuevo>=10 && $consecutivonuevo<=99) {$ceros='0';}
if ($consecutivonuevo>=100 && $consecutivonuevo<=999) {$ceros='';} 
$folionuevo="COM-".$mes."-".$anonumeros."-".$ceros."".$consecutivonuevo;

$creacompra="INSERT INTO th_compras 
(anio,mes,com_consecutivo,com_foliocompra,com_destino,com_idProveedor,com_fecha,com_estatus) 
VALUES 
($anonumeros, '$mes','$consecutivonuevo','$folionuevo',$destino,$idProveedor,'$hoy',1)";
$row=mysqli_query($con,$creacompra);
if (!$row) {
    echo "Error: " . mysqli_error($con);
    echo $creacompra;
}
$qrypedido="SELECT * from th_compras where com_foliocompra='$folionuevo'";
$respedido=mysqli_query($con,$qrypedido);
$regpedido=mysqli_fetch_array($respedido);
$idCompra=$regpedido['com_idCompra'];
$totacomprafinal=0;
            $subtotal=0;
            $number = count($_POST["idProducto"]);
            if($number >= 1)
            {
            for($i=0; $i<$number; $i++)
            {
            if(trim($_POST["idProducto"][$i]!= ''))
            {
            $cantidad=$_POST["cantidad"][$i];
            $precio=$_POST["costo"][$i];
            // inserto los datos de la compra
            echo $idCompra;
            $queryCuenta="INSERT INTO th_comprasproductos 
            (compro_idCompra,compro_idProducto,compro_cantidadproducto,compro_cantidaddisponible,compro_costoproducto,compro_estatus) VALUES 
            ($idCompra,".$_POST["idProducto"][$i].",".$_POST["cantidad"][$i].",".$_POST["cantidad"][$i].",'".$_POST["costo"][$i]."',1)";
            $creaCuenta=mysqli_query($con,$queryCuenta);
            // creo el total de la compra
            $subtotal=$cantidad*$precio;
            $totacomprafinal=$totacomprafinal+$subtotal;
            }
            }
            }


// actualizo el monto
$updcompra="UPDATE th_compras set com_montocompra='$totacomprafinal' where com_foliocompra='$folionuevo'";
$updres=mysqli_query($con,$updcompra);

return $row;
}

echo registraProveedorFinal(); 