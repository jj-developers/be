<?php 
include('../class/conexion.php');
//funcion para llenar los modulos dependientes de estados
function getMunicipios(){
  $con=conexion();
  $estado=$_POST['estado'];
  $query="SELECT * FROM th_cat_municipios WHERE estado_id=$estado";
  $row= mysqli_query($con,$query);
  while($result=mysqli_fetch_array($row)){
    $municipios.="<option value='$result[id]'>$result[nombre]</option>";
    }
  return $municipios;
}
echo getMunicipios(); 


