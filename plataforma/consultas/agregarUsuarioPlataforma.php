<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function agregarUsuarioFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');
$nombrenegocio=$_POST['nombrenegocio'];
$rol=$_POST['rol'];
$nombreusr=$_POST['nombreusr'];
$apellidosusr=$_POST['apellidosusr'];
$telefono=$_POST['telefono'];
$puesto=$_POST['puesto'];
$email=$_POST['email'];
$giroempresa=$_POST['giroempresa'];
$giroempresanew=$_POST['otrogiro'];
$contrasena=$_POST['contrasena'];
// si es otro en giroempresa
if ($giroempresa=='otro'){
	// inserto el giro en la tabla th_cat_girosempresas
	$insrtgiro="INSERT INTO th_cat_girosempresas (giremp_nombre,giremp_estatus) 
						VALUES ('$giroempresanew',1)";
	$resgiro=mysqli_query($con,$insrtgiro);
	// consulto el IDGiro que acabamos de generar
	$selectgiro="SELECT * from th_cat_girosempresas where giremp_nombre='$giroempresanew'";
	$resotrogiro=mysqli_query($con,$selectgiro);
	$reggiro=mysqli_fetch_array($resotrogiro);
	$giroempresa=$reggiro['giremp_idGiro'];
}

// inserto los datos del usuario
$queryUsr="INSERT INTO th_usuarios 
(usr_nombrenegocio,usr_idRol,usr_fecharegistro,usr_nombre,usr_apellidos,usr_telefono,usr_puesto,usr_email,usr_giroempresa,usr_usuario,usr_contrasena,CodigoVerificacion,EmailVerificado,usr_estatus) values 
('$nombrenegocio',$rol,'$hoy','$nombreusr','$apellidosusr','$telefono','$puesto','$email',$giroempresa,'$email','$contrasena','N/A',1,1)";
$row=mysqli_query($con,$queryUsr);

return $row;
}

echo agregarUsuarioFinal(); 