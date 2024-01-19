<?php
date_default_timezone_set ('America/Mexico_City');
session_start();
require_once ('conexion.php');

class productos_class {

function accionesproductos() {
    //arreglo
    $datosCmb = $this->GETPOST();
    //llamar las funciones 
    if (array_key_exists('ingresarProducto', $datosCmb)) {
         $resp= $this->ingresarProducto();
    }
    if (array_key_exists('actualizarProducto', $datosCmb)) {
         $resp= $this->actualizarProducto();
    }

}
// funcion para dar de alta registro
function ingresarProducto() {
$con=conexion();
$arrayDatos = $this->GETPOST();
// creo el numero de proveedor
// $idUsuario=$_SESSION['idUsuario'];
$hoy=date('Y-m-d H:i:s');

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern) - 1;
    
    for ($i = 0; $i < $longitud; $i++) {
        $key .= $pattern[mt_rand(0, $max)];
    }
    
    return $key;
}

$codigoP=generarCodigo(10);
$token=generarCodigo(24);

// subo el archivo a la carpeta CSF
$archivo = $_FILES['archivofoto'];
$archivonombre = $_FILES["archivofoto"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='documentos/productos/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivofoto']['name']));
if ($extension!='') {
$url ='documentos/productos/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url);
} else {
$url='documentos/productos/botella_demo.png';
}

//recibo variables post
$nombreproducto=$arrayDatos['nombreproducto'];
$sku=$arrayDatos['sku'];
$categoria=$arrayDatos['categoria'];
// obtengo el nombre de la categoria
$qrycate="SELECT * from th_cat_categorias where cat_idCategoria=$categoria";
$rescat=mysqli_query($con,$qrycate);
$regcat=mysqli_fetch_array($rescat);
$categorianame=$regcat['cat_nombrecategoria'];
$subcategoria=$arrayDatos['subcategoria'];
//obtengo el nombre de la subcategoria
$qrycate="SELECT * from th_cat_subcategorias where subcat_idSubCategoria=$subcategoria";
$rescat=mysqli_query($con,$qrycate);
$regcat=mysqli_fetch_array($rescat);
$subcategorianame=$regcat['subcat_nombresubcategoria'];
$qrysubc="";
$marca=$arrayDatos['marca'];
$costooro=$arrayDatos['costooro'];
$costopremium=$arrayDatos['costopremium'];
$costoplatinium=$arrayDatos['costoplatinium'];
$descripcion=$arrayDatos['descripcion'];
$tags=$arrayDatos['tags'];
$estatus=$arrayDatos['estatus'];

$insert="INSERT INTO th_cat_productos (pro_sku,pro_idCategoria,pro_idSubcategoria,pro_marca,pro_nombreproducto,pro_preciooro,pro_preciopremium,pro_precioplatino,pro_imagen,pro_descripcion,pro_tags,pro_estatus) values ('$sku','$categorianame','$subcategorianame','$marca','$nombreproducto','$costooro','$costopremium','$costoplatinium','$url','$descripcion','$tags',$estatus)";
$insertaproducto=mysqli_query($con,$insert);

// consulto el producto para obtener el idProducto
$querypro="SELECT * from th_cat_productos where pro_nombreproducto='$nombreproducto'";
$respro=mysqli_query($con,$querypro);
$regpro=mysqli_fetch_array($respro);
$idProducto=$regpro['pro_idProducto'];

// inserto los precios de los paquetes si existen
$number = count($_POST["costopaq"]);
if($number >= 1)
{
  for($i=0; $i<$number; $i++)
    {
      if(trim($_POST["costopaq"][$i]!= ''))
        {
          // Insertamos la informacion de los modulos
          $sqlmodulos="INSERT INTO th_productospaquetesprecios (propaq_idProducto, propaq_cantidadpaq, propaq_costopaq, propaq_estatus) VALUES(".$idProducto.",'".$_POST["cantidadpaq"][$i]."','".$_POST["costopaq"][$i]."',1)";
              mysqli_query($con,$sqlmodulos);
        }
    }
}
if (!$insertaproducto) { ?>
        <script type="text/javascript">
             window.location="productosAlta?token=<?php echo $token ?>&response=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
              window.location="productosAlta?token=<?php echo $token ?>&response=true";
        </script>
        <?php }
}

