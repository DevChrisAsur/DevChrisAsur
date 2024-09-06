<?php

class ControladorUsuarios{

	/*=============================================
	INGRESO DE USUARIO
	=============================================*/

	static public function ctrIngresoUsuario(){

		if(isset($_POST["ingUsuario"])){
 
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){

			   	$encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$tabla = "usuarios";

				$item = "user_name";
				$valor = $_POST["ingUsuario"];

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta != ""){
					
				$area = $respuesta["area"];

				if($respuesta["user_name"] == $_POST["ingUsuario"] && $respuesta["password"] == $encriptar){

					$fecha = date('d/m/Y');
                    $array = explode("/", $fecha);
                    $dia = $array[0]; 
                    $mes = $array[1]; 
                    $años =$array[2];

                    
                    // return;
				if($respuesta["perfil"] == "Funcionario"){
					
					
                     
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["area"] = $respuesta["area"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

										
						
				
               }else{

					echo '<br><div class="alert alert-danger">Error al ingresar, Usuario Caducado</div>';

				}
			}


			if($respuesta["perfil"] != "Funcionario"){
		
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["id"] = $respuesta["id"];
						$_SESSION["nombre"] = $respuesta["nombre"];
						$_SESSION["usuario"] = $respuesta["usuario"];
						$_SESSION["foto"] = $respuesta["foto"];
						$_SESSION["perfil"] = $respuesta["perfil"];
						$_SESSION["area"] = $respuesta["area"];
						$_SESSION["area"] = $respuesta["area"];

						/*=============================================
						REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
						=============================================*/

						date_default_timezone_set('America/Bogota');

						$fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

						$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

						if($ultimoLogin == "ok"){

							echo '<script>

								window.location = "inicio";

							</script>';

						}				
			}

			}else{

					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';

				}
			}else{
				echo '<br><div class="alert alert-danger">Error al ingresar, usuario no encontrado</div>';
			}

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
	
				// Encriptación de la contraseña
				$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
	
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
							title: "'.$e->getMessage().'",
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
	

