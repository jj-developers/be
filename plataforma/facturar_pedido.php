<?php
if (isset($_POST['id_pedido'])){
    require_once ("vendor/autoload.php");

    $facturama = new \Facturama\Client('barbify', 'Cm3dr4n0');

    require_once ("class/conexion.php");
    $con=conexion();
    $idPedido=$_POST['id_pedido'];
    
    $querypedido="SELECT * from th_pedidos ped
    inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
    inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
    where ped.ped_idPedido=$idPedido";
    $respedido=mysqli_query($con,$querypedido);
    $regpedido=mysqli_fetch_array($respedido);
    if ($regpedido) {
    
    
   

    $idfacturama=$regpedido['id_facturama'];
    $params = [];
    //init facturación
    if($idfacturama==''){
   
        $params = [
          	'Address' => ['Street' => $regpedido['calle_fact'],
    	        'ExteriorNumber' => $regpedido['numero_exterior_fact'],
    	        'InteriorNumber' => $regpedido['numero_interior_fact'],
    	        'Neighborhood' => $regpedido['colonia_fact'],
    	        'ZipCode' => $regpedido['cp_empresa'],
    	        'Locality' => $regpedido['localidad_fact'],
    	        'Municipality' => $regpedido['municipio_fact'],
    	        'State' => $regpedido['estado_fact'],
    	        'Country' => 'MX',
    	      ],
            "Rfc"=>$regpedido['rfc_empresa'],
            "Name"=> $regpedido['usr_nombrenegocio'],
            //"CfdiUse"=> "G03",
            "CfdiUse"=>$regpedido['uso_cfdi'],
            "TaxZipCode"=> $regpedido['cp_empresa'],
            "FiscalRegime"=>$regpedido['regimen_empresa'],
            "Email" => $regpedido['usr_email']];
        
        //print_r($params);
            $cliente = $facturama->post('client', $params);
        $array = json_decode(json_encode($cliente), true);
        $id_facturama=$array['Id'];
        $sql = "UPDATE th_usuarios SET id_facturama='$id_facturama' WHERE usr_idUsuario=".$regpedido['usr_idUsuario']."";
        $creaCuenta=mysqli_query($con, $sql);
    }
    	
    $receiver=
    	array(
            'Address' => ['Street' => $regpedido['calle_fact'],
    	        'ExteriorNumber' => $regpedido['numero_exterior_fact'],
    	        'InteriorNumber' => $regpedido['numero_interior_fact'],
    	        'Neighborhood' => $regpedido['colonia_fact'],
    	        'ZipCode' => $regpedido['cp_empresa'],
    	        'Locality' => $regpedido['localidad_fact'],
    	        'Municipality' => $regpedido['municipio_fact'],
    	        'State' => $regpedido['estado_fact'],
    	        'Country' => 'MX',
    	      ],
              "Name"=>$regpedido['usr_nombrenegocio'],
              "CfdiUse"=>$regpedido['uso_cfdi'],
              "Rfc"=>$regpedido['rfc_empresa'],
              "FiscalRegime"=>$regpedido['regimen_empresa'],
              "TaxZipCode"=>$regpedido['cp_empresa'],
          );
        }
$totalEnvio=0;
$detalles = array();

    $querypro="SELECT * from th_pedidosproductos pp 
    inner join th_cat_productos pro on pro.pro_idProducto=pp.pedpro_idProducto
    where pp.pedpro_idPedido=$idPedido and pedpro_estatus=1";
    $respro=mysqli_query($con,$querypro);
    while ($regproductos=mysqli_fetch_array($respro)){
    	
      	$subtotal=$regproductos['pedpro_cantidadproducto']*$regproductos['pedpro_costoproducto'];
      	$montoPago=bcadd(0,($subtotal*1.16),2);
      	$totalImpuesto=$montoPago-$subtotal;
      	$impuestos =[
            array(
                "Name"=>"IVA",
                "Rate"=>"0.16",
                "Total"=>bcadd(0,($totalImpuesto),2),
                "Base"=> bcadd(0,($subtotal),2),
                "IsRetention"=>"false",
                "IsFederalTax"=>"true"
            )]; 
      	$detalles[] = 
            array(
                "Quantity"=>$regproductos['pedpro_cantidadproducto'],
                "ProductCode"=>$regproductos['productCode'],
                "UnitCode"=> "H87",
                "Unit"=>"Pieza",
                "Description"=> $regproductos['pro_nombreproducto'],
                "IdentificationNumber"=>$regproductos['pro_sku'],
                "UnitPrice"=>bcadd(0,($regproductos['pedpro_costoproducto']),2),
                "Subtotal"=>bcadd(0,($subtotal),2),
                "TaxObject"=> "02",
                "Taxes"=> $impuestos,
                "Total"=> $montoPago
            );
            $totalEnvio=$totalEnvio+$subtotal;
    }


    $queryenv="SELECT env_monto as costoEnvio FROM th_pedidoscostoenvios WHERE $totalEnvio BETWEEN env_minicial AND env_mfinal and env_estatus=1";
    $resenv=mysqli_query($con,$queryenv);
    if ($regenv=mysqli_fetch_array($resenv)){

    $detalles[] = array(
        "Quantity" => 1,  // El costo de envío generalmente es un solo ítem
        "ProductCode" => "78101801",  // Puedes usar un código especial para el envío
        "UnitCode" => "SX",  // Ajusta esto según corresponda
        "Unit" => "Pieza",
        "Description" => "Costo de envío",
        "IdentificationNumber" => "ENVIO",
        "UnitPrice" => bcadd(0, $regenv['costoEnvio'], 2),
        "Subtotal" => bcadd(0, $regenv['costoEnvio'], 2),  // Costo de envío no tiene impuestos
        "TaxObject" => "01",  // Ajusta esto según corresponda
        "Total" => bcadd(0, $regenv['costoEnvio'], 2)
    );
}

    $myObj=
    array(
    "Receiver"=>$receiver,
    "CfdiType"=>"I",
    "ExpeditionPlace"=>"10200",
    "Serie"=>"A",
    "Folio"=>$regpedido['ped_foliopedido'],
    "PaymentForm"=>"99",
    "PaymentMethod"=>"PPD",
    "Exportation"=>"01",
    "Items"=>$detalles);
    $data=json_encode($myObj);
    $cfdi = $facturama->post('/3/cfdis', $myObj);

    $array = json_decode(json_encode($cfdi), true);
    $id_factura=$array['Id'];
 
    /*$sql = "UPDATE th_pedidos SET factura_id='$id_factura' WHERE ped_idPedido=".$idPedido."";
    $creaCuenta=mysqli_query($con, $sql);*/


    //end facturacion
    //
    //$id_factura='ssC8tNP5n0PqNsXOlqQglw2';
    $ruta='/cfdi/xml/issued/'.$id_factura;
    //xml
    $xml = $facturama->get($ruta);
    $arrayX = json_decode(json_encode($xml), true);
    $datosXml=$arrayX['Content'];

    $filexms = base64_decode($datosXml);
    file_put_contents($id_factura.'.xml', $filexms);
    //end xml


    //pdf
    $rutaP='/cfdi/pdf/issued/'.$id_factura;
    $pdf = $facturama->get($rutaP);
    $arrayP = json_decode(json_encode($pdf), true);
    $datosPdf=$arrayP['Content'];

    $filepdf = base64_decode($datosPdf);
    file_put_contents($id_factura.'.pdf', $filepdf);
    //end pdf 

    $anio=date('Y');
    $mes=date('m');
    $path = "facturas/".$anio."/".$mes;
    if(file_exists($path)){
        //echo "la carpeta a crear ya existe<br/>";
    }else{
        mkdir($path, 0755, true);
    }


    $currentLocationX = $id_factura.'.xml';
    $newLocationX = $path.'/'.$currentLocationX;
    $movedX = rename($currentLocationX, $newLocationX);


    $currentLocationP = $id_factura.'.pdf';
    $newLocationP = $path.'/'.$currentLocationP;
    $movedP = rename($currentLocationP, $newLocationP);


    $insert="INSERT INTO th_pedidosfacturas (fac_idPedido,fac_xml,fac_pdf,factura_id,fac_estatus) 
    VALUES ($idPedido,'".$newLocationX."','".$newLocationP."','".$id_factura."',1)";
    mysqli_query($con,$insert);
    
    echo json_encode(array('success' => 1));
}
else{
    echo json_encode(array('success' => 0));
}
?>