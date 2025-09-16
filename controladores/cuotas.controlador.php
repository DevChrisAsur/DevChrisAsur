<?php
class ControladorCuotas
{

    /*=============================================
        REGISTRAR CUOTAS
        =============================================*/
static public function ctrCrearCuotas() {
    $tabla = "cuota";
    $numCuotas = isset($_POST['numCuotas']) ? intval($_POST['numCuotas']) : 0; 

    if ($numCuotas <= 0) {
        error_log("Error: Número de cuotas no válido.");
        return "error: Número de cuotas no válido.";
    }

    // Iterar sobre el número de cuotas y registrar cada una
    for ($i = 1; $i <= $numCuotas; $i++) {
        // Tomamos directamente el valor enviado desde el formulario
        $montoCuota = isset($_POST["monto_" . $i]) ? floatval($_POST["monto_" . $i]) : 0;

        $datos = array(
            "id_factura"       => $_POST["idFactura"],
            "monto"            => $montoCuota,
            "fecha_vencimiento"=> $_POST["fecha_vencimiento_" . $i], 
            "estado_pago"      => $_POST["estado_pago_" . $i], 
            "fecha_pago"       => NULL 
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
        
    //CARDS
    static public function ctrVerTransfer() {
        $tabla = "cuota";

        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");

        // Determinar el rango de fechas basado en el día actual
        $dia = $fechaActual->format("d");

        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }

        // Llamar al método mdlVerTransfer con las fechas calculadas
        $respuesta = ModeloCuotas::mdlVerTransfer($tabla, $fechaInicio, $fechaFin);

        if ($respuesta && isset($respuesta['monto_total'])) {
            return [
                'monto_cop' => $respuesta['monto_total'],
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'monto_cop' => 0,
                'rango_fecha' => $rangoFecha
            ];
        }
    }

static public function ctrVerDetallesTransfer() {

    $fechaActual = new DateTime();
    $año = $fechaActual->format("Y");
    $mes = $fechaActual->format("m");
    $dia = $fechaActual->format("d");

    if ($dia >= 1 && $dia <= 15) {
        $fechaInicio = "$año-$mes-01";
        $fechaFin = "$año-$mes-15";
        $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
    } else {
        $fechaInicio = "$año-$mes-16";
        $fechaFin = "$año-$mes-" . $fechaActual->format("t");
        $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
    }

    $respuesta = ModeloCuotas::mdlDetallesTransfer($fechaInicio, $fechaFin);

    $traducciones = [
        'dv0' => 'No se ha ejecutado el cobro',
        'En proceso' => 'En proceso',
        'dv1' => 'Link de pago inactivo',
        'dv2' => 'Fondos insuficientes',
        'dv3' => 'Cuenta no localizada',
        'dv4' => 'El cliente solicita devolución',
        'dv5' => 'Rebota el pago por entidad',
        'dv6' => 'Titular de la cuenta fallecido',
        'Aprobado' => 'Aprobado'
    ];

    if ($respuesta) {
        foreach ($respuesta as &$fila) {
            if (isset($fila['estado_pago']) && isset($traducciones[$fila['estado_pago']])) {
                $fila['estado_pago'] = $traducciones[$fila['estado_pago']];
            }
        }
        unset($fila);
    }

    return [
        'detalles' => $respuesta ?: [],
        'rango_fecha' => $rangoFecha
    ];
}


    static public function ctrVerProceso() {
        $tabla = "cuota";

        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");

        $dia = (int)$fechaActual->format("d");

        if ($dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }

        $respuesta = ModeloCuotas::mdlVerProceso($tabla, $fechaInicio, $fechaFin);

         if ($respuesta && isset($respuesta['monto_total'])) {
            return [
                'monto_cop' => $respuesta['monto_total'],
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'monto_cop' => 0,
                'rango_fecha' => $rangoFecha
            ];
        }
    }

    static public function ctrVerDetallesEnProceso() {

        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");
        $dia = $fechaActual->format("d");

        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }

        // Llamamos a la consulta específica para "En proceso"
        $respuesta = ModeloCuotas::mdlDetallesEnProceso($fechaInicio, $fechaFin);

        // Diccionario de traducciones
        $traducciones = [
            'dv0' => 'No se ha ejecutado el cobro',
            'En proceso' => 'En proceso',
            'dv1' => 'Link de pago inactivo',
            'dv2' => 'Fondos insuficientes',
            'dv3' => 'Cuenta no localizada',
            'dv4' => 'El cliente solicita devolución',
            'dv5' => 'Rebota el pago por entidad',
            'dv6' => 'Titular de la cuenta fallecido',
            'Aprobado' => 'Aprobado'
        ];

        // Traducimos estado_pago en la respuesta
        if ($respuesta) {
            foreach ($respuesta as &$fila) {
                if (isset($fila['estado_pago'], $traducciones[$fila['estado_pago']])) {
                    $fila['estado_pago'] = $traducciones[$fila['estado_pago']];
                }
            }
            unset($fila);
        }

        return [
            'detalles' => $respuesta ?: [],
            'rango_fecha' => $rangoFecha
        ];
    }
    static public function ctrVerCaida() {

        $tabla = "cuota";

        // Fecha actual
        $fechaActual = new DateTime();

        // Ir al primer día del mes anterior
        $fechaActual->modify('first day of last month');

        // Año y mes del mes anterior
        $anioMes = $fechaActual->format('Y-m');

        // Rango: última quincena del mes anterior
        $fechaInicio = "$anioMes-16";
        $fechaFin = "$anioMes-" . $fechaActual->format('t'); // último día del mes anterior

        // Texto para mostrar en la vista
        $rangoFecha = "16 al " . $fechaActual->format('t') . " de " . $fechaActual->format("M Y");

        // Llamar al modelo
        $respuesta = ModeloCuotas::mdlVerCaida($tabla, $fechaInicio, $fechaFin);

        if ($respuesta && isset($respuesta['monto_total'])) {
            return [
                'monto_cop' => $respuesta['monto_total'],
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'monto_cop' => 0,
                'rango_fecha' => $rangoFecha
            ];
        }
    }

    static public function ctrVerDetallesCaida() {
        $fechaActual = new DateTime();

        // Retrocedemos al mes anterior
        $fechaActual->modify('first day of last month');
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");

        // Última quincena del mes anterior
        $fechaInicio = "$año-$mes-16";
        $fechaFin = "$año-$mes-" . $fechaActual->format("t");

        // Texto del rango para mostrar
        $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");

        // Llamada al modelo
        $respuesta = ModeloCuotas::mdlVerDetallesCaida($fechaInicio, $fechaFin);

        // Diccionario de traducciones de estado_pago
        $traducciones = [
            'dv0' => 'No se ha ejecutado el cobro',
            'En proceso' => 'En proceso',
            'dv1' => 'Link de pago inactivo',
            'dv2' => 'Fondos insuficientes',
            'dv3' => 'Cuenta no localizada',
            'dv4' => 'El cliente solicita devolución',
            'dv5' => 'Rebota el pago por entidad',
            'dv6' => 'Titular de la cuenta fallecido',
            'Aprobado' => 'Aprobado'
        ];

        // Traducción de estados en la respuesta
        if ($respuesta) {
            foreach ($respuesta as &$fila) {
                if (isset($fila['estado_pago'], $traducciones[$fila['estado_pago']])) {
                    $fila['estado_pago'] = $traducciones[$fila['estado_pago']];
                }
            }
            unset($fila);
        }

        return [
            'detalles' => $respuesta ?: [],
            'rango_fecha' => $rangoFecha
        ];
    }

    static public function ctrVerRecaudo() {
        $tabla = "cuota";
    
        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");
    
        $dia = $fechaActual->format("d");
    
        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }
    
        $respuesta = ModeloCuotas::mdlVerRecaudo($tabla, $fechaInicio, $fechaFin);
    
        if ($respuesta && isset($respuesta['monto_total'])) {
            return [
                'monto_cop' => $respuesta['monto_total'],
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'monto_cop' => 0,
                'rango_fecha' => $rangoFecha
            ];
        }
    }

