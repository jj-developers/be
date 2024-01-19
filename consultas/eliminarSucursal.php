<?php
session_start();
date_default_timezone_set ('America/Mexico_City');
include('../conexion/conexion.php');
//funcion para llenar los modulos dependientes de estados
if($_POST){
    if(isset( $_POST['sucursalidE'])){
        $con=conexion();

        $idSucursal =$_POST['sucursalidE'];
        $update="UPDATE th_usuariossucursales 
            SET suc_nombresucursal='".$_POST['anombresucursal']."',suc_contactosucursal='".$_POST['acontactosuc']."',
            suc_telefono='".$_POST['atelefonosuc']."',suc_email='".$_POST['aemailsuc']."',
            suc_direccion='".$_POST['adireccion']."' WHERE suc_idSucursal=$idSucursal";
        if(mysqli_query($con,$update)){
            $retval['status'] = 1;
            $retval['message'] =  "Sucursal actualizada correctamente";
        }else{
            $retval['status'] = 0;
            $retval['message'] =  "Error al eliminar sucursal";
            
        }
        echo json_encode($retval);
    }else{
        function registraProveedorFinal(){
            $idSucursal =$_POST['idSucursal'];
            $con=conexion();

            $update="UPDATE th_usuariossucursales SET suc_estatus=5 WHERE suc_idSucursal=$idSucursal";
            if(mysqli_query($con,$update)){
                $retval['status'] = 1;
                $retval['message'] =  "Sucursal eliminada correctamente";
            }else{
                $retval['status'] = 0;
                $retval['message'] =  "Error al eliminar sucursal";
                
            }
        return json_encode($retval);
        }
        echo registraProveedorFinal();
    }
}else if($_GET){
    $idSucursal =$_GET['idSucursal'];
    $con=conexion();

    $queryl = "SELECT s.Nombre,s.Encargado,s.Telefono, s.Correo,s.Direccion FROM sucursalesempresas se
    INNER JOIN sucursales s ON se.IdSucursal = s.IdSucursal 
    INNER JOIN empresas e on e.IdEmpresa=se.IdEmpresa
    INNER JOIN personas p on p.IdEmpresa=e.IdEmpresa
    INNER JOIN usuarios u on u.IdPersona=p.IdPersona
    WHERE se.IdSucursalEmpresa = $idSucursal AND u.IdUsuario = {$_SESSION['IdUsuario']} LIMIT 1";
$data = mysqli_query($con, $queryl);
$sucursal = mysqli_fetch_array($data);
echo json_encode($sucursal);
}
