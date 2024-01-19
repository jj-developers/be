<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../class/conexion.php'); 
//funcion para llenar los modulos dependientes de estados
function registraProveedorFinal(){
$con=conexion();
$hoy=date('Y-m-d H:i:s');
// funcion para el codigo unico
function generarCodigo($longitud) {
$key = '';
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
return $key;
}
$codigoP=generarCodigo(10);
// subo el archivo
$archivo = $_FILES['archivolp'];
$archivonombre = $_FILES["archivolp"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='../documentos/listaprecios/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivolp']['name']));
if ($extension!='') {
$url2 ='../documentos/listaprecios/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url2);
$url ='documentos/listaprecios/'.$nombreArchivo;
} else {
$url='';
}
// recibo los post
$nombrenegocio=$_POST['nombrenegocio'];
$razonsocial=$_POST['razonsocial'];
$nombrecont=$_POST['nombrecont'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$comentarios=$_POST['comentarios'];
// inserto los datos del proveedor
$queryUsr="INSERT INTO th_proveedores (prov_nombreproveedor,prov_razonsocial,prov_nombrecontacto,prov_telefono,prov_email,prov_listaprecios,prov_comentarios,prov_estatus) values ('$nombrenegocio','$razonsocial','$nombrecont','$telefono','$email','$url','$comentarios',1)";
$row=mysqli_query($con,$queryUsr);

return $queryUsr;
}

echo registraProveedorFinal(); 