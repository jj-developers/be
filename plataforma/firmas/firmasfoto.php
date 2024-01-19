<?php
use PHPMailer\PHPMailer\PHPMailer; require '../PHPMailer/src/Exception.php'; require '../PHPMailer/src/PHPMailer.php'; require '../PHPMailer/src/SMTP.php';

session_start();
date_default_timezone_set ('America/Mexico_City');

include('../class/conexion.php'); 

// Directorio de destino para guardar las imágenes
$directorioDestino = 'fotofirmas/';

// Obtiene la imagen desde la solicitud
$imageData = $_POST['imageData'];
$ped_foliopedido = $_POST['ped_foliopedido'];
$nombreid = $_SESSION['usr_idUsuario'];


// Genera un nombre de archivo único para la imagen
$nombreArchivo = uniqid('imagen_') . '.png';

// Ruta completa del archivo en el servidor
$rutaArchivo = $directorioDestino . $nombreArchivo;

// Guarda la imagen en el servidor
if (file_put_contents($rutaArchivo, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData))) !== false) {
  // La imagen se ha guardado correctamente
  // Ahora puedes guardar $rutaArchivo en tu base de datos en la columna 'sig_firmab64'
  echo 'Imagen guardada con éxito en ' . $rutaArchivo;

} else {
  echo 'Error al guardar la imagen.';

}
try {
    // Conexión a la base de datos

    // Ruta de la imagen (ya la tienes en $rutaArchivo)
    $conexion = conexion();

    // Escapar la ruta de la imagen para prevenir inyección SQL (esto es importante)
    $rutaImagen =$rutaArchivo;

    // Consulta SQL INSERT
    $sql = "INSERT INTO th_pedidosfirmas (sig_idPedido,sig_firmab64,ped_idCliente,sig_estatus) VALUES ('$rutaImagen','$ped_foliopedido','$nombreid','4')";

    if (mysqli_query($conexion, $sql)) {
        echo "Imagen y ruta guardadas en la base de datos.";
    } else {
        echo "Error al guardar la imagen en la base de datos: " . mysqli_error($conexion);
    }

    // Cierra la conexión
    mysqli_close($conexion);
    echo "Imagen y ruta guardadas en la base de datos.";
} catch (PDOException $e) {
    echo "Error al guardar la imagen en la base de datos: " . $e->getMessage();
}



// Datos del formulario
$conexion = conexion();

// Suponiendo que ya tienes una conexión a la base de datos ($conexion).

// Consulta preparada para obtener datos del usuario
$idclientenv = "SELECT usr_email, usr_nombrenegocio FROM th_usuarios WHERE usr_idUsuario  =$nombreid LIMIT 1";

// Inicializa la sentencia preparada
$stmt = mysqli_prepare($conexion, $idclientenv);

if ($stmt) {

    // Ejecuta la consulta
    mysqli_stmt_execute($stmt);

    // Obtiene el resultado
    mysqli_stmt_bind_result($stmt, $emailhecho, $namenegocio);

    // Obtiene los valores
    mysqli_stmt_fetch($stmt);

    header('Content-Type: text/html; charset=UTF-8');



    $mail = new PHPMailer();
    $mail->isSMTP();                                      // Indicamos que use SMTP
    $mail->Host = 'smtp.hostinger.com';  // Indicamos los servidores SMTP
    $mail->SMTPAuth = true;                               // Habilitamos la autenticación SMTP
    $mail->Username = 'hola@bebify.mx';                 // SMTP username
    $mail->Password = 'Qaz123+8';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Habilitar encriptación TLS o SSL
    $mail->Port = 587;                                    // TCP port
    
    /** Configurar cabeceras del mensaje **/
    $mail->From = 'hola@bebify.mx';                       // Correo del remitente
    $mail->FromName = 'Correo de bebify';           // Nombre del remitente
    $mail->Subject = 'Entrega Bebify';                // Asunto
    
    /** Incluir destinatarios. El nombre es opcional **/
    $mail->addAddress($emailhecho);
    
    
    $mail->isHTML(true);                                  
    
    /** Configurar cuerpo del mensaje **/
    $mail->Body    = 'Hola! '. $namenegocio .'<br><br><br>'.
    '<div style="font: size 14px;">'.' Tu pedido ah sido Entregado'.'</div><br><br>'.
    
    $mail->setLanguage('es');
    
    /** Enviar mensaje... **/
    if(!$mail->send()) {
        echo 'El mensaje no pudo ser enviado.';
        echo 'agrego correo ',$nombreid ;

        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
       
        echo'
        <div class="alert alert-primary" role="alert">    
        Su mensaje a sido enviado  exitosamente...
    </div>'
    ;}
    
    echo '<script>';
    echo 'console.log("' . $namenegocio . '");';
    echo '</script>';
    mysqli_stmt_close($stmt);

    return $nombreid;
 

    // Cierra la sentencia preparada
} else {
    // Manejar errores si la preparación de la consulta falla
    // Por ejemplo, puedes mostrar un mensaje de error o registrar el error.
}






?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php   echo registraProveedorFinal(); 
?>