<?php
session_start();
date_default_timezone_set('America/Mexico_City');
include('../conexion/conexion.php');

// Función para actualizar el estatus de un producto en el carrito
function registraProveedorFinal()
{
    $con = conexion();

    // Verificamos si se ha recibido el idProducto en el formulario
    if (isset($_POST['idProducto'])) {
        $idProducto = intval($_POST['idProducto']);  // Convertimos a entero para evitar posibles ataques

        // Preparamos la consulta utilizando una sentencia preparada
        $updateQuery = "UPDATE carritos SET Estatus = 0 WHERE IdCarrito = ?";
        $stmt = mysqli_prepare($con, $updateQuery);

        // Verificamos si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Asociamos el parámetro a la sentencia preparada
            mysqli_stmt_bind_param($stmt, "i", $idProducto);

            // Ejecutamos la sentencia preparada
            $success = mysqli_stmt_execute($stmt);

            // Verificamos si la actualización fue exitosa
            if ($success) {
                mysqli_stmt_close($stmt);
                return "¡Actualización exitosa!";
            } else {
                mysqli_stmt_close($stmt);
                return "Error en la actualización: " . mysqli_error($con);
            }
        } else {
            return "Error en la preparación de la consulta: " . mysqli_error($con);
        }
    } else {
        return "Error: Faltan parámetros en la petición.";
    }
}

echo registraProveedorFinal();
?>
