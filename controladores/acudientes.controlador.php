<?php

class ControladorAcudientes{



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearAcudiente(){

		if(isset($_POST["nuevoIdentificacion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])
			   
			   ){

				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){
						 //$ruta = "";

						$tabla = "parent";

						

						$datos = array(
    "cc_parent" => $_POST["nuevoIdentificacion"],
    "first_name_parent" => $_POST["nuevoNombre"],
    "last_name_parent" => $_POST["nuevoApellido"], // Corregir el nombre del campo aquí
    "email" => $_POST["nuevoCorreo"],
    "id_student" => $_POST["nuevoAcuEst"]
);

						 
						echo '<pre>'; print_r($datos); echo '</pre>';
						// return;
						$respuesta = ModeloAcudientes::mdlIngresarAcudientes($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							swal({

								type: "success",
								title: "¡El acudiente ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "acudientes";

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
								
									window.location = "acudientes";

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
						
							window.location = "acudientes";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarAcudientesConEstudiante($item, $valor) {
    $respuesta = ModeloAcudientes::mdlMostrarAcudientesConEstudiante($item, $valor);
    return $respuesta;
}


static public function ctrMostrarEstudiantesConParent($item, $valor) {
    $respuesta = ModeloAcudientes::mdlMostrarEstudiantesConParent($item, $valor);
    return $respuesta;
}

static public function ctrMostrarAcudientes($item, $valor){

		$tabla = "parent";

		$respuesta = ModeloAcudientes::mdlMostrarAcudiente($tabla, $item, $valor);

		return $respuesta;
	
	}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarAcudiente(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				

				$tabla = "parent";

				

				$datos = array("cc_parent" => $_POST["editarIdentificacion"],
					           "first_name_parent" => $_POST["editarNombre"],
							   "last_name_parent" => $_POST["editarApellido"],
							   "email" => $_POST["editarCorreo"],
							   "id_parent"=>$_POST["idAcudiente"]


							);
// echo '<pre>'; print_r($datos); echo '</pre>';
				$respuesta = ModeloAcudientes::mdlEditarAcudiente($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El acudiente ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "acudientes";

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

	 static public function ctrBorrarAcudiente(){

	 	if(isset($_GET["idAcudiente"])){

	 		$tabla ="parent";
	 		$tablaSecundaria ="student_parent";
	 		$datos = $_GET["idAcudiente"];

	 		// if($_GET["fotoUsuario"] != ""){

	 		// 	unlink($_GET["fotoUsuario"]);
	 		// 	rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

	 		// }

	 		$respuesta = ModeloAcudientes::mdlBorrarAcudiente($tabla, $tablaSecundaria, $datos);
	 		echo '<pre>'; print_r($respuesta); echo '</pre>';

	 		if($respuesta == "ok"){

	 			echo'<script>

	 			swal({
	 				  type: "success",
	 				  title: "El acudiente y los estudiantes asociados ha sido borrados correctamente",
	 				  showConfirmButton: true,
	 				  confirmButtonText: "Cerrar"
	 				  }).then(function(result){
	 							if (result.value) {

	 							window.location = "acudientes";

	 							}
	 						})

	 			</script>';

	 		}		
	 	}
	 }
}
	

