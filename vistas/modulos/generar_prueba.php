<div class="content-wrapper">
</div>


<?php


// Decodifica el nombre del archivo PHP
$encodedArchivo = $_SERVER['REQUEST_URI'];
//echo '<pre>'; print_r($encodedArchivo); echo '</pre>';
$archivo = base64_decode($encodedArchivo);
//echo '<pre>'; print_r($archivo); echo '</pre>';

// Decodifica el parámetro idStudent
$idStudent_encoded = $_GET['idStudent'];
///echo '<pre>'; print_r($idStudent_encoded); echo '</pre>';
$idStudent = base64_decode($idStudent_encoded);
//echo '<pre>'; print_r($idStudent); echo '</pre>';
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

            title: 'Certificado generado para el estudiante  $idStudent_encoded',
            icon: 'success',
            button: 'Aceptar',
}).then(function() {
    window.location = 'acudientes';
});
 

</script>
</body>";

// Ahora puedes usar $archivo y $idStudent de manera segura en tu script
?>