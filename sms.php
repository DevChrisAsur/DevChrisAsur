<?php
//TOKEN QUE NOS DA FACEBOOK
$token = 'EAAOC03X9yIUBO9L6wzZBAysQEne5dCcFoe6jyvxitLOP7hqn6lG75pS1ZAPEpMJHmZBtlcY3HfwVbf6s8O8yzYc0KgszupuVMV24sNiZAdafOWr9orPhNHZAlCGc7mXesnMEhtJtKRGPZCKLJZCmS1ncL6nwNlLncY1CKRvpaM8bkMeoQJQlAaH8dHf9H9yRuLqHnuUZAS77KFUINuuMvAZDZD';
//NUESTRO TELEFONO
$telefono = '+573246194520';
//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v19.0/355273124330042/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = ''
        . '{'
        . '"messaging_product": "whatsapp", '
        . '"to": "'.$telefono.'", '
        . '"type": "template", '
        . '"template": '
        . '{'
        . '     "name": "payment_overdue_1",'
        . '     "language":{ "code": "es" } '
        . '} '
        . '}';
//DECLARAMOS LAS CABECERAS
$header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
//INICIAMOS EL CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
$response = json_decode(curl_exec($curl), true);
//IMPRIMIMOS LA RESPUESTA 
print_r($response);
//OBTENEMOS EL CODIGO DE LA RESPUESTA
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//CERRAMOS EL CURL
curl_close($curl);

echo "<pre>";
   print_r($response);
echo "</pre>";

?>
