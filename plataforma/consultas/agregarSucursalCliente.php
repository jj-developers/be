<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function agregarUsuarioFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');
$idCliente=$_POST['idCliente'];
$nombresucursal=$_POST['nombresucursal'];
$contactosuc=$_POST['contactosuc'];
$telefonosuc=$_POST['telefonosuc'];
$emailsuc=$_POST['emailsuc'];
$direccion=$_POST['direccion'];
$latitud=$_POST['latitud'];
$longitud=$_POST['longitud'];

// inserto los datos del usuario
$queryUsr="INSERT INTO th_usuariossucursales 
(suc_idCliente,suc_nombresucursal,suc_contactosucursal,suc_telefono,suc_email,suc_direccion,suc_latitud, suc_longitud,suc_estatus) values 
($idCliente,'$nombresucursal','$contactosuc','$telefonosuc','$emailsuc','$direccion','$latitud','$longitud',1)";
$row=mysqli_query($con,$queryUsr);
return $row;
}

echo agregarUsuarioFinal(); 