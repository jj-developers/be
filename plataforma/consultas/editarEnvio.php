<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idEnvio=$_POST['idEnvio'];
$miniact=$_POST['miniact'];
$mfinact=$_POST['mfinact'];
$costoact=$_POST['costoact'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_pedidoscostoenvios set env_minicial='$miniact',env_mfinal='$mfinact',env_monto='$costoact' where env_idEnvio=$idEnvio";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 