<?php

class ControladorPension{



	/*=============================================
	REGISTRO DE USUARIO
	=============================================*/

	static public function ctrCrearPension(){

		if(isset($_POST["nuevoCosto"])){

			if(preg_match('/^[0-9 ]+$/', $_POST["nuevoCosto"])
			   
			   ){

				if(preg_match('/^[0-9 ]+$/', $_POST["nuevoCosto"])){
						 //$ruta = "";

						$tabla = "pension";

						
           $cadu = trim($_POST['nuevoFechaPago']);
           $nuevo_costo = $_POST["nuevoCosto"];
            $fecha_actual = date('Y-m-d'); 
            $fecha_anio = explode("-", $fecha_actual);
            $estado_ruta=$_POST["ConfirmRuta"];
			$tipo_ruta=$_POST["MatriRuta"];
			$estado_almuerzo=$_POST["ConfirmAlmuerzo"];
			$tipo_almuerzo=$_POST["MatriAlmuerzo"];
			$estado_extracur=$_POST["ConfirmExtraCur"];
			$tipo_extracur="";

            // 
            // $fecha_dividida = explode("-", $fecha_actual);
            $fecha_dividida = explode("-", $cadu);

  $interes_mensualidad=0;
  $precio_ruta=0;
  $precio_almuerzo=0;
  $cantidad_almuerzos=0;
  $total_extracursos=0;
  $precio_refuerzo_escolar=0;
  $cont=0;


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

            if ($estado_ruta==1) {
            	if ($tipo_ruta==1) {
            		$precio_ruta=200000;
            	} 
            	if ($tipo_ruta==2) {
            		$precio_ruta=100000;
            	} 
            } else {
            	$tipo_ruta=0;
            	$precio_ruta;
            }


             if ($estado_almuerzo==1) {
            	if ($tipo_almuerzo==1) {
            		$precio_almuerzo=120000;
            		$cantidad_almuerzos=date('t');
            	} 
            	// if ($tipo_almuerzo==0) {
            	// 	$precio_almuerzo=0;
            	// 	$cantidad_almuerzos=0;
            	// } 
						            } else {

						$precio_almuerzo; 
						$tipo_almuerzo=0;
						$cantidad_almuerzos;           
						}

              if ($estado_ruta==1) {
            	if ($tipo_ruta==1) {
            		$precio_ruta=200000;
            	} 
            	if ($tipo_ruta==2) {
            		$precio_ruta=100000;
            	} 
            } else {
            	$precio_ruta;
            }


              if ($estado_extracur==1) {
            	$tipo_extracur=$_POST["nuevoCursoExtra"];
            	foreach ($tipo_extracur as $key => $value) {
				    if ($value == "Refuerzo escolar") {
				        $precio_refuerzo_escolar = 90000; // Actualizamos solo si se encuentra "Refuerzo escolar"
				        $cont--;
				    }
				    $cont++;
				    $total_extracursos = $cont * 80000;
    echo "extracurriculares " . $value . "\n";
  
}
 $tipo_extracur= implode(",", $tipo_extracur);
            } else {
            	$tipo_extracur="N/A";
            }

  $mes_actual="";
 switch (date('F')) {
  case "January":
    $mes_actual="Enero";
    break;
  case "February ":
    $mes_actual="Febrero";
    break;
  case "March":
    $mes_actual="Marzo";
    break;
    case "April":
    $mes_actual="Abril";
    break;
  case "May":
    $mes_actual="Mayo";
    break;
  case "June":
    $mes_actual="Junio";
    break;
    case "July":
    $mes_actual="Julio";
    break;
  case "August":
    $mes_actual="Agosto";
    break;
  case "September":
    $mes_actual="Septiembre";
    break;
    case "October":
    $mes_actual="Octubre";
    break;
  case "November":
    $mes_actual="Noviembre";
    break;
  case "December":
    $mes_actual="Diciembre";
    break;
}
            
             echo "Precio ruta ".$precio_ruta."\n";
             echo "Precio almuerzo ".$precio_almuerzo."\n";
             echo "Cantidad almuerzo ".$cantidad_almuerzos. "\n";
            echo "Contador ".$cont. "\n";
             echo "Precio refuerzo escolar ".$precio_refuerzo_escolar. "\n";
              echo "total extracursos ".$total_extracursos. "\n";
            //echo date('t');
            $total=$nuevo_costo+$interes_mensualidad+$precio_ruta+$precio_almuerzo+$total_extracursos+$precio_refuerzo_escolar;
               
          $resultado = ModeloMatriculas::mdlValidarAcudienteConEstudiante('id_student', $_POST["nuevoEstPen"]);
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
          	$datos = array("scholar_year" => $fecha_anio[0],
									   "pension_date" => $fecha_actual,
							           "pension_cost" => $nuevo_costo,
							           "pay_date" => $cadu,
							           "route_state"=>$_POST["ConfirmRuta"],
							           "route_type"=>$tipo_ruta,
							           "lunch_state"=>$_POST["ConfirmAlmuerzo"],
							           "lunch_type"=>$tipo_almuerzo,
							           "assignment_lunch"=>0,
							           "cont_lunch"=>$cantidad_almuerzos,
							           "estado_reloj"=>0,
							           "status_payment_pension"=>0,
							           "extracurricular_course_status"=>$_POST["ConfirmExtraCur"],
							           "extracurricular_course_type"=>$tipo_extracur,
							           "pension_observation"=>$_POST["nuevoComeMatri"],
							           "current_month"=>$mes_actual,
							           "interest_monthly"=>$interes_mensualidad,
							           "route_price"=>$precio_ruta,
							           "lunch_price"=>$precio_almuerzo,
							           "extracurricular_course_total"=>$total_extracursos+$precio_refuerzo_escolar,
							           "monthly_payment" => $total,
									   "id_student" => $_POST["nuevoEstPen"]
									   );
									   
									  echo '<pre>'; print_r($datos); echo '</pre>';
									  //   return;			   
						$respuesta = ModeloPension::mdlIngresarPension($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							swal({

								type: "success",
								title: "¡La mensualidad ha sido guardada correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "pension";

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
								
									window.location = "pension";

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
						
							window.location = "pension";

						}

					});
				

				</script>';

			}


		}


	}

// 	/*=============================================
// 	MOSTRAR USUARIO
// 	=============================================*/

	static public function ctrMostrarPensionConEstudiantes($item, $valor) {
    $respuesta = ModeloPension::mdlMostrarPensionConEstudiantes($item, $valor);
    return $respuesta;
}

static public function ctrMostrarPensiones($item, $valor) {

	$tabla = "pension";

	$respuesta = ModeloPension::mdlMostrarPensiones($tabla, $item, $valor);

	
   
    return $respuesta;
}
// 	/*=============================================
// 	EDITAR USUARIO
// 	=============================================*/

static public function ctrEditarPension(){

		if(isset($_POST["editarCosto"])){

			if(preg_match('/^[0-9 ]+$/', $_POST["editarCosto"])
			   
			   ){

				if(preg_match('/^[0-9 ]+$/', $_POST["editarCosto"])){
						 //$ruta = "";

						$tabla = "pension";

						
           $cadu = trim($_POST['editarFechaPago']);
           $costo = $_POST["editarCosto"];
            $fecha_actual = date('Y-m-d'); 
            $fecha_anio = explode("-", $fecha_actual);
            $estado_ruta=$_POST["editarConfirmRuta"];
			$tipo_ruta=$_POST["editarMatriRuta"];
			$estado_almuerzo=$_POST["editarConfirmAlmuerzo"];
			$tipo_almuerzo=$_POST["editarMatriAlmuerzo"];
			echo '<pre>'; print_r($tipo_almuerzo); echo '</pre>';
			$estado_extracur=$_POST["editarConfirmExtraCur"];
			$tipo_extracur="";

            // 
            // $fecha_dividida = explode("-", $fecha_actual);
            $fecha_dividida = explode("-", $cadu);

  $interes_mensualidad=0;
  $precio_ruta=0;
  $precio_almuerzo=0;
  $cantidad_almuerzos=0;
  $total_extracursos=0;
  $precio_refuerzo_escolar=0;
  $cont=0;
  $asignacion_almuerzo=0;


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

            if ($estado_ruta==1) {
            	if ($tipo_ruta==1) {
            		$precio_ruta=200000;
            	} 
            	if ($tipo_ruta==2) {
            		$precio_ruta=100000;
            	} 
            } else {
            	$tipo_ruta=0;
            	$precio_ruta;
            }
            $pension = ModeloPension::mdlMostrarPensiones("pension", "id_pension", $_POST["idPension"]);
            if ($pension) {
                $cantidad_almuerzos_actual = $pension["cont_lunch"];
                $precio_almuerzo_actual = $pension["lunch_price"];
                $asignacion_almuerzo_actual = $pension["assignment_lunch"];
}		
             if ($estado_almuerzo == 1) {
                if ($tipo_almuerzo == 1) {
                    $precio_almuerzo = 120000;
                    $cantidad_almuerzos = date('t');
                    $asignacion_almuerzo = 0; // Asignar 1 para indicar que es completo
                } elseif ($tipo_almuerzo == 2 && $asignacion_almuerzo_actual == 1) {
                    $precio_almuerzo = $precio_almuerzo_actual;
                    $cantidad_almuerzos = $cantidad_almuerzos_actual;
                    $asignacion_almuerzo = $asignacion_almuerzo_actual;
                } else {
                    $precio_almuerzo = 0;
                    $cantidad_almuerzos = 0;
                    $asignacion_almuerzo = 0;
                }
            } else {
                $precio_almuerzo = $precio_almuerzo_actual;
                $cantidad_almuerzos = $cantidad_almuerzos_actual;
                $asignacion_almuerzo = 0; // No hay almuerzo
                $tipo_almuerzo = 0;
            }

              if ($estado_ruta==1) {
            	if ($tipo_ruta==1) {
            		$precio_ruta=200000;
            	} 
            	if ($tipo_ruta==2) {
            		$precio_ruta=100000;
            	} 
            } else {
            	$precio_ruta;
            }


              if ($estado_extracur==1) {
            	$tipo_extracur=$_POST["editarnuevoCursoExtra"];
            	foreach ($tipo_extracur as $key => $value) {
				    if ($value == "Refuerzo escolar") {
				        $precio_refuerzo_escolar = 90000; // Actualizamos solo si se encuentra "Refuerzo escolar"
				        $cont--;
				    }
				    $cont++;
				    $total_extracursos = $cont * 80000;
    echo "extracurriculares " . $value . "\n";
  
}
 $tipo_extracur= implode(",", $tipo_extracur);
            } else {
            	$tipo_extracur="N/A";
            }
            
           
            //echo date('t');
            $total=$costo+$interes_mensualidad+$precio_ruta+$precio_almuerzo+$total_extracursos+$precio_refuerzo_escolar;
               
    
  

						$datos = array("scholar_year" => $fecha_anio[0],
									   "pension_date" => $fecha_actual,
							           "pension_cost" => $costo,
							           "pay_date" => $cadu,
							           "route_state"=>$_POST["editarConfirmRuta"],
							           "route_type"=>$tipo_ruta,
							           "lunch_state"=>$_POST["editarConfirmAlmuerzo"],
							           "lunch_type"=>$tipo_almuerzo,
							           "assignment_lunch"=>$asignacion_almuerzo,
							           "cont_lunch"=>$cantidad_almuerzos,
							           "extracurricular_course_status"=>$_POST["editarConfirmExtraCur"],
							           "extracurricular_course_type"=>$tipo_extracur,
							           "pension_observation"=>$_POST["editarComeMatri"],
							           "interest_monthly"=>$interes_mensualidad,
							           "route_price"=>$precio_ruta,
							           "lunch_price"=>$precio_almuerzo,
							           "extracurricular_course_total"=>$total_extracursos+$precio_refuerzo_escolar,
							           "monthly_payment" => $total,
									   //"id_student" => $_POST["editarEstPen"],
									   "id_pension" => $_POST["idPension"]
									   );
									   
									   echo '<pre>'; print_r($datos); echo '</pre>';
									    //return;			   
						$respuesta = ModeloPension::mdlEditarPension($tabla, $datos);
					
						if($respuesta == "ok"){

							echo '<script>

							swal({

								type: "success",
								title: "¡La mensualidad ha sido editada correctamente!",
								showConfirmButton: true,
								confirmButtonText: "Cerrar"

							}).then(function(result){

								if(result.value){
								
									window.location = "pension";

								}

							});
						

							</script>';


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
								
									window.location = "pension";

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
						
							window.location = "pension";

						}

					});
				

				</script>';

			}


		}


	}

// 	// /*=============================================
// 	// BORRAR USUARIO
// 	// =============================================*/

