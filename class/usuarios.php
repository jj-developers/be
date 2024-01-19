<?php 
if ($_POST){
    require_once ("class/conexion.php");
    $con=conexion();
    $insert="INSERT INTO th_usuarios (usr_nombrenegocio,usr_idRol,usr_fecharegistro, usr_nombre,usr_apellidos,
    usr_telefono, usr_puesto, usr_email, usr_giroempresa, usr_nosucursales, usr_ticketpromedio, usr_numeromesas,
    usr_numeroempleados, usr_diascredito, usr_montocredito, usr_archivocsf, usr_usuario, usr_contrasena, usr_estatus) 
    VALUES ('".strtoupper($_POST['nombreComercial'])."',1,'".date('Y-m-d h:i:s')."','".$_POST['nombre']."','".$_POST['apellido']."'
    ,'".$_POST['phone']."' ,'".$_POST['puesto']."' ,'".$_POST['email']."' ,'".$_POST['giro']."','".$_POST['nosucursales']."'
    ,'".$_POST['ticketpromedio']."','".$_POST['nomesas']."','".$_POST['noempleados']."',7,'".$_POST['montocredito']."',
    '','".$_POST['email']."','".$_POST['passw']."',2)";
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