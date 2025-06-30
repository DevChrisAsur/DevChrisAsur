<?php
require_once "../controladores/suscripciones.controlador.php";
require_once "../modelos/suscripciones.modelo.php";
require_once "../controladores/factura.controlador.php";
require_once "../modelos/factura.modelo.php";
require_once "../controladores/cuotas.controlador.php";  // Asegúrate de incluir el controlador de cuotas
require_once "../modelos/cuotas.modelo.php";  // Asegúrate de incluir el modelo de cuotas

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
if (isset($_POST["action"]) && $_POST["action"] === "crearFactura") {
    $idFactura = ControladorFacturas::ctrCrearFactura();

    if (is_numeric($idFactura)) {
        echo json_encode(['success' => true, 'idFactura' => $idFactura]);
    } else {
        echo json_encode(['success' => false, 'error' => "Error al crear la factura"]);
    }
    exit;
}

// Verificar si se van a crear las cuotas (cuando ya tienes idFactura)
if (isset($_POST["action"]) && $_POST["action"] === "crearCuotas") {
    error_log("Procesando la creación de cuotas para la factura ID: " . $_POST['idFactura']);

    $respuesta = ControladorCuotas::ctrCrearCuotas();

    if ($respuesta === "ok") {
        echo json_encode(['success' => true]);
    } else {
        error_log("Error al crear cuotas: " . $respuesta);
        echo json_encode(['success' => false, 'error' => "Error al crear las cuotas: " . $respuesta]);
    }
    exit; 
}


if (isset($_POST["idCliente"])) {
    $idCliente = $_POST["idCliente"];

    if (is_numeric($idCliente)) {
        $item = "id_customer";
        $valor = $idCliente;
        
        try {
            // Obtener la respuesta del controlador
            $respuesta = ControladorFacturas::ctrInfoFactura($item, $valor);

            // Si se encuentra un cliente, enviamos los datos
            if ($respuesta) {
                echo json_encode($respuesta);
            } else {
                // Enviar un mensaje si no se encuentra el cliente
                echo json_encode(array("error" => "El cliente no tiene facturas registradas"));
            }
        } catch (Exception $e) {
            // Manejo de cualquier error que ocurra durante la ejecución
            echo json_encode(array("error" => "Hubo un error en el servidor: " . $e->getMessage()));
        }
    } else {
        // Respuesta en caso de ID de cliente no válido
        echo json_encode(array("error" => "ID de cliente no válido."));
    }
    exit; // Finalizar aquí para evitar que siga ejecutando las demás acciones
}
