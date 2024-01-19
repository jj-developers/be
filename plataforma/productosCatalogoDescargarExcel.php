<?php
@session_start();

// Crear la conexión con soporte para UTF-8
require_once('class/conexion.php');
$con = conexion();
mysqli_set_charset($con, "utf8");

$array_var = $_POST['categoria'];

// Asegúrate de que $array_var sea un array antes de usarlo
if (is_array($array_var)) {
    $string_from_array = implode(',', $array_var);
    $string_from_array = preg_replace('/[\x00-\x1F\x7F]/', '', $string_from_array);
    $categoria_array = explode(',', $string_from_array);

    $var = '';
    $campo1 = 'SKU';
    $campo2 = 'Nombre';
    $campo3 = 'Marca';
    $campo4 = 'Categoria';
    $campo5 = 'SubCategoria';
    $campo7 = 'PrecioOro';
    $campo8 = 'PrecioPremium';
    $campo9 = 'PrecioPlatino';
    $campo10 = 'Estado';
    $campo11 = 'Proveedor';
    $campo12 = 'Etiquetas';
    $campo13 = 'Descripcion';

    $campos = array(
        $campo1, $campo2, $campo3, $campo4, $campo5, $campo7, $campo8, $campo9, $campo10, $campo11, $campo12, $campo13
    );
    $var .= implode(',', $campos) . "\n";

    foreach ($categoria_array as $valor) {
        // Elimina comillas alrededor del valor
        $valor = trim($valor, "'");

        $query4 = "SELECT * from th_cat_productos where pro_idCategoria = '$valor'";
        $res4 = mysqli_query($con, $query4);

        while ($registro = mysqli_fetch_array($res4)) {
            $valores = array(
                empty($registro['pro_sku']) ? ' ' : '"' . mb_convert_encoding($registro['pro_sku'], 'UTF-8') . '"',
                empty($registro['pro_nombreproducto']) ? ' ' : '"' . mb_convert_encoding($registro['pro_nombreproducto'], 'UTF-8') . '"',
                empty($registro['pro_marca']) ? ' ' : '"' . mb_convert_encoding($registro['pro_marca'], 'UTF-8') . '"',
                empty($registro['pro_idCategoria']) ? ' ' : '"' . mb_convert_encoding($registro['pro_idCategoria'], 'UTF-8') . '"',
                empty($registro['pro_idSubcategoria']) ? ' ' : '"' . mb_convert_encoding($registro['pro_idSubcategoria'], 'UTF-8') . '"',
                empty($registro['pro_preciooro']) ? ' ' : '"' . mb_convert_encoding($registro['pro_preciooro'], 'UTF-8') . '"',
                empty($registro['pro_preciopremium']) ? ' ' : '"' . mb_convert_encoding($registro['pro_preciopremium'], 'UTF-8') . '"',
                empty($registro['pro_precioplatino']) ? ' ' : '"' . mb_convert_encoding($registro['pro_precioplatino'], 'UTF-8') . '"',
                empty($registro['pro_estatus']) ? ' ' : '"' . mb_convert_encoding($registro['pro_estatus'], 'UTF-8') . '"',
                empty($registro['pro_proveedor']) ? ' ' : '"' . mb_convert_encoding($registro['pro_proveedor'], 'UTF-8') . '"',
                empty($registro['pro_tags']) ? ' ' : '"' . mb_convert_encoding($registro['pro_tags'], 'UTF-8') . '"',
                empty($registro['pro_descripcion']) ? ' ' : '"' . mb_convert_encoding($registro['pro_descripcion'], 'UTF-8') . '"',
            );

            // Agregar los valores al archivo CSV
            $var .= implode(',', $valores) . "\n";
        }
    }

    // Configurar las cabeceras para descargar el archivo CSV
    header("Content-Description: File Transfer");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=catalogoactual.csv");
    header("Content-Encoding: UTF-8");

    // Imprimir el contenido del archivo CSV
    echo "\xEF\xBB\xBF"; // BOM (Byte Order Mark) para asegurar que se use UTF-8
    echo $var;
} else {
    echo "No se proporcionó un array válido en \$_POST['categoria']";
}
?>
