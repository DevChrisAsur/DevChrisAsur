<?php
require_once "../controladores/cuotas.controlador.php";
require_once "../modelos/cuotas.modelo.php";

// Verifica si se especificó una acción
if (!isset($_POST["accion"])) {
    echo json_encode(["error" => "Acción no especificada."]);
    exit;
}

switch ($_POST["accion"]) {

    case "verCuotasPorFactura":
        if (!isset($_POST["idFactura"])) {
            echo json_encode(["error" => "ID de factura no proporcionado."]);
            exit;
        }

        $idFactura = $_POST["idFactura"];
        $respuesta = ControladorCuotas::ctrVerCuotasPorFactura($idFactura);
        echo json_encode($respuesta ?: ["error" => "No se encontró la factura con el ID proporcionado."]);
        exit;

    case "editar":
        if (!isset($_POST["idCuota"])) {
            echo json_encode(["error" => "ID de cuota no proporcionado."]);
            exit;
        }

        $respuesta = ControladorCuotas::ctrVerCuota($_POST["idCuota"]);
        echo json_encode($respuesta ?: ["error" => "No se encontró la cuota con el ID proporcionado."]);
        exit;

    case "editarCuota":
        if (!isset($_POST["idCuota"])) {
            echo json_encode(["error" => "ID de cuota no proporcionado."]);
            exit;
        }

        $respuesta = ControladorCuotas::ctrEditarCuota();

        if ($respuesta === "ok") {
            echo json_encode(["success" => "Cuota actualizada correctamente."]);
        } else {
            echo json_encode(["error" => "Error al actualizar la cuota."]);
        }
        exit;

    case "VerDetallesTransfer":
        $respuesta = ControladorCuotas::ctrVerDetallesTransfer();
        echo json_encode([
        'success' => true,
        'data' => $respuesta['detalles'],
        'rango_fecha' => $respuesta['rango_fecha']
        ]);
        exit;
        
    case "VerDetallesRecaudo":
        $respuesta = ControladorCuotas::ctrVerDetallesRecaudo();
        echo json_encode([
        'success' => true,
        'data' => $respuesta['detalles'],
        'rango_fecha' => $respuesta['rango_fecha']
        ]);
        exit;

    default:
        echo json_encode(["error" => "Acción no válida."]);
        exit;
}
