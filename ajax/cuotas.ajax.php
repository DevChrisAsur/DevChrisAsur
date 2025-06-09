<?php
require_once "../controladores/cuotas.controlador.php";
require_once "../modelos/cuotas.modelo.php";

if (isset($_POST["accion"])) {
    $accion = $_POST["accion"];

    if ($accion == "verCuotasPorFactura" && isset($_POST["idFactura"])) {
        $idFactura = $_POST["idFactura"];

        $respuesta = ControladorCuotas::ctrVerCuotasPorFactura($idFactura);

        if ($respuesta) {
            echo json_encode($respuesta);
        } else {
            echo json_encode(["error" => "No se encontró la factura con el ID proporcionado."]);
        }
        exit;

    } elseif ($accion == "editar" && isset($_POST["idCuota"])) {
        $idCuota = $_POST["idCuota"];

        $respuesta = ControladorCuotas::ctrVerCuota($idCuota);

        if ($respuesta) {
            echo json_encode($respuesta);
        } else {
            echo json_encode(["error" => "No se encontró la cuota con el ID proporcionado."]);
        }
        exit;
    } else {
        echo json_encode(["error" => "Acción no válida o parámetros faltantes."]);
        exit;
    }
} else {
    echo json_encode(["error" => "Acción no especificada."]);
    exit;
}
