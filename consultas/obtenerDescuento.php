<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 

if($_GET['codigo']){
    $con=conexion();
    $codigo =$_GET['codigo'];
    $cliente=$_GET['cliente'];
    $fechaactual=date('Y-m-d');
    $selectD="SELECT * FROM th_descuentos WHERE desc_codigo='$codigo' AND desc_idCliente=$cliente AND desc_estatus=1 AND des_numDisponibles>0 AND desc_fechaVence>='$fechaactual' LIMIT 1";
    $res=mysqli_query($con,$selectD);
    $descuento=mysqli_fetch_array($res);
    echo json_encode($descuento);
}
