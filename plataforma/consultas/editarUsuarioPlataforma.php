<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');
// funcion para el codigo unico
// recibo los post
$idUSer=$_POST['idUSer'];
$idProveedor=$_POST['idProveedor'];
$nombreusr=$_POST['nombreusr'];
$apellidosusr=$_POST['apellidosusr'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$contrasena=$_POST['contrasena'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_usuarios set usr_nombre='$nombreusr', usr_apellidos='$apellidosusr', usr_telefono='$telefono', usr_email='$email', usr_usuario='$email', usr_contrasena='$contrasena' where usr_idUsuario=$idUSer";
$row=mysqli_query($con,$queryUsr);

return $row;
}

echo registraProveedorFinal(); 