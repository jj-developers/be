<?php
 header('Content-Description: File Transfer');
 header("Content-Type: application/force-download");

 header('Content-Type: application/csv');
 header('Content-Disposition: attachment; filename="skus_actualizados.csv"');
 header('Expires: 0');
 header('Cache-Control: must-revalidate');
 header('Pragma: public');
 readfile("skus_actualizados.csv");

 // Elimina el archivo temporal
 unlink("skus_actualizados.csv");
?>
