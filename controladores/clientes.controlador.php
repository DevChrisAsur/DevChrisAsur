<?php

class ControladorClientes {

    static public function ctrCrearCliente() {
        if (isset($_POST["nuevoIdCliente"])) {

            // Validar campos con expresión regular adecuada
            if (
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoTipoCliente"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEmpleado"]) &&
                preg_match('/^[0-9]+$/', $_POST["nuevoAnosExperiencia"]) &&
                filter_var($_POST["nuevoEmail"], FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[0-9+ ]+$/', $_POST["nuevoTelefono"])) {

                $tabla = "cliente";

                // // Verificar si el nombre de usuario ya está registrado
                // $nombreUsuario = $_POST["nuevoUsuario"];
                // $usuarioRegistrado = ModeloCliente::mdlVerificarUsuario($tabla, $nombreUsuario);

                // if ($usuarioRegistrado) {
                //     echo '<script>
                //         swal({
                //             type: "error",
                //             title: "¡El nombre de usuario ya está registrado!",
                //             showConfirmButton: true,
                //             confirmButtonText: "Cerrar"
                //         }).then(function(result){
                //             if (result.value) {
                //                 window.location = "clientes";
                //             }
                //         });
                //     </script>';
                //     return; // Salir del método si el usuario ya está registrado
                // }

                // Preparar datos para inserción
                $datos = array(
                    "cc" => $_POST["nuevoIdCliente"],
                    "first_name" => $_POST["nuevoNombre"],
                    "last_name" => $_POST["nuevoApellido"],
                    "customer_type" => $_POST["nuevoTipoCliente"],
                    "employers" => $_POST["nuevoEmpleado"],
                    "experience_years" => $_POST["nuevoAnosExperiencia"],
                    "email" => $_POST["nuevoEmail"],
                    "phone" => $_POST["nuevoTelefono"],
                    "id_lead" => $_POST["idLeads"]
                );
                // echo '<pre>'; print_r($datos); echo '</pre>';
                // return;
                // Insertar datos en la base de datos
                $respuesta = ModeloCliente::mdlRegistrarCliente($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡El cliente ha sido registrado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "clientes";
                            }
                        });
                    </script>';
                } else {
                    echo '<script>
                        swal({
                            type: "error",
                            title: "¡Hubo un error al registrar el cliente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "clientes";
                            }
                        });
                    </script>';
                }

            } else {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡Datos ingresados no válidos!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';
            }
        }
    }

    static public function ctrVerClientes($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloCliente::mdlVerClientes($tabla, $item, $valor);

		return $respuesta;
	
	}

    /*=============================================
                ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="cliente";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloCliente::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido eliminado de la base de datos",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';
			}
		}
		
	}
}
