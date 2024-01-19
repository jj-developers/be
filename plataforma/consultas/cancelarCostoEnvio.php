<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
$con=conexion();
if($_POST){
    $queryUsr="UPDATE th_pedidoscostoenvios SET env_estatus=5 WHERE env_idEnvio=".$_POST['idCostoEnvio'];
    $row=mysqli_query($con,$queryUsr);
    echo "Costo de envío elimiminado correctamente";
    //echo $_POST['iddescuento'];
}
?>