<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php');
//funcion para llenar los modulos dependientes de estados
function login_access(){
$con=conexion();
$username=$_POST['username'];
$password=$_POST['password'];

$queryLogin="SELECT * FROM th_usuarios WHERE usr_usuario='$username' AND usr_contrasena='$password' and usr_estatus in (3,4,1)";
$resultadologin=mysqli_query($con,$queryLogin);
$reg=mysqli_fetch_array($resultadologin);
if ($reg['usr_idUsuario']!='') {
   $_SESSION['usr_idUsuario'] = $reg["usr_idUsuario"];
   $_SESSION['usr_usuario'] = $reg["usr_usuario"];
   $_SESSION['usr_nombre'] = $reg["usr_nombre"];
   $_SESSION['usr_idRol'] = $reg["usr_idRol"];
   $loginaccesss='1';
} else {
   $loginaccesss='2';
}
  return $loginaccesss;
}

echo login_access();  