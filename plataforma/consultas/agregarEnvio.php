<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$minicial=$_POST['minicial'];
$mfinal=$_POST['mfinal'];
$costoenvio=$_POST['costoenvio'];
// actualizo los datos del proveedor
$queryUsr="INSERT INTO th_pedidoscostoenvios (env_minicial,env_mfinal,env_monto,env_estatus) VALUES ('$minicial','$mfinal','$costoenvio',1)";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 