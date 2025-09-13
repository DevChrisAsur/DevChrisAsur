<?php

class ControladorUsuarios
{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario()
	{
		if (!isset($_POST["ingUsuario"])) return;

		$correo = $_POST["ingUsuario"];
		$password = $_POST["ingPassword"];

		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
			echo '<br><div class="alert alert-danger">El correo no es válido</div>';
			return;
		}

		$tabla = "usuarios";
		$item = "correo";
		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $correo);

		if (empty($respuesta)) {
			echo '<br><div class="alert alert-danger">Usuario no encontrado</div>';
			return;
		}

		if ($respuesta["user_status"] == 0) {
			echo '<br><div class="alert alert-danger">El usuario se encuentra inhabilitado.<br> 
					Comuniquese con su proveedor de servicios para mas informacion</div>';
			return;
		}

		$hashBD = $respuesta["password"];
		$passwordIngresada = trim($password);

		// Comparar con MD5 (puedes cambiar a password_verify más adelante)
		if (md5($passwordIngresada) === $hashBD) {
			// Iniciar sesión
			$_SESSION["iniciarSesion"] = "ok";
			$_SESSION["id"] = $respuesta["id"];
			$_SESSION["nombre"] = $respuesta["first_name"];
			$_SESSION["usuario"] = $respuesta["user_name"];
			$_SESSION["foto"] = $respuesta["foto"];
			$_SESSION["perfil"] = $respuesta["perfil"];
			$_SESSION["area"] = $respuesta["area"];

			// Guardar último login
			date_default_timezone_set('America/Bogota');
			$fechaActual = date('Y-m-d H:i:s');
			ModeloUsuarios::mdlActualizarUsuario($tabla, "ultimo_login", $fechaActual, "id", $respuesta["id"]);

			echo '<script>window.location = "inicio";</script>';
		} else {
			echo '<br><div class="alert alert-danger">Contraseña incorrecta </div>';
		}
	}

	/*=============================================
					REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario()
	{
		if (isset($_POST["nuevoUsuario"])) {

			try {
				// Preparación de los datos a insertar
				$ruta = "";
				$tabla = "usuarios";

				// Verificar si el correo ya está registrado
				$item = "correo";
				$valor = $_POST["nuevoCorreo"];
				$correoExistente = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if (!empty($correoExistente)) {
					// Si el correo ya está registrado, lanzar una excepción
					throw new Exception("El correo ya está registrado en el sistema.");
				}

				// Encriptación de la contraseña
				$encriptar = md5($_POST["nuevoPassword"]);
				$idCoordinador = empty($_POST["nuevoCoordinador"]) ? null : $_POST["nuevoCoordinador"];
				// Datos del nuevo usuario
				$datos = array(
					"cc" => $_POST["nuevoIdentificacion"],
					"first_name" => $_POST["nuevoNombre"],
					"last_name" => $_POST["nuevoApellido"],
					"user_name" => $_POST["nuevoUsuario"],
					"perfil" => $_POST["nuevoPerfil"],
					"area" => $_POST["nuevaArea"],
					"correo" => $_POST["nuevoCorreo"],
					"phone" => $_POST["nuevoTelefono"],
					"password" => $encriptar,
					"id_coordinador" => $idCoordinador,
					"foto" => $ruta,
					"user_status" => "1"
				);

				// Inserción en la base de datos
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);

				if ($respuesta == "ok") {
					echo '<script>
							swal({
								type: "success",
								title: "¡El usuario ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
							}).then(function(result){
								if (result.value) {
									window.location = "usuarios";
								}
							});
						</script>';
				} else {
					throw new Exception("Error al guardar el usuario.");
				}
			} catch (Exception $e) {
				// Captura de cualquier excepción y muestra un error en un modal
				echo '<script>
						swal({
							type: "error",
							title: "' . $e->getMessage() . '",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {
								window.location = "usuarios";
							}
						});
					</script>';
			}
		}
	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarUsuarios($item, $valor)
	{

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrVerUsuariosParaAdminitradores($item = null, $valor = null)
	{

		$tabla = "usuarios";

		if ($item != null && $valor != null) {
			$respuesta = ModeloUsuarios::mdlVerUsuariosParaAdministradores($tabla, $item, $valor);
		} else {
			$respuesta = ModeloUsuarios::mdlVerUsuariosParaAdministradores($tabla, null, null);
		}

		return $respuesta;
	}


	static public function ctrMostrarAsesores($item, $valor)
	{

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarAsesores($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarCoordinadores($item, $valor)
	{

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarCoordinadores($tabla, $item, $valor);

		return $respuesta;
	}
	static public function ctrMostrarAsesoresCoordinadores($item, $valor)
	{
		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarAsesoresCoordinadores($tabla, $item, $valor);
		return $respuesta;
	}


	static public function ctrMostrarAsesoresPorCoordinador($id_coordinador)
	{
		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarAsesoresPorCoordinador($tabla, $id_coordinador);
		return $respuesta;
	}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario()
	{

		if (isset($_POST["editarUsuario"])) {


			/*=============================================
			VALIDAR IMAGEN
			=============================================*/
			$tabla = "usuarios";

			if ($_POST["editarPassword"] != "") {
				$encriptar = md5($_POST["editarPassword"]);
			} else {
				$encriptar = $_POST["passwordActual"];
			}

			$datos = array(
				"id" => $_POST["idUsuario"],
				"first_name" => $_POST["editarNombre"],
				"last_name" => $_POST["editarApellido"],
				"user_name" => $_POST["editarUsuario"],
				"perfil" => $_POST["editarPerfil"],
				"area" => $_POST["editarArea"],
				"phone" => $_POST["editarTelefone"],
				"correo" => $_POST["editarCorreo"],
				"password" => $encriptar,
				"id_coordinador" => ($_POST["reasignarCoordinador"] == "0") ? null : $_POST["reasignarCoordinador"]
			);

			$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);


			if ($respuesta == "ok") {
				echo '<script>
				swal({
						type: "success",
						title: "El usuario ha sido editado correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';
			}
		}
	}

	/*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarUsuario()
	{

		if (isset($_GET["idUsuario"])) {

			$tabla = "usuarios";
			$datos = $_GET["idUsuario"];

			if ($_GET["fotoUsuario"] != "") {

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/' . $_GET["usuario"]);
			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El usuario ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';
			}
		}
	}
}
