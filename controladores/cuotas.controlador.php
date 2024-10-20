<?php
class ControladorCuotas
{

    /*=============================================
        REGISTRAR CUOTAS
        =============================================*/
        static public function ctrCrearCuotas() {
            $tabla = "cuota"; // Nombre de la tabla cuotas
            $numCuotas = intval($_POST['numCuotas']); // Número de cuotas seleccionadas
            $montoTotal = floatval($_POST['monto']); // Monto total de la factura
            $montoCuota = $montoTotal / $numCuotas; // Calcular el monto de cada cuota
        
            // Iterar sobre el número de cuotas y registrar cada una
            for ($i = 1; $i <= $numCuotas; $i++) {
                // Preparar los datos para cada cuota
                $datos = array(
                    "id_factura" => $_POST["idFactura"],
                    "monto" => $montoCuota,
                    "vecha_fencimiento" => $_POST["fecha_vencimiento_cuota_" . $i], // Fecha de vencimiento para cada cuota
                    "estado_pago" => "Pendiente", // Estado de pago inicial
                    "fecha_pago" => NULL // Al crear la cuota, la fecha de pago está vacía
                );
        
                // Llamar al modelo para registrar la cuota
                $respuesta = ModeloCuotas::mdlRegistrarCuotas($tabla, $datos);
        
                // Verificar si ocurrió un error al registrar la cuota
                if ($respuesta != "ok") {
                    return "error: " . $respuesta;  // Detener el proceso si falla la creación de una cuota
                }
            }
        
            return "ok";  // Si todo fue bien, retornar "ok"
        }
        
}
