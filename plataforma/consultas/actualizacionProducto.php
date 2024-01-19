<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
$con=conexion();
// recibo los post
$pro_sku=$_POST['pro_sku'];

$pro_nombreproducto=$_POST['pro_nombreproducto'];
$pro_descripcion=$_POST['pro_descripcion'];
$pro_preciooro=$_POST['pro_preciooro'];
$pro_preciopremium=$_POST['pro_preciopremium'];
$pro_precioplatino=$_POST['pro_precioplatino'];
$pro_estatus=$_POST['pro_estatus'];
$pro_tags=$_POST['pro_tags'];
$pro_idCategoria=$_POST['pro_idCategoria'];
$pro_idSubcategoria=$_POST['pro_idSubcategoria'];
$pro_marca=$_POST['pro_marca'];


// actualizo los datos del proveedor
$sql = "UPDATE th_cat_productos SET 
pro_sku='$pro_sku',
pro_nombreproducto='$pro_nombreproducto',
pro_descripcion='$pro_descripcion',
pro_preciooro='$pro_preciooro',
pro_preciopremium='$pro_preciopremium',
pro_precioplatino='$pro_precioplatino',
pro_estatus='$pro_estatus',
pro_tags='$pro_tags',
pro_idCategoria='$pro_idCategoria',
pro_idSubcategoria='$pro_idSubcategoria', 
pro_marca='$pro_marca'
WHERE pro_sku='$pro_sku'";

$resultado = mysqli_query($con, $sql);

if ($resultado) {
    echo "La actualización se realizó correctamente.";
} else {
    echo "Error al actualizar: " . mysqli_error($con);
}
?>