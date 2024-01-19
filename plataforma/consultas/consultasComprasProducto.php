<?php 
include('../class/conexion.php'); 
$con=conexion();
$idProducto=$_POST['idProducto'];
$sql="SELECT * from th_compras  
inner join th_comprasproductos on compro_idCompra=com_idCompra
inner join th_proveedores on prov_idProveedor=com_idProveedor
inner join th_comprasdestinos on comdes_idDestino=com_destino
where compro_idProducto=$idProducto and compro_cantidaddisponible>=1 and compro_estatus=1 order by compro_idProductoCompra ASC";
$res = mysqli_query($con,$sql);
$filas = mysqli_num_rows($res);
    
if ($filas>0) {
	$opciones='';
	$opciones.= '<table class="table table-striped projects">
                  <thead>
                    <tr>
                    <th>Ubicación</th>
                    <th>Proveedor</th>
                    <th>Cantidad</th>
                    <th>Costo</th>
                    <th>Fecha</th> 
                    </tr>
                  </thead>
                 <tbody>';
    while ($fila=mysqli_fetch_array($res)) {
      $fechapedido=$fila['com_fecha'];
      setlocale(LC_ALL,"es_ES@euro","es_ES","esp"); 
      $fecha = strftime("%d/%m/%Y", strtotime($fechapedido));

        $opciones.= '<tr><td>'.$fila['comdes_nombre'].'</td><td>'.$fila['prov_nombreproveedor'].'</td>
        <td>'.$fila['compro_cantidaddisponible'].'</td><td>$'.number_format($fila['compro_costoproducto'], 2, '.', ',').'</td><td>'.$fecha.'</td></tr>';        
    }
    $opciones.='</tbody></table>';
    echo $opciones;
} else {
echo '<div class="alert alert-block alert-danger">
<p>
<strong>
<i class="ace-icon fa fa-check"></i>
Ups.!
</strong>
No se tienen compras activas del producto
</p>
</div>';
 } 

?>