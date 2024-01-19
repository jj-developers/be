<?php
date_default_timezone_set ('America/Mexico_City');
include('../conexion/conexion.php');

$con=conexion();
$username=$_POST['username'];
$password=$_POST['password'];

$IdUsuario=null;
$Contrasena=null;
$IdRol=null;
$TipoCosto=null;

// Realiza una consulta para obtener el hash almacenado en la base de datos
$query = "call login (?)";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $IdUsuario,	$Contrasena,	$IdRol,	$TipoCosto);
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

// Verifica la contraseña ingresada con el hash almacenado
if (password_verify($password, $Contrasena)) {
    // Contraseña válida, realiza las acciones de inicio de sesión
    session_start();
    $_SESSION['IdUsuario'] = $IdUsuario;
   $_SESSION['IdRol'] = $IdRol;
   $_SESSION['TipoCosto'] = $TipoCosto;
   
   echo $loginaccesss='1';

    // Otras acciones de inicio de sesión...
} else {
    // Contraseña incorrecta, maneja el error

    echo "Nombre de usuario o contraseña incorrectos.";
}
?>