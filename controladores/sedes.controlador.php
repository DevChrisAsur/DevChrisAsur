<?php

class ControladorSedes{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearSedes(){

		if(isset($_POST["nuevaSedeNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaSedeNombre"])){

				$tabla = "campus";

				$datos = array("campus_name" => $_POST["nuevaSedeNombre"],
									   "address" => $_POST["nuevaSedeDireccion"],
							           "email" => $_POST["nuevaSedeCorreo"],
							           );
				// echo '<pre>'; print_r($datos); echo '</pre>';

				$respuesta = ModeloSedes::mdlIngresarSedes($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido guardada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sedes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarSedes($item, $valor){

		$tabla = "campus";

		$respuesta = ModeloSedes::mdlMostrarSedes($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarSedes(){

		if(isset($_POST["editarNombreSede"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ-]+$/', $_POST["editarNombreSede"])){

				$tabla = "campus";

				$datos = array("campus_name"=>$_POST["editarNombreSede"],
							   "address"=>$_POST["editarDireccionSede"],
							   "email"=>$_POST["editarCorreoSede"],
							   "id_campus"=>$_POST["idSedes"]
							);

				$respuesta = ModeloSedes::mdlEditarSedes($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "La sede no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "sedes";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarSedes(){

		if(isset($_GET["idSedes"])){

			$tabla ="campus";
			$datos = $_GET["idSedes"];

			$respuesta = ModeloSedes::mdlBorrarSedes($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "La sede ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "sedes";

									}
								})

					</script>';
			}
		}
		
	}
}
