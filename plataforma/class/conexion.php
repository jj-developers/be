<?php 
    function conexion()
    {
      // $conexion=mysqli_connect('localhost','solhexc1_carrito1','vmLk(_tQe0!,','solhexc1_carrito');
      $conexion=mysqli_connect('localhost','root','','bebify74');
      mysqli_set_charset($conexion,"utf8");
      return $conexion;

    }
?>