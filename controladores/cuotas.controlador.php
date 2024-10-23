<?php
class ControladorCuotas
{

    /*=============================================
        REGISTRAR CUOTAS
        =============================================*/
        static public function ctrCrearCuotas() {
            $tabla = "cuota"; // Nombre de la tabla de cuotas
            $numCuotas = isset($_POST['numCuotas']) ? intval($_POST['numCuotas']) : 0; 
            $montoTotal = isset($_POST['montoTotal']) ? floatval($_POST['montoTotal']) : 0;

            if ($numCuotas <= 0 || $montoTotal <= 0) {
                error_log("Error: Número de cuotas o monto no válidos.");
                return "error: Número de cuotas o monto no válidos.";
            }
        
            // Calcular el monto de cada cuota (con ajuste para redondeo)
            $montoCuotaBase = floor($montoTotal / $numCuotas * 100) / 100;  // Redondear el monto de la cuota base
            $ajuste = $montoTotal - ($montoCuotaBase * $numCuotas);  // Ajuste para la última cuota
        
            // Iterar sobre el número de cuotas y registrar cada una
            for ($i = 1; $i <= $numCuotas; $i++) {
                // Ajustar el monto de la última cuota para que el total sea exacto
                $montoCuota = ($i === $numCuotas) ? ($montoCuotaBase + $ajuste) : $montoCuotaBase;
        
                // Preparar los datos para cada cuota
                $datos = array(
                    "id_factura" => $_POST["idFactura"],
                    "monto" => $montoCuota,
                    "fecha_vencimiento" => $_POST["fecha_vencimiento_" . $i], // Fecha de vencimiento de cada cuota
                    "estado_pago" => "Pendiente", // Estado de pago inicial
                    "fecha_pago" => NULL // Inicialmente, la fecha de pago está vacía
                );
        
                // Registrar el detalle de los datos enviados
                error_log("Datos de la cuota $i: " . print_r($datos, true));
        
                // Llamar al modelo para registrar cada cuota
                $respuesta = ModeloCuotas::mdlRegistrarCuotas($tabla, $datos);
        
                // Verificar si ocurrió un error al registrar la cuota
                if ($respuesta != "ok") {
                    error_log("Error al registrar la cuota $i: " . $respuesta);
                    return "error: Error al registrar la cuota $i";
                }
            }
        
            return "ok";  // Si todo fue exitoso, retornar "ok"
        }
        
             
}
