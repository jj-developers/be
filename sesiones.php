<?php
session_start();
include('./conexion/conexion.php');

$con = conexion();
$Nombre=null;
    $Apellidos=null;
    $EstatusCredito=null;
    $TipoCosto=null;
// Verifica si está definido el valor de $_SESSION['idusuario'], y si no, asigna null.
$usr_idUsuario = isset($_SESSION['IdUsuario']) ? $_SESSION['IdUsuario'] : null;
if ($usr_idUsuario !== null) {
    
    // Utiliza una consulta preparada para evitar posibles ataques de inyección SQL.
    $qrysuser = "Call sesiones(?);";
    
    // Prepara la consulta
    $stmt = mysqli_prepare($con, $qrysuser);
    
    // Vincula el parámetro
    mysqli_stmt_bind_param($stmt, "i", $usr_idUsuario);
    
    // Ejecuta la consulta
    mysqli_stmt_execute($stmt);

    // Obtiene el resultado
    $resuser = mysqli_stmt_get_result($stmt);

    // Verifica si la consulta se ejecutó correctamente
    if ($resuser) {
        // Obtiene los resultados
        $reguser = mysqli_fetch_array($resuser);

        // Asigna valores a las variables de sesión
        $_SESSION['IdRol'] = $reguser['IdRol'];
        $_SESSION['TipoCosto'] = $reguser['TipoCosto'];
        $_SESSION['IdUsuario'] = isset($reguser['IdUsuario']) ? $reguser['IdUsuario'] : 0;
        $Nombre=$reguser['Nombre'];
        $EstatusCredito=$reguser['EstatusCredito'];
        $TipoCosto=$reguser['TipoCosto'];
        $Correo=$reguser['Correo'];

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Error en la consulta: " . mysqli_error($con);
    }
}

// Asegúrate de cerrar la conexión al finalizar
?>
