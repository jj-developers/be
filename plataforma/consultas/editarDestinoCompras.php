<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idDestino=$_POST['idDestino'];
$namenew=$_POST['namenew'];
$ubinew=$_POST['ubinew'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_comprasdestinos SET comdes_nombre='$namenew', comdes_direccion='$ubinew' WHERE comdes_idDestino=$idDestino";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 