    static public function ctrVerDetallesRecaudo() {

        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");
        $dia = $fechaActual->format("d");

        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }

        $respuesta = ModeloCuotas::mdlDetallesRecaudo($fechaInicio, $fechaFin);

        if ($respuesta) {
            return [
                'detalles' => $respuesta,
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'detalles' => [],
                'rango_fecha' => $rangoFecha
            ];
        }
    }     

static public function ctrContarVentasDiarios() {
    $tabla = "cuota"; 

    // Fecha actual
    $fechaActual = new DateTime();
    $año = $fechaActual->format("Y");
    $mes = $fechaActual->format("m");
    $dia = $fechaActual->format("d");

    // Determinar rango de fechas según quincena
    if ($dia >= 1 && $dia <= 15) {
        $fechaInicio = "$año-$mes-01";
        $fechaFin = "$año-$mes-15";
    } else {
        $fechaInicio = "$año-$mes-16";
        $fechaFin = "$año-$mes-" . $fechaActual->format("t"); // Último día del mes
    }

    // Llamar al modelo con rango de fechas
    $respuesta = ModeloCuotas::mdlContarCuotasEnProceso($tabla, $fechaInicio, $fechaFin);

    return $respuesta;
}

        
    static public function ctrTotalVentasHoy() {
        $tabla = "cuota"; 

        // Obtener la fecha actual
        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");
        $dia = $fechaActual->format("d");

        // Determinar el rango de fechas
        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t"); // Último día del mes
        }

        // Llamar al modelo con los rangos de fecha
        $respuesta = ModeloCuotas::mdlCardTotalVenta($tabla, $fechaInicio, $fechaFin);

        return $respuesta;
    }

        static public function ctrVerDetallesVenta() {

        $fechaActual = new DateTime();
        $año = $fechaActual->format("Y");
        $mes = $fechaActual->format("m");
        $dia = $fechaActual->format("d");

        if ($dia >= 1 && $dia <= 15) {
            $fechaInicio = "$año-$mes-01";
            $fechaFin = "$año-$mes-15";
            $rangoFecha = "1 al 15 de " . $fechaActual->format("M Y");
        } else {
            $fechaInicio = "$año-$mes-16";
            $fechaFin = "$año-$mes-" . $fechaActual->format("t");
            $rangoFecha = "16 al " . $fechaActual->format("t") . " de " . $fechaActual->format("M Y");
        }

        $respuesta = ModeloCuotas::mdlDetallesVenta($fechaInicio, $fechaFin);

        if ($respuesta) {
            return [
                'detalles' => $respuesta,
                'rango_fecha' => $rangoFecha
            ];
        } else {
            return [
                'detalles' => [],
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
