<?php
$cliente="Prueba";
$foliopedido="09-23-001";
$total="520.00";
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once 'twilio-php/src/Twilio/autoload.php';
    use Twilio\Rest\Client;

    $sid    = "ACed6bd9a224842a8a8582b41b9b4effb0";
    $token  = "ac9bae90556da8309f2eeb457b103a35";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("whatsapp:+5215618592380", // to
        array(
          "from" => "whatsapp:+14155238886",
          "body" => "El cliente ".$cliente." ha creado un pedido con folio ".$foliopedido." por un monto de $".$total.""
        )
      );

print($message->sid);