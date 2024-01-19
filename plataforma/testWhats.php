<?php
$whats='5574225091';
// codigo para enviar el WhatsApp
$apiURL = 'https://api.chat-api.com/instance294187/';
$token = '1teazgb1i60r0oho';
$ingNombre='CESAR MEDRANO TORRES';
$datosprueba='PRUEBA PARA MIGRACION';
$message = 'EL USUARIO '.$ingNombre.' HA CREADO UN APRUEBA CON LOS SIGUIENTES DATOS *'.$datosprueba.'*';
$phone='52'.$whats;

$data = json_encode(
    array(
        'chatId'=>$phone.'@c.us',
        'body'=>$message
    )
);
$url = $apiURL.'message?token='.$token;
$options = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        )
    )
);
echo $response = file_get_contents($url,false,$options);
// $response; 
// exit;

