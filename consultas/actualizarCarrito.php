<?php
session_start();
date_default_timezone_set('America/Mexico_City');
include('../conexion/conexion.php');

// Función para actualizar datos del carrito
function registraProveedorFinal()
{
    $con = conexion();
    var_dump($_POST);
    // Verificamos si se han recibido los datos esperados en el formulario
    if (isset($_POST["cantidad"], $_POST["idprodcarrito"]) || is_array($_POST["idprodcarrito"])) {
        $idprodcarrito = $_POST["idprodcarrito"];

        $number = count($idprodcarrito);

        if ($number >= 1) {
            for ($i = 0; $i < $number; $i++) {
                $campoCantidad = "cantidad" . $i;

                $cantidad = $_POST[$campoCantidad];

                $idCarrito = (int)$idprodcarrito[$i];

                // Verificamos si la cantidad no está vacía y si es numérica
                if (trim($cantidad) !== '' && is_numeric($cantidad)) {
                    // Actualizamos los datos del carrito
                    $updateinventario = "UPDATE carritos SET Cantidad = $cantidad WHERE IdCarrito = $idCarrito";
                    $resupdate = mysqli_query($con, $updateinventario);
                    
                    if (!$resupdate) {
                        return "Error en la actualización: " . mysqli_error($con);
                    }
                } else {
                    return "Error: La cantidad no es válida.";
                }
            }
        } else {
            return "Error: No se recibieron elementos en idprodcarrito.";
        }
    } else {
        return "Error: Faltan parámetros en la petición.";
    }

    return "¡Actualización de inventario exitosa!";
}

echo registraProveedorFinal();
?>
