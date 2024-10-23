<?php
class ControladorFacturas
{

    /*=============================================
        REGISTRAR FACTURA
        =============================================*/
        static public function ctrCrearFactura() {
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
                "status_factura"  => "Pendiente",
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
    static public function ctrMostrarFacturas($item, $valor)
    {

        $tabla = "factura";

        $respuesta = ModeloFacturas::mdlVerFacturas($tabla, $item, $valor);

        return $respuesta;
    }
}
