<?php

class ControladorAreas{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearAreas(){

		if(isset($_POST["nuevaArea"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaArea"])){

				$tabla = "areas";

				$datos = $_POST["nuevaArea"];

				$respuesta = ModeloAreas::mdlIngresarAreas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El area ha sido guardada correctamente",
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

	static public function ctrMostrarAreas($item, $valor){

		$tabla = "areas";

		$respuesta = ModeloAreas::mdlMostrarAreas($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarAreas(){

		if(isset($_POST["editarAreas"])){



				$tabla = "areas";

				$datos = array("area"=>$_POST["editarAreas"],
							   "id"=>$_POST["idAreas"]);

				$respuesta = ModeloAreas::mdlEditarAreas($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El area ha sido cambiada correctamente",
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
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarAreas(){

		if(isset($_GET["idAreas"])){

			$tabla ="areas";
			$datos = $_GET["idAreas"];

			$respuesta = ModeloAreas::mdlBorrarAreas($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El area ha sido borrada correctamente",
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
}
