<?php
require_once "../controladores/suscripciones.controlador.php";
require_once "../modelos/suscripciones.modelo.php";

// Verificar si la solicitud contiene los datos necesarios
if (isset($_POST["nuevoServicio"]) && isset($_POST["nuevaSuscripcion"])) {

    // Llamar al controlador de suscripciones para crear una nueva
    $crearSuscripcion = new ControladorSuscripcion();
    $respuesta = $crearSuscripcion->ctrCrearSuscripcion();

    // Enviar la respuesta al frontend
    if ($respuesta == "ok") {
        echo "ok";
    } else {
        echo "error";
    }
}
