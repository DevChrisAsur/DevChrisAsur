<?php

class ControladorCursos{

	/*=============================================
	CREAR CATEGORIAS
	=============================================*/

	static public function ctrCrearCursos(){

		if(isset($_POST["nuevoCursoNombre"]) && isset($_POST["nuevoCursoClasificacion"])){
	
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCursoNombre"])){
	
				$tabla = "grade";
	
				$datos = array(
					"level_grade" => $_POST["nuevoCursoNombre"],
					"clasification" => $_POST["nuevoCursoClasificacion"]
				);
	
				$respuesta = ModeloCursos::mdlIngresarCursos($tabla, $datos);
	
				if($respuesta == "ok"){
					echo'<script>
						swal({
							type: "success",
							title: "El curso ha sido registrado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {
								window.location = "cursos";
							}
						});
					</script>';
				}
	
			}else{
				echo'<script>
					swal({
						type: "error",
						title: "¡El curso no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "cursos";
						}
					});
				</script>';
			}
	
		}
	}
	

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function ctrMostrarCursos($item, $valor){

		$tabla = "grade";

		$respuesta = ModeloCursos::mdlMostrarCursos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	EDITAR CATEGORIA
	=============================================*/

	static public function ctrEditarCursos(){

		if(isset($_POST["editarNombreCurso"])){
	
			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ-]+$/', $_POST["editarNombreCurso"])){
	
				$tabla = "grade";
	
				$datos = array(
					"level_grade" => $_POST["editarNombreCurso"],
					"clasification" => $_POST["editarClasificacion"],
					"id_grade" => $_POST["idCursos"]
				);
	
				$respuesta = ModeloCursos::mdlEditarCursos($tabla, $datos);
	
				if($respuesta == "ok"){
	
					echo '<script>
						swal({
							type: "success",
							title: "El curso ha sido cambiado correctamente",
							showConfirmButton: true,
							confirmButtonText: "Cerrar"
						}).then(function(result){
							if (result.value) {
								window.location = "cursos";
							}
						});
					</script>';
	
				}
	
			}else{
	
				echo '<script>
					swal({
						type: "error",
						title: "El curso no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){
						if (result.value) {
							window.location = "cursos";
						}
					});
				</script>';
	
			}
	
		}
	
	}
	

	/*=============================================
	BORRAR CATEGORIA
	=============================================*/

	static public function ctrBorrarCursos(){

		if(isset($_GET["idCursos"])){

			$tabla ="grade";
			$datos = $_GET["idCursos"];

			$respuesta = ModeloCursos::mdlBorrarCursos($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El curso ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "cursos";

									}
								})

					</script>';
			}
		}
		
	}
}
