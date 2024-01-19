<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../conexion/conexion.php');
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
    
    $con=conexion();
    
    
    $idCliente=$_SESSION['IdUsuario'];
    $cuenta="SELECT ce.MontoCredito,ce.MontoAdeudado  FROM usuarios u 
    INNER JOIN personas p on u.IdPersona=p.IdPersona
    INNER JOIN empresas e on p.IdEmpresa=e.IdEmpresa
    inner JOIN creditoempresa ce on ce.IdCreditoEmpresa=e.IdCreditoEmpresa
    WHERE u.IdUsuario=$idCliente LIMIT 1";

    $resqueryC=mysqli_query($con,$cuenta);
    $regqueryCue=mysqli_fetch_array($resqueryC);

    $montocredito=$regqueryCue['MontoCredito'];

    $sucursalSolicita=$_POST['sucursalSolicita'];
    $comentarios=$_POST['comentarios'];

    $subtotalnew=0;
    $totalpzasnew=0;
    $carrito="SELECT * from carritos c 
    inner join productos p on p.IdProducto=c.IdProducto
    inner join precioproductomembresia pm on pm.IdProducto=p.IdProducto
    where c.IdCliente={$_SESSION['IdUsuario']} and c.Estatus=1 and pm.IdMembresia={$_SESSION['TipoCosto']}";
    $rescarrito=mysqli_query($con,$carrito);
    $totalcarrito=mysqli_num_rows($rescarrito);

    while ($regcarrito=mysqli_fetch_array($rescarrito)){
        $subtotal=($regcarrito['Precio']*$regcarrito["Cantidad"]);
        
        $subtotalnew=$subtotalnew+$subtotal;
        $totalpzas=$regcarrito['Cantidad'];
        $totalpzasnew=$totalpzasnew+$totalpzas;

        } 

    $subtotal=$subtotalnew;
    $ivaD=$subtotalnew*.16;
    $nuevoE=$ivaD+$subtotalnew;

    if($_POST['valorDescuentoAp']){
        $montoD=$_POST['valorDescuentoAp'];
    }
    else{
        $montoD=0;
    }
    
    $total=$_POST['total']-$montoD;
    $hoy=date('Y-m-d');
    $foliopedido='23-09-15';
    //Nuevos campos

    $sqlEnvio="SELECT * FROM costosenvio c WHERE c.Desde<=$nuevoE AND c.Hasta>=$nuevoE AND c.Estatus=1 
                                                                            LIMIT 1";
                                                                            $resEnd=mysqli_query($con,$sqlEnvio);
                                                                            $dataen=mysqli_fetch_array($resEnd);
                                                                            if($dataen){
                                                                              $costoEnvio=$dataen['Precio'];
                                                                            }else{
                                                                              $costoEnvio=0;
                                                                            }   
    // consulta para obtener el ultimo folio
    $queryFolio="SELECT COALESCE(MAX(IdPedido), 0) AS UltimoPedido
    FROM pedidos;";

    $resquery=mysqli_query($con,$queryFolio);
    $regquery=mysqli_fetch_array($resquery);
    $consecutivo=$regquery['UltimoPedido'];
    $consecutivonuevo=$consecutivo+1;
    if ($consecutivonuevo>=0 && $consecutivonuevo<=9) {$ceros='00';}
    if ($consecutivonuevo>=10 && $consecutivonuevo<=99) {$ceros='0';}
    if ($consecutivonuevo>=100 && $consecutivonuevo<=999) {$ceros='';}
    $foliopedido=$hoy."-".$consecutivonuevo;
    $totalN=$total+$costoEnvio;
    echo $foliopedido;
    /*
    // creo el pedido del cliente
    $creapedido="INSERT INTO th_pedidos (
        ped_anio,ped_mes,ped_consecutivo,ped_foliopedido,ped_idCliente,ped_idSucursal,ped_montototal,
        ped_fechacreado,ped_comentarios,ped_costoEnvio,ped_descuento,ped_estatus)
         VALUES ($anonumeros,'$mes','$consecutivonuevo','$foliopedido',$idCliente,$sucursalSolicita,'$total',
         '$hoy','$comentarios',$costoEnvio,$montoD,8)";

    $row=mysqli_query($con,$creapedido);
    //echo $creapedido;
    // actualizo el monto adeudo del cliente
    $updmonto="UPDATE th_usuarios SET usr_montoadeudo=usr_montoadeudo+$totalN WHERE usr_idUsuario=$idCliente";
    $resupdmonto=mysqli_query($con,$updmonto);

    // consulto el id de Pedido
    $qrypedido="SELECT * from th_pedidos where ped_foliopedido='$foliopedido'";
    $respedido=mysqli_query($con,$qrypedido);
    $regpedido=mysqli_fetch_array($respedido);
    $idPedido=$regpedido['ped_idPedido'];

    // consulto los productos del carrito y los agrego al pedido
    $qryconsulcarrito="SELECT * from th_carrito where cart_idCliente=$idCliente and cart_estatus=1";
    $rescarritopro=mysqli_query($con,$qryconsulcarrito);
    while ($regcarritopro=mysqli_fetch_array($rescarritopro)){
        // inserto los productos al pedido
        $insertpedpro="INSERT INTO th_pedidosproductos (pedpro_idPedido,pedpro_idProducto,pedpro_cantidadproducto,pedpro_costoproducto,pedpro_estatus) VALUES ($idPedido,".$regcarritopro['cart_idProducto'].",".$regcarritopro['cart_cantidadproducto'].",'".$regcarritopro['cart_costoproducto']."',1)";
        $resinsert=mysqli_query($con,$insertpedpro);    
    }

    // por ultimo cancelo el carrito del cliente
    $cancelcarrito="UPDATE th_carrito SET cart_estatus=5 WHERE cart_idCliente=$idCliente";
    $rescancel=mysqli_query($con,$cancelcarrito);
    
    //valido si lleva descuento y lo retiro
    if($_POST['idDescuentoAp']>0){
        $descuentoEnvId=$_POST['idDescuentoAp'];
        $canceldescuento="UPDATE th_descuentos SET des_numDisponibles=des_numDisponibles-1,desc_numUsados=desc_numUsados+1 WHERE desc_idDescuento=$descuentoEnvId";
        $canceldescuento=mysqli_query($con,$canceldescuento);
    }
    // retorno un resultado
    */
    return $row;
}

echo registraProveedorFinal(); 