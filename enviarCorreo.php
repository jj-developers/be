<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y escapar los datos de entrada
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);
    $asunto = filter_var($_POST['asunto'], FILTER_SANITIZE_STRING);

    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hola@bebify.mx';
    $mail->Password = 'Qaz123+8';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'hola@bebify.mx';
    $mail->FromName = 'Correo de bebify';
    $mail->Subject = $asunto;

    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Body = $mensaje;
    $mail->setLanguage('es');

    if ($mail->send()) {
        // El mensaje se envió con éxito, muestra una alerta de éxito
        echo '
            <div class="alert alert-success" role="alert">
                El mensaje fue enviado con éxito.
            </div>
        ';
    } else {
        // Hubo un error en el envío, muestra una alerta de error
        echo '
            <div class="alert alert-danger" role="alert">
                El mensaje no pudo ser enviado. Error: ' . $mail->ErrorInfo . '
            </div>
        ';
    }

    // Cerrar la conexión con el servidor SMTP
    $mail->SmtpClose();
}
?>

