<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 

if($_GET['nuevoTva']){
    $con=conexion();
    $nuevoE=$_GET['nuevoTva'];
    $sqlEnvio="SELECT * FROM th_pedidoscostoenvios WHERE env_minicial<=$nuevoE AND env_mfinal>=$nuevoE AND env_estatus=1 LIMIT 1";
    $res=mysqli_query($con,$sqlEnvio);
    $envios=mysqli_fetch_array($res);
    echo json_encode($envios);
}
