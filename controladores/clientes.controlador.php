<?php

class ControladorClientes {

    static public function ctrCrearCliente() {
        if (isset($_POST["nuevoIdCliente"])) {
            $tabla = "cliente";
            
            // Verificar si el cliente ya está registrado
            $nombreUsuario = $_POST["nuevoIdCliente"];
            $usuarioRegistrado = ModeloCliente::mdlVerificarUsuario($tabla, $nombreUsuario);
            
            if ($usuarioRegistrado) {
                echo json_encode([
                    "success" => false,
                    "mensaje" => "¡El cliente ya ha sido registrado!"
                ]);
                exit; // Detener ejecución para evitar múltiples respuestas
            }
            
            // Preparar datos para la inserción
            $datos = array(
                "cc" => $_POST["nuevoIdCliente"],
                "first_name" => $_POST["nuevoNombre"],
                "last_name" => $_POST["nuevoApellido"],
                "customer_type" => $_POST["nuevoTipoCliente"],
                "employers" => $_POST["nuevoEmpleado"],
                "experience_years" => $_POST["nuevoAnosExperiencia"],
                "email" => $_POST["nuevoEmail"],
                "phone" => $_POST["nuevoTelefono"],
                "country" => $_POST["nuevoPais"],
                "state" => $_POST["nuevoEstado"],
                "city" => $_POST["nuevoCiudad"],
                "id_lead" => $_POST["idLeads"]
            );
    
            $respuesta = ModeloCliente::mdlRegistrarCliente($tabla, $datos);
    
            if ($respuesta == "ok") {
                echo json_encode([
                    "success" => true,
                    "mensaje" => "¡El cliente ha sido registrado correctamente!"
                ]);
            } else {
                echo json_encode([
                    "success" => false,
                    "mensaje" => "Error al registrar el cliente"
                ]);
            }
            exit; // Detener ejecución para evitar múltiples respuestas
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
