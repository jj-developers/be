<?php
date_default_timezone_set ('America/Mexico_City');
@session_start();
require_once ('conexion.php');
class accionesCompras_class {

function accionesCompras() {
    //arreglo
    $datosCmb = $this->GETPOST();
    //llamar las funciones 
    if (array_key_exists('editaInventario', $datosCmb)) {
         $resp= $this->editaInventario();
    }
}

            // funcion para dar de alta registro
            function editaInventario() {
            $con=conexion();
            $arrayDatos = $this->GETPOST();

            // actualizo las cantidades y estatus del producto
            $number = count($_POST["idpropedido"]);
            if($number >= 1)
            {
            for($i=0; $i<$number; $i++)
            {
            if(trim($_POST["idpropedido"][$i]!= ''))
            {
            $queryCuenta="UPDATE th_comprasproductos SET compro_cantidaddisponible=".$_POST["cantidadpropedido"][$i].", compro_costoproducto=".$_POST["precioprop"][$i]." where compro_idProductoCompra=".$_POST["idpropedido"][$i]." ";
            $creaCuenta=mysqli_query($con,$queryCuenta);
            }
            }
            }


        if (!$creaCuenta) { ?>
        <script type="text/javascript">
             window.location="inventarioListado?successedit=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
              window.location="inventarioListado?successedit=true";
        </script>
        <?php }
}

function GETPOST() {
        $datos_getpost = array();
        if ($_POST) {
            if (array_key_exists('editaInventario', $_POST)) {
                $datos_getpost['editaInventario'] = $_POST['editaInventario'];
            }    
        } else if ($_GET) {
            
        }
        return $datos_getpost;
}
}
?>