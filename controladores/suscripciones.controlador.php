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
	
			if ($respuesta != "error") {
				// Devuelve el ID de la suscripción creada
				return $respuesta;
			} else {
				return "error";
			}
		}
	}
	
	public static function ctrObtenerUltimaSuscripcionCliente($id_customer) {
		$tabla = "suscripcion";
		$respuesta = ModeloSuscripcion::mdlObtenerUltimaSuscripcion($tabla, $id_customer);
	
		if ($respuesta) {
			return $respuesta['id_suscripcion'];
		} else {
			return null;  // Si no se encontró un id_suscripcion
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