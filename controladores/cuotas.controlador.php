<?php
class ControladorCuotas
{

    /*=============================================
        REGISTRAR CUOTAS
        =============================================*/
        static public function ctrCrearCuotas() {
            $tabla = "cuota";
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
                    "fecha_vencimiento" => $_POST["fecha_vencimiento_" . $i], 
                    "estado_pago" => $_POST["estado_pago_" . $i], 
                    "fecha_pago" => NULL 
                );
        
                error_log("Datos de la cuota $i: " . print_r($datos, true));
        

                $respuesta = ModeloCuotas::mdlRegistrarCuotas($tabla, $datos);
        
                
                if ($respuesta != "ok") {
                    error_log("Error al registrar la cuota $i: " . $respuesta);
                    return "error: Error al registrar la cuota $i";
                }
            }
        
            return "ok"; 
        }
        

        static public function ctrVerCuotasPorFactura($idFactura) {
            $tabla = "cuota";
            return ModeloCuotas::mdlVerCuotasPorFactura($tabla, 'id_factura', $idFactura);
        }
        
        static public function ctrVerCuota($idCuota) {
            $tabla = "cuota";
            $respuesta = ModeloCuotas::mdlVerCuota($tabla, $idCuota);
            return $respuesta;
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

        static public function ctrEditarCuota(){

            
                if(preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST["editarfechaVencimiento"])){
    
                    $tabla = "cuota";
    
    
                    $datos = array(
                        "fecha_vencimiento" => $_POST["editarfechaVencimiento"],
                        "estado_pago" => $_POST["editarEstadoPago"],
                        "fecha_pago" => $_POST["editarFechaPago"],
                        "id_cuota"=>$_POST["idCuota"]);
    
                    $respuesta = ModeloCuotas::mdlEditarCuota($tabla, $datos);
    
    
                    if ($respuesta == "ok") {
                        return "ok";
                    } else {
                        return "error";
                    }  
            }  
        }
        
}
