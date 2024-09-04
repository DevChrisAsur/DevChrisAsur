<?php

class ControladorCursoEstudiante{

    static public function ctrMostrarCursosEstudiantes($item, $valor) {
    	$respuesta = ModeloCursoEstudiante::mdlMostrarCursosEstudiantes($item, $valor);
    	return $respuesta;
	}

	static public function ctrMostrarGrupoProfesor($item, $valor) {
    	$respuesta = ModeloCursoEstudiante::mdlMostrarGrupoProfesor($item, $valor);
    	return $respuesta;
	}  
	static public function ctrMostrarCursoEstudiante($item, $valor) {
    	// $respuesta = ModeloCursoEstudiante::mdlMostrarCursoEstudiante($item, $valor);


    	$tabla = "student_grade";

	$respuesta = ModeloCursoEstudiante::mdlMostrarCursoEstudiante($tabla, $item, $valor);
	return $respuesta;

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
    /*=============================================
              		EDITAR CURSO ESTUDIANTE
    =============================================*/

static public function ctrEditarCursoEstudiante(){

			if(isset($_POST["EditarCursoEstudiante"])){
	
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCursoEstudiante"])){
	
					/*=============================================
					VALIDAR IMAGEN
					=============================================*/
	
					
	
					$tabla = "student_grade";
	
					
	
					$datos = array(
								   "id_student"=>$_POST["EditarCursoEstudiante"],
								   "id_grade"=>$_POST["cursoEstudiante"]

								);
	
					$respuesta = ModeloCursoEstudiante::mdlEditarCursoEstudiante($tabla, $datos);
	
	
					if($respuesta == "ok"){
	
						echo'<script>
	
						swal({
							  type: "success",
							  title: "El estudiante ha cambiado de curso correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {
	
										window.location = "cursoestudiante";
	
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
	
								window.location = "cursoestudiante";
	
								}
							})
	
				</script>';
	
			}
	
		}
	
	}		
}