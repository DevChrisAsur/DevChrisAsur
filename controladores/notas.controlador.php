<?php

class ControladorNotas {

	/*=============================================
	CREAR NOTA
	=============================================*/

    static public function ctrCrearNota() {

		if (isset($_POST["nuevoTituloNota"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTituloNota"])) {

				$tabla = "nota";

				// Obtener el ID del usuario desde la sesión
                session_start();
				$idUsuario = $_SESSION["id"];

				$datos = array(
					"id_customer" => $_POST["idCliente"],
					"id" => $idUsuario,  // ID del usuario desde la sesión
					"titulo" => $_POST["nuevoTituloNota"],
					"contenido" => $_POST["contenidoNota"],
					"fecha_creacion" => date("Y-m-d H:i:s")
				);

				$respuesta = ModeloNotas::mdlIngresarNota($tabla, $datos);

				if ($respuesta != "error") {
					// Devuelve el ID de la suscripción creada
					echo '<script>
					swal({
						type: "success",
						title: "La nota ha sido guardada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result) {
						if (result.value) {
							window.location = "notas";
						}
					});
					</script>';

				} else {
					echo '<script>
					swal({
						type: "success",
						title: "La nota ha sido guardada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result) {
						if (result.value) {
							window.location = "notas";
						}
					});
					</script>';
				}

			} else {
				echo '<script>
				swal({
					type: "error",
					title: "¡El título de la nota no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function(result) {
					if (result.value) {
						window.location = "notas";
					}
				});
				</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR NOTAS
	=============================================*/

	static public function ctrMostrarNotas($item, $valor) {

		$tabla = "nota";

		$respuesta = ModeloNotas::mdlMostrarNotas($tabla, $item, $valor);

		return $respuesta;
	}

	/*=============================================
	EDITAR NOTA
	=============================================*/

	static public function ctrEditarNota() {

		if (isset($_POST["editarTituloNota"])) {

			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarTituloNota"])) {

				$tabla = "nota";

				$datos = array(
					"id_nota" => $_POST["idNota"],
					"id_customer" => $_POST["editarIdCustomer"],
					"id" => $_POST["editarIdUsuario"],
					"titulo" => $_POST["editarTituloNota"],
					"contenido" => $_POST["editarContenidoNota"],
					"fecha_creacion" => date("Y-m-d H:i:s")
				);

				$respuesta = ModeloNotas::mdlEditarNota($tabla, $datos);

				if ($respuesta == "ok") {
					echo '<script>
					swal({
						type: "success",
						title: "La nota ha sido editada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result) {
						if (result.value) {
							window.location = "notas";
						}
					});
					</script>';
				}

			} else {
				echo '<script>
				swal({
					type: "error",
					title: "¡El título de la nota no puede ir vacío o llevar caracteres especiales!",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function(result) {
					if (result.value) {
						window.location = "notas";
					}
				});
				</script>';
			}
		}
	}

	/*=============================================
	BORRAR NOTA
	=============================================*/

	static public function ctrBorrarNota() {

		if (isset($_GET["idNota"])) {

			$tabla = "nota";
			$datos = $_GET["idNota"];

			$respuesta = ModeloNotas::mdlBorrarNota($tabla, $datos);

			if ($respuesta == "ok") {
				echo '<script>
				swal({
					type: "success",
					title: "La nota ha sido borrada correctamente",
					showConfirmButton: true,
					confirmButtonText: "Cerrar"
				}).then(function(result) {
					if (result.value) {
						window.location = "notas";
					}
				});
				</script>';
			}
		}
	}
}