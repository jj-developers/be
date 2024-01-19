<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y escapar los datos de entrada
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $numeroAleatorio = filter_var($_POST['numeroAleatorio'], FILTER_SANITIZE_STRING);


    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'hola@bebify.mx';
    $mail->Password = 'Qaz123+8';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->From = 'hola@bebify.mx';
    $mail->FromName = 'Bebify';
    $mail->Subject = 'Confirmacion de correo electronico';

    $mail->addAddress($email);

    $mail->Body = 'Hola somos Bebify, este es el codigo para activar tu cuenta '.$numeroAleatorio;

    if ($mail->send()) {
        echo '
                El mensaje fue enviado con éxito. Revisa tu correo, incluyendo la carpeta de spam.
            
        '.$numeroAleatorio;;
    } else {
        echo '
                El mensaje no pudo ser enviado. Error: ' . $mail->ErrorInfo . '
        ';
    }

    $mail->SmtpClose();
}
?>
