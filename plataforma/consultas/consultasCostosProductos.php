<?php 
include('../class/conexion.php');
//funcion para llenar los modulos dependientes de estados
function getMunicipios(){
  $conn=conexion();
  $idProducto=$_POST['idProducto']; 
  $query = "SELECT * FROM th_cat_productos WHERE pro_idProducto=$idProducto";
  $row= mysqli_query($conn,$query);
  while($datos = mysqli_fetch_array($row)){
    $opciones=$datos['pro_preciooro'].'/'.$datos['pro_sku'].'/'.$datos['pro_nombreproducto'].'/'.$datos['pro_marca'].'/'.$datos['pro_descripcion'];
  }
  return $opciones;
}

echo getMunicipios(); 