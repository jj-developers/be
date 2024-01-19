<?php 
error_reporting(0);
include('../class/conexion.php');
$con=conexion();





if ($_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $temp_name = $_FILES['foto']['tmp_name'];
    $file_name = $_FILES['foto']['name'];
    $idProducto=$_POST['idProducto'];
    $foto=$_POST['foto'];
    // Puedes asignar el ID al archivo aquí y realizar otras operaciones necesarias
    // Ejemplo: mover el archivo a una carpeta específica
    $destination = '../documentos/productos/' . $file_name;
    $destination2 = 'documentos/productos/' . $file_name;

    move_uploaded_file($temp_name, $destination);
echo $destination;
    $sql="UPDATE th_cat_productos set pro_imagen='$destination2' where pro_idProducto=$idProducto";
    $res = mysqli_query($con,$sql);
    echo 'Archivo subido correctamente.';
} else {
    echo 'Error al subir el archivo.';
}


?>