	static public function ctrBorrarPension(){

		if(isset($_GET["idPension"])){

			$tabla ="pension";
			$tablaSecundaria ="student_pension";
			$datos = $_GET["idPension"];


			$respuesta = ModeloPension::mdlBorrarPension($tabla, $tablaSecundaria, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La menusalidad ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "pension";

								}
							})

				</script>';

			}		
		}
	}

	static public function ctrAsignarAlmuerzo() {
        if (isset($_GET["PensionId"]) && isset($_GET["contLunch"])&& isset($_GET["monthly"]) && isset($_GET["timer"])) {
            $tabla = "pension";
            $cont = intval($_GET["contLunch"]) + 1;  // Incrementar el contador correctamente
            $almuerzo_diario=$cont*5000;
            $menusalidad_almuerzo_dia=intval($_GET["monthly"])+5000;
            $datos = array(
            
                "id_pension" => base64_decode($_GET["PensionId"]),
                "cont_lunch" => $cont,
                "estado_reloj"=>1,
                "countdown_end_time"=>$_GET["timer"],
                "assignment_lunch"=>1,
                "lunch_price"=>$almuerzo_diario,
                "monthly_payment"=>$menusalidad_almuerzo_dia


            );
            echo '<pre>'; print_r($datos); echo '</pre>';
            // Para depuración, imprime los datos y verifica

            // Llama al modelo para actualizar los datos
            $respuesta = ModeloPension::mdlAsignarAlmuerzo($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        swal({
					  type: "success",
					  title: "La asignacion del almuerzo se ha asignado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "pension";

								}
							})

                      </script>';
            }        
        }
    }

// static public function ctrCambiarEstadoAlmuerzo() {
//         if (isset($_GET["IdPen"]) && isset($_GET["name"])) {
//             $tabla = "pension";
//             $name=$_GET["name"];
//             $datos = array(
            
//                 "id_pension" => $_GET["IdPen"],
//                 "estado_reloj"=>0,
//             );


//             echo '<pre>'; print_r($datos); echo '</pre>';
//             // Para depuración, imprime los datos y verifica

//             // Llama al modelo para actualizar los datos
//             $respuesta = ModeloPension::mdlCambiarEstadoAlmuerzo($tabla, $datos);

//             if ($respuesta == "ok") {
//                echo '<script>
//         setTimeout(function() {
//             swal({
//                 type: "success",
//                 title: "Se habilitó el almuerzo para el estudiante ' . $name . '"
//             });
//             setTimeout(function() {
//                 window.location = "pension";
//             }, 1500); // Redirigir después de 1500 milisegundos (1.5 segundos)
//         }, 1500); // Mostrar la alerta después de 1500 milisegundos (1.5 segundos)
//       </script>';
//             }        
//         }
//     }

}
	

