<?php
include('../sesiones.php');
// Obtener los datos de la solicitud AJAX
$pro_id = $_POST['pro_id'];
$pro_estatus = $_POST['pro_estatus'];
$queryn =$_POST['queryn'];
$boolif = ($queryn == "true") ? true : false;

// Realizar la actualización en la base de datos
if($boolif)
$sql = "UPDATE th_cat_subcategorias SET subcat_estatus = $pro_estatus WHERE subcat_idSubCategoria = $pro_id";

else
$sql = "UPDATE th_cat_categorias SET cat_estatus = $pro_estatus WHERE cat_idCategoria = $pro_id";


if ($con->query($sql)) {
    echo "Actualización exitosa";
    var_dump($sql);
    var_dump($boolif);
} else {
    echo "Error en la actualización: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();
?>
