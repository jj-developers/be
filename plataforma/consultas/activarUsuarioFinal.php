<?php 
error_reporting(0);
include('../class/conexion.php');
function postdatos(){ 
$conn=conexion();
$montoAct=$_POST['montoAct'];
$idUsrAct=$_POST['idUsrAct'];
$tipocosto=$_POST['tipocosto'];
// genero la actualizacion de los usuarios
$sql="UPDATE th_usuarios set usr_montocredito='$montoAct', usr_tipocosto=$tipocosto, usr_estatus=3 where usr_idUsuario=$idUsrAct";
$res = mysqli_query($conn,$sql);

return $row;
}
echo postdatos(); 
?>