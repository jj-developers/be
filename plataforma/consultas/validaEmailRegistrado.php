<?php 
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php');
//funcion para llenar los modulos dependientes de estados
function login_access(){
$con=conexion();
$email=$_POST['email'];

$sql="SELECT * from th_usuarios u where u.usr_email='$email'";
$res = mysqli_query($con,$sql);
$filas = mysqli_num_rows($res);
if ($filas>=1) {
   $emailaccess='1';
} else {
   $emailaccess='2';
}
  return $emailaccess;
}

echo login_access(); 