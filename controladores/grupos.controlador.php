<?php

class ControladorGrupos{



    /*=============================================
              	ASIGNAR CURSO
    =============================================*/
    static public function ctrAsignarGrupo(){

		if(isset($_POST["asignarProfesor"])){
	
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asignarGrupo"])
				
				){
	
					if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["asignarGrupo"])){
							//$ruta = "";
	
							$tabla = "teacher_grade";
	
							
	
							$datos = array(
										"id" => $_POST["asignarProfesor"],
										"id_grade" => $_POST["asignarGrupo"]
										);
										
										echo '<pre>'; print_r($datos); echo '</pre>';			   
							$respuesta = ModeloGrupo::mdlAsignarGrupoProfesor($tabla, $datos);
						
							if($respuesta == "ok"){
	
								echo '<script>
	
								swal({
	
									type: "success",
									title: "¡El grupo ha sido asignado correctamente!",
									showConfirmButton: true,
									confirmButtonText: "Cerrar"
	
								}).then(function(result){
	
									if(result.value){
									
										window.location = "usuarios";
	
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
									
										window.location = "usuarios";
	
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
							
								window.location = "usuarios";
	
							}
	
						});
					
	
					</script>';
	
				}
	
	
			}
	
		}
    /*=============================================
              		EDITAR CURSO ESTUDIANTE
    =============================================*/

		
}