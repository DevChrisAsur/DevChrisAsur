<?php
require_once "../controladores/notas.controlador.php";
require_once "../modelos/notas.modelo.php";

/*=============================================
CREAR UNA NUEVA NOTA
=============================================*/
if (isset($_POST["idCliente"]) && isset($_POST['nuevoTituloNota'])) {
    error_log("Datos recibidos para crear nota: " . print_r($_POST, true));

    $respuesta = ControladorNotas::ctrCrearNota();

    if ($respuesta === "ok") {
        echo json_encode(['success' => true]);
    } else {
        error_log("Error al crear la nota: " . $respuesta);
        echo json_encode(['success' => false, 'error' => $respuesta]);
    }
    exit; 
}
