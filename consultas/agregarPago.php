<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
$hoy=date('Y-m-d');
// funcion para el codigo unico
function generarCodigo($longitud) {
$key = '';
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
return $key;
}
$codigoP=generarCodigo(10);
// subo el archivo

$filename = $code."-".$_FILES['file']['name'];
$location = 'plataforma/documentos/csf/'.$filename;


$archivo = $_FILES['archivopago'];
$archivonombre = $_FILES["archivopago"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='../plataforma/documentos/pagos/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivopago']['name']));
if ($extension!='') {
$url2 ='../plataforma/documentos/pagos/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url2);
$url ='documentos/pagos/'.$nombreArchivo;
} else {
$url='';
}

// recibo los post
// $url='archivo';
			$number = count($_POST["idPedidoPago"]);
            if($number >= 1)
            {
            for($i=0; $i<$number; $i++)
            {
            if(trim($_POST["idPedidoPago"][$i]!= ''))
            {
            // consulto las facturas del pedido
            $queryfac="SELECT * from th_pedidosfacturas where fac_idPedido=".$_POST["idPedidoPago"][$i]."";
            $resfactura=mysqli_query($con,$queryfac);
            $regafacturas=mysqli_fetch_array($resfactura);
            $idFactura=$regafacturas['fac_idFactura'];
            // agrego los pagos	
            $queryPago="INSERT INTO th_pedidospagos (pag_idFactura,pag_filepago,pag_fechasepago,pag_estatus) values ($idFactura,'$url','$hoy',2)";
			$row=mysqli_query($con,$queryPago);
            }
            }
            }

return $row;
}

echo registraProveedorFinal(); 