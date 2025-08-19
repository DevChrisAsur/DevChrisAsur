<?php

class ControladorClientes {

    static public function ctrCrearCliente() {
        if (isset($_POST["nuevoIdCliente"])) {
            $tabla = "cliente";
            
            // Verificar si el cliente ya está registrado
            $nombreUsuario = $_POST["nuevoIdCliente"];
            $usuarioRegistrado = ModeloCliente::mdlVerificarUsuario($tabla, $nombreUsuario);
            
            if ($usuarioRegistrado) {
                echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "¡El cliente ya ha sido registrado!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                window.location = "clientes";
                            }
                        });

                      </script>';
                exit;
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
                "country" => "Colombia",
                "state" => "Cundinamarca",
                "city" => "Bogotá",
                "id_lead" => 19
            );
    
            // Intentar registrar al cliente
            $respuesta = ModeloCliente::mdlRegistrarCliente($tabla, $datos);
    
            if ($respuesta == "ok") {
                echo '<script>
                        swal.fire({
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
                        swal.fire({
                            type: "error",
                            title: "Error al registrar el cliente",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result){
                            if (result.value) {
                                window.location = "clientes";
                            }
                        });
                      </script>';
            }
            exit;
        } 
    }
    
    static public function ctrCrearClienteLead() {
        if (isset($_POST["nuevoIdCliente"])) {
            $tabla = "cliente";
    
            // Verificar si el cliente ya está registrado
            $nombreUsuario = $_POST["nuevoIdCliente"];
            $usuarioRegistrado = ModeloCliente::mdlVerificarUsuario($tabla, $nombreUsuario);
    
            if ($usuarioRegistrado) {
                // Enviar respuesta JSON en caso de que el cliente ya esté registrado
                echo json_encode([
                    "success" => false,
                    "mensaje" => "¡El cliente ya ha sido registrado!"
                ]);
                exit;
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
    
            // Intentar registrar al cliente
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
            exit;
        } else {
            echo json_encode([
                "success" => false,
                "mensaje" => "Datos incompletos para el registro"
            ]);
            exit;
        }
    }
    
     

    static public function ctrVerClientes($item, $valor){

		$tabla = "cliente";

		$respuesta = ModeloCliente::mdlVerClientes($tabla, $item, $valor);

		return $respuesta;
	
	}
    /*=============================================
CONTROLADOR: Ver Clientes por Asesor
=============================================*/
	static public function ctrVerClientesAsesor($id_asesor){

		$tablaClientes = "cliente";
		$tablaUsuarios = "usuarios";
	
		// Llamamos al modelo para obtener los leads del asesor
		$respuesta = ModeloCliente::mdlVerClientesAsesor($tablaClientes, $tablaUsuarios, $id_asesor);
	
		return $respuesta;
	}

/*=============================================
VER CLIENTES COORDINADOR
=============================================*/
static public function ctrVerClientesCoordinador($id_coordinador){

    $tablaClientes = "cliente";
    $tablaLeads = "leads";
    $tablaUsuarios = "usuarios";

    // Llamamos al modelo para obtener los clientes que pertenecen al coordinador
    $respuesta = ModeloCliente::mdlVerClientesCoordinador(
        $tablaClientes, 
        $tablaLeads, 
        $tablaUsuarios, 
        $id_coordinador
    );

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
