<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
$con=conexion();
if($_POST){
    $queryUsr="UPDATE th_descuentos SET desc_estatus=5 WHERE desc_idDescuento=".$_POST['iddescuento'];
    $row=mysqli_query($con,$queryUsr);
    echo "Descuento elimiminado correctamente";
    //echo $_POST['iddescuento'];
}
?>