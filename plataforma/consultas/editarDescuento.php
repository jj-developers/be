<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idDesc=$_POST['idDesc'];
$codidesc=$_POST['codidesc'];
$montodesc=$_POST['montodesc'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_descuentos set desc_codigo='$codidesc', desc_monto='$montodesc' where desc_idDescuento=$idDesc";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 