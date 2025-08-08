<?php

class ControladorNotas {

	/*=============================================
	CREAR NOTA
	=============================================*/

	static public function ctrCrearNota() {
		if (isset($_POST["nuevoTituloNota"])) {
			// Nombre de la tabla en la base de datos
			$tabla = "nota";
	
			// Iniciar sesión y obtener el ID del usuario
			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}
			$idUsuario = $_SESSION["id"] ?? null;
	
			if (!$idUsuario) {
				return "Error: Usuario no identificado.";
			}
	
			// Preparar datos de la nota
			$datos = array(
				"id_customer" => $_POST["idCliente"],
				"id_usuario" => $idUsuario,
				"titulo" => $_POST["nuevoTituloNota"],
				"contenido" => $_POST["contenidoNota"],
				"fecha_creacion" => date("Y-m-d H:i:s"),
				"nombre_archivo" => null
			);
	
			// Verificar si hay un archivo cargado y validar su tamaño
			if (isset($_FILES["archivoNota"]) && $_FILES["archivoNota"]["error"] == 0) {
				// Definir tamaño máximo permitido en bytes (por ejemplo, 2 MB)
				$tamanoMaximo = 10 * 1024 * 1024; // 2 MB
	
				// Verificar tamaño del archivo
				if ($_FILES["archivoNota"]["size"] > $tamanoMaximo) {
					return "Error: El archivo supera el tamaño máximo permitido de 2 MB.";
				}
	
				// Preparar el nombre del archivo para almacenar
				$nombreArchivo = uniqid() . "_" . basename($_FILES["archivoNota"]["name"]);
	
				// Mover el archivo a la carpeta deseada
				$directorio = "../uploads/notas/";
				if (!file_exists($directorio)) {
						mkdir($directorio, 0777, true);
				}

				if (move_uploaded_file($_FILES["archivoNota"]["tmp_name"], $directorio . $nombreArchivo)) {
					// Actualizar el array $datos con el nombre del archivo
					$datos["nombre_archivo"] = $nombreArchivo;
				} else {
					return "Error al mover el archivo.";
				}
			}
	
			// Llamar al modelo para insertar la nota
			$respuesta = ModeloNotas::mdlIngresarNota($tabla, $datos);
	
			if ($respuesta === "ok") {
				return "ok";
			} else {
				return "Error al crear la nota: " . $respuesta;
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

	public static function ctrObtenerNotasPorCliente($idCliente) {
    $tabla = "nota";
    return ModeloNotas::mdlObtenerNotasPorCliente($tabla, $idCliente);
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
