<?php

class ControladorAreaDerecho{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearAreaDerecho(){

		if(isset($_POST["nuevaAreaDerecho"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaAreaDerecho"])){

				$tabla = "area_derecho";

				$datos = $_POST["nuevaAreaDerecho"];

				$respuesta = ModeloAreas::mdlIngresarAreas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El area de derecho ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "areas";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El area no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "areas";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrVerAreasDerecho($item, $valor){

		$tabla = "area_derecho";

		$respuesta = ModeloAreasDerecho::mdlVerAreaDerecho($tabla, $item, $valor);

		return $respuesta;
	
	}


}
