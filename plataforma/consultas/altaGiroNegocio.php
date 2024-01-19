<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$gironew=$_POST['gironew'];
// actualizo los datos del proveedor
$queryUsr="INSERT INTO th_cat_girosempresas (giremp_nombre,giremp_estatus) values ('$gironew',1)";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 