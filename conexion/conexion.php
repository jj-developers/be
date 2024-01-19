<?php 
 function conexion()
 {
     // $conexion=mysqli_connect('localhost','solhexc1_carrito1','vmLk(_tQe0!,','solhexc1_carrito');
     $conexion=mysqli_connect('localhost','root','','bebify');
     mysqli_set_charset($conexion,"utf8");
 
     // Verificar la conexión
     if (mysqli_connect_errno()) {
         echo "Falló la conexión a MySQL: " . mysqli_connect_error();
     }
     
     return $conexion;
 }
 
?>