<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$con=conexion();
$idPedidoCancelar=$_POST['idPedidoCancelar'];
$hoy=date('Y-m-d');
// genero la actualizacion del pedido para ponerlo como recibido
$sql = "UPDATE th_pedidos set ped_estatus=7, ped_fechaautorizado='$hoy' where ped_idPedido=$idPedidoCancelar";
$res = mysqli_query($con,$sql);
// reccoro el pedido para conocer los productos
$qrypro="SELECT * from th_pedidosproductos where pedpro_idPedido=$idPedidoCancelar";
$respro=mysqli_query($con,$qrypro);
while ($regpro=mysqli_fetch_array($respro)){
	$cantidadtotal=$regpro['pedpro_cantidadproducto'];
	$idProductopedido=$regpro['pedpro_idProducto'];
	$idPedidoProducto=$regpro['pedpro_idProductopedido'];
		// consulto los productos en compras
		$qrycompras="SELECT * from th_comprasproductos where compro_idProducto=$idProductopedido AND compro_cantidaddisponible!=0";
		$resqrycompras=mysqli_query($con,$qrycompras);
			$idcompras="";
			$saldosCompras="";
			$comprasusadas="";
			$comprasusadas="";
			while ($regcompras=mysqli_fetch_array($resqrycompras)) {
			$idCompra=$regcompras['compro_idProductoCompra'];
			$totaldisponible=$regcompras['compro_cantidaddisponible'];
			$costoproducto=$regcompras['compro_costoproducto'];
				if (($cantidadtotal <= $totaldisponible) && $cantidadtotal != 0){
					$tol=($totaldisponible-$cantidadtotal);
					$cantidadsobraporenregar=$cantidadtotal;
					$upDat2="UPDATE th_comprasproductos SET compro_cantidaddisponible=$tol WHERE compro_idProductoCompra=$idCompra";
                mysqli_query($con,$upDat2);
                $comprasusadas.=$cantidadtotal.',';
                $idcompras.=$idCompra.',';
                $saldosCompras.=$tol.',';
                $cantidadtotal=0;
                //
                $insrtdatosinv="INSERT INTO th_pedidosproductoscompras (pedcom_idProductoPedido,pedcom_cantidad,pedcom_costo) values ($idPedidoProducto,$cantidadsobraporenregar,$costoproducto)";
                $resinsert=mysqli_query($con,$insrtdatosinv);

				} elseif (($cantidadtotal > $totaldisponible) && $cantidadtotal != 0){//inicia if
                $comprasusadas.=$totaldisponible.',';
                $tol=($cantidadtotal-$totaldisponible);
                $upDat="UPDATE th_comprasproductos SET compro_cantidaddisponible='0' WHERE compro_idProductoCompra=$idCompra";
                mysqli_query($con,$upDat);
                $idcompras.=$idCompra.',';
                $saldosCompras.='0,';
                $cantidadsobraporenregar=$totaldisponible;
                $cantidadtotal=($cantidadtotal-$totaldisponible);

                //
                $insrtdatosinv="INSERT INTO th_pedidosproductoscompras (pedcom_idProductoPedido,pedcom_cantidad,pedcom_costo) values ($idPedidoProducto,$cantidadsobraporenregar,$costoproducto)";
                $resinsert=mysqli_query($con,$insrtdatosinv);
            	}
			// actualizo el campo restandole lo solicitado

		}	
		$comprasusadas=substr($comprasusadas, 0,-1);
        $idcompras=substr($idcompras, 0,-1);
        $saldosCompras=substr($saldosCompras, 0,-1);
        // actualizo el producto pedido con los datos de entrega
}

return $res;
}
echo postdatos(); 
?>