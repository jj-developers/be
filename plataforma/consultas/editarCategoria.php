<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idUSer=$_POST['idUSer'];
$usrname=$_POST['usrname'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_cat_categorias set cat_nombrecategoria='$usrname' where cat_idCategoria=$idUSer";
$row=mysqli_query($con,$queryUsr);
return $row;
}
echo registraProveedorFinal(); 