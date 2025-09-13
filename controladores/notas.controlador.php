<?php

class ControladorNotas {

	/*=============================================
	CREAR NOTA
	=============================================*/

static public function ctrCrearNota() {
    if (isset($_POST["nuevoTituloNota"])) {
        $tabla = "nota";

        // Iniciar sesión y obtener el ID del usuario
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $idUsuario = $_SESSION["id"] ?? null;

        if (!$idUsuario) {
            return "Error: Usuario no identificado.";
        }

        // Determinar si es un cliente o un lead
        $idCliente = $_POST["idCliente"] ?? null;
        $idLead = $_POST["idLeads"] ?? null;

        if (!$idCliente && !$idLead) {
            return "Error: No se especificó Cliente ni Lead.";
        }

        // Preparar datos
        $datos = array(
            "id_customer" => $idCliente,
            "id_lead" => $idLead,
            "id_usuario" => $idUsuario,
            "titulo" => $_POST["nuevoTituloNota"],
            "contenido" => $_POST["contenidoNota"],
            "fecha_creacion" => date("Y-m-d H:i:s"),
            "nombre_archivo" => null
        );

        // Subida de archivo (si existe)
        if (isset($_FILES["archivoNota"]) && $_FILES["archivoNota"]["error"] == 0) {
            $tamanoMaximo = 10 * 1024 * 1024; // 10 MB

            if ($_FILES["archivoNota"]["size"] > $tamanoMaximo) {
                return "Error: El archivo supera el tamaño máximo permitido.";
            }

            $nombreArchivo = uniqid() . "_" . basename($_FILES["archivoNota"]["name"]);
            $directorio = "../uploads/notas/";

            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            if (move_uploaded_file($_FILES["archivoNota"]["tmp_name"], $directorio . $nombreArchivo)) {
                $datos["nombre_archivo"] = $nombreArchivo;
            } else {
                return "Error al mover el archivo.";
            }
        }

        // Insertar nota en BD
        $respuesta = ModeloNotas::mdlIngresarNota($tabla, $datos);

        return ($respuesta === "ok") ? "ok" : "Error al crear la nota: " . $respuesta;
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
public static function ctrObtenerNotasPorLead($idLead) {
    $tabla = "nota";
    return ModeloNotas::mdlObtenerNotasPorLead($tabla, $idLead);
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
