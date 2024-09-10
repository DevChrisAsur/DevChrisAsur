<?php

class ControladorSuscripcion{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearSuscripcion(){

		if(isset($_POST["nuevaSuscripcion"])){
	
			$tabla = "suscripcion";
			$fecha_actual = date('Y-m-d');
			$cadu = trim($_POST['FechaCierre']); 
	
			$datos =array(
				"start_date" => $fecha_actual,
				"end_date" => $cadu,
				"id_customer" => $_POST["nuevaSuscripcion"],
				"id_service" => $_POST["nuevoServicio"]
			);
	
			$respuesta = ModeloSuscripcion::mdlRegistrarSuscripcion($tabla, $datos);
	
			if($respuesta == "ok"){
	
				echo'<script>
	
				swal({
					  type: "success",
					  title: "La suscripcion ha sido registrada",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
	
								window.location = "suscripciones";
	
								}
							})
	
				</script>';
	
			} else {
	
				echo'<script>
	
				swal({
					  type: "error",
					  title: "¡Error al registrar la suscripción!",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {
	
								window.location = "suscripciones";
	
								}
							})
	
				</script>';
	
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


}
