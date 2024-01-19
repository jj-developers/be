<?php
session_start();
date_default_timezone_set('America/Mexico_City');
include('../conexion/conexion.php');

// Función para llenar los módulos dependientes de estados
function registraProveedorFinal()
{
    $con = conexion();
    $hoy = date('Y-m-d H:i:s');

    // Verificamos si las variables POST están definidas
    if (!isset($_POST['quantity']) || !isset($_POST['idProducto']) || !isset($_POST['idCliente'])) {
        return "Error: Faltan parámetros en la petición.";
    }

    // Recibimos los datos del formulario
    $cantidad = $_POST['quantity'];
    $idProducto = $_POST['idProducto'];
    $idCliente = $_POST['idCliente'];

    // Verificamos si los datos recibidos son numéricos
    if (!is_numeric($cantidad)|| !is_numeric($idProducto) || !is_numeric($idCliente)) {
        return "Error: Los datos deben ser valores numéricos.";
    }

    // Calculamos el subtotal

    // Insertamos los datos del proveedor
    $queryCart = "CALL agregarCarrito($idCliente, $idProducto, $cantidad)";
    $row = mysqli_query($con, $queryCart);

    // Verificamos si la consulta fue exitosa
    if (!$row) {
        return "Error en la consulta: " . mysqli_error($con);
    }

    return 1;
}

// Llamamos a la función y mostramos el resultado
echo registraProveedorFinal();
?>
