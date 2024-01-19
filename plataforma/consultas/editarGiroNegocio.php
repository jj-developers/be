<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idUSer=$_POST['idUSer'];
$nombreusr=$_POST['nombreusr'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_cat_girosempresas set giremp_nombre='$nombreusr' where giremp_idGiro=$idUSer";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 