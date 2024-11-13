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
                    "estado_pago" => $_POST["estado_pago_" . $i], // Estado de pago inicial
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
        

        static public function ctrVerCuotasPorFactura($idFactura) {
            $tabla = "cuota";  // Nombre de la tabla en la base de datos
            return ModeloCuotas::mdlVerCuotasPorFactura($tabla, 'id_factura', $idFactura);
        }
            
        static public function ctrVerTransfer() {
            $tabla = "cuota";
        
            // Obtener la fecha actual
            $fechaActual = new DateTime();
            $año = $fechaActual->format("Y");
            $mes = $fechaActual->format("m");
        
            // Determinar el rango de fechas basado en el día actual
            $dia = $fechaActual->format("d");
        
            if ($dia >= 1 && $dia <= 15) {
                // Rango del 1 al 15
                $fechaInicio = "$año-$mes-01";
                $fechaFin = "$año-$mes-15";
                $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
            } else {
                // Rango del 16 al último día del mes
                $fechaInicio = "$año-$mes-16";
                $fechaFin = "$año-$mes-" . $fechaActual->format("t"); // 't' da el último día del mes
                $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
            }
        
            // Llamar al método mdlVerTransfer con las fechas calculadas
            $respuesta = ModeloCuotas::mdlVerTransfer($tabla, $fechaInicio, $fechaFin);
        
            // Tasa de cambio
            $tasaDeCambio = 4000;
        
            if ($respuesta && isset($respuesta['monto_total'])) {
                $montoUSD = $respuesta['monto_total'] / $tasaDeCambio;
                return [
                    'monto_cop' => $respuesta['monto_total'],
                    'monto_usd' => $montoUSD,
                    'rango_fecha' => $rangoFecha
                ];
            } else {
                return [
                    'monto_cop' => 0,
                    'monto_usd' => 0,
                    'rango_fecha' => $rangoFecha
                ];
            }
        }
        

        static public function ctrVerProceso() {
            $tabla = "cuota";
        
            // Obtener la fecha actual
            $fechaActual = new DateTime();
            $año = $fechaActual->format("Y");
            $mes = $fechaActual->format("m");
        
            // Determinar el rango de fechas basado en el día actual
            $dia = $fechaActual->format("d");
        
            if ($dia >= 1 && $dia <= 15) {
                // Rango del 1 al 15
                $fechaInicio = "$año-$mes-01";
                $fechaFin = "$año-$mes-15";
                $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
            } else {
                // Rango del 16 al último día del mes
                $fechaInicio = "$año-$mes-16";
                $fechaFin = "$año-$mes-" . $fechaActual->format("t"); // 't' da el último día del mes
                $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
            }
        
            // Llamar al método mdlVerProceso con las fechas calculadas
            $respuesta = ModeloCuotas::mdlVerProceso($tabla, $fechaInicio, $fechaFin);
        
            // Tasa de cambio
            $tasaDeCambio = 4000;
        
            if ($respuesta && isset($respuesta['monto_total'])) {
                $montoUSD = $respuesta['monto_total'] / $tasaDeCambio;
                return [
                    'monto_cop' => $respuesta['monto_total'],
                    'monto_usd' => $montoUSD,
                    'rango_fecha' => $rangoFecha
                ];
            } else {
                return [
                    'monto_cop' => 0,
                    'monto_usd' => 0,
                    'rango_fecha' => $rangoFecha
                ];
            }
        }
        

        static public function ctrContarVentasDiarios() {
            $tabla = "cuota"; 
            
            $respuesta = ModeloCuotas::mdlContarCuotasEnProceso($tabla);
            return $respuesta;
        }
 
        static public function ctrVerRecaudo() {
            $tabla = "cuota";
        
            // Obtener la fecha actual
            $fechaActual = new DateTime();
            $año = $fechaActual->format("Y");
            $mes = $fechaActual->format("m");
        
            // Determinar el rango de fechas basado en el día actual
            $dia = $fechaActual->format("d");
        
            if ($dia >= 1 && $dia <= 15) {
                // Rango del 1 al 15
                $fechaInicio = "$año-$mes-01";
                $fechaFin = "$año-$mes-15";
                $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
            } else {
                // Rango del 16 al último día del mes
                $fechaInicio = "$año-$mes-16";
                $fechaFin = "$año-$mes-" . $fechaActual->format("t"); // 't' da el último día del mes
                $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
            }
        
            // Llamar al método mdlVerProceso con las fechas calculadas
            $respuesta = ModeloCuotas::mdlVerProceso($tabla, $fechaInicio, $fechaFin);
        
            // Tasa de cambio
            $tasaDeCambio = 4000;
        
            if ($respuesta && isset($respuesta['monto_total'])) {
                $montoUSD = $respuesta['monto_total'] / $tasaDeCambio;
                return [
                    'monto_cop' => $respuesta['monto_total'],
                    'monto_usd' => $montoUSD,
                    'rango_fecha' => $rangoFecha
                ];
            } else {
                return [
                    'monto_cop' => 0,
                    'monto_usd' => 0,
                    'rango_fecha' => $rangoFecha
                ];
            }
        }
        static public function ctrEditarCuota($datos) {
            // Validación de datos
            if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $datos["fecha_vencimiento"]) && !empty($datos["estado_pago"])) {
                $tabla = "cuota";
    
                $respuesta = ModeloCuotas::mdlEditarCuota($tabla, $datos);
    
                return $respuesta == "ok" ? "ok" : "error";
            } else {
                return "error";
            }
        }
        
}
