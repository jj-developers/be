<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$namenew2=$_POST['namenew2'];
$ubine2=$_POST['ubine2'];
// actualizo los datos del proveedor
$queryUsr="INSERT INTO th_comprasdestinos (comdes_nombre,comdes_direccion,comdes_estatus) values ('$namenew2','$ubine2',1)";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 