<?php

class ControladorSuscripcion{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearSuscripcion(){

		if(isset($_POST["nuevaSuscripcion"])){
	
			$tabla = "suscripcion";
			$fecha_actual = date('Y-m-d');
			
			// Sumar un año a la fecha actual para end_date
			$end_date = date('Y-m-d', strtotime('+1 year', strtotime($fecha_actual)));
	
			$datos =array(
				"start_date" => $fecha_actual,
				"end_date" => $end_date,  // Asignar la fecha calculada un año después
				"id_customer" => $_POST["nuevaSuscripcion"],
				"id_service" => $_POST["nuevoServicio"]
			);
	
			$respuesta = ModeloSuscripcion::mdlRegistrarSuscripcion($tabla, $datos);
	
			if($respuesta == "ok"){  // Asegúrate de que la respuesta sea "ok"
				return "ok";
			} else {
				return "error";
			}
		}
	}
	
	

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrVerSuscripciones($item, $valor){

		$tabla = "suscripcion";

		$respuesta = ModeloSuscripcion::mdlVerSuscripciones($tabla, $item, $valor);

		return $respuesta;

	}

	static public function ctrVerSuscripcionesClienteServicio($item, $valor) {
		$respuesta = ModeloSuscripcion::mdlVerSuscripcionCliente($item, $valor);
		return $respuesta;
	}

}