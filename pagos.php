<?php 
if ($_POST){
    require_once ("class/conexion.php");
    $con=conexion();

    $comprobante = $_FILES['file']['name'];

    $valid_extensions = array('PDF', 'pdf');
    $ext = strtolower(pathinfo($comprobante, PATHINFO_EXTENSION));
    // can upload same image using rand function
    // check's valid format
    
    if(in_array($ext, $valid_extensions)) 
    {

        $path = 'plataforma/documentos/pagos/';
        $tmp = $_FILES['file']['tmp_name'];
    
        // can upload same dile using rand function
        $final_comprobante = rand(1000,1000000).$comprobante;
        // check's valid format
    
        $path = $path.strtolower($final_comprobante); 
        move_uploaded_file($tmp,$path);

        $arr=$_POST['pedidos'];
        $error=false;
        
        $porciones = explode(",", $arr);
        
        foreach ($porciones as &$value) {
          
            $querypedido="SELECT * from th_pedidosfacturas where fac_idPedido=$value AND fac_estatus=1 LIMIT 1";
            echo $querypedido;
            $respedido=mysqli_query($con, $querypedido);
            $regpedi=mysqli_fetch_array($respedido);
            $idfactura=$regpedi['fac_idFactura'];
            $insert="INSERT INTO th_pedidospagos (pag_idFactura,pag_filepago,pag_fechasepago, pag_estatus) 
            VALUES ('".$idfactura."','".$path."','".date('Y-m-d')."',2)";
            if(!mysqli_query($con,$insert)){
                $error=true;
            }
        }
        
        if($error==false){
            $retval['status'] = 1;

            $retval['message'] =  " Registro correcto";

            echo json_encode($retval);

        }else{
            $retval['status'] = 0;

            $retval['message'] = "Error al ingresar registro";

            echo json_encode($retval);

        }
    }else{
        $retval['status'] = 0;

        $retval['message'] = "Formato no valido";

        echo ($retval);
    }
}

?>