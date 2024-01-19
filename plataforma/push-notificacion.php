<?php
// si hay algo que notificar, devuelva la respuesta con datos para
// notificación push de lo contrario, simplemente salga del código
$webNotificationPayload['title'] = 'Pedido pendiente';
$webNotificationPayload['body'] = 'Se creo el pedido 23-09-001 por parte del cliente RESTAURANTE MEDEL';
$webNotificationPayload['icon'] = 'dist/img/iconobebify.jpg';
$webNotificationPayload['url'] = 'https://www.bebify.mx';
echo json_encode($webNotificationPayload);
exit();
?>