function actualizarProducto() {
$con=conexion();
$arrayDatos = $this->GETPOST();
// creo el numero de proveedor
// $idUsuario=$_SESSION['idUsuario'];
$hoy=date('Y-m-d H:i:s');



$codigoP=generarCodigo(10);
$token=generarCodigo(24);

// subo el archivo a la carpeta CSF
$archivo = $_FILES['archivofoto'];
$archivonombre = $_FILES["archivofoto"]["name"];
$nombreArchivo=$codigoP.'-'.$archivonombre;
$codigo=$archivo['name'];
$url121 ='documentos/productos/'.$archivo['name'];
$extension = end(explode(".", $_FILES['archivofoto']['name']));
if ($extension!='') {
$url ='documentos/productos/'.$nombreArchivo;
move_uploaded_file($archivo['tmp_name'], $url);
}

//recibo variables post
$nombreproducto=$arrayDatos['nombreproducto'];
$sku=$arrayDatos['sku'];
$categoria=$arrayDatos['categoriaupd'];
// obtengo el nombre de la categoria
$qrycate="SELECT * from th_cat_categorias where cat_idCategoria=$categoria";
$rescat=mysqli_query($con,$qrycate);
$regcat=mysqli_fetch_array($rescat);
$categorianame=$regcat['cat_nombrecategoria'];
$subcategoria=$arrayDatos['subcategoriaupd'];
//obtengo el nombre de la subcategoria
$qrycate="SELECT * from th_cat_subcategorias where subcat_idSubCategoria=$subcategoria";
$rescat=mysqli_query($con,$qrycate);
$regcat=mysqli_fetch_array($rescat);
$subcategorianame=$regcat['subcat_nombresubcategoria'];
$marca=$arrayDatos['marca'];
$costooro=$arrayDatos['costooro'];
$costopremium=$arrayDatos['costopremium'];
$costoplatinium=$arrayDatos['costoplatinium'];
$descripcion=$arrayDatos['descripcion'];
$estatus=$arrayDatos['estatus'];
$idProducto=$arrayDatos['idProducto'];
$categoriaupd=$arrayDatos['categoriaupd'];
$subcategoriaupd=$arrayDatos['subcategoriaupd'];
$tags=$arrayDatos['tags'];

// actualizo el registro de los usuarios para que pueda solicitar pedidos
$updateregistro="UPDATE th_cat_productos SET pro_sku='$sku', pro_idCategoria='$categorianame',pro_idSubcategoria='$subcategorianame', pro_marca='$marca', pro_nombreproducto='$nombreproducto', pro_preciooro='$costooro', pro_preciopremium='$costopremium', pro_precioplatino='$costoplatinium', pro_descripcion='$descripcion', pro_tags='$tags', pro_estatus=$estatus where pro_idProducto=$idProducto";
$crea=mysqli_query($con,$updateregistro);

if ($url!=''){
// actualizo solo si se cargo archivo
$updateregistro2="UPDATE th_cat_productos SET pro_imagen='$url' where pro_idProducto=$idProducto";
$crea2=mysqli_query($con,$updateregistro2);
}

if (!$crea) { ?>
        <script type="text/javascript">
            window.location="productosListado?responsedit=false";
        </script> 
        <?php } else { ?>
        <script type="text/javascript">
            window.location="productosListado?responsedit=true";
        </script>
        <?php }
}



function GETPOST() {
        $datos_getpost = array();
        if ($_POST) {
            if (array_key_exists('ingresarProducto', $_POST)) {
                $datos_getpost['ingresarProducto'] = $_POST['ingresarProducto'];
            }
            if (array_key_exists('nombreproducto', $_POST)) {
                $datos_getpost['nombreproducto'] = $_POST['nombreproducto'];
            }
            if (array_key_exists('sku', $_POST)) {
                $datos_getpost['sku'] =  $_POST['sku'];
            }
            if (array_key_exists('estatus', $_POST)) {
                $datos_getpost['estatus'] =  $_POST['estatus'];
            }
            if (array_key_exists('categoria', $_POST)) {
                $datos_getpost['categoria'] =  $_POST['categoria'];
            }
            if (array_key_exists('subcategoria', $_POST)) {
                $datos_getpost['subcategoria'] =  $_POST['subcategoria'];
            }
            if (array_key_exists('marca', $_POST)) {
                $datos_getpost['marca'] =  $_POST['marca'];
            }
            if (array_key_exists('costooro', $_POST)) {
                $datos_getpost['costooro'] =  $_POST['costooro'];
            }
            if (array_key_exists('costopremium', $_POST)) {
                $datos_getpost['costopremium'] =  $_POST['costopremium'];
            } 
            if (array_key_exists('costoplatinium', $_POST)) {
                $datos_getpost['costoplatinium'] =  $_POST['costoplatinium'];
            } 
            if (array_key_exists('descripcion', $_POST)) {
                $datos_getpost['descripcion'] =  $_POST['descripcion'];
            }
            if (array_key_exists('actualizarProducto', $_POST)) {
                $datos_getpost['actualizarProducto'] =  $_POST['actualizarProducto'];
            }
            if (array_key_exists('categoriaupd', $_POST)) {
                $datos_getpost['categoriaupd'] =  $_POST['categoriaupd'];
            } 
            if (array_key_exists('subcategoriaupd', $_POST)) {
                $datos_getpost['subcategoriaupd'] =  $_POST['subcategoriaupd'];
            }
            if (array_key_exists('idProducto', $_POST)) {
                $datos_getpost['idProducto'] =  $_POST['idProducto'];
            }
            if (array_key_exists('tags', $_POST)) {
                $datos_getpost['tags'] =  $_POST['tags'];
            }     

        } else if ($_GET) {
            
        }
        return $datos_getpost;
}
}
?>