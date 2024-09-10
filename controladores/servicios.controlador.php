<?php

class ControladorServicios{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearServicios(){

		if(isset($_POST["nuevoServicio"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoServicio"])){

				$tabla = "servicio";

				$datos = array(
                    "service_name" => $_POST["nuevoServicio"],
                    "service_price" => $_POST["nuevoCostoServicio"],
                    "num_people" => $_POST["numPersonesServicio"],
                );

				$respuesta = ModeloServicios::mdlRegistrarServicio($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El servicio ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "servicios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El servicio no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "servicios";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrVerServicios($item, $valor){

		$tabla = "servicio";

		$respuesta = ModeloServicios::mdlVerServicios($tabla, $item, $valor);

		return $respuesta;
	
	}

    static public function ctrEliminarServicio(){

		if(isset($_GET["idServicio"])){

			$tabla ="servicio";
			$datos = $_GET["idServicio"];

			$respuesta = ModeloServicios::mdlELiminarServicio($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El servicio ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "servicios";

									}
								})

					</script>';
			}
		}
		
	}


}
