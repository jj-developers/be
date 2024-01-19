<?php
date_default_timezone_set ('America/Mexico_City');
@session_start();
require_once ('conexion.php');
class accionesPedido_class {

function accionesPedidos() {
    //arreglo
    $datosCmb = $this->GETPOST();
    //llamar las funciones 
    if (array_key_exists('editaPedido', $datosCmb)) {
         $resp= $this->editaPedido();
    }
}

            // funcion para dar de alta registro
            function editaPedido() {
            $con=conexion();
            $arrayDatos = $this->GETPOST();
            $idPedido=$arrayDatos['idPedido'];
            $montopedidoanterior=$arrayDatos['montototal'];
            $idCliente=$arrayDatos['idCliente'];

            // actualizo las cantidades y estatus del producto
            $number = count($_POST["idpropedido"]);
            if($number >= 1)
            {
            for($i=0; $i<$number; $i++)
            {
            if(trim($_POST["idpropedido"][$i]!= ''))
            {
            $queryCuenta="UPDATE th_pedidosproductos SET pedpro_cantidadproducto=".$_POST["cantidadpropedido"][$i].", pedpro_costoproducto=".$_POST["precioprop"][$i]." where pedpro_idProductopedido=".$_POST["idpropedido"][$i]." ";
            $creaCuenta=mysqli_query($con,$queryCuenta);
            }
            }
            }

            // agrego los productos nuevos del pedido
            $number = count($_POST["idProducto"]);
            if($number >= 1)
            {
            for($i=0; $i<$number; $i++)
            {
            if(trim($_POST["idProducto"][$i]!= ''))
            {
            $queryProductosNuevo="INSERT INTO th_pedidosproductos (pedpro_idPedido,pedpro_idProducto,pedpro_cantidadproducto,pedpro_costoproducto,pedpro_estatus) values ($idPedido,".$_POST["idProducto"][$i].",".$_POST["cantidad"][$i].",'".$_POST["precio"][$i]."',1) ";
            $creaactprod=mysqli_query($con,$queryProductosNuevo);
            }
            }
            }

            // actualizo el monto real del pedido
            // consulto el total de cantidades y precios para sacar subtotales
            $querypedidos="SELECT SUM((pedpro_cantidadproducto*pedpro_costoproducto)) as totalPedidot FROM th_pedidosproductos where pedpro_idPedido=$idPedido and pedpro_estatus=1";
            $resquerypedidos=mysqli_query($con,$querypedidos);
            $regpedidos=mysqli_fetch_array($resquerypedidos);
            $totalpedido=$regpedidos['totalPedidot'];
            $iva=$totalpedido*0.16;
            $ttpedt=$totalpedido+$iva;
            // actualizo el monto del pedido
            $actumonto="UPDATE th_pedidos set ped_montototal='$ttpedt' where ped_idPedido=$idPedido";
            $react=mysqli_query($con,$actumonto);
            // actualizo el monto del cliente quitando primero el adeudo anterior
            $updquitar="UPDATE th_usuarios SET usr_montoadeudo=(usr_montoadeudo-$montopedidoanterior)+$ttpedt where usr_idUsuario=$idCliente";
            $resupd=mysqli_query($con,$updquitar);

        if (!$creaCuenta) { ?>
        <script type="text/javascript">
             window.location="pedidosDetalle?idPedido=<?php echo $idPedido ?>&successedit=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
              window.location="pedidosDetalle?idPedido=<?php echo $idPedido ?>&successedit=true";
        </script>
        <?php }
}

function GETPOST() {
        $datos_getpost = array();
        if ($_POST) {
            if (array_key_exists('editaPedido', $_POST)) {
                $datos_getpost['editaPedido'] = $_POST['editaPedido'];
            }
            if (array_key_exists('idPedido', $_POST)) {
                $datos_getpost['idPedido'] = $_POST['idPedido'];
            }
            if (array_key_exists('montototal', $_POST)) {
                $datos_getpost['montototal'] = $_POST['montototal'];
            }
            if (array_key_exists('idCliente', $_POST)) {
                $datos_getpost['idCliente'] = $_POST['idCliente'];
            }     
        } else if ($_GET) {
            
        }
        return $datos_getpost;
}
}
?>