<?php
require_once "../controladores/suscripciones.controlador.php";
require_once "../modelos/suscripciones.modelo.php";
require_once "../controladores/factura.controlador.php";
require_once "../modelos/factura.modelo.php";

// Verificar si se va a crear una suscripción
if (isset($_POST["action"]) && $_POST["action"] == "crearSuscripcion") {

    // Depurar los datos recibidos
    error_log("Datos recibidos para crear suscripción: " . print_r($_POST, true));

    // Llamar al controlador de suscripciones para crear una nueva
    $idSuscripcion = ControladorSuscripcion::ctrCrearSuscripcion();

    // Verificar si se creó correctamente la suscripción
    if ($idSuscripcion != "error" && is_numeric($idSuscripcion)) {
        // Devolver el ID de la suscripción creada para ser usado en la creación de facturas
        error_log("Suscripción creada con éxito, ID: " . $idSuscripcion);
        echo json_encode(array("success" => true, "idSuscripcion" => $idSuscripcion));
    } else {
        // Devolver error si la suscripción no se creó
        error_log("Error al crear la suscripción");
        echo json_encode(array("success" => false, "error" => "Error al crear la suscripción"));
    }
    exit; // Termina aquí ya que no necesitas continuar después de devolver la respuesta
}

// Verificar si se van a crear facturas (cuando ya tienes idCliente y idSuscripcion)
if (isset($_POST['idCliente']) && isset($_POST['idSuscripcion'])) {
    // Código para crear la factura
    $respuesta = ControladorFacturas::ctrCrearFactura();
    if ($respuesta === "ok") {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => $respuesta]);
    }
}