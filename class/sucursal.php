<?php 
if ($_POST){
    require_once ("conexion.php");
    $con=conexion();
    $insert="INSERT INTO th_usuariossucursales (suc_idCliente,suc_nombresucursal,suc_contactosucursal,suc_telefono,suc_email,
    suc_direccion,suc_latitud,suc_longitud,suc_estatus) VALUES ('".$_POST['idCliente']."','".$_POST['nombresucursal']."','".$_POST['contactosuc']."'
    ,'".$_POST['telefonosuc']."' ,'".$_POST['emailsuc']."' ,'".$_POST['direccion']."' ,'".$_POST['latitud']."',
    '".$_POST['longitud']."',1)";
    if(mysqli_query($con,$insert)){
        $retval['status'] = 1;

		$retval['message'] =  " Registro correcto";

		echo json_encode($retval);

    }else{
        $retval['status'] = 0;

		$retval['message'] = "Error al ingresar registro";

		echo json_encode($retval);

    }
}
?>