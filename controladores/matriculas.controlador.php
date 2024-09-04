<?php

class ControladorMatriculas{



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearMatricula(){

		if(isset($_POST["nuevoEstMatri"])){
			
			if(preg_match('/^[0-9 ]+$/', $_POST["nuevoEstMatri"])){

				if(preg_match('/^[0-9 ]+$/', $_POST["nuevoEstMatri"])){

					//$ruta = "";

					$tabla = "tuition";

					$cadu = trim($_POST['nuevoFechaPago']);
					$nuevo_costo = $_POST["nuevoCosto"];
					$fecha_actual = date('Y-m-d'); 
					
      $resultado = ModeloMatriculas::mdlValidarAcudienteConEstudiante('id_student', $_POST["nuevoEstMatri"]);
     

      if (empty($resultado)) {
      	echo '<script>

							swal({

								type: "error",
								title: "¡el estudiante no esta asociado a un acudiente. por favor asocielo con un acudiente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "matriculas";

								}

							});
						

						</script>';
      } else {
      	$datos = array(
									   "tuition_date" => $fecha_actual,
							           "tuition_cost" => $nuevo_costo,
							           "pay_date" => $cadu,
									   "id_student" => $_POST["nuevoEstMatri"]
									   );
				
									   echo '<pre>'; print_r($datos); echo '</pre>';
									   // return;			   
						$respuesta = ModeloMatriculas::mdlIngresarMatriculas($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							swal({

								type: "success",
								title: "¡La matricula ha sido guardado correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "matriculas";

								}

							});
						

							</script>';


						}
      }
      
    
						
				}else{

						echo '<script>

							swal({

								type: "error",
								title: "¡el costo no puede ir vacío o llevar caracteres especiales!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "matriculas";

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
						
							window.location = "matriculas";

						}

					});
				

				</script>';

			}


		}


	}

	/*=============================================
	MOSTRAR USUARIO
	=============================================*/

	static public function ctrMostrarMatriculasConEstudiantes($item, $valor) {
    $respuesta = ModeloMatriculas::mdlMostrarMatriculasConEstudiantes($item, $valor);
    return $respuesta;
}

static public function ctrMostrarMatriculas($item, $valor) {

	$tabla = "tuition";

	$respuesta = ModeloMatriculas::mdlMostrarMatriculas($tabla, $item, $valor);

	
   
    return $respuesta;
}
	/*=============================================
	EDITAR USUARIO
	=============================================*/

	static public function ctrEditarMatricula(){

		if(isset($_POST["editarCosto"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCosto"])){

				/*=============================================
				VALIDAR IMAGEN
				=============================================*/

				

				$tabla = "tuition";

				

				$cadu = trim($_POST['editarFechaPago']);
           $costo_act = $_POST["editarCosto"];
            $fecha_actual = date('Y-m-d'); 
            $fecha_anio = explode("-", $fecha_actual);
            // 
            // $fecha_dividida = explode("-", $fecha_actual);
            $fecha_dividida = explode("-", $cadu);

  $interes_mensualidad=0;
           // if ($fecha_dividida[2] >=1 && $fecha_dividida[2] <=5) {
           //  $interes;
           // }
            
           //  if ($fecha_dividida[2] >=6 && $fecha_dividida[2] <=15) {
           //  $interes=10000;
           // }
           // if ($fecha_dividida[2] >=16 && $fecha_dividida[2] <=31) {
           //  $interes=20000;
           // } 
        if ($fecha_dividida[2] >=1 && $fecha_dividida[2] <=5) {
             $interes_mensualidad;
            }
            
             if ($fecha_dividida[2] >=6 && $fecha_dividida[2] <=15) {
             $interes_mensualidad=10000;
            }
            if ($fecha_dividida[2] >=16 && $fecha_dividida[2] <=31) {
             $interes_mensualidad=20000;
            } 

            $total=$costo_act+$interes_mensualidad;
                
						$datos = array("scholar_year" => $fecha_anio[0],
									   "tuition_date" => $fecha_actual,
							           "tuition_cost" => $costo_act,
							           "pay_date" => $cadu,
							           "tuition_observation"=>$_POST["editarComeMatri"],
							           "monthly_payment" => $total,
									   "id_student" => $_POST["editarEst"],
									   "id_tuition" => $_POST["idMatricula"]
									   );

				$respuesta = ModeloMatriculas::mdlEditarMatricula($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La matricula ha sido editada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "matriculas";

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

							window.location = "matriculas";

							}
						})

			  	</script>';

			}

		}

	}

	// /*=============================================
	// BORRAR USUARIO
	// =============================================*/

	static public function ctrBorrarMatricula(){

		if(isset($_GET["idMatricula"])){

			$tabla ="tuition";
			$datos = $_GET["idMatricula"];

			if($_GET["fotoUsuario"] != ""){

				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);

			}

			$respuesta = ModeloMatriculas::mdlBorrarMatricula($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La matricula ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "matriculas";

								}
							})

				</script>';

			}		
		}
	}



}
	

