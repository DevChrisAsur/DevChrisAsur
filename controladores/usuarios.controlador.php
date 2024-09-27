<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario() {
		if (isset($_POST["ingUsuario"])) {
	
			// Comprobamos que el correo sea válido
			if (filter_var($_POST["ingUsuario"], FILTER_VALIDATE_EMAIL)) {
	
				// Obtener la tabla y buscar el usuario en la base de datos
				$tabla = "usuarios";
				$item = "correo";
				$valor = $_POST["ingUsuario"];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
	
				// Verificar si se encontró un usuario
				if (!empty($respuesta)) {
	
					// Verificar el estado del usuario (si es diferente de 0)
					if ($respuesta["user_status"] != 0) {
	
						// Verificar la contraseña utilizando password_verify
						if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
							if (password_verify($_POST["ingPassword"], $respuesta["password"])) {
	
								// Iniciar sesión
								$_SESSION["iniciarSesion"] = "ok";
								$_SESSION["id"] = $respuesta["id"];
								$_SESSION["nombre"] = $respuesta["nombre"];
								$_SESSION["usuario"] = $respuesta["usuario"];
								$_SESSION["foto"] = $respuesta["foto"];
								$_SESSION["perfil"] = $respuesta["perfil"];
								$_SESSION["area"] = $respuesta["area"];
	
								// Registrar el último login
								date_default_timezone_set('America/Bogota');
								$fechaActual = date('Y-m-d H:i:s');
								$item1 = "ultimo_login";
								$valor1 = $fechaActual;
								$item2 = "id";
								$valor2 = $respuesta["id"];
								$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
	
								if ($ultimoLogin == "ok") {
									echo '<script>window.location = "inicio";</script>';
								}
	
							} else {
								echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
							}
						} else {
							echo '<br><div class="alert alert-danger">La contraseña contiene caracteres no permitidos</div>';
						}
	
					} else {
						// Mensaje si el usuario está inactivo
						echo '<br><div class="alert alert-danger">El usuario no está activo</div>';
					}
	
				} else {
					echo '<br><div class="alert alert-danger">Usuario no encontrado</div>';
				}
	
			} else {
				// Mensaje de error si el correo no es válido
				echo '<br><div class="alert alert-danger">El correo no es válido</div>';
			}
		}
	}
	

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario() {
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
				$encriptar = password_hash($_POST["nuevoPassword"], PASSWORD_BCRYPT);
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

	static public function ctrMostrarUsuarios($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarAsesores($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarAsesores($tabla, $item, $valor);

		return $respuesta;
	}

	static public function ctrMostrarCoordinadores($item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlMostrarCoordinadores($tabla, $item, $valor);

		return $respuesta;
	} 

	static public function ctrMostrarAsesoresPorCoordinador($id_coordinador) {
		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarAsesoresPorCoordinador($tabla, $id_coordinador);
		return $respuesta;
	}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){


				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = password_hash($_POST["editarPassword"], PASSWORD_BCRYPT);
					}else{

						echo'<script>

								swal({
									  type: "error",
									  title: "¡La contraseña no puede ir vacía o llevar caracteres especiales!",
									  showConfirmButton: true,
									  confirmButtonText: "Cerrar"
									  }).then(function(result){
										if (result.value) {

										window.location = "usuarios";

										}
									})

						  	</script>';

					}

				}else{

					$encriptar = $_POST["passwordActual"];

				}

				$datos = array(
					"id"=>$_POST["idUsuario"],
					"user_name" => $_POST["editarUsuario"],
					"perfil" => $_POST["editarPerfil"],
					"area" => $_POST["editarArea"],
					"phone" => $_POST["editarTelefone"],
					"correo" => $_POST["editarCorreo"],							   
					"password" => $encriptar	   
					);

				$respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

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

	static public function ctrBorrarUsuario(){

		if(isset($_GET["idUsuario"])){

			$tabla ="usuarios";
			$datos = $_GET["idUsuario"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

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
	

