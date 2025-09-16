<?php
class ControladorFacturas
{

    /*=============================================
        REGISTRAR FACTURA
        =============================================*/
    static public function ctrCrearFactura(){
        $tabla = "factura";
        $datos = array(
            "fecha_emision"   => date('Y-m-d'),
            "id_customer"     => $_POST["idCliente"],
            "id_suscripcion"  => $_POST["idSuscripcion"],
            "bank"            => $_POST["banco"],
            "titular"         => $_POST["titular"],
            "account_number"  => $_POST["numeroCuenta"],
            "account_type"    => $_POST["tipoCuenta"],
            "monto"           => $_POST["monto"],  // Monto de la cuota
            "status_factura"  => "Activa",
            "fecha_limite"    => $_POST["fecha_limite"] // Fecha límite de la cuota
        );

        // Llamar al modelo para registrar la factura
        $respuesta = ModeloFacturas::mdlRegistrarFactura($tabla, $datos);

        if ($respuesta != "error") {
            // Devuelve el ID de la suscripción creada
            return $respuesta;
        } else {
            return "error";
        }
    }


    /*=============================================
        MOSTRAR FACTURAS
        =============================================*/

    static public function ctrVerFacturas($item, $valor)
    {

        $tabla = "factura";  // Especifica la tabla que contiene las facturas

        // Llamada al modelo para obtener la información de la factura
        $respuesta = ModeloFacturas::mdlVerFacturas($tabla, $item, $valor);

        // Puedes manejar aquí errores o procesar la respuesta si es necesario
        if ($respuesta) {
            return $respuesta;  // Devuelve la respuesta si todo salió bien
        } else {
            return null;  // Retorna null si no se encontró información o hubo un problema
        }
    }
    static public function ctrInfoFactura($item, $valor)
    {

        $tabla = "factura";  // Especifica la tabla que contiene las facturas

        // Llamada al modelo para obtener la información de la factura
        $respuesta = ModeloFacturas::mdlVerFacturasPorCliente($tabla, $item, $valor);

        // Puedes manejar aquí errores o procesar la respuesta si es necesario
        if ($respuesta) {
            return $respuesta;  // Devuelve la respuesta si todo salió bien
        } else {
            return null;  // Retorna null si no se encontró información o hubo un problema
        }
    }

    static public function ctrEditarFactura()
    {
        if (isset($_POST["id_factura"])) {
            $tabla = "factura";

            $datos = array(
                "id_factura"      => $_POST["id_factura"],
                "bank"            => $_POST["InfoBanco"],
                "account_type"    => $_POST["InfoTipoCuenta"],
                "account_number"  => $_POST["InfoNumeroCuenta"],
                "titular"         => $_POST["InfoTitular"],
                "fecha_emision"   => $_POST["InfoFechaEmision"],
                "monto"           => $_POST["InfoMonto"],
                "status_factura"  => $_POST["InfoStatusFactura"],
                "fecha_limite"    => $_POST["InfoFechaLimite"]
            );

            return ModeloFacturas::mdlEditarFactura($tabla, $datos);
        }
    }
}
