<?php 
if ($_POST){
    require_once ("conexion.php");
    $con=conexion();
    $idusuario=$_POST['user_idf'];

    $path = 'plataforma/documentos/csf/';

    $constancia = $_FILES['file']['name'];
    
    if($constancia){
        
        $tmp = $_FILES['file']['tmp_name'];
        // can upload same dile using rand function
        $final_constancia = rand(1000,1000000).$constancia;
        $path = $path.strtolower($final_constancia); 
        move_uploaded_file($tmp,$path);

        $sql = "UPDATE th_usuarios SET usr_nombrenegocio='".strtoupper($_POST['razonsocial'])."',rfc_empresa='".strtoupper($_POST['rfc'])."',cp_empresa='".$_POST['cp']."',
        regimen_empresa='".$_POST['regimen']."',calle_fact='".$_POST['direccion']."',numero_exterior_fact='".$_POST['numeroe']."',colonia_fact='".$_POST['colonia']."',
        municipio_fact='".$_POST['municipio']."',estado_fact='".$_POST['estado']."',uso_cfdi='".$_POST['usocfdi']."',usr_archivocsf='".$path."'
        WHERE usr_idUsuario=".$idusuario."";
        
    }else{
        $sql = "UPDATE th_usuarios SET usr_nombrenegocio='".strtoupper($_POST['razonsocial'])."',rfc_empresa='".strtoupper($_POST['rfc'])."',cp_empresa='".$_POST['cp']."',
        regimen_empresa='".$_POST['regimen']."',calle_fact='".$_POST['direccion']."',numero_exterior_fact='".$_POST['numeroe']."',colonia_fact='".$_POST['colonia']."',
        municipio_fact='".$_POST['municipio']."',estado_fact='".$_POST['estado']."',uso_cfdi='".$_POST['usocfdi']."' 
        WHERE usr_idUsuario=".$idusuario."";
    }
    //$actualizacuenta=mysqli_query($con, $sql);
    if(mysqli_query($con,$sql)){
        $retval['status'] = 1;

		$retval['message'] =  " Registro actualizado correctamente";

		echo json_encode($retval);

    }else{
        $retval['status'] = 0;

		$retval['message'] = "Error al ingresar registro";

		echo json_encode($retval);

    }
}
?>