<div class="content-wrapper">

    <?php

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;
require "Infobip/vendor/autoload.php";



// Verifica si se proporcionó un ID de usuario en la solicitud
if (isset($_GET['idMatri'])) {
    // Obtén el ID de usuario de la solicitud
    $idStudent = $_GET['idMatri'];
   
    //$idParent = $_GET['idParent'];
       
 
    // Aquí debes escribir el código para obtener los datos del usuario de la base de datos
    // Reemplaza este código de ejemplo con el código real que obtiene los datos del usuario

    // Ejemplo de conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "sistema_gestion_academica");

    // Verifica si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error en la conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos del usuario según su ID
     $consulta="SELECT t.id_tuition, t.tuition_date,t.tuition_cost, t.pay_date, t.status_payment, st.id_student, st.registration_date, st.cc, st.first_name, st.last_name, st.st_address, p.id_parent, p.cc_parent, p.first_name_parent, p.last_name_parent, p.email, ph.phone FROM tuition t INNER JOIN student st ON st.id_student = t.id_student INNER JOIN student_parent sp ON st.id_student = sp.id_student INNER JOIN parent p ON p.id_parent = sp.id_parent INNER JOIN parent_phone ph ON ph.id_parent = p.id_parent WHERE t.id_tuition= $idStudent";
    $resultado = $conexion->query($consulta);

    // Verifica si se encontraron resultados
    if ($resultado->num_rows > 0) {
        // Obtiene los datos del usuario
        $fila = $resultado->fetch_assoc();




setlocale(LC_TIME, "spanish");

// echo strftime("%A %d de %B del %Y");

    $nombres_completos_padre=' '.$fila["first_name_parent"].' '.$fila["last_name_parent"].'';
    //echo '<pre>'; print_r($nombres_completos_padre); echo '</pre>';
       $nombres_completos=' '.$fila["first_name"].' '.$fila["last_name"].'';
       //echo '<pre>'; print_r($nombres_completos); echo '</pre>';
       $number = "+57".$fila["phone"];
       //echo '<pre>'; print_r($number); echo '</pre>';
       $message = "Estimado ".$nombres_completos_padre. " Le notificamos que la mensualidad de la matrícula del estudiante " .$nombres_completos. " no se ha efectuado. Por favor, asegúrate de realizar el pago antes del fin del mes en curso.";
       //echo '<pre>'; print_r($message); echo '</pre>';



    $base_url = "https://6gmddd.api.infobip.com";
    $api_key = "bba61232c9c6c6e7981bbf5e32f14612-2b3b1ec8-c6c9-40ac-8ae0-afe428ddc1af";

    $configuration = new Configuration(host: $base_url, apiKey: $api_key);

    $api = new SmsApi(config: $configuration);

    $destination = new SmsDestination(to: $number);

    $message = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "rassijar"
    );

    $request = new SmsAdvancedTextualRequest(messages: [$message]);

    $response = $api->sendSmsMessage($request);


$token = 'EAAOC03X9yIUBO9L6wzZBAysQEne5dCcFoe6jyvxitLOP7hqn6lG75pS1ZAPEpMJHmZBtlcY3HfwVbf6s8O8yzYc0KgszupuVMV24sNiZAdafOWr9orPhNHZAlCGc7mXesnMEhtJtKRGPZCKLJZCmS1ncL6nwNlLncY1CKRvpaM8bkMeoQJQlAaH8dHf9H9yRuLqHnuUZAS77KFUINuuMvAZDZD';
//NUESTRO TELEFONO

//URL A DONDE SE MANDARA EL MENSAJE
$url = 'https://graph.facebook.com/v19.0/355273124330042/messages';

//CONFIGURACION DEL MENSAJE
$mensaje = ''
        . '{'
        . '"messaging_product": "whatsapp", '
        . '"to": "'.$number.'", '
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
//print_r($response);
//OBTENEMOS EL CODIGO DE LA RESPUESTA
$status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//CERRAMOS EL CURL
curl_close($curl);
        // Cierra la conexión a la base de datos
        $conexion->close();

       
      
 


       
            echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1.5rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'Recordatorio enviado al acudiente $nombres_completos_padre con estudiante $nombres_completos ',
            icon: 'success',
            button: 'Aceptar',
}).then(function() {
    window.location = 'matriculas';
});
 

</script>
</body>";
        
    } else {
         echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'No se encontraron datos para el estudiante con ID $idStudent',
            icon: 'error',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});";

    }
} else {
    echo "

        <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script src='sweetalert2.min.js'></script>


    <style>

.swal2-popup {
font-size: 1rem;
}
    </style>
<body>

<script>
   
        swal.fire({

            title: 'No se proporcionó un ID de estudiante',
            icon: 'error',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});";
 
}
?>
</div>
