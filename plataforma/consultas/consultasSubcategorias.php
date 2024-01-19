<?php 
include('../class/conexion.php');
//funcion para llenar los modulos dependientes de estados
function getMunicipios(){
  $con=conexion();
  $categoria=$_POST['categoria'];
  $query="SELECT * FROM th_cat_subcategorias WHERE subcat_idCategoria=$categoria";
  $row= mysqli_query($con,$query);
  while($result=mysqli_fetch_array($row)){
    $municipios.="<option value='$result[subcat_idSubCategoria]'>$result[subcat_nombresubcategoria]</option>";
    }
  return $municipios;
}
echo getMunicipios(); 


