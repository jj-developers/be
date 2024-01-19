<?php 
if ($_POST){
    require_once ("conexion.php");
    $con=conexion();
    //$path = 'plataforma/documentos/pagos/';

    $comprobante = $_FILES['file']['name'];
    //$tmp = $_FILES['file']['tmp_name'];

    $valid_extensions = array('PDF', 'pdf');
    $ext = strtolower(pathinfo($comprobante, PATHINFO_EXTENSION));
    // can upload same image using rand function
    // check's valid format
    
    if(in_array($ext, $valid_extensions)) 
    {
        /*echo $tmp;
        // can upload same dile using rand function
        $final_name = rand(1000,1000000).$comprobante;
        // check's valid format

        $path = $path.strtolower($final_name); 
        move_uploaded_file($tmp,$path);*/

        $path = 'plataforma/documentos/pagos/';

        $constancia = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
    
        // can upload same dile using rand function
        $final_constancia = rand(1000,1000000).$constancia;
        // check's valid format
    
        $path = $path.strtolower($final_constancia); 
        move_uploaded_file($tmp,$path);

        $arr=$_POST['pedidos'];
        $error=false;
        foreach ($arr as &$value) {
            $querypedido="SELECT * from th_pedidosfacturas where fac_idPedido=$value AND fac_status=1 LIMIT 1";
            $respedido=mysqli_query($con, $querypedido);
            $idfactura=$respedido['fac_idFactura'];
            $insert="INSERT INTO th_pedidospagos (pag_idFactura,pag_filepago,pag_fechasepago, pag_estatus) 
            VALUES ('".$idfactura."','".$path."','".date('Y-m-d')."',2)";
            if(!mysqli_query($con,$insert)){
                $error=true;
            }
        }
        
        if($error){
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

        echo json_encode($retval);
    }
}
?>