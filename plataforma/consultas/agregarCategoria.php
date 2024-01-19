<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');

// recibo los post
$catnew=$_POST['catnew'];
// inserto los datos del proveedor
$queryUsr="INSERT INTO th_cat_categorias (cat_nombrecategoria,cat_estatus) values ('$catnew',1)";
$row=mysqli_query($con,$queryUsr);

return $queryUsr;
}

echo registraProveedorFinal(); 