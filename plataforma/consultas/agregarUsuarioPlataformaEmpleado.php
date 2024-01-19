<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function agregarUsuarioFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');
$rol=$_POST['rol'];
$nombreusr=$_POST['nombreusr'];
$apellidosusr=$_POST['apellidosusr'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$contrasena=$_POST['contrasena'];

// inserto los datos del usuario
$queryUsr="INSERT INTO th_usuarios 
(usr_nombrenegocio,usr_idRol,usr_fecharegistro,usr_nombre,usr_apellidos,usr_telefono,usr_puesto,usr_email,usr_giroempresa,usr_usuario,usr_contrasena,CodigoVerificacion,EmailVerificado,usr_estatus) values 
('No Aplica',$rol,'$hoy','$nombreusr','$apellidosusr','$telefono','Interno','$email',0,'$email','$contrasena','N/A',1,1)";
$row=mysqli_query($con,$queryUsr);

return $row;
}

echo agregarUsuarioFinal(); 