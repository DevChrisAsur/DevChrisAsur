<?php

class ControladorLeads {

	static public function ctrRegistrarLead(){

		date_default_timezone_set('America/Bogota');

		if(isset($_POST["nuevoNombre"])){
	
			$tabla = "leads";
			$fecha_actual = date('Y-m-d');
			
			// Obtener el ID del usuario de la sesión
			$id_usuario = isset($_SESSION["id"]) ? (int) $_SESSION["id"] : 0; 
	
			$datos = array(
				"cc" => $_POST["nuevoIdLead"],
				"first_name" => $_POST["nuevoNombre"],
				"last_name" => $_POST["nuevoApellido"],
				"email" => $_POST["nuevoEmail"],
				"phone" => $_POST["nuevoTelefono"],
				"status_lead" => 0,
				"creation_date" => $fecha_actual,
				"origin" => $_POST["origenLead"],
				"note" => $_POST["observaciones"],
				"id_service" => !empty($_POST["nuevoServicio"]) ? $_POST["nuevoServicio"] : null,
				"id_area" => !empty($_POST["nuevaArea"]) ? $_POST["nuevaArea"] : null,
				"sector" => $_POST["nuevoSector"],
				"id_usuario" => $id_usuario
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
	

	static public function ctrContarLeadsDiarios() {

        // Llamamos al modelo que hace la consulta de leads diarios
        $respuesta = ModeloLeads::mdlContarLeadsDiarios();

        // Retornamos la respuesta del modelo, que contiene el conteo de leads
        return $respuesta;
    }
	
    static public function ctrVerLeadsFrio($item, $valor){

		$tabla = "leads";

		$respuesta = ModeloLeads::mdlVerLeadfrio($tabla, $item, $valor);

		return $respuesta;
	
	}

    static public function  ctrVerInteresLead($item, $valor) {
		$respuesta = ModeloLeads::mdlVerLeadsInteres($item, $valor);
		return $respuesta;
	}

	static public function ctrVerLeadAsesor($id_asesor){

		$tablaLeads = "leads";
		$tablaUsuarios = "usuarios";
	
		// Llamamos al modelo para obtener los leads del asesor
		$respuesta = ModeloLeads::mdlMostrarLeadsPorAsesor($tablaLeads, $tablaUsuarios, $id_asesor);
	
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
						  title: "El lead ha sido eliminado de la base de datos",
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