<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
// recibo los post
$idsubcategoria=$_POST['idsubcategoria'];
$catact2=$_POST['catact2'];
$categorianew=$_POST['categorianew'];
if ($categorianew!=''){$catact2=$categorianew;}
$subcatact2=$_POST['subcatact2'];

// actualizo los datos del proveedor
$queryUsr="UPDATE th_cat_subcategorias set subcat_idCategoria=$catact2, subcat_nombresubcategoria='$subcatact2' where subcat_idSubCategoria=$idsubcategoria";
$row=mysqli_query($con,$queryUsr);
return $queryUsr;
}
echo registraProveedorFinal(); 