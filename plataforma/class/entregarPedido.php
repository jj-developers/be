<?php
date_default_timezone_set ('America/Mexico_City');
@session_start();
require_once ('conexion.php');
class entregarpedido_class {

function accionesentregarpedido() {
    //arreglo
    $datosCmb = $this->GETPOST();
    //llamar las funciones 
    if (array_key_exists('entregarpedido', $datosCmb)) {
         $resp= $this->entregarpedido();
    }
}

// funcion para dar de alta registro
function entregarpedido() {
$con=conexion();
$arrayDatos = $this->GETPOST();
// creo el numero de proveedor
// $idUsuario=$_SESSION['idUsuario'];
$hoy=date('Y-m-d');

//recibo variables post
$idPedido=$arrayDatos['idPedido'];
$imagenb64=$arrayDatos['imagenb64'];
$fechapago=$arrayDatos['fechapago'];

// inserto la firma del pedido
$insert="INSERT INTO th_pedidosfirmas (sig_idPedido,sig_firmab64,sig_estatus) 
VALUES (". $idPedido .",'" . $imagenb64 ."',1)";
$insertaproducto=mysqli_query($con,$insert);

// actualizo el pedido
$estatus="UPDATE th_pedidos set ped_estatus=4, ped_fechaentregado='$hoy', ped_fechapago='$fechapago' where ped_idPedido=$idPedido";
$resestatus=mysqli_query($con,$estatus);

if (!$insertaproducto) { ?>
        <script type="text/javascript">
             window.location="pedidosListadoEntregar?response=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
              window.location="pedidosListadoEntregar?response=true";
        </script>
        <?php }
}

function GETPOST() {
        $datos_getpost = array();
        if ($_POST) {
            if (array_key_exists('entregarPedido', $_POST)) {
                $datos_getpost['entregarPedido'] = $_POST['entregarPedido'];
            }
            if (array_key_exists('idPedido', $_POST)) {
                $datos_getpost['idPedido'] = $_POST['idPedido'];
            }
            if (array_key_exists('imagenb64', $_POST)) {
                $datos_getpost['imagenb64'] =  $_POST['imagenb64'];
            } 
            if (array_key_exists('fechapago', $_POST)) {
                $datos_getpost['fechapago'] =  $_POST['fechapago'];
            }      
        } else if ($_GET) {
            
        }
        return $datos_getpost;
}
}
?>