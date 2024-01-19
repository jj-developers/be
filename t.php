<?php
$contrasena=$_GET["p"];
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);
echo $contrasena_hash;

?>