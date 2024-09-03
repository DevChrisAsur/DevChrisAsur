<?php
// Decodifica el nombre del archivo PHP
$encodedArchivo = $_SERVER['REQUEST_URI'];
echo '<pre>'; print_r($encodedArchivo); echo '</pre>';
$archivo = base64_decode($encodedArchivo);

// Decodifica el parámetro idStudent
$idStudent_encoded = $_GET['idStudent'];
$idStudent = base64_decode($idStudent_encoded);

// Ahora puedes usar $archivo y $idStudent de manera segura en tu script
?>