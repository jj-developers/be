<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
include('../class/conexion.php'); 
//if($_POST['nuevoUsuario']){
    //$asunto=$_POST['asunto'];
    $asunto="Alta de usuario";
    //$correo=$_POST['correo'];
    $body="Gracias por registrase con nosotros, favor de verificar tu cuenta de email. No olvides revisar en tu bandeja de SPAM o Correo no deseado";
    $con=conexion();
    $cuenta="SELECT * FROM th_usuarios WHERE usr_email='rolax_sasa@hotmail.com' LIMIT 1";
    $resqueryC=mysqli_query($con,$cuenta);
    $regqueryCue=mysqli_fetch_array($resqueryC);
    $correo=$regqueryCue['usr_email'];
    $cliente=$regqueryCue['usr_nombre'].' '.$regqueryCue['usr_apellidos'];
    //echo $cliente;
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                           //Send using SMTP
        $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'no-reply@bebify.mx';                     //SMTP username
        $mail->Password   = 'MrBrown2021.MrBrown';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('no-reply@bebify.mx', 'Bebify');
        $mail->addAddress($correo, $cliente);     //Add a recipient

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $body.'</b>';
        $mail->AltBody = $body;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
//}

?>