<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario() {
		if (isset($_POST["ingUsuario"])) {
	
			// Validar el input usando expresiones regulares
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])) {
	
				// Obtener la tabla y buscar el usuario en la base de datos
				$tabla = "usuarios";
				$item = "user_name";
				$valor = $_POST["ingUsuario"];
				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);
	
				// Verificar si se encontró un usuario
				if (!empty($respuesta)) {
					// Verificar la contraseña utilizando password_verify
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
					echo '<br><div class="alert alert-danger">Usuario no encontrado</div>';
				}
			}
		}
	}
	

	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearUsuario() {

		if (isset($_POST["nuevoUsuario"])) {
	
			// Validar el nombre, usuario y contraseña
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoUsuario"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["nuevoPassword"]) &&
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoIdentificacion"])) {
	
				// Inicializar la variable de la ruta de la imagen (en caso de que se quiera usar)
				$ruta = "";
	
				// Encriptar la contraseña usando password_hash()
				$encriptar = password_hash($_POST["nuevoPassword"], PASSWORD_BCRYPT);
	
				// Preparar los datos para la base de datos
				$tabla = "usuarios";
				$datos = array(
					"identificacion" => $_POST["nuevoIdentificacion"],
					"correo" => $_POST["nuevoCorreo"],
					"nombre" => $_POST["nuevoNombre"],
					"usuario" => $_POST["nuevoUsuario"],
					"password" => $encriptar,
					"perfil" => $_POST["nuevoPerfil"],
					"area" => $_POST["nuevaArea"],
					"foto" => $ruta, // Aquí podrías agregar la lógica para manejar la subida de fotos
					"estado" => "1"
				);
	
				// Insertar el usuario en la base de datos
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
	
				// Verificar si la inserción fue exitosa
				if ($respuesta == "ok") {
					echo '<script>
							swal({
								type: "success",
								title: "¡El usuario ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"
							}).then(function(result) {
								if (result.value) {
									window.location = "usuarios";
								}
							});
						</script>';
				}
			} else {
				// Mensaje de error si la validación no se cumple
				echo '<script>
						swal({
							type: "error",
							title: "¡Error en los datos ingresados! Asegúrate de que no haya caracteres especiales.",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result) {
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

	// static public function ctrMostrarProfesores($item, $valor){

	// 	$tabla = "usuarios";

	// 	$respuesta = ModeloUsuarios::mdlMostrarProfesores($tabla, $item, $valor);

	// 	return $respuesta;
	// }
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarUsuario"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				

				$tabla = "usuarios";

				if($_POST["editarPassword"] != ""){

					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["editarPassword"])){

						$encriptar = crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

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

				$datos = array("correo" => $_POST["editarCorreo"],
					           "nombre" => $_POST["editarNombre"],
							   "usuario" => $_POST["editarUsuario"],
							   "password" => $encriptar,
							   "perfil" => $_POST["editarPerfil"],
							   "area" => $_POST["editarArea"],
							   "id"=>$_POST["idUsuario"]);

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
				
			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
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
	

