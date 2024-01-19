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
$nombrenegocio=$_POST['nombrecomercial'];
$idProveedor=$_POST['idProveedor'];
$razonsocial=$_POST['razonsocial'];
$nombrecont=$_POST['nombrecont'];
$telefono=$_POST['telefono'];
$email=$_POST['email'];
$comentarios=$_POST['comentarios'];
// actualizo los datos del proveedor
$queryUsr="UPDATE th_proveedores set prov_nombreproveedor='$nombrenegocio', prov_razonsocial='$razonsocial', prov_nombrecontacto='$nombrecont', prov_telefono='$telefono', prov_email='$email', prov_comentarios='$comentarios' where prov_idProveedor=$idProveedor";
$row=mysqli_query($con,$queryUsr);

// si se cambia la lista de precios
if ($url!=''){
$updlp="UPDATE th_proveedores SET prov_listaprecios='$url' WHERE prov_idProveedor=$idProveedor";
$reslp=mysqli_query($con,$updlp);
}
return $row;
}

echo registraProveedorFinal(); 