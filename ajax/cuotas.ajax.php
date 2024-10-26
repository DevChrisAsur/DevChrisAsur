<?php
require_once "../controladores/cuotas.controlador.php";
require_once "../modelos/cuotas.modelo.php";

if (isset($_POST["idFactura"])) {
    $idFactura = $_POST["idFactura"];

    // Llamar al controlador para obtener las cuotas de la factura
    $respuesta = ControladorCuotas::ctrVerCuotasPorFactura($idFactura);

    // Enviar la respuesta en formato JSON
    if ($respuesta) {
        echo json_encode($respuesta);
    } else {
        echo json_encode(["error" => "No se encontró la factura con el ID proporcionado."]);
    }
} else {
    echo json_encode(["error" => "ID de factura no válido."]);
}
