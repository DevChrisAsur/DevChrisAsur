<?php

class ControladorEstudiantes{



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearEstudiante(){

		if(isset($_POST["nuevoIdentificacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])
			   
			   ){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){
						 //$ruta = "";

						$tabla = "student";

						

						$datos = array(
							"cc" => $_POST["nuevoIdentificacion"],
							"registration_date" => $_POST["nuevoRegistro"],
							"first_name" => $_POST["nuevoNombre"],
							"last_name" => $_POST["nuevoApellido"],
							"gender" => $_POST["nuevoGenero"],
							"rh" => $_POST["nuevaSangre"],									   
							"birth_date" => $_POST["nuevaBirth"],
							"st_address" => $_POST["nuevaDireccion"],
							"st_neighborhood" => $_POST["nuevoBarrio"],
							"schedule" => $_POST["nuevaJornada"],
							"id_campus" => $_POST["nuevaSede"]
									   );
									   
									   echo '<pre>'; print_r($datos); echo '</pre>';			   
						$respuesta = ModeloEstudiantes::mdlIngresarEstudiantes($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							swal({

								type: "success",
								title: "¡El estudiante ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "estudiantes";

								}

							});
						

							</script>';


						}
				}else{

						echo '<script>

							swal({

								type: "error",
								title: "¡La identificación no puede ir vacío o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "estudiantes";

								}

							});
						

						</script>';

					}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El estudiante no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "estudiante";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarEstudiantesConCampus($item, $valor) {
    $respuesta = ModeloEstudiantes::mdlMostrarEstudiantesConCampus($item, $valor);
    return $respuesta;
}

static public function ctrMostrarEstudiantesInactivos($item, $valor) {
    $respuesta = ModeloEstudiantes::mdlMostrarEstudiantesInhabilitados($item, $valor);
    return $respuesta;
}

static public function ctrMostrarEstudiantes($item, $valor) {
    $respuesta = ModeloEstudiantes::mdlMostrarEstudiantes($item, $valor);
    return $respuesta;
}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarEstudiante(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				

				$tabla = "student";

				

				$datos = array(
					           "first_name" => $_POST["editarNombre"],
							   "last_name" => $_POST["editarApellido"],
							   "gender" =>$_POST["editarGenero"],
							   "birth_date" => $_POST["editarBirth"],
							   "schedule" => $_POST["editarJornada"],
							   "id_campus"=>$_POST["editarSede"],
							   "id_student"=>$_POST["idEstudiante"]


							);
				

				$respuesta = ModeloEstudiantes::mdlEditarEstudiante($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El estudiante ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "estudiantes";

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

							window.location = "estudiantes";

							}
						})

			  	</script>';

			}

		}

	}

	// /*=============================================
	// BORRAR USUARIO
	// =============================================*/

	static public function ctrBorrarEstudiante(){

		if(isset($_GET["idEstudiante"])){

			$tabla ="student";
			$datos = $_GET["idEstudiante"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloEstudiantes::mdlBorrarEstudiante($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El estudiante ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "estudiantes";

								}
							})

				</script>';

			}		
		}
	}

/*=============================================
              	ASIGNAR CURSO
=============================================*/

	
	static public function ctrAsignarCurso(){

		if(isset($_POST["asignarEstudiante"])){
	
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asignarCurso"])
				
				){
	
					if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asignarCurso"])){
							//$ruta = "";
	
							$tabla = "student_grade";
	
							
	
							$datos = array(
										"id_student" => $_POST["asignarEstudiante"],
										"id_grade" => $_POST["asignarCurso"]
										);
										
										echo '<pre>'; print_r($datos); echo '</pre>';			   
							$respuesta = ModeloCursoEstudiante::mdlIngresarCursoEstudiante($tabla, $datos);
						
							if($respuesta == "ok"){
	
								echo '<script>
	
								swal({
	
									type: "success",
									title: "¡El estudiante ha sido guardado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
	
								}).then(function(result){
	
									if(result.value){
									
										window.location = "estudiantes";
	
									}
	
								});
							
	
								</script>';
	
	
							}
					}else{
	
							echo '<script>
	
								swal({
	
									type: "error",
									title: "¡La identificación no puede ir vacío o llevar caracteres especiales!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
	
								}).then(function(result){
	
									if(result.value){
									
										window.location = "estudiantes";
	
									}
	
								});
							
	
							</script>';
	
						}
	
	
				}else{
	
					echo '<script>
	
						swal({
	
							type: "error",
							title: "¡El estudiante no puede ir vacío o llevar caracteres especiales!",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
	
						}).then(function(result){
	
							if(result.value){
							
								window.location = "estudiante";
	
							}
	
						});
					
	
					</script>';
	
				}
	
	
			}
	
		}

}
	

