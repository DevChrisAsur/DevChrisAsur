<?php

class ControladorClientes {

    static public function ctrCrearCliente() {
        if (isset($_POST["nuevoIdCliente"])) {
            $tabla = "cliente";
    
            // Verificar si el nombre de usuario ya está registrado
            $nombreUsuario = $_POST["nuevoIdCliente"];
            $usuarioRegistrado = ModeloCliente::mdlVerificarUsuario($tabla, $nombreUsuario);
    
            if ($usuarioRegistrado) {
                echo '<script>
                    swal({
                        type: "error",
                        title: "¡el cliente ya ha sido registrado!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if (result.value) {
                            window.location = "clientes";
                        }
                    });
                </script>';
                return; // Salir del método si el usuario ya está registrado
            }
    
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
                "country" => $_POST["nuevoPais"],  // Agregar país
                "state" => $_POST["nuevoEstado"],    // Agregar estado
                "city" => $_POST["nuevoCiudad"]      // Agregar ciudad
            );
    
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
        }
    }
    
    

    static public function ctrVerClientes($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloCliente::mdlVerClientes($tabla, $item, $valor);

		return $respuesta;
	
	}
    static public function ctrInfoCliente($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloCliente::mdlVerInfoCliente($tabla, $item, $valor);

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
