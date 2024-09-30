<?php

class ControladorLeads {

    // Método para actualizar un lead y registrar al cliente
    static public function ctrActualizarALeadYRegistrarCliente() {

        if (isset($_POST["editarNombre"])) {

            // Validación básica del nombre
            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])) {

                // Tabla donde se actualizarán los leads
                $tabla = "cliente";

                // Datos del lead que se van a actualizar
                $datosLead = array(
                    "first_name" => $_POST["nuevoNombre"],
                    "last_name" => $_POST["nuevoApellido"],
                    "email" => $_POST["nuevoEmail"],
                    "phone" => $_POST["nuevoTelefono"],
                    "id_lead" => $_POST["idLeads"],
                    // Datos adicionales para el registro del cliente
                    "cc" => $_POST["nuevoIdCliente"],  // Cedula del cliente o identificación
                    "customer_type" => $_POST["tipoCliente"],  // Tipo de cliente
                    "employers" => $_POST["empleadores"],  // Empleadores del cliente
                    "experience_years" => $_POST["aniosExperiencia"],  // Años de experiencia del cliente
                    "id_lead" => $_POST["idLeads"]  // Nombre de usuario para el cliente
                );

                // Llamar al modelo para actualizar el lead y registrar el cliente
                $respuesta = ModeloLeads::mdlActualizarACLiente($tabla, $datosLead);

                // Verificar si la respuesta fue exitosa
                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "El lead ha sido actualizado y el cliente registrado correctamente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "leads";  // Redirigir a la página de leads
                            }
                        });
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "Ocurrió un error al actualizar el lead o registrar el cliente.",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "leads";  // Redirigir a la página de leads
                            }
                        });
                    </script>';
                }

            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "El nombre no puede contener caracteres especiales o estar vacío.",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result) {
                        if (result.value) {
                            window.location = "leads";
                        }
                    });
                </script>';
            }
        }
    }
    static public function ctrRegistrarLead(){

      if(isset($_POST["nuevoNombre"])){
               
          $tabla = "leads";
          $fecha_actual = date('Y-m-d');
      
          $datos =array(
  
            "first_name" => $_POST["nuevoNombre"],
            "last_name" => $_POST["nuevoApellido"],
            "email" => $_POST["nuevoEmail"],
            "phone" => $_POST["nuevoTelefono"],
            "status_lead" => 0,
            "creation_date" => $fecha_actual,
            "origin" => $_POST["origenLead"],
            "note" => $_POST["observaciones"],
            "id_service" => $_POST["nuevoServicio"],
            "id_area" => $_POST["nuevaArea"],
            
          );

          $respuesta = ModeloLeads::mdlRegistrarLead($tabla, $datos);

          if($respuesta == "ok"){
    
            echo'<script>
      
            swal({
                type: "success",
                title: "Un nuevo Lead ha sido registrado",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
      
                    window.location = "leads";
      
                    }
                  })
      
            </script>';
      
          } else {
      
            echo'<script>
      
            swal({
                type: "error",
                title: "¡Error al registrar al usuario!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
                }).then(function(result){
                    if (result.value) {
      
                    window.location = "leads";
      
                    }
                  })
      
            </script>';    
          }
      }    
    }	

    static public function ctrVerLeadsFrio($item, $valor){

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadfrio($tabla, $item, $valor);

		return $respuesta;
	
	}

	static public function ctrEditarLead(){

		if(isset($_POST["editarNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				$tabla = "leads";


				$datos = array(
                    "first_name" => $_POST["editarNombre"],
					"last_name" => $_POST["editarApellido"],
                    "email" => $_POST["editarCorreo"],
					"phone" => $_POST["editarTelefono"],
					"id_lead"=>$_POST["idLeads"]);

				$respuesta = ModeloLeads::mdlEditarLead($tabla, $datos);


				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "leads";

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

							window.location = "leads";

							}
						})

			  	</script>';

			}

		}

	}

    /*=============================================
                ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarLead(){

		if(isset($_GET["idLeads"])){

			$tabla ="leads";
			$datos = $_GET["idLeads"];

			$respuesta = ModeloLeads::mdlEliminarLead($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido eliminado de la base de datos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "leads";

									}
								})

					</script>';
			}
		}
		
	}
}
