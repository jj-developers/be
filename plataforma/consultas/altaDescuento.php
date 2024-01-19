<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idCliente=$_POST['idCliente'];
$codigodes=$_POST['codigodes'];
$montodes=$_POST['montodes'];
$usodes=$_POST['usodes'];
$fechades=$_POST['fechades'];
// actualizo los datos del proveedor
$queryUsr="INSERT INTO th_descuentos (desc_codigo,desc_idCliente,desc_monto,desc_fechaVence,des_numDisponibles,desc_estatus) values ('$codigodes',$idCliente,'$montodes','$fechades','$usodes',1)";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 