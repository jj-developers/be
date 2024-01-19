<?php
session_start();

session_regenerate_id(true);

// Elimina todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

header("Location: index.php");
exit();

?>
